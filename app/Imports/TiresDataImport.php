<?php

namespace App\Imports;

use App\Models\TiresData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\DiscardedItems;

class TiresDataImport implements ToModel,WithStartRow
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
      if($row[0] == 'greentrac' ||  $row[0] == 'haida' || $row[0] == 'lionhart'
         ||  $row[0] == 'venom' || $row[0] == 'versa'){
           // Login for remove discarded sku from uploaded CSV
           $checkIfSkuExists = DiscardedItems::where('item_code', '=', $row[2])->where('category','tires')->first();
           if(empty($checkIfSkuExists)){
             if(str_contains($row[1], '868')){
               //
             } else {
               return new TiresData([
                   'brand_name' => $row[0], 'model' => $row[1], 'sku_code' => $row[2],
                   'size' => $row[3], 'load_range' => $row[4], 'speed_rating' => $row[5],
                   'load_description' => $row[6], 'description' => $row[7], 'price' => $row[8],
                   'quantity' => $row[9], 'season' => $row[10], 'winter_approved' => $row[11],
                   'studdable' => $row[12], 'image1' => $row[13], 'image2' => $row[14],
                   'image3' => $row[15], 'image4' => $row[16], 'image5' => $row[17],
                   'image6' => $row[18],
               ]);
             }
          }
      } else if($row[0] == 'GREENTRAC'||$row[0] == 'HAIDA' || $row[0] == 'LIONHART'
                || $row[0] == 'VENOM'|| $row[0] == 'VERSA') {
          // Login for remove discarded sku from uploaded CSV
          $checkIfSkuExists = DiscardedItems::where('item_code', '=', $row[2])->where('category','tires')->first();
          if(empty($checkIfSkuExists)){
            if(str_contains($row[1], '868')){
              //
            } else {
              return new TiresData([
                  'brand_name' => $row[0], 'model' => $row[1], 'sku_code' => $row[2],
                  'size' => $row[3], 'load_range' => $row[4], 'speed_rating' => $row[5],
                  'load_description' => $row[6], 'description' => $row[7], 'price' => $row[8],
                  'quantity' => $row[9], 'season' => $row[10], 'winter_approved' => $row[11],
                  'studdable' => $row[12], 'image1' => $row[13], 'image2' => $row[14],
                  'image3' => $row[15], 'image4' => $row[16], 'image5' => $row[17],
                  'image6' => $row[18],
              ]);
            }
          }
      }
    }
}
