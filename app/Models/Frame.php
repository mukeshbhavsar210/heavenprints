<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    use HasFactory;
    protected $fillable = ['frame_id', 'photo', 'material', 'size', 'wrap', 'border', 'hardware', 'display_options', 'lamination', 'minor', 'major', 'notes', 'price'];
}
