<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name'];

    // public function getFullNameAttribute()
    // {
    //     return $this->first_name . " " . $this->last_name;
    // }
//================================================================//
   //======   set up here first ========== then controller ====== then router ===== then view ====

                     //{first_name} is column name or 'studly' cased name from database we want to alter before its save to the database
    public function setFirstNameAttribute($value)               //defining mutator or setter
    {                     //column name in the table
        $this->attributes['first_name'] = strtolower($value);   //allows us to alter data before it's save to a database
    }
   
    
    public function getFirstNameAttribute($value)               //defining accessor or getter
    {
        return strtoupper($value);                              // getters allows us to alter data after its fetched from database
                                      
    }
    //OR

    // public function getFirstNameAttribute($name)
    // {
    //     return 'my name is::' . ucfirst($name);
    // }


    public function getLastNameAttribute($lastname)           
    {
        return 'My lastname is:' .lcfirst($lastname);
    }

    // IMPORTANT NOTE!!!!!!!!!!!
    // you must have records in database in order to do this otherwise you have to make a crud from adding to storing
}

