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
        Schema::create('wheels_data', function (Blueprint $table) {
            //$table->id();
            $table->string('brand_name')->nullable(true);
            $table->string('model')->nullable(true);
            $table->string('sku_code')->nullable(true);
            $table->string('finish')->nullable(true);
            $table->string('size')->nullable(true);
            $table->integer('diameter')->nullable(true);
            $table->integer('width')->nullable(true);
            $table->string('bolt_pattern')->nullable(true);
            $table->integer('offset')->nullable(true);
            $table->float('backspace',8,2)->nullable(true);
            $table->float('bore',8,2)->nullable(true);
            $table->float('map',8,2)->nullable(true);
            $table->float('cost',8,2)->nullable(true);
            $table->integer('quantity')->nullable(true);
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
        Schema::dropIfExists('wheels_data');
    }
};
