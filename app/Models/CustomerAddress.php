<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id','country_id', 'address', 'apartment', 'city', 'zip', 'notes', 'type' ];

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
