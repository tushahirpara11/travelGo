<?php

namespace App\Exports;
use App\addhotel;
// use App\Package;
use Maatwebsite\Excel\Concerns\FromCollection;

class HotelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return addhotel::all();
    }
}
