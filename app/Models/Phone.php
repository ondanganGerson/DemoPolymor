<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'price'
    ];
    
    public function getRatings()
    {
        return $this->hasMany(Rating::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}

