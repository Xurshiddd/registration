<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'father_name', 'email', 'phone', 'phone_2', 'birth_date',
        'gender', 'avatar', 'passport_series', 'passport_number', 'passport_pdf',
        'education', 'diploma_series', 'diploma_number', 'diploma_pdf',
        'education_livel', 'course_direction', 'educate_direction',
        'passport_rus', 'propiska',
    ];
    
}
