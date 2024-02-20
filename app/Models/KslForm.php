<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KslForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'staff_name',
        'age_group',
        'sex',
        'offices_divisions',
        'mode_of_sharing',
        'opportunity',
        'activity',
        'start_date',
        'end_date',
        'event_organizer',
        'sponsor',
        'venue',
        'province',
        'municipality',
        'country',
        'state',
        'interview_date',
        'agency',
        'program_title',
        'scope',
        'inquiry',
        'inquiry_date',
        'topic',
        'presentation_title',
        'classification',
        'total_participants',
        'total_farmers',
        'total_workers',
        'total_sciecom',
        'total_others',
        'total_male',
        'total_female',
        'total_indigenous',
        'total_pwd',
        'photo_docu',
        'other_docu',
    ];
}
