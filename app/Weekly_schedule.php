<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifystuNum;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class weekly_schedule extends Authenticatable
{
    protected $fillable = [
        'id','coursesID0','coursesID1','coursesID2','coursesID3','coursesID4','coursesID5',
        'coursesID6','coursesID7','coursesID8','coursesID9','coursesID10' ,'coursesID11'
        ,'coursesID12','coursesID13','coursesID14','coursesID15','coursesID16','coursesID17'
        ,'coursesID18','coursesID19','coursesID20','coursesID21','coursesID22','coursesID23'
    ];
    
}
