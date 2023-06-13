<?php

namespace Database\Seeders;

use App\Models\DiscardSKUSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DiscardSKUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->turncateTables();
        $sku = [
        	[
        		'item_code' => '',
        		'category' => ''
        	],
        	
        ];        
    }
}
