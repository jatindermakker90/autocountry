<?php

namespace App\Imports;

use App\Models\WheelsData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class WheelsDataImport implements ToModel,WithStartRow
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
      if($row[0] == 'moto metal' || $row[0] == 'Moto Metal'
         || $row[0] == 'fuel' || $row[0] == 'Fuel'){
        return new WheelsData([
            'brand_name' => $row[0], 'model' => $row[1], 'sku_code' => $row[2],
            'finish' => $row[3], 'size' => $row[4], 'diameter' => $row[5],
            'width' => $row[6], 'bolt_pattern' => $row[7], 'offset' => $row[8],
            'backspace' => $row[9], 'bore' => $row[10], 'price' => $row[11],
            'quantity' => $row[12], 'image1' => $row[13], 'image2' => $row[14],
            'image3' => $row[15], 'image4' => $row[16], 'image5' => $row[17],
            'image6' => $row[18],
        ]);
      }
    }
}