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
        ,'coursesID24','coursesID25','coursesID26','coursesID27','coursesID28','coursesID29', 
        'coursesName0','coursesName1','coursesName2','coursesName3','coursesName4','coursesName5',
        'coursesName6','coursesName7','coursesName8','coursesName9','coursesName10' ,'coursesName11'
        ,'coursesName12','coursesName13','coursesName14','coursesName15','coursesName16','coursesName17'
        ,'coursesName18','coursesName19','coursesName20','coursesName21','coursesName22','coursesName23'
        ,'coursesName24','coursesName25','coursesName26','coursesName27','coursesName28','coursesName29'
    ];
    
}
