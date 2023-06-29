<?php

namespace App\Imports;

use App\Models\AccessoriesData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\DiscardedItems;

class AccessoriesDataImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        return new AccessoriesData([
          'brand_name' => $row[0] , 'sku_code' => $row[1] , 'model' => $row[2],
          'size' => $row[3], 'quantity' => $row[4], 'description' => $row[5],
          'map' => $row[6], 'cost' => $row[7],
        ]);
    }
}
