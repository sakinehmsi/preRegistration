<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
	protected $primaryKey = 'lesson_id';
    public $incrementing = false;
    protected $fillable = [
        'lesson_name','lesson_id', 'professor_name', 'kind_of_lesson', 'class_day', 
        'class_time', 'class_day_two',  'class_time_two', 'vahed', 'exam_date', 'exam_time' ,'main_id', 'sexuality'
    ];
    
}

