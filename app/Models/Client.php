<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = ['name', 'lastname', 'contact'];

    public function comments()
    {
        return $this->hasMany(ClientComment::class, 'client_id', 'id');
    }
}
    