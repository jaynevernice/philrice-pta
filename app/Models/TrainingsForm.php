<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TrainingsForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'encoder_id',
        // 'encoder_name',
        // 'encoder_email',
        'station',
        'division',
        'title',
        'training_type',
        'training_style',
        'start_date',
        'end_date',
        'venue',
        'province',
        'municipality',
        'country',
        'state',
        'sponsor',
        'fund',
        'average_gik',
        'evaluation',
        'participants',
        'num_of_participants',
        'num_of_farmers',
        'num_of_extworkers',
        'num_of_scientific',
        'num_of_other_sectors',
        'num_of_male',
        'num_of_female',
        'num_of_indigenous',
        'num_of_pwd',
        'image',
        'file',
    ];

    static public function exportFilteredRecords($searchInput = null, $yearSelect = null, $start_MonthSelect = null, $end_MonthSelect = null)
    {
               
        $records = DB::table('trainings_forms')
                ->select('*')
                ->when(!empty($start_MonthSelect), function ($query) use ($start_MonthSelect) {
                    return $query->whereMonth('trainings_forms.start_date', '>=', $start_MonthSelect);
                })
                ->when(!empty($end_MonthSelect), function ($query) use ($end_MonthSelect) {
                    return $query->whereMonth('trainings_forms.end_date', '<=', $end_MonthSelect);
                })
                ->when(!empty($yearSelect), function ($query) use ($yearSelect) {
                    return $query->whereYear('end_date', '=', $yearSelect);
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('title', 'LIKE', "%$searchInput%")
                                ->orWhere('trainings_forms.division', 'LIKE', "%$searchInput%")
                                ->orWhere('venue', 'LIKE', "%$searchInput%");
                                // ->orWhere('province', 'LIKE', "%$searchInput%")
                                // ->orWhere('municipality', 'LIKE', "%$searchInput%")
                                // ->orWhere('country', 'LIKE', "%$searchInput%")
                                // ->orWhere('state', 'LIKE', "%$searchInput%")
                                // ->orWhere('num_of_participants', 'LIKE', "%$searchInput%");
                })
                // ->orderBy('title', 'ASC')
                ->latest('id')
                ->get();

        return $records;
    }
}
