<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class updatecustomhotel extends Model
{
    public $timestamps = false;    
    protected $fillable = [
        'hotel_id',
        'city_id',
        'hotel_name',
        'hotel_address',
        'hotel_starCategory',
        'hotel_Image1',
        'hotel_Image2',
        'hotel_Image3',
        'hidden_hotel_Image1',
        'hidden_hotel_Image2',
        'hidden_hotel_Image3',
        'hotel_price'
    ];
}
