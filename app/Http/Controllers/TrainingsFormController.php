<?php

namespace App\Http\Controllers;

use File;

use Session;
use Carbon\Carbon;
use App\Models\Region;
use App\Models\Station;
use App\Models\Division;
use App\Models\Province;
use App\Models\SourceFund;
use App\Models\Participant;
use Illuminate\Support\Str;
use App\Models\Municipality;

use App\Models\TrainingType;
use Illuminate\Http\Request;

use App\Models\TrainingsForm;

use App\Exports\ExportRecords;
use App\Models\TrainingsTitle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TrainingsFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // THIS IS FOR ALL CHARTS (ONLY) OF OVERVIEW
    {
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();
        $regions = Region::select('*')->orderBy('id', 'asc')->get();
        $provinces = Province::select('*')->orderBy('provDesc', 'asc')->get();
        $municipalities = Municipality::select('*')->orderBy('citymunDesc', 'asc')->get();

        // sex chart data
        $sex_charts = DB::table('trainings_forms')
                    ->select(DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Women'),
                            DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Men'))
                    ->first();
        // convert $sex_charts into associative aray
        $sex_charts = (array) $sex_charts;

        // indigenous chart data
        $indigenous_charts = DB::table('trainings_forms')
                            ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'), 
                                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_indigenous) AS UNSIGNED) as "Non-IP"'))
                            ->first();
        // convert $indigenous_charts into associative aray
        $indigenous_charts = (array) $indigenous_charts;

        // ability chart data
        $ability_charts = DB::table('trainings_forms')->select(DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'), DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_pwd) AS UNSIGNED) as "Non-PWD"'))->first();
        // convert $ability_charts into associative aray
        $ability_charts = (array) $ability_charts;

        // sector chart data
        $sector_charts = DB::table('trainings_forms')
            ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                    DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                    DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                    DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
            ->first();
        // convert $ability_charts into associative aray
        $sector_charts = (array) $sector_charts;

        $region_charts = DB::table('regions')
            ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
            ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
            ->groupBy('regions.regDesc')
            ->get();
        
        $province_charts = DB::table('provinces')
            ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
            ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
            ->groupBy('provinces.provDesc')
            ->get();
        
        $municipality_charts = DB::table('municipalities')
            ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            ->groupBy('municipalities.citymunDesc')
            ->get();
        
        // Else user is unauthenticated gaya ni guest
        if (Auth::check() && Auth::user()->user_type === 'encoder') {
            return view('encoder.overview', compact('titles', 'regions', 'provinces', 'municipalities', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts', 'municipality_charts'));
        } elseif (Auth::check() && Auth::user()->user_type === 'super_admin') {
            return view('super_admin.overview', compact('titles', 'regions', 'provinces', 'municipalities', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts', 'municipality_charts'));
        } else {
            return view('guest.overview', compact('titles', 'regions', 'provinces', 'municipalities', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts', 'municipality_charts'));
        }
    }

    public function cesView()
    {
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        // sex chart data
        $sex_charts = DB::table('trainings_forms')
            ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Male'),
                    DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Female'))
            ->where('users.station', '=', 1)
            ->first();
        // convert $sex_charts into associative aray
        $sex_charts = (array) $sex_charts;

        // indigenous and pwd chart data
        $indigenous_pwd = DB::table('trainings_forms')
            ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'),
                    DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'))
            ->where('users.station', '=', 1)
            ->first();
        // convert $indigenous_pwd into associative aray
        $indigenous_pwd = (array) $indigenous_pwd;

        // sector chart data
        $sector_charts = DB::table('trainings_forms')
            ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                    DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                    DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                    DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
            ->where('users.station', '=', 1)
            ->first();
        // convert $ability_charts into associative aray
        $sector_charts = (array) $sector_charts;

        return view('encoder.view', compact('titles', 'sex_charts', 'indigenous_pwd', 'sector_charts'));
    }

    public function cesEditView()
    {
        if (empty(Auth::check())) {
            abort(404);
        }

        $encoder_id = Auth::user()->id;

        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        $records = DB::table('trainings_forms')
            ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select('trainings_forms.*', 'users.name as encoder_name', 'users.email as encoder_email')
            // remove the line below to show all records
            ->where("encoder_id", '=', $encoder_id)
            ->latest('trainings_forms.created_at')
            // ->simplePaginate(5);
            // ->paginate(5);
            ->get();

        // dd($records->all());
        return view('encoder.edit', compact('records', 'titles'));
        // return view('encoder.ces_edit');
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
                ->leftJoin('municipalities', 'trainings_forms.municipality', '=', 'municipalities.citymunCode')
                ->leftJoin('provinces', 'trainings_forms.province', '=', 'provinces.provCode')
                ->select('trainings_forms.*', 'municipalities.citymunDesc as citymunDesc', 'provinces.provDesc as provDesc')
                ->where('users.station', '=', $request->station)
                ->where('users.end_date', '=', $request->station)
                // ->latest('trainings_forms.id')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();
            
            $only_numbers = DB::table('trainings_forms')
                ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->select(DB::raw('SUM(num_of_participants) as total_participants'),
                        DB::raw('ROUND(AVG(average_gik), 2) as average_gik'),
                        DB::raw('ROUND(AVG(evaluation), 2) as evaluation'))
                ->where('users.station', '=', $request->station)
                ->get();

            return response()->json(['records' => $records, 'only_numbers' => $only_numbers]);
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
                
                $only_numbers = $provinces = DB::table('trainings_forms')
                    ->select(DB::raw('SUM(num_of_participants) as total_participants'),
                            DB::raw('ROUND(AVG(average_gik), 2) as average_gik'),
                            DB::raw('ROUND(AVG(evaluation), 2) as evaluation'))
                    ->where('id', '=', 0)
                    ->get();
                
                $sex_charts = [];
                
                return response()->json(['records' => $records, 'only_numbers' => $only_numbers, 'provinces' => $provinces, 'sex_charts' => $sex_charts]);
            }
            // dd($trainingTitle);
            
            $records = DB::table('trainings_forms')
                ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->leftJoin('municipalities', 'trainings_forms.municipality', '=', 'municipalities.citymunCode')
                ->leftJoin('provinces', 'trainings_forms.province', '=', 'provinces.provCode')
                ->select('trainings_forms.*', 'municipalities.citymunDesc as citymunDesc', 'provinces.provDesc as provDesc')
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

            $only_numbers = DB::table('trainings_forms')
                ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->select(DB::raw('SUM(num_of_participants) as total_participants'),
                        DB::raw('ROUND(AVG(average_gik), 2) as average_gik'),
                        DB::raw('ROUND(AVG(evaluation), 2) as evaluation'))
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
                ->where('users.station', '=', $request->station)
                ->get();
            // sex chart data
            $sex_charts = DB::table('trainings_forms')
                ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->select(DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Male'),
                        DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Female'))
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
                ->where('users.station', '=', $request->station)
                ->first();
            // convert $sex_charts into associative aray
            $sex_charts = (array) $sex_charts;
            // pwd and indigenous chart data
            $indigenous_pwd = DB::table('trainings_forms')
                ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'),
                        DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'))
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
                ->where('users.station', '=', $request->station)
                ->first();
            
            // sector chart data
            $sector_charts = DB::table('trainings_forms')
                ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                        DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                        DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                        DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
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
                ->where('users.station', '=', $request->station)
                ->first();
            // convert $ability_charts into associative aray
            $sector_charts = (array) $sector_charts;

            return response()->json(['records' => $records, 'only_numbers' => $only_numbers, 'sex_charts' => $sex_charts, 'indigenous_pwd' => $indigenous_pwd, 'sector_charts' => $sector_charts]);
        }

        // For Edit DataTable
        if ($request->boolean('showTraining')) {
            if (empty(Auth::check())) {
                abort(404);
            }
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 5);

            // Calculate the offset to skip records based on the current page number
            $offset = ($page - 1) * $recordsPerPage;

            $division = Division::where('id', '=', Auth::user()->division)->first();

            // Query to fetch records with pagination
            $records = DB::table('trainings_forms')
                ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->leftJoin('municipalities', 'trainings_forms.municipality', '=', 'municipalities.citymunCode')
                ->leftJoin('provinces', 'trainings_forms.province', '=', 'provinces.provCode')
                ->select('trainings_forms.*', 'municipalities.citymunDesc as citymunDesc', 'provinces.provDesc as provDesc')
                ->where('trainings_forms.encoder_id', '=', $encoder_id)
                ->where('users.station', '=', $request->station)
                ->where('trainings_forms.division', '=', $division->division)
                ->latest('trainings_forms.id')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            return response()->json(['records' => $records]);
        }

        if ($request->boolean('filterTrainings')) {
            if (empty(Auth::check())) {
                abort(404);
            }
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 5);

            // Calculate the offset to skip records based on the current page number
            $offset = ($page - 1) * $recordsPerPage;

            $division = Division::where('id', '=', Auth::user()->division)->first();

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

            $records = DB::table('trainings_forms')
                ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->leftJoin('municipalities', 'trainings_forms.municipality', '=', 'municipalities.citymunCode')
                ->leftJoin('provinces', 'trainings_forms.province', '=', 'provinces.provCode')
                ->select('trainings_forms.*', 'municipalities.citymunDesc as citymunDesc', 'provinces.provDesc as provDesc')
                ->when(!empty($start_MonthSelect), function ($query) use ($start_MonthSelect) {
                    return $query->whereMonth('trainings_forms.start_date', '>=', $start_MonthSelect);
                })
                ->when(!empty($end_MonthSelect), function ($query) use ($end_MonthSelect) {
                    return $query->whereMonth('trainings_forms.end_date', '<=', $end_MonthSelect);
                })
                ->when(!empty($yearSelect), function ($query) use ($yearSelect) {
                    return $query->whereYear('start_date', '=', $yearSelect);
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
                ->where('trainings_forms.encoder_id', '=', $encoder_id)
                ->where('users.station', '=', $request->station)
                ->where('trainings_forms.division', '=', $division->division)
                ->latest('trainings_forms.id')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            return response()->json(['records' => $records]);
        }

        // For Overview
        if ($request->boolean('showOverview')) {
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 5);

            // Calculate the offset to skip records based on the current page number
            $offset = ($page - 1) * $recordsPerPage;

            // Query to fetch records with pagination
            $records = DB::table('trainings_forms')
                ->select('trainings_forms.*')
                ->latest('trainings_forms.id')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            $only_numbers = DB::table('trainings_forms')
                // ->select('SUM(num_of_participants) as total_participants')
                ->select(DB::raw('SUM(num_of_participants) as total_participants'),
                        DB::raw('ROUND(AVG(average_gik), 2) as average_gik'),
                        DB::raw('ROUND(AVG(evaluation), 2) as evaluation'))
                ->get();
                // ->total_participants;

            $regions = DB::table('regions')
                ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
                ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
                ->groupBy('regions.regDesc')
                ->get();
            
            $provinces = DB::table('provinces')
                ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
                ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
                ->groupBy('provinces.provDesc')
                ->get();
            
            $municipalities = DB::table('municipalities')
                ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
                ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
                ->groupBy('municipalities.citymunDesc')
                ->get();

            return response()->json(['records' => $records, 'only_numbers' => $only_numbers, 'regions' => $regions, 'provinces' => $provinces, 'municipalities' => $municipalities]);
        }

        if ($request->boolean('filterShowOverview')) {
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 5);

            // Calculate the offset to skip records based on the current page number
            $offset = ($page - 1) * $recordsPerPage;

            // $searchInput = $request->searchInput ?? '';
            $yearSelect = $request->yearSelect ?? '';
            $start_MonthSelect = $request->start_MonthSelect ?? '';
            $end_MonthSelect = $request->end_MonthSelect ?? '';
            $trainingTitle = $request->trainingTitle ?? '';
            $provinceSelect = $request->provinceSelect ?? '';
            $formType = $request->formType ?? '';

            // not existing form type
            if($formType == 0) {
                $records = DB::table('trainings_forms')
                            ->select('*')
                            ->where('id', '=', 0)
                            ->get();
                
                $only_numbers = $provinces = DB::table('trainings_forms')
                    ->select(DB::raw('SUM(num_of_participants) as total_participants'),
                            DB::raw('ROUND(AVG(average_gik), 2) as average_gik'),
                            DB::raw('ROUND(AVG(evaluation), 2) as evaluation'))
                    ->where('id', '=', 0)
                    ->get();
                
                $sex_charts = [];
                
                return response()->json(['records' => $records, 'only_numbers' => $only_numbers, 'provinces' => $provinces, 'sex_charts' => $sex_charts]);
            }

            // Query to fetch records with pagination
            $records = DB::table('trainings_forms')
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
                // ->when(!empty($searchInput), function ($query) use ($searchInput) {
                //     return $query->where('trainings_forms.division', 'LIKE', "%$searchInput%");
                //                 // where('trainings_forms.title', 'LIKE', "%$searchInput%");
                //                 // ->orWhere('trainings_forms.division', 'LIKE', "%$searchInput%")
                //                 // ->orWhere('venue', 'LIKE', "%$searchInput%")
                //                 // ->orWhere('province', 'LIKE', "%$searchInput%")
                //                 // ->orWhere('municipality', 'LIKE', "%$searchInput%")
                //                 // ->orWhere('country', 'LIKE', "%$searchInput%")
                //                 // ->orWhere('state', 'LIKE', "%$searchInput%")
                //                 // ->orWhere('num_of_participants', 'LIKE', "%$searchInput%");
                // })
                ->latest('trainings_forms.id')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            $only_numbers = DB::table('trainings_forms')
                // ->select('SUM(num_of_participants) as total_participants')
                ->select(DB::raw('SUM(num_of_participants) as total_participants'),
                        DB::raw('ROUND(AVG(average_gik), 2) as average_gik'),
                        DB::raw('ROUND(AVG(evaluation), 2) as evaluation'))
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect) {
                    return $query->where('trainings_forms.province', '=', $provinceSelect);
                })
                // ->when(!empty($searchInput), function ($query) use ($searchInput) {
                //     return $query->where('trainings_forms.division', 'LIKE', "%$searchInput%");
                //                 // where('trainings_forms.title', 'LIKE', "%$searchInput%");
                //                 // ->orWhere('trainings_forms.division', 'LIKE', "%$searchInput%")
                //                 // ->orWhere('venue', 'LIKE', "%$searchInput%")
                //                 // ->orWhere('province', 'LIKE', "%$searchInput%")
                //                 // ->orWhere('municipality', 'LIKE', "%$searchInput%")
                //                 // ->orWhere('country', 'LIKE', "%$searchInput%")
                //                 // ->orWhere('state', 'LIKE', "%$searchInput%")
                //                 // ->orWhere('num_of_participants', 'LIKE', "%$searchInput%");
                // })
                ->get();
                // ->total_participants;

            // sex chart data
            $sex_charts = DB::table('trainings_forms')
                ->select(DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Women'),
                        DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Men'))
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect) {
                    return $query->where('trainings_forms.province', '=', $provinceSelect);
                })
                ->first();
            // convert $sex_charts into associative aray
            $sex_charts = (array) $sex_charts;

            // indigenous chart data
            $indigenous_charts = DB::table('trainings_forms')
                ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'),
                        DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_indigenous) AS UNSIGNED) as "Non-IP"'))
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect) {
                    return $query->where('trainings_forms.province', '=', $provinceSelect);
                })
                ->first();
            // convert $indigenous_charts into associative aray
            $indigenous_charts = (array) $indigenous_charts;

            // ability chart data
            $ability_charts = DB::table('trainings_forms')
                ->select(DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'),
                        DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_pwd) AS UNSIGNED) as "Non-PWD"'))
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect) {
                    return $query->where('trainings_forms.province', '=', $provinceSelect);
                })
                ->first();
            // convert $ability_charts into associative aray
            $ability_charts = (array) $ability_charts;

            // sector chart data
            $sector_charts = DB::table('trainings_forms')
                ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                        DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                        DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                        DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'))
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect) {
                    return $query->where('trainings_forms.province', '=', $provinceSelect);
                })
                ->first();
            // convert $ability_charts into associative aray
            $sector_charts = (array) $sector_charts;

            // provinces chart data
            $regions = DB::table('regions')
                ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
                ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect) {
                    return $query->where('trainings_forms.province', '=', $provinceSelect);
                })
                ->groupBy('regions.regDesc')
                ->get();
            
            $provinces = DB::table('provinces')
                ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
                ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect) {
                    return $query->where('trainings_forms.province', '=', $provinceSelect);
                })
                ->groupBy('provinces.provDesc')
                ->get();
            
            $municipalities = DB::table('municipalities')
                ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
                ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect) {
                    return $query->where('trainings_forms.province', '=', $provinceSelect);
                })
                ->groupBy('municipalities.citymunDesc')
                ->get();

            return response()->json(['records' => $records, 'only_numbers' => $only_numbers, 'sex_charts' => $sex_charts, 'indigenous_charts' => $indigenous_charts, 'ability_charts' => $ability_charts, 'sector_charts' => $sector_charts, 'regions' => $regions, 'provinces' =>  $provinces, 'municipalities' => $municipalities]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!empty(Auth::check())) {
            $station = Auth::user()->station;
        }

        // Since pag nag uupdate na ng station, division, or position e ID na yung nasesave
        // Assuming $station holds either the station name or its ID
        if (is_numeric($station)) {
            $station_id = $station; // If $station is already an ID
        } else {
            // Fetch the station ID based on the station name
            $station_id = Station::where('station', $station)->value('id');
        }

        // Fetch divisions based on the station ID
        $divisions = Division::where('station_id', $station_id)->get();

        // $station_id = Station::where("station", '=', $station)->first();
        // dd($station_id->id);

        $provinces = Province::select('*')->orderBy('provDesc', 'asc')->get();

        $municipalities = Municipality::select('*')->orderBy('citymunDesc', 'asc')->get();

        // station_id = 1 is for CES branch
        // $divisions = Division::where("station_id", '=', $station_id->id)->get();
        // $divisions = Division::where("station_id", '=', 1)->get();

        $training_types = TrainingType::select('*')->orderBy('training_type', 'asc')->get();

        // $participants = Participant::select('*')->orderBy('classification', 'asc')->get();

        $funds = SourceFund::select('*')->orderBy('fund', 'asc')->get();

        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        $stations = Station::select('*')->orderBy('station', 'asc')->get();

        // return view('trainingsform', compact('provinces', 'divisions', 'training_types', 'participants', 'funds'));
        return view('trainings', compact('provinces', 'municipalities', 'divisions', 'training_types', 'funds', 'titles', 'stations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd(gettype($request->withinPhilriceInput));

        $user = Auth::user();

        if (!$user) {
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

        $title = $request->training_title == 'Other' ? $request->otherTrainingInput : $request->training_title;
        $source_of_fund = $request->source_of_fund == 'Other' ? $request->otherFundInput : $request->source_of_fund;

        // $station_id = 0;
        // $municipality = '';
        // $province = '';
        // $region = '';
        // $international_address = '';
        // $training_venue = '';
        $training_venue = $local_address = $municipality = $province = $region = $international_address = '';
        $station_id = $request->training_type == 'Local' ? (int) $request->withinPhilriceInput : 0;
        $division = $this->processDivision($user->division);
        // $division = Division::find($user->division);

        if ($request->training_type == 'Local') {
            $request->validate([
                'training_venue' => 'required',
            ]);
            $training_venue = $request->training_venue;

            if ($training_venue == 'Within PhilRice Station') {
                $request->validate([
                    'withinPhilriceInput' => 'required',
                ]);
                // $station = Station::find($request->withinPhilriceInput);
                $station = $this->processStation($request->withinPhilriceInput);

                $station_id = $station->id;
                $municipality = $station->municipality;
                $province = $station->province;
                $region = $station->region;
            } else {
                $request->validate([
                    'municipality' => 'required',
                    'province' => 'required',
                ]);
                $municipality = $request->municipalitySelect;
                $province = $request->province;
                $region = $this->processRegion($province);
                // $region = Province::where('provCode', $province)
                //     ->select('regCode')
                //     ->orderBy('provDesc', 'asc')
                //     ->firstOrFail()
                //     ->regCode;
            }
        } elseif ($request->training_type == 'International') {
            $request->validate([
                'internationalTrainingInput' => 'required',
            ]);
            $international_address = $request->internationalTrainingInput;
            $region = '';
        }

        $average_gik = $request->average_gik == 'N/A' ? null : (float) $request->average_gik;

        $participant_types = [
            'num_of_farmers_and_growers',
            'num_of_extension_workers',
            'num_of_scientific',
            'num_of_other',
        ];
        $participant_sex =[
            'num_of_male',
            'num_of_female',
        ];

        $total_participants = (int) $request->total_participants;
        foreach ($participant_types as $type) {
            $total_participants -= (int) $request->$type;
        }
        $total_participants = (int) $request->total_participants;
        foreach ($participant_sex as $sex) {
            $total_participants -= (int) $request->$sex;
        }

        if ($total_participants !== 0 || $request->num_of_indigenous > $request->total_participants || $request->num_of_pwd > $request->total_participants) {
            return redirect()->route('trainingsform.create')->with(['error' => 'Oops...', 'message' => 'Total Number of Participants is incorrect']);
        }

        $imageNames = [];
        $fileNames = [];

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
            'encoder_id'=>$user->id,
            'division'=>$division->division,
            'title'=>$title,
            'category'=>$request->training_category,
            'type'=>$request->training_type,
            'training_venue'=>$training_venue,
            'station_id'=> $station_id,
            'municipality'=>$municipality,
            'region'=>$region,
            'province'=>$province,
            'international_address'=>$international_address,
            'mod'=>$request->mod,
            'start_date'=>Carbon::parse($request->start)->format('Y-m-d'),
            'end_date'=>Carbon::parse($request->end)->format('Y-m-d'),
            // Section 3
            'sponsor'=>$request->sponsor,
            'fund'=>$source_of_fund,
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

        return redirect()->route('trainingsform.create')->with(['success' => 'Great!', 'message' => 'You have successfully added a data']);
    }
    private function processDivision($user_division)
    {
        $division = Division::find($user_division);
        return $division;
    }
    private function processStation($station_input)
    {
        $station = Station::find($station_input);
        return $station;
    }
    private function processRegion($province)
    {
        $region = Province::where('provCode', $province)
            ->select('regCode')
            ->orderBy('provDesc', 'asc')
            ->firstOrFail()
            ->regCode;
        return $region;
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
        if(empty($id) || empty(Auth::check())) {
            Auth::logout();
            abort(404);
        }

        $record = TrainingsForm::findOrFail($id);

        if(Auth::user()->id != $record->encoder_id) {
            Auth::logout();
            abort(404);
        }
 
        $station = Auth::user()->station;

        // $station_id = Station::where('station', '=', $station)->first();

        $provinces = Province::select('*')->orderBy('provDesc', 'asc')->get();
        $municipalities = Municipality::select('*')->orderBy('citymunDesc', 'asc')->get();
        // station_id = 1 is for CES branch
        $divisions = Division::where('station_id', '=', $station)->get();

        $training_types = TrainingType::select('*')->orderBy('training_type', 'asc')->get();

        // $participants = Participant::select('*')->orderBy('classification', 'asc')->get();

        $funds = SourceFund::select('*')->orderBy('fund', 'asc')->get();

        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        $stations = Station::select('*')->orderBy('station', 'asc')->get();

        $start_date = Carbon::parse($record->start_date)->format('m/d/Y');
        $end_date = Carbon::parse($record->end_date)->format('m/d/Y');

        if (empty($record)) {
            abort(404);
        }

        return view('trainings_edit', compact('record', 'start_date', 'end_date', 'provinces', 'municipalities', 'divisions', 'training_types', 'funds', 'titles', 'stations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = TrainingsForm::findOrFail($id);

        if(empty($record) || empty(Auth::check()) || Auth::user()->id != $record->encoder_id) {
            Auth::logout();
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

        $title = $request->training_title == 'Other' ? $request->otherTrainingInput : $request->training_title;
        $source_of_fund = $request->source_of_fund == 'Other' ? $request->otherFundInput : $request->source_of_fund;

        $training_venue = $local_address = $municipality = $province = $region = $international_address = '';
        $station_id = $request->training_type == 'Local' ? (int) $request->withinPhilriceInput : 0;

        if($request->training_type == 'Local') {
            $request->validate([
                'training_venue'=>'required',
            ]);
            $training_venue = $request->training_venue;

            if($request->training_venue == 'Within PhilRice Station') {
                $request->validate([
                    'withinPhilriceInput'=>'required',
                ]);
                $station = $this->processStation($request->withinPhilriceInput);

                $station_id = $station->id;
                $municipality = $station->municipality;
                $province = $station->province;
                $region = $station->region;
            } else {
                $request->validate([
                    'municipalitySelect'=>'required',
                    'province'=>'required',
                ]);
                $municipality = $request->municipalitySelect;
                $province = $request->province;
                $region = $this->processRegion($province);
            }
        } elseif($request->training_type == 'International') {
            $request->validate([
                'internationalTrainingInput'=>'required',
            ]);
            $international_address = $request->internationalTrainingInput;
            $region = '';
        }

        $average_gik = $request->average_gik == 'N/A' ? null : (float) $request->average_gik;

        $participant_types = [
            'num_of_farmers_and_growers',
            'num_of_extension_workers',
            'num_of_scientific',
            'num_of_other',
        ];
        $participant_sex =[
            'num_of_male',
            'num_of_female',
        ];

        $total_participants = (int) $request->total_participants;
        foreach ($participant_types as $type) {
            $total_participants -= (int) $request->$type;
        }
        $total_participants = (int) $request->total_participants;
        foreach ($participant_sex as $sex) {
            $total_participants -= (int) $request->$sex;
        }

        if ($total_participants !== 0 || $request->num_of_indigenous > $request->total_participants || $request->num_of_pwd > $request->total_participants) {
            return redirect()->back()->with(['error' => 'Oops...', 'message' => 'Total Number of Participants is incorrect']);
        }

        // collecting old images from the database
        $old_images = $record->image;
        $old_images = explode('|', $old_images);

        $imageNames = [];
        $new_images = [];
        if ($images = $request->file('photo_doc_event')) {
            // count elements in old_images and images in update form
            if(count($old_images) + count($images) > 10) {
                return redirect()->back()->with(['error' => 'Oops...', 'message' => 'Uploaded images should not exceed to 10.']);
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

        // collecting old files from the database
        $old_files = $record->file;
        if(!$old_files) {
            $old_files = [];
        } else {
            $old_files = explode('|', $old_files);
        }
        $count_of_old_files = count($old_files);
        $upcoming_files = $request->file('other_doc') ?? [];
        $count_of_new_files = count($upcoming_files);

        $fileNames = [];
        if ($files = $request->file('other_doc')) {
            // count elements in old_files and files in update form
            if($count_of_old_files + $count_of_new_files > 10) {
                return redirect()->back()->with(['error' => 'Oops...', 'message' => 'Uploaded files should not exceed to 10.']);
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

        $updateData = [
            // Section 2
            'title'=>$title,
            'category'=>$request->training_category,
            'type'=>$request->training_type,
            'training_venue'=>$training_venue,
            'station_id'=> $station_id,
            'municipality'=>$municipality,
            'region'=>$region,
            'province'=>$province,
            'international_address'=>$international_address,
            'mod'=>$request->mod,
            'start_date'=>Carbon::parse($request->start)->format('Y-m-d'),
            'end_date'=>Carbon::parse($request->end)->format('Y-m-d'),
            // Section 3
            'sponsor'=>$request->sponsor,
            'fund'=>$source_of_fund,
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
            'image'=>implode('|', $new_images),
        ];

        if(!empty($new_files)) {
            $updateData['file'] = implode('|', $new_files);
        }

        TrainingsForm::where('id', $id)->update($updateData);

        return redirect()->route('encoder.edit')->with(['success' => 'Great!', 'message' => 'You have successfully edited a data']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $record = TrainingsForm::findOrFail($id);

        if (empty($record)) {
            abort(404);
        }

        if ($request->boolean('deleteRecord')) {
            $deleteImages = explode('|', $record->image);
            foreach ($deleteImages as $deleteImg) {
                $deleteImg = 'public/images/' . $deleteImg;
                if (file_exists($deleteImg)) {
                    File::delete($deleteImg);
                }
            }

            $deleteFiles = explode('|', $record->file);
            foreach ($deleteFiles as $deleteFile) {
                $deleteFile = 'public/files/' . $deleteFile;
                if (file_exists($deleteFile)) {
                    File::delete($deleteFile);
                }
            }

            $record->delete();

            // return redirect()->back()->with('warning', "You successfully deleted a data.");
            return response()->json(['message' => 'Data deleted successfully']);
        }
    }

    public function export(Request $request)
    {
        if ($request->boolean('exportFilteredRecords')) {
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
