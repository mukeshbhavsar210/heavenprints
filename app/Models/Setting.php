<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
    use HasFactory;

    protected $fillable = [
            'name', 'business_line', 'logo', 'phone', 'email', 'address', 'banners',    
            'primary_color', 'secondary_color', 'link_color', 'background_color', 'text_color', 'is_active', 
            'facebook', 'instagram', 'twitter', 'pinterest',];

    // Convert banners to an array automatically
    protected $casts = [
        'banners' => 'array',
    ];
}
