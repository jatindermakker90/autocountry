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
        Schema::create('tires_data', function (Blueprint $table) {
            //$table->id();
            $table->string('brand_name')->nullable(true);
            $table->string('model')->nullable(true);
            $table->string('sku_code')->nullable(true);
            $table->string('size')->nullable(true);
            $table->string('load_range')->nullable(true);
            $table->string('speed_rating')->nullable(true);
            $table->string('load_description')->nullable(true);
            $table->string('description')->nullable(true);
            $table->float('price',8,2)->nullable(true);
            $table->integer('quantity')->nullable(true);
            $table->string('season')->nullable(true);
            $table->string('winter_approved')->nullable(true);
            $table->string('studdable')->nullable(true);
            $table->string('image1')->nullable(true);
            $table->string('image2')->nullable(true);
            $table->string('image4')->nullable(true);
            $table->string('image3')->nullable(true);
            $table->string('image5')->nullable(true);
            $table->string('image6')->nullable(true);
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
        Schema::dropIfExists('tires_data');
    }
};
