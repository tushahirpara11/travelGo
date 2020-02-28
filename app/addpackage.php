<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addpackage extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'packagetitle',
        'activitytype',
        'city_id',
        'curency',
        'displayamount',
        'tourcode',
        'validfrom',
        'validto',
        'pkgimg1',
        'pkgimg2',
        'pkgimg3',
        'pkgimg4',
        'pkgimg5',
        'highlight',
        'itinerary',
        'inclusion',
        'exclusion',
        'cancellationplicy'
    ];
}
