<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function getBooks()
    {
        return $this->hasMany(Book::class);
    }

    public function rate()
    {
        return $this->hasManyThrough(Retings::class, Book::class);
    }
}
