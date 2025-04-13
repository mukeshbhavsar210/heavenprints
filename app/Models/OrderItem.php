<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function product_success() {
        return $this->belongsTo(Product::class);
    }

    protected $fillable = [
            'order_id', 
            'product_id', 
            'name', 
            'category', 
            'font', 
            'size', 
            'color', 
            'selected_product', 
            'selected_product_name', 
            'frame',             
            'image', 
            'border', 
            'major', 
            'wrap_wrap', 
            'hardware_style', 
            'hardware_display', 
            'lamination', 
            'retouching', 
            'hardware_finishing', 
            'proof', 
            'qty', 
            'price', 
            'total'
    ];
}
