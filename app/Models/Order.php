<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
                    'order_id', 
                    'user_id', 
                    'product_id',
                    'country_id',
                    'subtotal', 
                    'shipping', 
                    'coupon_code', 
                    'coupon_code_id', 
                    'discount', 
                    'grandtotal', 
                    'shipped_date', 
                    'qty', 
                    'price', 
                    'status', 
                    ];

    public function items(){
        return $this->hasMany(OrderItem::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class, 'order_id');
    }

    public function customerAddress(){
        return $this->hasOne(CustomerAddress::class, 'user_id', 'user_id');
    }

    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function userEmail() {
        return $this->belongsTo(User::class, 'user_id');
    }    

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    } 

    protected $casts = [
        'address' => 'array',  
    ];
}
