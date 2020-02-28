<?php

namespace App\Imports;

// use App\Package;
use App\addpackage;
use Maatwebsite\Excel\Concerns\ToModel;

class PackageImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new addpackage([             
            'city_id'    => $row[0],
            'curency' => $row[1],
            'displayamount' => $row[2],
            'tourcode' => $row[3],
            'validfrom' => $row[4],
            'validto' => $row[5],
            'packagetitle' => $row[6],
            'activitytype' => $row[7],
            'pkgimg1' => $row[8],
            'pkgimg2' => $row[9],
            'pkgimg3' => $row[10],
            'pkgimg4' => $row[11],
            'pkgimg5' => $row[12],
            'highlight' => $row[13],
            'itinerary' => $row[14],
            'inclusion' => $row[15],
            'exclusion' => $row[16],
            'cancellationplicy' => $row[17]
        ]);
    }
}
