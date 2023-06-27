<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WheelsData extends Model
{
    use HasFactory;

    protected $table = 'wheels_data';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_name', 'sku_code', 'finish', 'model', 'size', 'diameter',
        'width', 'bolt_pattern', 'offset', 'backspace', 'bore', 'map','cost',
        'quantity', 'image1', 'image2', 'image3', 'image4', 'image5', 'image6'
    ];
}
