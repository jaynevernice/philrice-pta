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
        'division',
        'title',
        'category',
        'type',
        'training_venue',
        'station_id',
        'municipality',
        'province',
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

    static public function exportFilteredRecords($searchInput = null, $yearSelect = null, $start_MonthSelect = null, $end_MonthSelect = null, $trainingTitle = null, $formType = null, $station = null)
    {    
        // $records = DB::table('trainings_forms')
        //         ->select('*')
        //         ->when(!empty($start_MonthSelect), function ($query) use ($start_MonthSelect) {
        //             return $query->whereMonth('trainings_forms.start_date', '>=', $start_MonthSelect);
        //         })
        //         ->when(!empty($end_MonthSelect), function ($query) use ($end_MonthSelect) {
        //             return $query->whereMonth('trainings_forms.end_date', '<=', $end_MonthSelect);
        //         })
        //         ->when(!empty($yearSelect), function ($query) use ($yearSelect) {
        //             return $query->whereYear('end_date', '=', $yearSelect);
        //         })
        //         ->when(!empty($searchInput), function ($query) use ($searchInput) {
        //             return $query->where('title', 'LIKE', "%$searchInput%")
        //                         ->orWhere('trainings_forms.division', 'LIKE', "%$searchInput%");
        //                         // ->orWhere('venue', 'LIKE', "%$searchInput%");
        //                         // ->orWhere('province', 'LIKE', "%$searchInput%")
        //                         // ->orWhere('municipality', 'LIKE', "%$searchInput%")
        //                         // ->orWhere('country', 'LIKE', "%$searchInput%")
        //                         // ->orWhere('state', 'LIKE', "%$searchInput%")
        //                         // ->orWhere('num_of_participants', 'LIKE', "%$searchInput%");
        //         })
        //         // ->orderBy('title', 'ASC')
        //         ->latest('id')
        //         ->get();
        
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
                ->where('users.station', '=', $station)
                ->latest('trainings_forms.id')
                ->get();

        return $records;
    }
}
