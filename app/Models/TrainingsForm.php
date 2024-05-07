<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TrainingsForm extends Model
{
    use HasFactory;

    protected $fillable = [
        // Section 2
        'encoder_id',
        'station_encoded',
        'division',
        'title',
        'batch',
        'category',
        'type',
        'training_venue',
        'station_id',
        'municipality',
        'province',
        'region',
        'international_address',
        'mod',
        'start_date',
        'end_date',
        // Section 3
        'sponsor',
        'fund',
        'average_gik',
        'evaluation',
        // Section 4
        'num_of_participants',
        'num_of_farmers',
        'num_of_extworkers',
        'num_of_scientific',
        'num_of_other',
        'num_of_male',
        'num_of_female',
        'num_of_indigenous',
        'num_of_pwd',
        // Section 5 
        'image',
        'file',
    ];

    static public function exportFilteredRecords($searchInput = null, $yearSelect = null, $start_MonthSelect = null, $end_MonthSelect = null, $trainingTitle = null, $provinceSelect = null, $formType = null, $station = null)
    {    
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
                ->when(!empty($provinceSelect), function ($query) use ($provinceSelect) {
                    // return $query->where('trainings_forms.province', '=', $provinceSelect);
                    if($provinceSelect === "All") {
                        if($station == 1) { // CES station
                            return $query->where('trainings_forms.region', '=', '03');
                        } elseif ($station == 2) { // Agusan station
                            return $query->where('trainings_forms.region', '=', '10')
                                        ->orWhere('trainings_forms.region', '=', '11') 
                                        ->orWhere('trainings_forms.region', '=', '16'); 
                        } elseif ($station == 3) { // Batac station
                            return $query->where('trainings_forms.region', '=', '01');
                        } elseif ($station == 4) { // Bicol station
                            return $query->where('trainings_forms.region', '=', '05')
                                        ->orWhere('trainings_forms.region', '=', '08');
                        } elseif ($station == 5) { // CMU station
                            return $query->where('trainings_forms.region', '=', '10')
                                        ->orWhere('trainings_forms.region', '=', '11') 
                                        ->orWhere('trainings_forms.region', '=', '16'); 
                        } elseif ($station == 6) { // ISABELA station
                            return $query->where('trainings_forms.region', '=', '02')
                                        ->orWhere('trainings_forms.region', '=', '14');
                        } elseif ($station == 7) { // LOS BAÑOS station
                            return $query->where('trainings_forms.region', '=', '04')
                                        ->orWhere('trainings_forms.region', '=', '17');
                        } elseif ($station == 8) { // Midsayap station
                            return $query->where('trainings_forms.region', '=', '09')
                                        ->orWhere('trainings_forms.region', '=', '12') 
                                        ->orWhere('trainings_forms.region', '=', '15'); 
                        } elseif ($station == 9) { // Negros station
                            return $query->where('trainings_forms.region', '=', '06')
                                        ->orWhere('trainings_forms.region', '=', '07');
                        }
                    } else {
                        return $query->where('trainings_forms.province', '=', $provinceSelect);
                    }
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('trainings_forms.title', 'LIKE', "%$searchInput%");
                })
                // ->orderBy('title', 'ASC')
                ->where('users.station', '=', $station)
                // ->latest('trainings_forms.id')
                ->orderBy('trainings_forms.end_date', 'DESC')
                ->get();

        return $records;
    }
}
