<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
                    'user_id',
                    'subtotal', 
                    'shipping', 
                    'coupon_code', 
                    'coupon_code_id', 
                    'discount', 
                    'grandtotal', 
                    'payment_status', 'status', 'shipped_date', 'first_name', 'last_name', 'mobile', 'email', 
                            'country_id', 'address', 'apartment', 'city', 'state', 'zip', 'notes', 'payment_mode' ];

    public function items(){
        return $this->hasMany(OrderItem::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class, 'order_id');
    }

    public function customerAddress(){
        return $this->hasOne(CustomerAddress::class, 'user_id', 'user_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected $casts = [
        'address' => 'array',  
    ];
}
