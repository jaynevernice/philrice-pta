<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingsForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'encoder_id',
        // 'encoder_name',
        // 'encoder_email',
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
}
