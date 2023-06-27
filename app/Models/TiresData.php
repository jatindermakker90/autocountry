<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiresData extends Model
{
    use HasFactory;

    protected $table = 'tires_data';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_name', 'model', 'sku_code', 'size', 'load_range', 'speed_rating',
        'load_description', 'description', 'map','cost','quantity', 'season',
        'winter_approved', 'studdable', 'image1', 'image2',
        'image3', 'image4', 'image5', 'image6'
    ];
}
