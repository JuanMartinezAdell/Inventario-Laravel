<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['city', 'name', 'address', 'number'];


    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
