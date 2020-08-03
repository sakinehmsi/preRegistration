<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifystuNum;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Passed_course extends Authenticatable
{
	use Notifiable;

    protected $fillable = [
        'stuNum', 'courseID' 
    ];    
}