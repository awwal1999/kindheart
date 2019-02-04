<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PotentialPatient extends Model
{
    protected $fillable = ['name', 'email', 'phone'];
}
