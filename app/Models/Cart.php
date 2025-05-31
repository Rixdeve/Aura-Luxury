<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;


class Cart extends Eloquent
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'carts';
    protected $fillable = ['user_id', 'created_at', 'updated_at'];


    public function cartItems()
    {
        return $this->hasMany(Cart_items::class, 'cart_id', '_id');
    }
}
