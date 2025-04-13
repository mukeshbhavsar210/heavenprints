<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }    

    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function images_order(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    protected $fillable = ['name', 'slug', 'sizes', 'colors'];

    protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
    ];
}
