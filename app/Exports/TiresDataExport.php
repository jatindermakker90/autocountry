<?php

namespace App\Exports;

use App\Models\TiresData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TiresDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TiresData::all();
    }

    // Added Custom Columns For CSV
    public function headings(): array
    {
        return [
          "Brand","Model","SKU","Size",
          "Load Range","Speed Rating","Load Description","Description","Price",
          "Quantity","Season","Winter Approved","Studdable","Image 1","Image 2",
          "Image 3","Image 4","Image 5","Image 6"
        ];
    }
}
