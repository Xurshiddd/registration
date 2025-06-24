<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'email',
        'phone',
        'birth_date',
        'gender',
        'avatar',
        'passport_series',
        'passport_number',
        'passport_given_by',
        'passport_pdf',
        'education',
        'diploma_series',
        'diploma_number',
        'diploma_pdf',
        'education_livel',
        'course_name',
        'course_duration',
    ];
}
