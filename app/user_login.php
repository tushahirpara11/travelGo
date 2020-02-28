<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_login extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'fname',
        'lname',
        'mobileno',
        'email',
        'username',
        'password',
        'isactive'
    ];
}
