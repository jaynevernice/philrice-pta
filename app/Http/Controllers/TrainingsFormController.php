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
        
        // $municipality_charts = DB::table('municipalities')
        //     ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
        //     ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
        //     ->groupBy('municipalities.citymunDesc')
        //     ->get();
        
        // Else user is unauthenticated gaya ni guest
        // if (Auth::check() && Auth::user()->user_type === 'encoder') {
        //     return view('encoder.overview', compact('titles', 'regions', 'provinces', 'municipalities', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts', 'municipality_charts'));
        // } elseif (Auth::check() && Auth::user()->user_type === 'super_admin') {
        //     return view('super_admin.overview', compact('titles', 'regions', 'provinces', 'municipalities', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts', 'municipality_charts'));
        // } else {
        //     return view('guest.overview', compact('titles', 'regions', 'provinces', 'municipalities', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts', 'municipality_charts'));
        // }

        if (Auth::check()) {
            return view('auth.overview', compact('titles', 'regions', 'provinces', 'municipalities', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // if (Auth::user()->user_type === 'super_admin') {
            //     return view('super_admin.overview', compact('titles', 'regions', 'provinces', 'municipalities', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'admin') {
            //     return view('admin.overview', compact('titles', 'regions', 'provinces', 'municipalities', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'encoder') {
            //     return view('encoder.overview', compact('titles', 'regions', 'provinces', 'municipalities', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // }
        } else if (!Auth::check()) {
            return view('guest.overview', compact('titles', 'regions', 'provinces', 'municipalities', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        }

    }

    public function authView()
    {
        $station_id = Auth::user()->station;

        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        // sex chart data
        $sex_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Women'),
                        DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Men'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', $station_id)
            ->first();
        // convert $sex_charts into associative aray
        $sex_charts = (array) $sex_charts;

        // indigenous chart data
        $indigenous_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_indigenous) AS UNSIGNED) as "Non-IP"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', $station_id)
            ->first();
        // convert $indigenous_pwd into associative aray
        $indigenous_charts = (array) $indigenous_charts;

        // ability chart data
        $ability_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_pwd) AS UNSIGNED) as "Non-PWD"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', $station_id)
            ->first();
        // convert $ability_charts into associative aray
        $ability_charts = (array) $ability_charts;

        // sector chart data
        $sector_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                    DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                    DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                    DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', $station_id)
            ->first();
        // convert $ability_charts into associative aray
        $sector_charts = (array) $sector_charts;

        $station_regions = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $station_provinces = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $regions = $station_regions[$station_id];
        $provinces = Province::select('*')
            ->whereIn('regCode', $station_provinces[$station_id])
            ->orderBy('provDesc', 'asc')
            ->get();

        $region_charts = DB::table('regions')
            ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
            ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
            ->where('trainings_forms.station_encoded', '=', $station_id)
            ->whereIn('regions.regCode', $regions)
            ->groupBy('regions.regDesc')
            ->get();

        $province_charts = DB::table('provinces')
            ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
            ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
            ->where('trainings_forms.station_encoded', '=', $station_id)
            ->whereIn('provinces.regCode', $station_provinces[$station_id])
            ->groupBy('provinces.provDesc')
            ->get();

        return view('auth.view', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        // if (Auth::user()->user_type === 'super_admin') {
        //     return view('super_admin.view', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        // } else if(Auth::user()->user_type === 'admin') {
        //     return view('admin.view', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        // } else if(Auth::user()->user_type === 'encoder') {
        //     return view('encoder.view', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        // }
    }

    public function authAddView()
    {
        return view('auth.add');
        // if (Auth::user()->user_type === 'super_admin') {
        //     return view('super_admin.add');
        // } else if(Auth::user()->user_type === 'admin') {
        //     return view('admin.add');
        // } else if(Auth::user()->user_type === 'encoder') {
        //     return view('encoder.add');
        // }
    }

    public function authEditView()
    {
        if (empty(Auth::check())) {
            abort(404);
        }

        $encoder_id = Auth::user()->id;

        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        // $records = DB::table('trainings_forms')
        //     ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
        //     ->select('trainings_forms.*', 'users.name as encoder_name', 'users.email as encoder_email')
        //     // remove the line below to show all records
        //     ->where("encoder_id", '=', $encoder_id)
        //     ->latest('trainings_forms.created_at')
        //     // ->simplePaginate(5);
        //     // ->paginate(5);
        //     ->get();

        // dd($records->all());
        // return view('encoder.edit', compact('records', 'titles'));

        return view('auth.edit', compact('titles'));
        // if (Auth::user()->user_type === 'super_admin') {
        //     return view('super_admin.edit', compact('titles'));
        // } else if(Auth::user()->user_type === 'admin') {
        //     return view('admin.edit', compact('titles'));
        // } else if(Auth::user()->user_type === 'encoder') {
        //     return view('encoder.edit', compact('titles'));
        // }
    }

    public function cesView() 
    {   
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        // sex chart data
        $sex_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Women'),
                        DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Men'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 1)
            ->first();
        // convert $sex_charts into associative aray
        $sex_charts = (array) $sex_charts;

        // indigenous chart data
        $indigenous_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_indigenous) AS UNSIGNED) as "Non-IP"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 1)
            ->first();
        // convert $indigenous_pwd into associative aray
        $indigenous_charts = (array) $indigenous_charts;

        // ability chart data
        $ability_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_pwd) AS UNSIGNED) as "Non-PWD"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 1)
            ->first();
        // convert $ability_charts into associative aray
        $ability_charts = (array) $ability_charts;

        // sector chart data
        $sector_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                    DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                    DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                    DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 1)
            ->first();
        // convert $ability_charts into associative aray
        $sector_charts = (array) $sector_charts;

        $station_regions = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $station_provinces = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $regions = $station_regions[1];
        $provinces = Province::select('*')
            ->whereIn('regCode', $station_provinces[1])
            ->orderBy('provDesc', 'asc')
            ->get();

        $region_charts = DB::table('regions')
            ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
            ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
            ->where('trainings_forms.station_encoded', '=', 1)
            ->whereIn('regions.regCode', $regions)
            ->groupBy('regions.regDesc')
            ->get();
        
        $province_charts = DB::table('provinces')
            ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
            ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
            ->where('trainings_forms.station_encoded', '=', 1)
            ->whereIn('provinces.regCode', $station_provinces[1])
            ->groupBy('provinces.provDesc')
            ->get();

        
        if (Auth::check()) {
            return view('auth.ces', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // if (Auth::user()->user_type === 'super_admin') {
            //     return view('super_admin.ces', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'admin') {
            //     return view('admin.ces', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'encoder') {
            //     return view('encoder.ces', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // }
        } else {
            return view('guest.ces', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        }
    }

    public function agusanView() 
    {   
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        // sex chart data
        $sex_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Women'),
                        DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Men'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 2)
            ->first();
        // convert $sex_charts into associative aray
        $sex_charts = (array) $sex_charts;

        // indigenous chart data
        $indigenous_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_indigenous) AS UNSIGNED) as "Non-IP"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 2)
            ->first();
        // convert $indigenous_pwd into associative aray
        $indigenous_charts = (array) $indigenous_charts;

        // ability chart data
        $ability_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_pwd) AS UNSIGNED) as "Non-PWD"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 2)
            ->first();
        // convert $ability_charts into associative aray
        $ability_charts = (array) $ability_charts;

        // sector chart data
        $sector_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                    DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                    DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                    DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 2)
            ->first();
        // convert $ability_charts into associative aray
        $sector_charts = (array) $sector_charts;

        $station_regions = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $station_provinces = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $regions = $station_regions[2];
        $provinces = Province::select('*')
            ->whereIn('regCode', $station_provinces[2])
            ->orderBy('provDesc', 'asc')
            ->get();

        $region_charts = DB::table('regions')
            ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
            ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
            ->where('trainings_forms.station_encoded', '=', 2)
            ->whereIn('regions.regCode', $regions)
            ->groupBy('regions.regDesc')
            ->get();
        
        $province_charts = DB::table('provinces')
            ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
            ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
            ->where('trainings_forms.station_encoded', '=', 2)
            ->whereIn('provinces.regCode', $station_provinces[2])
            ->groupBy('provinces.provDesc')
            ->get();

        // return view('encoder.ces', compact('titles', 'provinces'));
        if (Auth::check()) {
            return view('auth.agusan', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // if (Auth::user()->user_type === 'super_admin') {
            //     return view('super_admin.agusan', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'admin') {
            //     return view('admin.agusan', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'encoder') {
            //     return view('encoder.agusan', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // }
        } else {
            return view('guest.agusan', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        }
    }

    public function batacView()
    {
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        // sex chart data
        $sex_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Women'),
                        DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Men'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 3)
            ->first();
        // convert $sex_charts into associative aray
        $sex_charts = (array) $sex_charts;

        // indigenous chart data
        $indigenous_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_indigenous) AS UNSIGNED) as "Non-IP"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 3)
            ->first();
        // convert $indigenous_pwd into associative aray
        $indigenous_charts = (array) $indigenous_charts;

        // ability chart data
        $ability_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_pwd) AS UNSIGNED) as "Non-PWD"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 3)
            ->first();
        // convert $ability_charts into associative aray
        $ability_charts = (array) $ability_charts;

        // sector chart data
        $sector_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                    DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                    DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                    DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 3)
            ->first();
        // convert $ability_charts into associative aray
        $sector_charts = (array) $sector_charts;

        $station_regions = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $station_provinces = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $regions = $station_regions[3];
        $provinces = Province::select('*')
            ->whereIn('regCode', $station_provinces[3])
            ->orderBy('provDesc', 'asc')
            ->get();

        $region_charts = DB::table('regions')
            ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
            ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
            ->where('trainings_forms.station_encoded', '=', 3)
            ->whereIn('regions.regCode', $regions)
            ->groupBy('regions.regDesc')
            ->get();
        
        $province_charts = DB::table('provinces')
            ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
            ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
            ->where('trainings_forms.station_encoded', '=', 3)
            ->whereIn('provinces.regCode', $station_provinces[3])
            ->groupBy('provinces.provDesc')
            ->get();

        // return view('encoder.ces', compact('titles', 'provinces'));
        if (Auth::check()) {
            return view('auth.batac', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // if (Auth::user()->user_type === 'super_admin') {
            //     return view('super_admin.batac', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'admin') {
            //     return view('admin.batac', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'encoder') {
            //     return view('encoder.batac', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // }
        } else {
            return view('guest.batac', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        }
    }

    public function bicolView()
    {
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        // sex chart data
        $sex_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Women'),
                        DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Men'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 4)
            ->first();
        // convert $sex_charts into associative aray
        $sex_charts = (array) $sex_charts;

        // indigenous chart data
        $indigenous_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_indigenous) AS UNSIGNED) as "Non-IP"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 4)
            ->first();
        // convert $indigenous_pwd into associative aray
        $indigenous_charts = (array) $indigenous_charts;

        // ability chart data
        $ability_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_pwd) AS UNSIGNED) as "Non-PWD"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 4)
            ->first();
        // convert $ability_charts into associative aray
        $ability_charts = (array) $ability_charts;

        // sector chart data
        $sector_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                    DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                    DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                    DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 4)
            ->first();
        // convert $ability_charts into associative aray
        $sector_charts = (array) $sector_charts;

        $station_regions = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $station_provinces = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $regions = $station_regions[4];
        $provinces = Province::select('*')
            ->whereIn('regCode', $station_provinces[4])
            ->orderBy('provDesc', 'asc')
            ->get();

        $region_charts = DB::table('regions')
            ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
            ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
            ->where('trainings_forms.station_encoded', '=', 4)
            ->whereIn('regions.regCode', $regions)
            ->groupBy('regions.regDesc')
            ->get();
        
        $province_charts = DB::table('provinces')
            ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
            ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
            ->where('trainings_forms.station_encoded', '=', 4)
            ->whereIn('provinces.regCode', $station_provinces[4])
            ->groupBy('provinces.provDesc')
            ->get();

        // return view('encoder.ces', compact('titles', 'provinces'));
        if (Auth::check()) {
            return view('auth.bicol', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // if (Auth::user()->user_type === 'super_admin') {
            //     return view('super_admin.bicol', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'admin') {
            //     return view('admin.bicol', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'encoder') {
            //     return view('encoder.bicol', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // }
        } else {
            return view('guest.bicol', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        }
    }

    public function cmuView()
    {
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        // sex chart data
        $sex_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Women'),
                        DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Men'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 5)
            ->first();
        // convert $sex_charts into associative aray
        $sex_charts = (array) $sex_charts;

        // indigenous chart data
        $indigenous_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_indigenous) AS UNSIGNED) as "Non-IP"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 5)
            ->first();
        // convert $indigenous_pwd into associative aray
        $indigenous_charts = (array) $indigenous_charts;

        // ability chart data
        $ability_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_pwd) AS UNSIGNED) as "Non-PWD"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 5)
            ->first();
        // convert $ability_charts into associative aray
        $ability_charts = (array) $ability_charts;

        // sector chart data
        $sector_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                    DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                    DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                    DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 5)
            ->first();
        // convert $ability_charts into associative aray
        $sector_charts = (array) $sector_charts;

        $station_regions = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $station_provinces = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $regions = $station_regions[5];
        $provinces = Province::select('*')
            ->whereIn('regCode', $station_provinces[5])
            ->orderBy('provDesc', 'asc')
            ->get();

        $region_charts = DB::table('regions')
            ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
            ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
            ->where('trainings_forms.station_encoded', '=', 5)
            ->whereIn('regions.regCode', $regions)
            ->groupBy('regions.regDesc')
            ->get();
        
        $province_charts = DB::table('provinces')
            ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
            ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
            ->where('trainings_forms.station_encoded', '=', 5)
            ->whereIn('provinces.regCode', $station_provinces[5])
            ->groupBy('provinces.provDesc')
            ->get();

        // return view('encoder.ces', compact('titles', 'provinces'));
        if (Auth::check()) {
            return view('auth.cmu', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // if (Auth::user()->user_type === 'super_admin') {
            //     return view('super_admin.cmu', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'admin') {
            //     return view('admin.cmu', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'encoder') {
            //     return view('encoder.cmu', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // }
        } else {
            return view('guest.cmu', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        }
    }

    public function isabelaView()
    {
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        // sex chart data
        $sex_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Women'),
                        DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Men'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 6)
            ->first();
        // convert $sex_charts into associative aray
        $sex_charts = (array) $sex_charts;

        // indigenous chart data
        $indigenous_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_indigenous) AS UNSIGNED) as "Non-IP"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 6)
            ->first();
        // convert $indigenous_pwd into associative aray
        $indigenous_charts = (array) $indigenous_charts;

        // ability chart data
        $ability_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_pwd) AS UNSIGNED) as "Non-PWD"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 6)
            ->first();
        // convert $ability_charts into associative aray
        $ability_charts = (array) $ability_charts;

        // sector chart data
        $sector_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                    DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                    DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                    DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 6)
            ->first();
        // convert $ability_charts into associative aray
        $sector_charts = (array) $sector_charts;

        $station_regions = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $station_provinces = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $regions = $station_regions[6];
        $provinces = Province::select('*')
            ->whereIn('regCode', $station_provinces[6])
            ->orderBy('provDesc', 'asc')
            ->get();

        $region_charts = DB::table('regions')
            ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
            ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
            ->where('trainings_forms.station_encoded', '=', 6)
            ->whereIn('regions.regCode', $regions)
            ->groupBy('regions.regDesc')
            ->get();
        
        $province_charts = DB::table('provinces')
            ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
            ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
            ->where('trainings_forms.station_encoded', '=', 6)
            ->whereIn('provinces.regCode', $station_provinces[6])
            ->groupBy('provinces.provDesc')
            ->get();

        // return view('encoder.ces', compact('titles', 'provinces'));
        if (Auth::check()) {
            return view('auth.isabela', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // if (Auth::user()->user_type === 'super_admin') {
            //     return view('super_admin.isabela', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'admin') {
            //     return view('admin.isabela', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'encoder') {
            //     return view('encoder.isabela', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // }
        } else {
            return view('guest.isabela', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        }
    }

    public function losbañosView()
    {
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        // sex chart data
        $sex_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Women'),
                        DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Men'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 7)
            ->first();
        // convert $sex_charts into associative aray
        $sex_charts = (array) $sex_charts;

        // indigenous chart data
        $indigenous_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_indigenous) AS UNSIGNED) as "Non-IP"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 7)
            ->first();
        // convert $indigenous_pwd into associative aray
        $indigenous_charts = (array) $indigenous_charts;

        // ability chart data
        $ability_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_pwd) AS UNSIGNED) as "Non-PWD"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 7)
            ->first();
        // convert $ability_charts into associative aray
        $ability_charts = (array) $ability_charts;

        // sector chart data
        $sector_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                    DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                    DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                    DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 7)
            ->first();
        // convert $ability_charts into associative aray
        $sector_charts = (array) $sector_charts;

        $station_regions = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $station_provinces = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $regions = $station_regions[7];
        $provinces = Province::select('*')
            ->whereIn('regCode', $station_provinces[7])
            ->orderBy('provDesc', 'asc')
            ->get();

        $region_charts = DB::table('regions')
            ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
            ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
            ->where('trainings_forms.station_encoded', '=', 7)
            ->whereIn('regions.regCode', $regions)
            ->groupBy('regions.regDesc')
            ->get();
        
        $province_charts = DB::table('provinces')
            ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
            ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
            ->where('trainings_forms.station_encoded', '=', 7)
            ->whereIn('provinces.regCode', $station_provinces[7])
            ->groupBy('provinces.provDesc')
            ->get();

        // return view('encoder.ces', compact('titles', 'provinces'));
        
        if (Auth::check()) {
            return view('auth.losbaños', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // if (Auth::user()->user_type === 'super_admin') {
            //     return view('super_admin.losbaños', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'admin') {
            //     return view('admin.losbaños', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'encoder') {
            //     return view('encoder.losbaños', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // }
        } else {
            return view('guest.losbaños', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        }
    }

    public function midsayapView()
    {
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        // sex chart data
        $sex_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Women'),
                        DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Men'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 8)
            ->first();
        // convert $sex_charts into associative aray
        $sex_charts = (array) $sex_charts;

        // indigenous chart data
        $indigenous_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_indigenous) AS UNSIGNED) as "Non-IP"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 8)
            ->first();
        // convert $indigenous_pwd into associative aray
        $indigenous_charts = (array) $indigenous_charts;

        // ability chart data
        $ability_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_pwd) AS UNSIGNED) as "Non-PWD"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 8)
            ->first();
        // convert $ability_charts into associative aray
        $ability_charts = (array) $ability_charts;

        // sector chart data
        $sector_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                    DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                    DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                    DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 8)
            ->first();
        // convert $ability_charts into associative aray
        $sector_charts = (array) $sector_charts;

        $station_regions = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $station_provinces = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $regions = $station_regions[8];
        $provinces = Province::select('*')
            ->whereIn('regCode', $station_provinces[8])
            ->orderBy('provDesc', 'asc')
            ->get();

        $region_charts = DB::table('regions')
            ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
            ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
            ->where('trainings_forms.station_encoded', '=', 8)
            ->whereIn('regions.regCode', $regions)
            ->groupBy('regions.regDesc')
            ->get();
        
        $province_charts = DB::table('provinces')
            ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
            ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
            ->where('trainings_forms.station_encoded', '=', 8)
            ->whereIn('provinces.regCode', $station_provinces[8])
            ->groupBy('provinces.provDesc')
            ->get();

        // return view('encoder.ces', compact('titles', 'provinces'));
        
        if (Auth::check()) {
            return view('auth.midsayap', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // if (Auth::user()->user_type === 'super_admin') {
            //     return view('super_admin.midsayap', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'admin') {
            //     return view('admin.midsayap', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'encoder') {
            //     return view('encoder.midsayap', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // }
        } else {
            return view('guest.midsayap', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        }
    }

    public function negrosView()
    {
        $titles = TrainingsTitle::select('*')->orderBy('training_title', 'asc')->get();

        // sex chart data
        $sex_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_female) AS UNSIGNED) as Women'),
                        DB::raw('CAST(SUM(num_of_male) AS UNSIGNED) as Men'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 9)
            ->first();
        // convert $sex_charts into associative aray
        $sex_charts = (array) $sex_charts;

        // indigenous chart data
        $indigenous_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_indigenous) AS UNSIGNED) as Indigeous'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_indigenous) AS UNSIGNED) as "Non-IP"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 9)
            ->first();
        // convert $indigenous_pwd into associative aray
        $indigenous_charts = (array) $indigenous_charts;

        // ability chart data
        $ability_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_pwd) AS UNSIGNED) as PWD'), 
                    DB::raw('CAST(SUM(num_of_participants) - SUM(num_of_pwd) AS UNSIGNED) as "Non-PWD"'))
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 9)
            ->first();
        // convert $ability_charts into associative aray
        $ability_charts = (array) $ability_charts;

        // sector chart data
        $sector_charts = DB::table('trainings_forms')
            // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
            ->select(DB::raw('CAST(SUM(num_of_farmers) AS UNSIGNED) as "Farmers and Seed Growers"'),
                    DB::raw('CAST(SUM(num_of_extworkers) AS UNSIGNED) as "Extension Workers and Intermediaries (ATs/AEWs, AgRiDOCs, etc.)"'),
                    DB::raw('CAST(SUM(num_of_scientific) AS UNSIGNED) as "Scientific Community (researchers, academe, etc)"'),
                    DB::raw('CAST(SUM(num_of_other) AS UNSIGNED) as "Other Sectors (rice industry players, media, policymakers, general rice consumers)"'),)
            // ->where('users.station', '=', $station_id)
            ->where('trainings_forms.station_encoded', '=', 9)
            ->first();
        // convert $ability_charts into associative aray
        $sector_charts = (array) $sector_charts;

        $station_regions = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $station_provinces = [
            1 => ['03'],
            2 => ['10', '11', '16'],
            3 => ['01'],
            4 => ['05', '08'],
            5 => ['10', '11', '16'],
            6 => ['02', '14'],
            7 => ['04', '17'],
            8 => ['09', '12', '15'],
            9 => ['06', '07']
        ];

        $regions = $station_regions[9];
        $provinces = Province::select('*')
            ->whereIn('regCode', $station_provinces[9])
            ->orderBy('provDesc', 'asc')
            ->get();

        $region_charts = DB::table('regions')
            ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
            ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region')
            ->where('trainings_forms.station_encoded', '=', 9)
            ->whereIn('regions.regCode', $regions)
            ->groupBy('regions.regDesc')
            ->get();
        
        $province_charts = DB::table('provinces')
            ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
            ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province')
            ->where('trainings_forms.station_encoded', '=', 9)
            ->whereIn('provinces.regCode', $station_provinces[9])
            ->groupBy('provinces.provDesc')
            ->get();

        // return view('encoder.ces', compact('titles', 'provinces'));
    
        if (Auth::check()) {
            return view('auth.negros', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // if (Auth::user()->user_type === 'super_admin') {
            //     return view('super_admin.negros', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'admin') {
            //     return view('admin.negros', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // } else if(Auth::user()->user_type === 'encoder') {
            //     return view('encoder.negros', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
            // }
        } else {
            return view('guest.negros', compact('titles', 'provinces', 'sex_charts', 'indigenous_charts', 'ability_charts', 'sector_charts', 'region_charts', 'province_charts'));
        }
    }
    // LIVE SEARCH AND FILTER IN EACH STATION //
    public function filterAjaxStationOnly(Request $request)
    {
        // STATION VIEW //
        if ($request->boolean('showTrainingViewStation')) {
            $station_id = $request->input('station', 0);
            // $station_id = '1';

            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 5);

            // Calculate the offset to skip records based on the current page number
            $offset = ($page - 1) * $recordsPerPage;

            // Query to fetch records with pagination            
            $records = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->leftJoin('municipalities', 'trainings_forms.municipality', '=', 'municipalities.citymunCode')
                ->leftJoin('provinces', 'trainings_forms.province', '=', 'provinces.provCode')
                ->select('trainings_forms.*', 'municipalities.citymunDesc as citymunDesc', 'provinces.provDesc as provDesc')
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->orderBy('trainings_forms.end_date', 'desc')
                // ->latest('trainings_forms.id')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();
            
            $only_numbers = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->select(DB::raw('SUM(num_of_participants) as total_participants'),
                        DB::raw('ROUND(AVG(average_gik), 2) as average_gik'),
                        DB::raw('ROUND(AVG(evaluation), 2) as evaluation'))
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->get();

            $regionsQuery = DB::table('regions')
                ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
                ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region');

            $provincesQuery = DB::table('provinces')
                ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
                ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province');

            switch ($station_id) {
                case 1: // CES station
                    $regionsQuery->where('trainings_forms.region', '=', "03");
                    $provincesQuery->where('trainings_forms.region', '=', "03");
                    break;
                case 2: // Agusan station
                    $regionsQuery->whereIn('trainings_forms.region', ["10", "11", "16"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["10", "11", "16"]);
                    break;
                case 3: // Batac station
                    $regionsQuery->where('trainings_forms.region', '=', "01");
                    $provincesQuery->where('trainings_forms.region', '=', "01");
                    break;
                case 4: // Bicol station
                    $regionsQuery->whereIn('trainings_forms.region', ["05", "08"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["05", "08"]);
                    break;
                case 5: // CMU station
                    $regionsQuery->whereIn('trainings_forms.region', ["10", "11", "16"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["10", "11", "16"]);
                    break;
                case 6: // ISABELA station
                    $regionsQuery->whereIn('trainings_forms.region', ["02", "14"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["02", "14"]);
                    break;
                case 7: // LOS BAÑOS station
                    $regionsQuery->whereIn('trainings_forms.region', ["04", "17"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["04", "17"]);
                    break;
                case 8: // Midsayap station
                    $regionsQuery->whereIn('trainings_forms.region', ["09", "12", "15"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["09", "12", "15"]);
                    break;
                case 9: // Negros station
                    $regionsQuery->where('trainings_forms.region', )->whereIn('regions.regCode', ["06", "07"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["06", "07"]);
                    break;
                // Add more cases for other stations as needed
            }

            $regions = $regionsQuery->where('trainings_forms.station_encoded', '=', $station_id)
                                    ->groupBy('regions.regDesc')->get();
            $provinces = $provincesQuery->where('trainings_forms.station_encoded', '=', $station_id)
                                        ->groupBy('provinces.provDesc')->get();

            return response()->json(['records' => $records, 'only_numbers' => $only_numbers, 'regions' => $regions, 'provinces' => $provinces]);
            // return response()->json(['only_numbers' => $only_numbers]);
        }

        if ($request->boolean('showMunicipalityViewStation')) {
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPageMunicipality = $request->input('recordsPerPageMunicipality', 5);

            // offset for municipalities data table
            $offset_col1 = ($page - 1) * 15;
            $offset_col2 = 5 + (($page - 1) * 15);
            $offset_col3 = 10 + (($page - 1) * 15);

            $regions = [
                1 => ['03'], // CES station
                2 => ['10', '11', '16'], // Agusan station
                3 => ['01'], // Batac station
                4 => ['05', '08'], // Bicol station
                5 => ['10', '11', '16'], // CMU station
                6 => ['02', '14'], // ISABELA station
                7 => ['04', '17'], // LOS BAÑOS station
                8 => ['09', '12', '15'], // Midsayap station
                9 => ['06', '07'], // Negros station
            ];

            $regionCodes = $regions[$request->station] ?? [];

            $municipalities = DB::table('municipalities')
                ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
                ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
                ->whereIn('municipalities.regDesc', $regionCodes)
                ->where('trainings_forms.station_encoded', '=', $request->station)
                ->groupBy('municipalities.citymunDesc');

            $municipalities_col1 = clone $municipalities;
            $municipalities_col2 = clone $municipalities;
            $municipalities_col3 = clone $municipalities;

            $municipalities_col1->skip($offset_col1)->take($recordsPerPageMunicipality);
            $municipalities_col2->skip(5 + ($page - 1) * 15)->take($recordsPerPageMunicipality);
            $municipalities_col3->skip(10 + ($page - 1) * 15)->take($recordsPerPageMunicipality);

            $municipalities_col1 = $municipalities_col1->get();
            $municipalities_col2 = $municipalities_col2->get();
            $municipalities_col3 = $municipalities_col3->get();
              
            return response()->json(['municipalities_col1' => $municipalities_col1, 'municipalities_col2' => $municipalities_col2, 'municipalities_col3' => $municipalities_col3]);
        }

        // STATION FILTER //
        if ($request->boolean('filterTrainingsViewStation')) {
            $station_id = $request->station;

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

            $records = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request, $station_id) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->orderBy('title', 'ASC')
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                // ->where('trainings_forms.station_encoded', '=', $request->station)
                // ->latest('trainings_forms.id')
                ->orderBy('trainings_forms.end_date', 'DESC')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            $only_numbers = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->get();

            // sex chart data
            $sex_charts = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->first();
            // convert $sex_charts into associative aray
            $sex_charts = (array) $sex_charts;

            // indigenous chart data
            $indigenous_charts = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->first();
            // convert $indigenous_charts into associative aray
            $indigenous_charts = (array) $indigenous_charts;

            // sector chart data
            $sector_charts = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->first();
            // convert $ability_charts into associative aray
            $sector_charts = (array) $sector_charts;

            // ability chart data
            $ability_charts = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->first();
            // convert $ability_charts into associative aray
            $ability_charts = (array) $ability_charts;

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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('trainings_forms.region', '=', $request->region)
                ->where('trainings_forms.station_encoded', '=', $station_id)
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('provinces.regCode', '=', $request->region)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->groupBy('provinces.provDesc')
                ->get();
            
            return response()->json(['records' => $records, 'only_numbers' => $only_numbers, 'sex_charts' => $sex_charts, 'indigenous_charts' => $indigenous_charts, 'ability_charts' => $ability_charts, 'sector_charts' => $sector_charts, 'regions' => $regions, 'provinces' => $provinces]);
        }

        if ($request->boolean('showFilterMunicipalityViewStation')) {
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPageMunicipality = $request->input('recordsPerPageMunicipality', 5);

            // offset for municipalities data table
            $offset_col1 = ($page - 1) * 15;
            $offset_col2 = 5 + (($page - 1) * 15);
            $offset_col3 = 10 + (($page - 1) * 15);

            $searchInput = $request->searchInput ?? '';
            $yearSelect = $request->yearSelect ?? '';
            $start_MonthSelect = $request->start_MonthSelect ?? '';
            $end_MonthSelect = $request->end_MonthSelect ?? '';
            $trainingTitle = $request->trainingTitle ?? '';
            $provinceSelect = $request->provinceSelect ?? '';
            $formType = $request->formType ?? '';

            $municipalities_col1 = DB::table('municipalities')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('municipalities.provCode', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                ->where('trainings_forms.station_encoded', '=', $request->station)
                ->groupBy('municipalities.citymunDesc')
                ->skip($offset_col1) // Skip records based on the offset
                ->take($recordsPerPageMunicipality) // Limit the number of records per page
                ->get();
            
            $municipalities_col2 = DB::table('municipalities')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        // return $query->where('trainings_forms.province', '=', $provinceSelect);
                        return $query->where('municipalities.provCode', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                ->where('trainings_forms.station_encoded', '=', $request->station)
                ->groupBy('municipalities.citymunDesc')
                ->skip($offset_col2) // Skip records based on the offset
                ->take($recordsPerPageMunicipality) // Limit the number of records per page
                ->get();
                
            $municipalities_col3 = DB::table('municipalities')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        // return $query->where('trainings_forms.province', '=', $provinceSelect);
                        return $query->where('municipalities.provCode', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                ->where('trainings_forms.station_encoded', '=', $request->station)
                ->groupBy('municipalities.citymunDesc')
                ->skip($offset_col3) // Skip records based on the offset
                ->take($recordsPerPageMunicipality) // Limit the number of records per page
                ->get();
            
            return response()->json(['municipalities_col1' => $municipalities_col1, 'municipalities_col2' => $municipalities_col2, 'municipalities_col3' => $municipalities_col3]);
        }
    }

    /**
     * Live Search and Filter
     */
    public function filterAjax(Request $request)
    {
        // For Overview
        if ($request->boolean('showOverview')) {
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 15);

            // Calculate the offset to skip records based on the current page number
            $offset_col1 = ($page - 1) * 45;
            $offset_col2 = 15 + (($page - 1) * 45);
            $offset_col3 = 30 + (($page - 1) * 45);

            // Query to fetch records with pagination
            // $records = DB::table('trainings_forms')
            //     ->select('trainings_forms.*')
            //     ->latest('trainings_forms.id')
            //     ->skip($offset) // Skip records based on the offset
            //     ->take($recordsPerPage) // Limit the number of records per page
            //     ->get();

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
            
            $municipalities_col1 = DB::table('municipalities')
                ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
                ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
                ->groupBy('municipalities.citymunDesc')
                ->skip($offset_col1) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();
            
            $municipalities_col2 = DB::table('municipalities')
                ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
                ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
                ->groupBy('municipalities.citymunDesc')
                ->skip($offset_col2) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            $municipalities_col3 = DB::table('municipalities')
                ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
                ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
                ->groupBy('municipalities.citymunDesc')
                ->skip($offset_col3) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            return response()->json(['only_numbers' => $only_numbers, 'regions' => $regions, 'provinces' => $provinces, 'municipalities_col1' => $municipalities_col1, 'municipalities_col2' => $municipalities_col2, 'municipalities_col3' => $municipalities_col3]);
            // return response()->json(['only_numbers' => $only_numbers, 'regions' => $regions, 'provinces' => $provinces, 'municipalities_col' => $municipalities_col]);
        }

        if ($request->boolean('filterShowOverview')) {
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 15);

            // Calculate the offset to skip records based on the current page number
            $offset_col1 = ($page - 1) * 45;
            $offset_col2 = 15 + (($page - 1) * 45);
            $offset_col3 = 30 + (($page - 1) * 45);

            // $searchInput = $request->searchInput ?? '';
            $yearSelect = $request->yearSelect ?? '';
            $start_MonthSelect = $request->start_MonthSelect ?? '';
            $end_MonthSelect = $request->end_MonthSelect ?? '';
            $trainingTitle = $request->trainingTitle ?? '';
            $provinceSelect = $request->provinceSelect ?? '';
            $formType = $request->formType ?? '';

            if(!empty($provinceSelect)) {
                $offset_col1 = ($page - 1) * 15;
                $offset_col2 = 5 + (($page - 1) * 15);
                $offset_col3 = 10 + (($page - 1) * 15);
                $recordsPerPage = 5;
            }

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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if($provinceSelect === "All") {
                        return $query->where('trainings_forms.type', '=', 'Local');
                        // return;
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if($provinceSelect === "All") {
                         return $query->where('trainings_forms.type', '=', 'Local');
                        // return;
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if($provinceSelect === "All") {
                         return $query->where('trainings_forms.type', '=', 'Local');
                        // return;
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if($provinceSelect === "All") {
                         return $query->where('trainings_forms.type', '=', 'Local');
                        // return;
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if($provinceSelect === "All") {
                         return $query->where('trainings_forms.type', '=', 'Local');
                        // return;
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->first();
            // convert $ability_charts into associative aray
            $sector_charts = (array) $sector_charts;

            // regions chart data
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if($provinceSelect === "All") {
                         return $query->where('trainings_forms.type', '=', 'Local');
                        // return;
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->groupBy('regions.regDesc')
                ->get();
            
            // provinces chart data
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if($provinceSelect === "All") {
                         return $query->where('trainings_forms.type', '=', 'Local');
                        // return;
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->groupBy('provinces.provDesc')
                ->get();
            
            $municipalities_col1 = DB::table('municipalities')
                ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
                ->leftJoin('trainings_forms', function ($join) use ($start_MonthSelect, $end_MonthSelect, $yearSelect, $trainingTitle) {
                    $join->on('municipalities.citymunCode', '=', 'trainings_forms.municipality')
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
                        });
                })
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('municipalities.provCode', '=', $provinceSelect);
                    if($provinceSelect === "All") {
                        //  return $query->where('trainings_forms.type', '=', 'Local');
                        return;
                    } else {
                        // return $query->where('trainings_forms.province', '=', $provinceSelect);
                        return $query->where('municipalities.provCode', '=', $provinceSelect);
                    }
                })
                ->groupBy('municipalities.citymunDesc')
                ->skip($offset_col1) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();


            $municipalities_col2 = DB::table('municipalities')
                ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
                ->leftJoin('trainings_forms', function ($join) use ($start_MonthSelect, $end_MonthSelect, $yearSelect, $trainingTitle) {
                    $join->on('municipalities.citymunCode', '=', 'trainings_forms.municipality')
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
                        });
                })
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('municipalities.provCode', '=', $provinceSelect);
                    if($provinceSelect === "All") {
                        //  return $query->where('trainings_forms.type', '=', 'Local');
                        return;
                    } else {
                        return $query->where('municipalities.provCode', '=', $provinceSelect);
                    }
                })
                ->groupBy('municipalities.citymunDesc')
                ->skip($offset_col2) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();
            
            $municipalities_col3 = DB::table('municipalities')
                ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
                ->leftJoin('trainings_forms', function ($join) use ($start_MonthSelect, $end_MonthSelect, $yearSelect, $trainingTitle) {
                    $join->on('municipalities.citymunCode', '=', 'trainings_forms.municipality')
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
                        });
                })
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('municipalities.provCode', '=', $provinceSelect);
                    if($provinceSelect === "All") {
                        //  return $query->where('trainings_forms.type', '=', 'Local');
                        return;
                    } else {
                        return $query->where('municipalities.provCode', '=', $provinceSelect);
                    }
                })
                ->groupBy('municipalities.citymunDesc')
                ->skip($offset_col3) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            return response()->json(['only_numbers' => $only_numbers, 'sex_charts' => $sex_charts, 'indigenous_charts' => $indigenous_charts, 'ability_charts' => $ability_charts, 'sector_charts' => $sector_charts, 'regions' => $regions, 'provinces' =>  $provinces, 'municipalities_col1' => $municipalities_col1, 'municipalities_col2' => $municipalities_col2, 'municipalities_col3' => $municipalities_col3]);
        }

        if (!empty(Auth::check())) {
            $encoder_id = Auth::user()->id;
        } else {
            abort(404);
        }

        // For View DataTable
        if ($request->boolean('showTrainingView')) {
            $station_id = Auth::user()->station;

            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 5);

            // Calculate the offset to skip records based on the current page number
            $offset = ($page - 1) * $recordsPerPage;

            // Query to fetch records with pagination            
            $records = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->leftJoin('municipalities', 'trainings_forms.municipality', '=', 'municipalities.citymunCode')
                ->leftJoin('provinces', 'trainings_forms.province', '=', 'provinces.provCode')
                ->select('trainings_forms.*', 'municipalities.citymunDesc as citymunDesc', 'provinces.provDesc as provDesc')
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->orderBy('trainings_forms.end_date', 'desc')
                // ->latest('trainings_forms.id')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();
            
            $only_numbers = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                ->select(DB::raw('SUM(num_of_participants) as total_participants'),
                        DB::raw('ROUND(AVG(average_gik), 2) as average_gik'),
                        DB::raw('ROUND(AVG(evaluation), 2) as evaluation'))
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->get();

            $regionsQuery = DB::table('regions')
                ->select('regions.regDesc AS region_name', DB::raw('COUNT(trainings_forms.region) AS region_count'))
                ->leftJoin('trainings_forms', 'regions.regCode', '=', 'trainings_forms.region');

            $provincesQuery = DB::table('provinces')
                ->select('provinces.provDesc AS province_name', DB::raw('COUNT(trainings_forms.province) AS province_count'))
                ->leftJoin('trainings_forms', 'provinces.provCode', '=', 'trainings_forms.province');

            switch ($request->station) {
                case 1: // CES station
                    $regionsQuery->where('trainings_forms.region', '=', "03");
                    $provincesQuery->where('trainings_forms.region', '=', "03");
                    break;
                case 2: // Agusan station
                    $regionsQuery->whereIn('trainings_forms.region', ["10", "11", "16"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["10", "11", "16"]);
                    break;
                case 3: // Batac station
                    $regionsQuery->where('trainings_forms.region', '=', "01");
                    $provincesQuery->where('trainings_forms.region', '=', "01");
                    break;
                case 4: // Bicol station
                    $regionsQuery->whereIn('trainings_forms.region', ["05", "08"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["05", "08"]);
                    break;
                case 5: // CMU station
                    $regionsQuery->whereIn('trainings_forms.region', ["10", "11", "16"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["10", "11", "16"]);
                    break;
                case 6: // ISABELA station
                    $regionsQuery->whereIn('trainings_forms.region', ["02", "14"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["02", "14"]);
                    break;
                case 7: // LOS BAÑOS station
                    $regionsQuery->whereIn('trainings_forms.region', ["04", "17"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["04", "17"]);
                    break;
                case 8: // Midsayap station
                    $regionsQuery->whereIn('trainings_forms.region', ["09", "12", "15"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["09", "12", "15"]);
                    break;
                case 9: // Negros station
                    $regionsQuery->where('trainings_forms.region', )->whereIn('regions.regCode', ["06", "07"]);
                    $provincesQuery->whereIn('trainings_forms.region', ["06", "07"]);
                    break;
                // Add more cases for other stations as needed
            }

            $regions = $regionsQuery->where('trainings_forms.station_encoded', '=', $station_id)
                                    ->groupBy('regions.regDesc')->get();
            $provinces = $provincesQuery->where('trainings_forms.station_encoded', '=', $station_id)
                                        ->groupBy('provinces.provDesc')->get();

            return response()->json(['records' => $records, 'only_numbers' => $only_numbers, 'regions' => $regions, 'provinces' => $provinces]);
        }   

        if ($request->boolean('filterTrainingsView')) {
            $station_id = Auth::user()->station;

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
            // dd($trainingTitle);
            
            $records = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request, $station_id) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->orderBy('title', 'ASC')
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                // ->where('trainings_forms.station_encoded', '=', $request->station)
                // ->latest('trainings_forms.id')
                ->orderBy('trainings_forms.end_date', 'DESC')
                ->skip($offset) // Skip records based on the offset
                ->take($recordsPerPage) // Limit the number of records per page
                ->get();

            $only_numbers = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->get();
            // sex chart data
            $sex_charts = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->first();
            // convert $sex_charts into associative aray
            $sex_charts = (array) $sex_charts;
            
            // indigenous chart data
            $indigenous_charts = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->first();
            // convert $indigenous_charts into associative aray
            $indigenous_charts = (array) $indigenous_charts;
            
            // sector chart data
            $sector_charts = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->first();
            // convert $ability_charts into associative aray
            $sector_charts = (array) $sector_charts;

            // ability chart data
            $ability_charts = DB::table('trainings_forms')
                // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('users.station', '=', $request->station)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->first();
            // convert $ability_charts into associative aray
            $ability_charts = (array) $ability_charts;

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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('trainings_forms.region', '=', $request->region)
                ->where('trainings_forms.station_encoded', '=', $station_id)
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->where('provinces.regCode', '=', $request->region)
                ->where('trainings_forms.station_encoded', '=', $station_id)
                ->groupBy('provinces.provDesc')
                ->get();

            return response()->json(['records' => $records, 'only_numbers' => $only_numbers, 'sex_charts' => $sex_charts, 'indigenous_charts' => $indigenous_charts, 'ability_charts' => $ability_charts, 'sector_charts' => $sector_charts, 'regions' => $regions, 'provinces' => $provinces]);
        }

        if ($request->boolean('showMunicipalityView')) {
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPageMunicipality = $request->input('recordsPerPageMunicipality', 5);

            // Calculate the offset to skip records based on the current page number
            // $offset = ($page - 1) * $recordsPerPage;

            // offset for municipalities data table
            $offset_col1 = ($page - 1) * 15;
            $offset_col2 = 5 + (($page - 1) * 15);
            $offset_col3 = 10 + (($page - 1) * 15);
            
            // if($request->station == 1) { // CES station
            //     $municipalities_col1 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '03')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col1) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
                
            //     $municipalities_col2 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '03')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col2) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();

            //     $municipalities_col3 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '03')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col3) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
            // } elseif ($request->station == 2) { // Agusan station
            //     $municipalities_col1 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '10')
            //         ->orWhere('municipalities.regDesc', '=', '11')
            //         ->orWhere('municipalities.regDesc', '=', '16')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col1) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
                
            //     $municipalities_col2 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '10')
            //         ->orWhere('municipalities.regDesc', '=', '11')
            //         ->orWhere('municipalities.regDesc', '=', '16')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col2) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();

            //     $municipalities_col3 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '10')
            //         ->orWhere('municipalities.regDesc', '=', '11')
            //         ->orWhere('municipalities.regDesc', '=', '16')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col3) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
            // } elseif ($request->station == 3) { // Batac station
            //     $municipalities_col1 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '01') 
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col1) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
                
            //     $municipalities_col2 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '01')                   
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col2) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();

            //     $municipalities_col3 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '01')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col3) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
            // } elseif ($request->station == 4) { // Bicol station
            //     $municipalities_col1 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '05')
            //         ->orWhere('municipalities.regDesc', '=', '08')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col1) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
                
            //     $municipalities_col2 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '05')
            //         ->orWhere('municipalities.regDesc', '=', '08')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col2) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();

            //     $municipalities_col3 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '05')
            //         ->orWhere('municipalities.regDesc', '=', '08')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col3) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
            // } elseif ($request->station == 5) { // CMU station
            //     $municipalities_col1 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '10')
            //         ->orWhere('municipalities.regDesc', '=', '11')
            //         ->orWhere('municipalities.regDesc', '=', '16')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col1) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
                
            //     $municipalities_col2 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '10')
            //         ->orWhere('municipalities.regDesc', '=', '11')
            //         ->orWhere('municipalities.regDesc', '=', '16')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col2) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();

            //     $municipalities_col3 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '10')
            //         ->orWhere('municipalities.regDesc', '=', '11')
            //         ->orWhere('municipalities.regDesc', '=', '16')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col3) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
            // } elseif ($request->station == 6) { // ISABELA station
            //     $municipalities_col1 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '02')
            //         ->orWhere('municipalities.regDesc', '=', '14')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col1) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
                
            //     $municipalities_col2 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '02')
            //         ->orWhere('municipalities.regDesc', '=', '14')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col2) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();

            //     $municipalities_col3 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '02')
            //         ->orWhere('municipalities.regDesc', '=', '14')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col3) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
            // } elseif ($request->station == 7) { // LOS BAÑOS station
            //     $municipalities_col1 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '04')
            //         ->orWhere('municipalities.regDesc', '=', '17')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col1) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
                
            //     $municipalities_col2 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '04')
            //         ->orWhere('municipalities.regDesc', '=', '17')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col2) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();

            //     $municipalities_col3 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '04')
            //         ->orWhere('municipalities.regDesc', '=', '17')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col3) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
            // } elseif ($request->station == 8) { // Midsayap station
            //     $municipalities_col1 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '09')
            //         ->orWhere('municipalities.regDesc', '=', '12')
            //         ->orWhere('municipalities.regDesc', '=', '15')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col1) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
                
            //     $municipalities_col2 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '09')
            //         ->orWhere('municipalities.regDesc', '=', '12')
            //         ->orWhere('municipalities.regDesc', '=', '15')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col2) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();

            //     $municipalities_col3 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '09')
            //         ->orWhere('municipalities.regDesc', '=', '12')
            //         ->orWhere('municipalities.regDesc', '=', '15')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col3) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
            // } elseif ($request->station == 9) { // Negros station
            //     $municipalities_col1 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '06')
            //         ->orWhere('municipalities.regDesc', '=', '07')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col1) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
                
            //     $municipalities_col2 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '06')
            //         ->orWhere('municipalities.regDesc', '=', '07')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col2) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();

            //     $municipalities_col3 = DB::table('municipalities')
            //         ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
            //         ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
            //         ->where('municipalities.regDesc', '=', '06')
            //         ->orWhere('municipalities.regDesc', '=', '07')
            //         ->groupBy('municipalities.citymunDesc')
            //         ->skip($offset_col3) // Skip records based on the offset
            //         ->take($recordsPerPageMunicipality) // Limit the number of records per page
            //         ->get();
            // }

            $regions = [
                1 => ['03'], // CES station
                2 => ['10', '11', '16'], // Agusan station
                3 => ['01'], // Batac station
                4 => ['05', '08'], // Bicol station
                5 => ['10', '11', '16'], // CMU station
                6 => ['02', '14'], // ISABELA station
                7 => ['04', '17'], // LOS BAÑOS station
                8 => ['09', '12', '15'], // Midsayap station
                9 => ['06', '07'], // Negros station
            ];

            $regionCodes = $regions[$request->station] ?? [];

            $municipalities = DB::table('municipalities')
                ->select('municipalities.citymunDesc AS city_name', DB::raw('COUNT(trainings_forms.municipality) AS city_count'))
                ->leftJoin('trainings_forms', 'municipalities.citymunCode', '=', 'trainings_forms.municipality')
                ->whereIn('municipalities.regDesc', $regionCodes)
                ->where('trainings_forms.station_encoded', '=', $request->station)
                ->groupBy('municipalities.citymunDesc');

            $municipalities_col1 = clone $municipalities;
            $municipalities_col2 = clone $municipalities;
            $municipalities_col3 = clone $municipalities;

            $municipalities_col1->skip($offset_col1)->take($recordsPerPageMunicipality);
            $municipalities_col2->skip(5 + ($page - 1) * 15)->take($recordsPerPageMunicipality);
            $municipalities_col3->skip(10 + ($page - 1) * 15)->take($recordsPerPageMunicipality);

            $municipalities_col1 = $municipalities_col1->get();
            $municipalities_col2 = $municipalities_col2->get();
            $municipalities_col3 = $municipalities_col3->get();
              
            return response()->json(['municipalities_col1' => $municipalities_col1, 'municipalities_col2' => $municipalities_col2, 'municipalities_col3' => $municipalities_col3]);
        }

        if ($request->boolean('showFilterMunicipalityView')) {
            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPageMunicipality = $request->input('recordsPerPageMunicipality', 5);

            // Calculate the offset to skip records based on the current page number
            // $offset = ($page - 1) * $recordsPerPage;

            // offset for municipalities data table
            $offset_col1 = ($page - 1) * 15;
            $offset_col2 = 5 + (($page - 1) * 15);
            $offset_col3 = 10 + (($page - 1) * 15);

            $searchInput = $request->searchInput ?? '';
            $yearSelect = $request->yearSelect ?? '';
            $start_MonthSelect = $request->start_MonthSelect ?? '';
            $end_MonthSelect = $request->end_MonthSelect ?? '';
            $trainingTitle = $request->trainingTitle ?? '';
            $provinceSelect = $request->provinceSelect ?? '';
            $formType = $request->formType ?? '';

            $municipalities_col1 = DB::table('municipalities')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        return $query->where('municipalities.provCode', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                ->where('trainings_forms.station_encoded', '=', $request->station)
                ->groupBy('municipalities.citymunDesc')
                ->skip($offset_col1) // Skip records based on the offset
                ->take($recordsPerPageMunicipality) // Limit the number of records per page
                ->get();
            
            $municipalities_col2 = DB::table('municipalities')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        // return $query->where('trainings_forms.province', '=', $provinceSelect);
                        return $query->where('municipalities.provCode', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                ->where('trainings_forms.station_encoded', '=', $request->station)
                ->groupBy('municipalities.citymunDesc')
                ->skip($offset_col2) // Skip records based on the offset
                ->take($recordsPerPageMunicipality) // Limit the number of records per page
                ->get();
                
            $municipalities_col3 = DB::table('municipalities')
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect, $request) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if ($provinceSelect === "All") {
                        $regions = [];
                        switch ($request->station) {
                            case 1: // CES station
                                $regions = ['03'];
                                break;
                            case 2: // Agusan station
                                $regions = ['10', '11', '16'];
                                break;
                            case 3: // Batac station
                                $regions = ['01'];
                                break;
                            case 4: // Bicol station
                                $regions = ['05', '08'];
                                break;
                            case 5: // CMU station
                                $regions = ['10', '11', '16'];
                                break;
                            case 6: // ISABELA station
                                $regions = ['02', '14'];
                                break;
                            case 7: // LOS BAÑOS station
                                $regions = ['04', '17'];
                                break;
                            case 8: // Midsayap station
                                $regions = ['09', '12', '15'];
                                break;
                            case 9: // Negros station
                                $regions = ['06', '07'];
                                break;
                        }
                        $query->whereIn('trainings_forms.region', $regions);
                    } else {
                        // return $query->where('trainings_forms.province', '=', $provinceSelect);
                        return $query->where('municipalities.provCode', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                ->where('trainings_forms.station_encoded', '=', $request->station)
                ->groupBy('municipalities.citymunDesc')
                ->skip($offset_col3) // Skip records based on the offset
                ->take($recordsPerPageMunicipality) // Limit the number of records per page
                ->get();
            
            return response()->json(['municipalities_col1' => $municipalities_col1, 'municipalities_col2' => $municipalities_col2, 'municipalities_col3' => $municipalities_col3]);
        }

        // For Edit DataTable
        if ($request->boolean('showTraining')) {
            if (empty(Auth::check())) {
                abort(404);
            }

            $station_id = Auth::user()->station;

            // Get the current page number from the request, default to 1 if not provided
            $page = $request->input('page', 1);

            // Get the number of records to display per page from the request or use a default value
            $recordsPerPage = $request->input('recordsPerPage', 5);

            // Calculate the offset to skip records based on the current page number
            $offset = ($page - 1) * $recordsPerPage;

            $division = Division::where('id', '=', Auth::user()->division)->first();

            // Query to fetch records with pagination
            if(Auth::user()->user_type === 'super_admin') {
                $records = DB::table('trainings_forms')
                    ->leftJoin('municipalities', 'trainings_forms.municipality', '=', 'municipalities.citymunCode')
                    ->leftJoin('provinces', 'trainings_forms.province', '=', 'provinces.provCode')
                    ->select('trainings_forms.*', 'municipalities.citymunDesc as citymunDesc', 'provinces.provDesc as provDesc')
                    ->where('trainings_forms.station_encoded', '=', $station_id)
                    ->orderBy('trainings_forms.end_date', 'DESC')
                    ->skip($offset) // Skip records based on the offset
                    ->take($recordsPerPage) // Limit the number of records per page
                    ->get();
            } else if(Auth::user()->user_type === 'admin') {
                $records = DB::table('trainings_forms')
                    ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                    ->leftJoin('municipalities', 'trainings_forms.municipality', '=', 'municipalities.citymunCode')
                    ->leftJoin('provinces', 'trainings_forms.province', '=', 'provinces.provCode')
                    ->select('trainings_forms.*', 'municipalities.citymunDesc as citymunDesc', 'provinces.provDesc as provDesc')
                    ->where('users.id', '=', $encoder_id)
                    ->orWhere('users.user_type', '=', 'encoder')
                    ->where('trainings_forms.station_encoded', '=', $station_id)
                    ->orderBy('trainings_forms.end_date', 'DESC')
                    ->skip($offset) // Skip records based on the offset
                    ->take($recordsPerPage) // Limit the number of records per page
                    ->get();
            } else {
                $records = DB::table('trainings_forms')
                    // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                    ->leftJoin('municipalities', 'trainings_forms.municipality', '=', 'municipalities.citymunCode')
                    ->leftJoin('provinces', 'trainings_forms.province', '=', 'provinces.provCode')
                    ->select('trainings_forms.*', 'municipalities.citymunDesc as citymunDesc', 'provinces.provDesc as provDesc')
                    ->where('trainings_forms.encoder_id', '=', $encoder_id)
                    // ->where('users.station', '=', $request->station)
                    ->where('trainings_forms.station_encoded', '=', $station_id)
                    ->where('trainings_forms.division', '=', $division->division)
                    ->orderBy('trainings_forms.end_date', 'DESC')
                    // ->latest('trainings_forms.id')
                    ->skip($offset) // Skip records based on the offset
                    ->take($recordsPerPage) // Limit the number of records per page
                    ->get();
            }
            
            return response()->json(['records' => $records]);
        }

        if ($request->boolean('filterTrainings')) {
            if (empty(Auth::check())) {
                abort(404);
            }

            $station_id = Auth::user()->station;

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

            if(Auth::user()->user_type === 'super_admin') {
                $records = DB::table('trainings_forms')
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
                        return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                    })
                    ->where('trainings_forms.station_encoded', '=', $station_id)
                    ->orderBy('trainings_forms.end_date', 'DESC')
                    ->skip($offset) // Skip records based on the offset
                    ->take($recordsPerPage) // Limit the number of records per page
                    ->get();
            } else if(Auth::user()->user_type === 'admin') {
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
                        return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                    })
                    ->where('users.id', '=', $encoder_id)
                    ->orWhere('users.user_type', '=', 'encoder')
                    ->where('trainings_forms.station_encoded', '=', $station_id)
                    ->orderBy('trainings_forms.end_date', 'DESC')
                    // ->latest('trainings_forms.id')
                    ->skip($offset) // Skip records based on the offset
                    ->take($recordsPerPage) // Limit the number of records per page
                    ->get();
            } else {
                $records = DB::table('trainings_forms')
                    // ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
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
                        return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                    })
                    ->where('trainings_forms.encoder_id', '=', $encoder_id)
                    // ->where('users.station', '=', $request->station)
                    ->where('trainings_forms.station_encoded', '=', $station_id)
                    ->where('trainings_forms.division', '=', $division->division)
                    ->orderBy('trainings_forms.end_date', 'DESC')
                    // ->latest('trainings_forms.id')
                    ->skip($offset) // Skip records based on the offset
                    ->take($recordsPerPage) // Limit the number of records per page
                    ->get();
            }

            return response()->json(['records' => $records]);
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
            'batch'=>'required',
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

        $existed = $this->processTrainingCheckingForStore($request->training_title, $request->batch, Auth::user()->station);
        if($existed) {
            return redirect()->route('trainingsform.create')->with(['error' => 'Oops...', 'message' => 'Training Title: ' . $request->training_title . ' Batch (' . $request->batch . ') already exists']);
        }

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
            'station_encoded'=>Auth::user()->station,
            'division'=>$division->division,
            'title'=>$title,
            'batch'=>$request->batch,
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
    private function processTrainingCheckingForStore($title, $batch, $station_encoded)
    {
        try {
            return TrainingsForm::where('title', $title)
                        ->where('batch', $batch)
                        ->where('station_encoded', $station_encoded)
                        ->exists();
            // return true;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            return false;
        }
    }
    // private function processTrainingCheckingForUpdate($id, $title, $batch)
    private function processTrainingCheckingForUpdate($id, $title, $batch, $station_encoded)
    {
        try {
            return TrainingsForm::where('id', '!=', $id)
                        ->where('title', $title)
                        ->where('batch', $batch)
                        ->where('station_encoded', $station_encoded)
                        ->exists();
            // return true;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            return false;
        }
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

        $station_id = Auth::user()->station;
        $encoder_id = Auth::user()->id;

        $record = TrainingsForm::findOrFail($id);

        if(Auth::user()->user_type === 'super_admin') {
            $records_collect = DB::table('trainings_forms')
                    ->leftJoin('municipalities', 'trainings_forms.municipality', '=', 'municipalities.citymunCode')
                    ->leftJoin('provinces', 'trainings_forms.province', '=', 'provinces.provCode')
                    ->select('trainings_forms.*', 'municipalities.citymunDesc as citymunDesc', 'provinces.provDesc as provDesc')
                    ->where('trainings_forms.station_encoded', '=', $station_id)
                    ->orderBy('trainings_forms.end_date', 'DESC')
                    ->get();
            $recordExists = $records_collect->contains('id', $record->id);

            if(!$recordExists) {
                Auth::logout();
                return redirect()->route('login');
                // abort(404);
            }
        } else if(Auth::user()->user_type === 'admin') {
            $records_collect = DB::table('trainings_forms')
                    ->leftJoin('users', 'trainings_forms.encoder_id', '=', 'users.id')
                    ->leftJoin('municipalities', 'trainings_forms.municipality', '=', 'municipalities.citymunCode')
                    ->leftJoin('provinces', 'trainings_forms.province', '=', 'provinces.provCode')
                    ->select('trainings_forms.*', 'municipalities.citymunDesc as citymunDesc', 'provinces.provDesc as provDesc')
                    ->where('users.id', '=', $encoder_id)
                    ->orWhere('users.user_type', '=', 'encoder')
                    ->where('trainings_forms.station_encoded', '=', $station_id)
                    ->orderBy('trainings_forms.end_date', 'DESC')
                    ->get();
            $recordExists = $records_collect->contains('id', $record->id);

            if(!$recordExists) {
                Auth::logout();
                return redirect()->route('login');
                // abort(404);
            }
        } else if(Auth::user()->user_type === 'encoder') {
            if(Auth::user()->id != $record->encoder_id) {
                Auth::logout();
                return redirect()->route('login');
                // abort(404);
            }
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

        if(empty($record) || empty(Auth::check())) {
            Auth::logout();
            abort(404);
        }

        $request->validate([
            // Section 2
            'training_title'=>'required',
            'batch'=>'required',
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

        $existed = $this->processTrainingCheckingForUpdate($id, $request->training_title, $request->batch, Auth::user()->station);
        if($existed) {
            return redirect()->route('trainingsform.create')->with(['error' => 'Oops...', 'message' => 'Training Title: ' . $request->training_title . ' Batch (' . $request->batch . ') already exists']);
        }

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
            'batch'=>$request->batch,
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

        return redirect()->route('auth.edit')->with(['success' => 'Great!', 'message' => 'You have successfully edited a data']);
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
            $provinceSelect = $request->provinceSelect ?? '';
            $formType = $request->formType ?? '';
            $station = $request->station;

            return Excel::download(new ExportRecords($searchInput, $yearSelect, $start_MonthSelect, $end_MonthSelect, $trainingTitle, $provinceSelect, $formType, $station), 'test.xls');
        }
    }
}
