<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleProduct extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['name', 'images', 'sizes', 'colors'];

    // Convert JSON fields to arrays automatically
    protected $casts = [
        'images' => 'array',
        'sizes' => 'array',
        'colors' => 'array',
    ];
}
