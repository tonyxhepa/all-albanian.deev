<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Profile extends Model
{

    protected $fillable =[
        'user_id',
        'gjinia_id',
        'country_id',
        'city_id',
        'arsimi',
        'adresa',
        'email',
        'cel',
        'avatar'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }
    public function delete()
    {
        // delete all related photos
        $this->photos()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()
        // delete the user
        return parent::delete();
    }

    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function gjinia() {
        return $this->belongsTo('App\Gjinia');
    }
}
