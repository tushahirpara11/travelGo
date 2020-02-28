<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customplaces extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'city_id',
        'place_name',
        'place_timing_details',
        'place_Image1',
        'place_Image2',
        'place_price'
    ];
}
