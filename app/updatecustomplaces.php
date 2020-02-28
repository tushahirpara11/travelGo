<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class updatecustomplaces extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'city_id',
        'place_name',
        'place_timing_details',
        'place_Image1',
        'place_Image2',
        'hidden_place_Image1',
        'hidden_place_Image2',
        'place_price'
    ];
}
