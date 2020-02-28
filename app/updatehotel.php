<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class updatehotel extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'package_id',
        'hm_starcategory',
        'hm_name',
        'city_id',
        'hm_noofnights',
        'hm_address'
    ];
}
