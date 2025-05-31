<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;


class Payments extends Eloquent
{
    /** @use HasFactory<\Database\Factories\PaymentsFactory> */
    protected $connection = 'mongodb';
    protected $collection = 'payments';

    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'status',
        'created_at',
        'updated_at'
    ];
}
