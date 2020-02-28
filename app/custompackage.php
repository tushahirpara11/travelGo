<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class custompackage extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'place_visit',
        'name',
        'user_name',
        'hotels',
        'departure_date',
        'arrival_date',
        'adults',
        'child',
        'days',
        'nights',
        'mode_transport',
        'tour_price',
    ];
}
