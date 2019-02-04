<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referrer extends Model
{
    protected $fillable = ['name','email','phone', 'potential_patients_id'];
}
