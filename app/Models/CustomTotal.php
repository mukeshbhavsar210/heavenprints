<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomTotal extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'name', 'size', 'shape', 'total', 'product_id' ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
    
}
