<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $fillable = [
        'user_id', 'phone', 'address', 'profession', 'volunteerArea', 'whyVolunteer', 'goal', 'facebook', 'instagram', 'twitter', 'heard', 'enjoyedMost', 'enjoyedLeast', 'language', 'channel'
    ];
}
