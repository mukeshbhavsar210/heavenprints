<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedSVG extends Model
{
    use HasFactory;
    protected $fillable = ['text', 'color', 'font', 'price', 'svg_path'];
}
