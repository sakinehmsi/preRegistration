<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifystuNum;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Specialized_course extends Authenticatable
{
	use Notifiable;

    protected $fillable = [
        'id','name', 'preReauisiteID1', 'preReauisiteName1', 'preReauisiteID2','preReauisiteName2' 
    ];    
}
