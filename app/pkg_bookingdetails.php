<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pkg_bookingdetails extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'user_name',
        'package_id',
        'tourname',
        'tourcode',
        'traveldate',
        'adult',
        'child',
        'price',
        'currency',
        'status'
    ];
}
