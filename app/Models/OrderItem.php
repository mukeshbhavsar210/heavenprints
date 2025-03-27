<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
            'order_id', 
            'product_id', 
            'name', 
            'category', 
            'font', 
            'size', 
            'color', 
            'frame', 
            'image', 
            'border', 
            'major', 
            'wrap_wrap', 'hardware_style', 'hardware_display', 'lamination', 'retouching', 'hardware_finishing', 'proof', 
        'qty', 'price', 'total', 'shape', 'custom_size1', 'custom_size2',
    ];
}
