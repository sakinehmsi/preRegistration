<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifystuNum;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Course extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'course_name','course_id', 'course_term', 'course_type', 'has_preRequisite' , 'sexuality' ,  'vahed'
    ];
}