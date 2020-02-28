<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'username',
        'password'      
    ];
}
