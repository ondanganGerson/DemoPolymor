<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retings extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'book_id'
    ];

    public function getBook()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
