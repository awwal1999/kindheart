<?php

namespace App;

use App\Scopes\PatientScope;
use Illuminate\Database\Eloquent\Model;

class Patient extends User
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new PatientScope);
    }

    public function cancer()
    {
        return $this->hasMany('App\Cancer');
    }
}
