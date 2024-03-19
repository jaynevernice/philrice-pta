<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\Division;
use App\Models\Participant;
use App\Models\TrainingsForm;

use Auth;
use Session;
use File;
use Carbon\Carbon;

class TrainingsFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::select('*')->orderBy('province_name', 'asc')->get();
        // station_id = 1 is for CES branch
        $ces_divisions = Division::where("station_id", 1)->get();
        $participants = Participant::select('*')->orderBy('classification', 'asc')->get();

        return view('trainingsform', compact('provinces', 'ces_divisions', 'participants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->start_date);

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
            'name'=>'required',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i|email|max:50',
            'offices_and_division'=>'required',
            'training_title'=>'required',
            'training_type'=>'required',
            'training_style_group'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'venue_group'=>'required',
            // 'province'=>'required',
            // 'city'=>'required',
            // 'country'=>'required',
            // 'state'=>'required',
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

        ]);

        if(!empty(Auth::check())) {
            if(Auth::user()->station == 'CES' && $request->venue_group == 'Within PhilRice station') {
                $province = 'Nueva Ecija';
                $city = 'Science City of Muñoz';
                $country = '';
                $state = '';
            } 
        }

        // Serialize the array of participants checkbox values
        $participants_cb = implode(',', $request->participants);
        
        $imageNames = array();
        if ($images = $request->file('photo_doc_event')) {
            foreach ($images as $image) {

                $imageName = md5(rand(1000,10000));
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $imageName.'.'.$ext;
                $upload_path = 'public/images/';
                $image_url = $upload_path.$image_full_name;
                $image->move($upload_path, $image_full_name);
                $imageNames[] = $image_url;
            }
        }

        $fileNames = array();
        if ($files = $request->file('other_doc')) {
            foreach ($files as $file) {

                // $fileName = md5(rand(1000,10000));
                $fileName = strtolower($file->getClientOriginalName());
                $ext = strtolower($file->getClientOriginalExtension());
                $file_full_name = $fileName.'.'.$ext;
                $upload_path = 'public/files/';
                $file_url = $upload_path.$file_full_name;
                $file->move($upload_path, $file_full_name);
                $fileNames[] = $file_url;
            }
        }

        TrainingsForm::create([
            'encoder_name'=>$request->name,
            'encoder_email'=>$request->email,
            'division'=>$request->offices_and_division,
            'title'=>$request->training_title,
            'training_type'=>$request->training_type,
            'training_style'=>$request->training_style_group,
            
            
            'start_date'=>Carbon::parse($request->start_date)->format('Y-m-d'),
            'end_date'=>Carbon::parse($request->end_date)->format('Y-m-d'),
            // 'start_date'=>$request->start_date,
            // 'end_date'=>$request->end_date,

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
