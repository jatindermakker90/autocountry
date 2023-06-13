<?php

namespace App\Exports;

use App\Models\WheelsData;
use Maatwebsite\Excel\Concerns\FromCollection;

class WheelsDataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return WheelsData::all();
    }
}
