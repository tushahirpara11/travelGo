<?php

namespace App\Imports;

// use App\Package;
use App\addhotel;
use Maatwebsite\Excel\Concerns\ToModel;

class HotelImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new addhotel([
            'city_id'    => $row[0],
            'package_id' => $row[1],
            'hm_name' => $row[2],
            'hm_address' => $row[3],
            'hm_starcategory' => $row[4],
            'hm_noofnights' => $row[5],
        ]);
    }
}
