<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    protected $fillable = ['name', 'slug', 'sizes', 'colors'];

    protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
    ];
}
