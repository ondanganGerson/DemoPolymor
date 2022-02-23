<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classs extends Model
{
    use HasFactory;

    protected $fillable = ['name','lastname', 'address'];

    public function comments() //you can name whatever you want yeah!
    {
        return $this->hasMany(StudentComment::class);
    }



}
