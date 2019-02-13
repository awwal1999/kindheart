<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancer extends Model
{
    protected $fillable = [
        'user_id', 'type', 'stage', 'hospital', 'hconsultant', 'hconsultant_phone', 'liaison_officer', 'liaison_officer_phone'
    ];

}
