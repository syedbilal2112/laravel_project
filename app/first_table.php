<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class first_table extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'password','role'
    ];
    
}
