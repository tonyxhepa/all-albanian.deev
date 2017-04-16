<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = ['name'];

    public function sport()
    {
        return $this->hasMany('App\Sport');
    }

    public function superliga()
    {
        $this->where('name', '=', 'superliga')->first();

        return $this;
    }
}
