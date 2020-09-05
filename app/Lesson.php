<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
	protected $primaryKey = 'lesson_id';
    public $incrementing = false;
    protected $fillable = [
        'lesson_name','lesson_id', 'professor_name', 'kind_of_lesson', 'class_day', 
        'class_time_start','class_time_end', 'class_day_two',  'class_time_two_start', 'class_time_two_end' , 'vahed', 'exam_date', 'exam_time_start' , 'exam_time_end' ,'main_id', 'sexuality'
    ];
    
}

