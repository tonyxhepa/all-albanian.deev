<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Makina extends Model
{
    use Sluggable;
    //
    protected $fillable = [
        'user_id',
        'car_make_id',
        'car_model_id',
        'country_id',
        'city_id',
        'title',
        'pershkrimi',
        'slug',
        'email',
        'phone',
        'viti',
        'karburanti',
        'kamio',
        'dogana',
        'ngjyra',
        'km',
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
    public function car_make() {
        return $this->belongsTo('App\CarMake');
    }


    public function country() {
        return $this->belongsTo('App\Country');
    }
}

