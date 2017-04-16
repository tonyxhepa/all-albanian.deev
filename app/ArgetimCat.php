<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArgetimCat extends Model
{
    protected $fillable = ['name'];

    public function argetims()
    {
        $this->hasMany('App\Argetim');
    }
}
