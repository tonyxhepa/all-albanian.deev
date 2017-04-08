<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Puna extends Model
{
    use Sluggable;
    //
    protected $fillable = [
        'profesioni_id',
        'orari_id',
        'country_id',
        'city_id',
        'title',
        'pershkrimi',
        'slug',
        'rroga',
        'email',
        'phone',
        'kompania',
        'price'

    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

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
    public function profesioni() {

    return $this->belongsTo('App\Profesioni');
}

    public function orari() {
        return $this->belongsTo('App\Orari');
    }


    public function country() {
        return $this->belongsTo('App\Country');
    }
}
