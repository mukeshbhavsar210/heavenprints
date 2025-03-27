<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'razorpay_payment_id',
        'razorpay_order_id',
        'amount',
        'status',
        'currency',
        'payment_data',
        'payment_id',
        'name',
        'category',
        'photo',
        'color',
        'qty',
    ];    

    protected $casts = [
        'payment_data' => 'array', // Convert JSON column to array
    ];
}
