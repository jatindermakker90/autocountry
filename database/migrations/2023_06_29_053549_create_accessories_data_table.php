<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories_data', function (Blueprint $table) {
            //$table->id();
            $table->string('brand_name')->nullable(true);
            $table->string('sku_code')->nullable(true);
            $table->string('model')->nullable(true);
            $table->string('size')->nullable(true);
            $table->integer('quantity')->nullable(true);
            $table->string('description')->nullable(true);
            $table->float('map',8,2)->nullable(true);
            $table->float('cost',8,2)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accessories_data');
    }
};
