<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'description', 'model', 'maker', 'image', 'location_id', 'stock', 'condition'];

    public function category()
    {
        return $this->belongsTo(Location::class);
    }
}
