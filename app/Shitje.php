<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Shitje extends Model
{
    use Sluggable;
    //
    protected $fillable = [
        'shitje_cats_id',
        'country_id',
        'city_id',
        'title',
        'pershkrimi',
        'slug',
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
    public function shitje_cats() {
        return $this->belongsTo('App\ShitjeCat');
    }


    public function country() {
        return $this->belongsTo('App\Country');
    }
}
