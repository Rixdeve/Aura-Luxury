<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;


class Orders extends Eloquent
{
    /** @use HasFactory<\Database\Factories\OrdersFactory> */
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'orders';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'shipping_address',
        'city',
        'zip',
        'payment_method',
        'total_amount',
        'status',
        'items',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'items' => 'array',
    ];
}
