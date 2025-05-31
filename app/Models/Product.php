<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;



class Product extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $casts = [
        'price' => 'float',
        'qty' => 'integer',

    ];

    protected $fillable = ['product_name', 'description', 'price', 'types', 'availability', 'qty', 'brand', 'watch_color', 'img_url', 'category'];
}
