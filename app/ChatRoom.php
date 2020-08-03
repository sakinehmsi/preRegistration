<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ChatRoom extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'preRegistration_chatRoom';
    
    protected $fillable = [
        '_id','message_id','reply_message_id','sender','message', 'reply_message'
    ];
}
