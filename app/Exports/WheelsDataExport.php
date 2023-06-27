<?php

namespace App\Exports;

use App\Models\WheelsData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WheelsDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return WheelsData::all();
    }
    // Added Custom Columns For CSV
    public function headings(): array
    {
        return [
          "Brand","Model","SKU","Finish","Size",
          "Diameter","Width","Bolt Pattern","Offset","Backspace",
          "Bore","map","cost","Quantity","Image 1","Image 2",
          "Image 3","Image 4","Image 5","Image 6"
        ];
    }
}
