<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'phone_id'
    ];

    public function getPhone()
    {
        return $this->belongsTo(Phone::class, 'phone_id');
    }

}
