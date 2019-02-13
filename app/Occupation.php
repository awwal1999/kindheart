<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $fillable = [
        'user_id','occupation', 'place_of_employment', 'position', 'address'
    ];
}
