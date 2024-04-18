<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\Station;
use App\Models\Division;
use App\Models\TrainingType;
use App\Models\TrainingsTitle;
use App\Models\Participant;
use App\Models\SourceFund;
use App\Models\TrainingsForm;

use App\Exports\ExportRecords;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\DB;

use Auth;
use Session;
use File;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TrainingsFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();
        
        return view('encoder.overview', compact('titles'));
    }

    public function cesView()
    {
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();
        
        return view('encoder.ces_view', compact('titles'));
    }

    public function cesEditView()
    {
        // if(!empty(Auth::check())) {
        //     $encoder_id = Auth::user()->id;
        // }

        // $records = DB::table('trainings_forms')
        // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
        // ->select('trainings_forms.*', 'users.name as encoder_name', 'users.email as encoder_email')
        // // remove the line below to show all records
        // ->where("encoder_id", '=', $encoder_id)
        // ->latest('trainings_forms.created_at')
        // // ->simplePaginate(5);
        // // ->paginate(5);
        // ->get();

        if(empty(Auth::check())) {
            abort(404);
        }

        // dd($records->all());
        // return view('encoder.ces_edit', compact('records'));
        return view('encoder.ces_edit');
    }

    /**
     * Live Search and Filter
     */
    public function filterAjax(Request $request)
    {
        if (!empty(Auth::check())) {
            $encoder_id = Auth::user()->id;
        } else {
            abort(404);
        }
        // For View DataTable
        if ($request->boolean('showTrainingView')) {
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 5);

            // Calculate the offset to skip records based on the current page number
            $offset = ($page - 1) * $recordsPerPage;

            // Query to fetch records with pagination
            $records = DB::table('trainings_forms')
                ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->select('trainings_forms.*')
                ->where('users.station', '=', $request->station)
                ->latest('trainings_forms.id')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            return response()->json(['records' => $records]);
        }

        if ($request->boolean('filterTrainingsView')) {
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 5);

            // Calculate the offset to skip records based on the current page number
            $offset = ($page - 1) * $recordsPerPage;

            $searchInput = $request->searchInput ?? '';
            $yearSelect = $request->yearSelect ?? '';
            $start_MonthSelect = $request->start_MonthSelect ?? '';
            $end_MonthSelect = $request->end_MonthSelect ?? '';
            $trainingTitle = $request->trainingTitle ?? '';
            $formType = $request->formType ?? '';

            // not existing form type
            if($formType == 0) {
                $records = DB::table('trainings_forms')
                            ->select('*')
                            ->where('id', '=', 0)
                            ->get();
                return response()->json(['records' => $records]);
            }
            // dd($trainingTitle);
            
            $records = DB::table('trainings_forms')
                ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->select('trainings_forms.*')
                ->when(!empty($start_MonthSelect), function ($query) use ($start_MonthSelect) {
                    return $query->whereMonth('trainings_forms.start_date', '>=', $start_MonthSelect);
                })
                ->when(!empty($end_MonthSelect), function ($query) use ($end_MonthSelect) {
                    return $query->whereMonth('trainings_forms.end_date', '<=', $end_MonthSelect);
                })
                ->when(!empty($yearSelect), function ($query) use ($yearSelect) {
                    return $query->whereYear('trainings_forms.end_date', '=', $yearSelect);
                })
                ->when(!empty($trainingTitle), function ($query) use ($trainingTitle) {
                    if($trainingTitle == 'Other') {
                        return $query->whereNotIn('trainings_forms.title', function ($subquery) {
                            $subquery->select('trainings_titles.training_title')->from('trainings_titles');
                        });
                    } else {
                        return $query->where('trainings_forms.title', '=', $trainingTitle);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.division', 'LIKE', "%$searchInput%");
                                // where('trainings_forms.title', 'LIKE', "%$searchInput%");
                                // ->orWhere('trainings_forms.division', 'LIKE', "%$searchInput%")
                                // ->orWhere('venue', 'LIKE', "%$searchInput%")
                                // ->orWhere('province', 'LIKE', "%$searchInput%")
                                // ->orWhere('municipality', 'LIKE', "%$searchInput%")
                                // ->orWhere('country', 'LIKE', "%$searchInput%")
                                // ->orWhere('state', 'LIKE', "%$searchInput%")
                                // ->orWhere('num_of_participants', 'LIKE', "%$searchInput%");
                })
                // ->orderBy('title', 'ASC')
                ->where('users.station', '=', $request->station)
                ->latest('trainings_forms.id')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            return response()->json(['records' => $records]);
        }

        // For Edit DataTable
        if ($request->boolean('showTraining')) {
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 5);

            // Calculate the offset to skip records based on the current page number
            $offset = ($page - 1) * $recordsPerPage;

            // Query to fetch records with pagination
            $records = DB::table('trainings_forms')
                ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->select('trainings_forms.*', 'users.name as encoder_name', 'users.email as encoder_email')
                ->where('encoder_id', '=', $encoder_id)
                ->where('trainings_forms.station', '=', $request->station)
                ->latest('trainings_forms.id')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            return response()->json(['records' => $records]);
        }

        if ($request->boolean('filterTrainings')) {
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 5);

            // Calculate the offset to skip records based on the current page number
            $offset = ($page - 1) * $recordsPerPage;

            $searchInput = $request->searchInput ?? '';
            $yearSelect = $request->yearSelect ?? '';
            $start_MonthSelect = $request->start_MonthSelect ?? '';
            $end_MonthSelect = $request->end_MonthSelect ?? '';

            $records = DB::table('trainings_forms')
                ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->select('trainings_forms.*', 'users.name as encoder_name', 'users.email as encoder_email')
                ->where('encoder_id', '=', $encoder_id)
                ->when(!empty($start_MonthSelect), function ($query) use ($start_MonthSelect) {
                    return $query->whereMonth('trainings_forms.start_date', '>=', $start_MonthSelect);
                })
                ->when(!empty($end_MonthSelect), function ($query) use ($end_MonthSelect) {
                    return $query->whereMonth('trainings_forms.end_date', '<=', $end_MonthSelect);
                })
                ->when(!empty($yearSelect), function ($query) use ($yearSelect) {
                    return $query->whereYear('start_date', '=', $yearSelect);
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    $query->where(function ($subquery) use ($searchInput) {
                        $subquery->where('title', 'LIKE', "%$searchInput%")
                            ->orWhere('trainings_forms.division', 'LIKE', "%$searchInput%")
                            ->orWhere('venue', 'LIKE', "%$searchInput%")
                            ->orWhere('province', 'LIKE', "%$searchInput%")
                            ->orWhere('municipality', 'LIKE', "%$searchInput%")
                            ->orWhere('country', 'LIKE', "%$searchInput%")
                            ->orWhere('state', 'LIKE', "%$searchInput%")
                            ->orWhere('num_of_participants', 'LIKE', "%$searchInput%");
                    });
                })
                // ->orderBy('title', 'ASC')
                ->where('trainings_forms.station', '=', $request->station)
                ->latest('trainings_forms.id')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            return response()->json(['records' => $records]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!empty(Auth::check())) {
            $station = Auth::user()->station;
        }

        $station_id = Station::where("station", '=', $station)->first();
        // dd($station_id->id);

        $provinces = Province::select('*')->orderBy('province_name', 'asc')->get();
        // station_id = 1 is for CES branch
        $divisions = Division::where("station_id", '=', $station_id->id)->get();
        // $divisions = Division::where("station_id", '=', 1)->get();
        
        $training_types = TrainingType::select('*')->orderBy('training_type', 'asc')->get();

        $participants = Participant::select('*')->orderBy('classification', 'asc')->get();

        $funds = SourceFund::select('*')->orderBy('fund', 'asc')->get();
        
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        $stations = Station::select('*')->orderBy('station', 'asc')->get();

        // return view('trainingsform', compact('provinces', 'divisions', 'training_types', 'participants', 'funds'));
        return view('trainings', compact('provinces', 'divisions', 'training_types', 'participants', 'funds', 'titles', 'stations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(gettype($request->average_gik));
        // dd(gettype($request->withinPhilriceInput));

        // query for user
         if(!empty(Auth::check())) {
            $encoder_id = Auth::user()->id;
        } else {
            abort(404);
        }

        $request->validate([
            // Section 2
            'training_title'=>'required',
            'training_category'=>'required',
            'training_type'=>'required',
            'mod'=>'required',
            'start'=>'required',
            'end'=>'required',
            // Section 3
            'sponsor'=>'required',
            'source_of_fund'=>'required',
            'average_gik'=>'required',
            'evaluationInput'=>'required',
            // Section 4
            'total_participants'=>'required|integer|min:1',
            'num_of_farmers_and_growers'=>'required|min:0',
            'num_of_extension_workers'=>'required|min:0',
            'num_of_scientific'=>'required|min:0',
            'num_of_other'=>'required|min:0',
            'num_of_male'=>'required|min:0',
            'num_of_female'=>'required|min:0',
            'num_of_indigenous'=>'required|min:0',
            'num_of_pwd'=>'required|min:0',
            // Section 5
            'photo_doc_event'=>'max:10',
            'other_doc'=>'max:10',
        ]);

        

        $title = $request->training_title;
        if( $request->training_title == 'Other' ) {
            $request->validate([
                'otherTrainingInput'=>'required',
            ]);
            $title = $request->otherTrainingInput;
        } 

        $training_venue = '-';
        $local_address = '-';
        $municipality = '-';
        $province = '-';
        $outside_local_address = '-';
        $international_address = '-';
        if($request->training_type == 'Local') {
            $request->validate([
                'training_venue'=>'required',
            ]);
            $training_venue = $request->training_venue;

            if($request->training_venue == 'Within PhilRice Station') {
                $request->validate([
                    'withinPhilriceInput'=>'required',
                ]);
                // query to get municipality and province based on station
                $local_address = Station::select('*')->where("id", '=', $request->withinPhilriceInput)->first();

            } else if($request->training_venue == 'Outside PhilRice Station') {
                $request->validate([
                    'outsidePhilriceInput'=>'required',
                ]);
                $outside_local_address = $request->outsidePhilriceInput;
            }
        } else if($request->training_type == 'International') {
            $request->validate([
                'internationalTrainingInput'=>'required',
            ]);
            $international_address = $request->internationalTrainingInput;
        }
        
        if($local_address != '-') {
            $municipality = $local_address->municipality;
            $province = $local_address->province;
        }

        if($outside_local_address != '-') {
            $municipality = $outside_local_address;
            $province = '-';
        }

        $average_gik = $request->average_gik;
        if($average_gik == 'N/A') {
            $average_gik = NULL;
        } else {
            // dd($request->average_gik);
            $average_gik = (float) $request->average_gik;
        }

        $imageNames = array();
        $image_full_name = '';
        if ($images = $request->file('photo_doc_event')) {
            foreach ($images as $image) {
                // $imageName = md5(rand(1000,10000));
                $imageName = strtolower($image->getClientOriginalName());
                $imageName = str_replace(['.png', '.gif', '.jpg'], '', $imageName);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $imageName.'.'.$ext;
                $upload_path = 'public/images/';
                $image_url = $upload_path.$image_full_name;
                $image->move($upload_path, $image_full_name);
                // $imageNames[] = $image_url;
                $imageNames[] = $image_full_name;
            }
        }

        $fileNames = array();
        $file_full_name = '';
        if ($files = $request->file('other_doc')) {
            foreach ($files as $file) {
                // $fileName = md5(rand(1000,10000));
                $fileName = strtolower($file->getClientOriginalName());
                $ext = strtolower($file->getClientOriginalExtension());
                $fileName = str_replace(['.pdf', '.xlsx', '.docx', '.pptx', '.png', '.gif', '.jpg'], '', $fileName);
                $file_full_name = $fileName.'.'.$ext;
                $upload_path = 'public/files/';
                $file_url = $upload_path.$file_full_name;
                $file->move($upload_path, $file_full_name);
                $fileNames[] = $file_full_name;
            }
        }

        TrainingsForm::create([
            // Section 2
            'encoder_id'=>$encoder_id,
            'division'=>Auth::user()->division,
            'title'=>$title,
            'category'=>$request->training_category,
            'type'=>$request->training_type,
            'training_venue'=>$training_venue,
            'station_id'=> (int) $request->withinPhilriceInput,
            'municipality'=>$municipality,
            'province'=>$province,
            'international_address'=>$international_address,
            'mod'=>$request->mod,
            'start_date'=>Carbon::parse($request->start)->format('Y-m-d'),
            'end_date'=>Carbon::parse($request->end)->format('Y-m-d'),
            // Section 3
            'sponsor'=>$request->sponsor,
            'fund'=>$request->source_of_fund,
            'average_gik'=>$average_gik,
            'evaluation'=> (float) $request->evaluationInput,
            // Section 4
            'num_of_participants'=> (int) ltrim($request->total_participants, '0'),
            'num_of_farmers'=> (int) ltrim($request->num_of_farmers_and_growers, '0'),
            'num_of_extworkers'=> (int) ltrim($request->num_of_extension_workers, '0'),
            'num_of_scientific'=> (int) ltrim($request->num_of_scientific, '0'),
            'num_of_other'=> (int) ltrim($request->num_of_other, '0'),
            'num_of_male'=> (int) ltrim($request->num_of_male, '0'),
            'num_of_female'=> (int) ltrim($request->num_of_female, '0'),
            'num_of_indigenous'=> (int) ltrim($request->num_of_indigenous, '0'),
            'num_of_pwd'=> (int) ltrim($request->num_of_pwd, '0'),
            // Section 5 
            'image'=>implode('|', $imageNames),
            'file'=>implode('|', $fileNames),
        ]);

        return redirect()->back()->with('success', "You successfully added a data.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    public function edit(Request $request, string $id)
    {
        if(empty($id)) {
            abort(404);
        }

        if(!empty(Auth::check())) {
            $station = Auth::user()->station;
        }

        $station_id = Station::where("station", '=', $station)->first();

        $provinces = Province::select('*')->orderBy('province_name', 'asc')->get();
        // station_id = 1 is for CES branch
        $divisions = Division::where("station_id", '=', $station_id->id)->get();

        $training_types = TrainingType::select('*')->orderBy('training_type', 'asc')->get();

        $participants = Participant::select('*')->orderBy('classification', 'asc')->get();

        $funds = SourceFund::select('*')->orderBy('fund', 'asc')->get();

        $record = TrainingsForm::findOrFail($id);

        if(empty($record)) {
            abort(404);
        }

        $participants_cb = explode('|', $record->participants);
        
        foreach($participants as $participant) {
            $cb_array[] = $participant->classification;
        }

        return view('trainingsform_edit', compact('record', 'provinces', 'divisions', 'training_types', 'participants', 'participants_cb', 'funds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = TrainingsForm::findOrFail($id);

        if(empty($record)) {
            abort(404);
        }

        if( $request->venue_group == 'Local (but outside PhilRice station)' ) {
            $request->validate([
                'province'=>'required',
                'city'=>'required',
            ]);

            $province = $request->province;
            $city = $request->city;
            $country = '';
            $state = '';

        } elseif($request->venue_group == 'International') {
            $request->validate([
                'country'=>'required',
                'state'=>'required',
            ]);

            $country = $request->country;
            $state = $request->state;
            $province = '';
            $city = '';
        }

        $request->validate([
            'offices_and_division'=>'required',
            'training_title'=>'required',
            'training_type'=>'required',
            'training_style_group'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'venue_group'=>'required',

            'sponsor'=>'required',
            'average_gik'=>'required|min:1',
            'source_of_fund'=>'required',
            'evaluation'=>'required',
            'participants'=>'required',
            'num_of_participants'=>'required|integer|min:1',
            'num_of_farmers_and_growers'=>'required|integer|min:1',
            'num_of_extension_workers'=>'required|integer|min:1',
            'num_of_scientific_com'=>'required|integer|min:1',
            'num_of_other_participants'=>'required|integer|min:1',
            'num_of_male'=>'required|integer|min:1',
            'num_of_female'=>'required|integer|min:1',
            'num_of_indigenous'=>'required|integer|min:1',
            'num_of_pwd'=>'required|integer|min:1',

            'photo_doc_event'=>'max:10',
            'other_doc'=>'max:10',
        ]);

        if(!empty(Auth::check())) {
            if(Auth::user()->station == 'CES' && $request->venue_group == 'Within PhilRice station') {
                $province = 'Nueva Ecija';
                $city = 'Science City of Muñoz';
                $country = '';
                $state = '';
            } elseif(Auth::user()->station == 'Agusan' && $request->venue_group == 'Within PhilRice station') {
                $province = 'Agusan del Norte';
                $city = 'Basilisa, RTRomualdez';
                $country = '';
                $state = '';
            } elseif(Auth::user()->station == 'Batac' && $request->venue_group == 'Within PhilRice station') {
                $province = 'Ilocos Norte';
                $city = 'Batac';
                $country = '';
                $state = '';
            } elseif(Auth::user()->station == 'Bicol' && $request->venue_group == 'Within PhilRice station') {
                $province = 'Albay';
                $city = 'Ligao City';
                $country = '';
                $state = '';
            } elseif(Auth::user()->station == 'CMU' && $request->venue_group == 'Within PhilRice station') {
                $province = 'Bukidnon';
                $city = 'Maramag';
                $country = '';
                $state = '';
            } elseif(Auth::user()->station == 'Isabela' && $request->venue_group == 'Within PhilRice station') {
                $province = 'Isabela';
                $city = 'San Mateo';
                $country = '';
                $state = '';
            } elseif(Auth::user()->station == 'Los Baños' && $request->venue_group == 'Within PhilRice station') {
                $province = 'Laguna';
                $city = 'Los Baños';
                $country = '';
                $state = '';
            } elseif(Auth::user()->station == 'Midsayap' && $request->venue_group == 'Within PhilRice station') {
                $province = 'North Cotabato';
                $city = 'Midsayap';
                $country = '';
                $state = '';
            } elseif(Auth::user()->station == 'Negros' && $request->venue_group == 'Within PhilRice station') {
                $province = 'Negros Occidental';
                $city = 'Murcia';
                $country = '';
                $state = '';
            } else {
                $province = 'N/A';
                $city = 'N/A';
                $country = '';
                $state = '';
            }
        }

        // Serialize the array of participants checkbox values
        // $participants_cb = implode('|', $request->participants);
        $participants_cb = implode('|', (array) $request->input('participants', []));
        
        // $old_images = explode('|', $record->image);
        $old_images = $record->image;
        $old_images = explode('|', $old_images);

        $imageNames = array();
        $image_full_name = '';
        if ($images = $request->file('photo_doc_event')) {
            // count elements in old_images and images in update form
            if(count($old_images) + count($images) > 10) {
                return redirect()->back()->with('error', "Uploaded images/files can't exceed to 10.");
            }
            foreach ($images as $image) {
                // $imageName = md5(rand(1000,10000));
                $imageName = strtolower($image->getClientOriginalName());
                $imageName = str_replace(['.png', '.gif', '.jpg'], '', $imageName);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $imageName.'.'.$ext;
                $upload_path = 'public/images/';
                $image_url = $upload_path.$image_full_name;
                $image->move($upload_path, $image_full_name);
                // $imageNames[] = $image_url;
                $imageNames[] = $image_full_name;
            }
        }

        if(!empty($request->file('photo_doc_event'))) {
            $new_images = array_merge($old_images, $imageNames);
        } else {
            $new_images = $old_images;
        }

        $old_files = $record->file;
        $old_files = explode('|', $old_files);

        $fileNames = array();
        $file_full_name = '';
        if ($files = $request->file('other_doc')) {
            // count elements in old_files and files in update form
            if(count($old_files) + count($files) > 10) {
                return redirect()->back()->with('error', "Uploaded images/files can't exceed to 10.");
            }
            foreach ($files as $file) {
                // $fileName = md5(rand(1000,10000));
                $fileName = strtolower($file->getClientOriginalName());
                $ext = strtolower($file->getClientOriginalExtension());
                $fileName = str_replace(['.pdf', '.xlsx', '.docx', '.pptx', '.png', '.gif', '.jpg'], '', $fileName);
                $file_full_name = $fileName.'.'.$ext;
                $upload_path = 'public/files/';
                $file_url = $upload_path.$file_full_name;
                $file->move($upload_path, $file_full_name);
                $fileNames[] = $file_full_name;
            }
        }

        if(!empty($request->file('other_doc'))) {
            $new_files = array_merge($old_files, $fileNames);
        } else {
            $new_files = $old_files;
        }

        TrainingsForm::where('id',$id)->update([
            'division'=>$request->offices_and_division,
            'title'=>$request->training_title,
            'training_type'=>$request->training_type,
            'training_style'=>$request->training_style_group,

            'start_date'=>Carbon::parse($request->start_date)->format('Y-m-d'),
            'end_date'=>Carbon::parse($request->end_date)->format('Y-m-d'),

            'venue'=>$request->venue_group,

            'province'=>$province,
            'municipality'=>$city,
            'country'=>$country,
            'state'=>$state,

            'sponsor'=>$request->sponsor,
            'fund'=>$request->source_of_fund,
            'average_gik'=>$request->average_gik,
            'evaluation'=>$request->evaluation,

            'participants'=>$participants_cb,

            'num_of_participants'=>$request->num_of_participants,
            'num_of_farmers'=>$request->num_of_farmers_and_growers,
            'num_of_extworkers'=>$request->num_of_extension_workers,
            'num_of_scientific'=>$request->num_of_scientific_com,
            'num_of_other_sectors'=>$request->num_of_other_participants,
            'num_of_male'=>$request->num_of_male,
            'num_of_female'=>$request->num_of_female,
            'num_of_indigenous'=>$request->num_of_indigenous,
            'num_of_pwd'=>$request->num_of_pwd,

            'image' => implode('|', $new_images),
            'file' => implode('|', $new_files),

        ]);

        return redirect()->route('encoder.ces_edit')->with('success', "You successfully edited a data.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $record = TrainingsForm::findOrFail($id);

        if(empty($record)) {
            abort(404);
        }

        if($request->boolean('deleteRecord')) {
            $deleteImages = explode('|', $record->image);
            foreach($deleteImages as $deleteImg) {
                $deleteImg = 'public/images/' . $deleteImg;
                if (file_exists($deleteImg)) {
                    File::delete($deleteImg);
                }
            }

            $deleteFiles = explode('|', $record->file);
            foreach($deleteFiles as $deleteFile) {
                $deleteFile =  'public/files/' . $deleteFile;
                if (file_exists($deleteFile)) {
                    File::delete($deleteFile);
                }
            }

            $record->delete();
    
            // return redirect()->back()->with('warning', "You successfully deleted a data.");
            return response()->json(['message' => 'Record deleted successfully']);
        }
    }

    public function export(Request $request)
    {
        if($request->boolean('exportFilteredRecords')) {
            $searchInput = $request->searchInput ?? '';
            $yearSelect = $request->yearSelect ?? '';
            $start_MonthSelect = $request->start_MonthSelect ?? '';
            $end_MonthSelect = $request->end_MonthSelect ?? '';
            $trainingTitle = $request->trainingTitle ?? '';
            $formType = $request->formType ?? '';
            $station = $request->station;

            return Excel::download(new ExportRecords($searchInput, $yearSelect, $start_MonthSelect, $end_MonthSelect, $trainingTitle, $formType, $station), 'test.xls');
        }

    }
}
