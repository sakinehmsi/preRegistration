<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifystuNum;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'firstName','lastName', 'stuNum', 'password', 'confirmPassword', 
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'stuNum_verified_at' => 'datetime',
    ];
}
