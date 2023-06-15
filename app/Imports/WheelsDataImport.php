<?php

namespace App\Imports;

use App\Models\WheelsData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\DiscardedItems;

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
      if($row[0] == 'moto metal' ||  $row[0] == 'fuel' || $row[0] == 'dim' ||  $row[0] == 'gt offroad'
               || $row[0] == 'sentali barrel forged' || $row[0] == 'sentali forged' ||  $row[0] == 'sentali street' || $row[0] == 'xf offroad'){
         // Login for remove discarded sku from uploaded CSV
         $checkIfSkuExists = DiscardedItems::where('item_code', '=', $row[2])->where('category','wheels')->first();
         if(empty($checkIfSkuExists)){
           if(str_contains($row[1], 'XFX')){
             //
           } else {
             return new WheelsData([
                 'brand_name' => $row[0], 'model' => $row[1], 'sku_code' => $row[2],
                 'finish' => $row[3], 'size' => $row[5].'x'.$row[6], 'diameter' => $row[5],
                 'width' => $row[6], 'bolt_pattern' => $row[7], 'offset' => $row[8],
                 'backspace' => $row[9], 'bore' => $row[10], 'price' => $row[11],
                 'quantity' => $row[12], 'image1' => $row[13], 'image2' => $row[14],
                 'image3' => $row[15], 'image4' => $row[16], 'image5' => $row[17],
                 'image6' => $row[18],
             ]); 
           }
       }
      } else if($row[0] == 'Moto Metal'||$row[0] == 'DIM' || $row[0] == 'Fuel'
                || $row[0] == 'GT OFFROAD'|| $row[0] == 'Sentali Forged' || $row[0] == 'Sentali Barrel Forged'
                || $row[0] == 'Sentali Street'|| $row[0] == 'XF OFFROAD') {
          // Login for remove discarded sku from uploaded CSV
          $checkIfSkuExists = DiscardedItems::where('item_code', '=', $row[2])->where('category','wheels')->first();
          if(empty($checkIfSkuExists)){
            if(str_contains($row[1], 'XFX')){
              //
            } else {
              return new WheelsData([
                  'brand_name' => $row[0], 'model' => $row[1], 'sku_code' => $row[2],
                  'finish' => $row[3], 'size' => $row[5].'x'.$row[6], 'diameter' => $row[5],
                  'width' => $row[6], 'bolt_pattern' => $row[7], 'offset' => $row[8],
                  'backspace' => $row[9], 'bore' => $row[10], 'price' => $row[11],
                  'quantity' => $row[12], 'image1' => $row[13], 'image2' => $row[14],
                  'image3' => $row[15], 'image4' => $row[16], 'image5' => $row[17],
                  'image6' => $row[18],
              ]);
            }
        }
      }
    }
}
