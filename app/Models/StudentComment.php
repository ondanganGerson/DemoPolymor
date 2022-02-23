<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentComment extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'comment'];

    public function post() //name whatever you want pre!
    {
        return $this->belongsto(Classs::class);
    }
}
