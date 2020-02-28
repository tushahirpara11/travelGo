<?php

namespace App\Exports;
use App\addpackage;
// use App\Package;
use Maatwebsite\Excel\Concerns\FromCollection;

class PackageExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return addpackage::all();
    }
}
