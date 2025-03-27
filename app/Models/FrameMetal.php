<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrameMetal extends Model {
    use HasFactory;

    protected $fillable = ['shape','size','custom_size_1','custom_size_2','price'];
}
