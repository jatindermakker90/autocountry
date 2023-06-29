<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoriesData extends Model
{
    use HasFactory;

    protected $table = 'accessories_data';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_name', 'sku_code', 'model', 'size',
        'quantity', 'description', 'map', 'cost'
    ];
}
