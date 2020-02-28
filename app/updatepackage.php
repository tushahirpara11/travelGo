<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class updatepackage extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id',
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
        'hiddenimg1',
        'hiddenimg2',
        'hiddenimg3',
        'hiddenimg4',
        'hiddenimg5',
        'highlight',
        'itinerary',
        'inclusion',
        'exclusion',
        'cancellationpolicy'
    ];
}
