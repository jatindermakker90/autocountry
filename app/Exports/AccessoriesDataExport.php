<?php

namespace App\Exports;

use App\Models\AccessoriesData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccessoriesDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AccessoriesData::all();
    }
    // Added Custom Columns For CSV
    public function headings(): array
    {
        return [
          'brand_name', 'sku_code', 'model', 'size',
          'quantity', 'description', 'map', 'cost'
        ];
    }
}
