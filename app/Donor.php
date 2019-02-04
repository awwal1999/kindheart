<?php

namespace App;

use App\Scopes\DonorScope;
use Illuminate\Database\Eloquent\Model;

class Donor extends User
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new DonorScope);
    }

    public function funds()
    {
        return $this->hasMany('App\Fund');
    }
}
