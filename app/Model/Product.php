<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    protected $fillable = [
        'name',
        'brand',
        'supplier',
        'images',
        'quantity',
        'color',
        'size',
        'priceCore',
        'priceSale',
        'note',
        'cat_id',
    ];
}
