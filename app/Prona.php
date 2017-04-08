<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Prona extends Model
{
    use Sluggable;
    //
    protected $fillable = [
        'prona_cats_id',
        'country_id',
        'city_id',
        'title',
        'lloji',
        'pershkrimi',
        'slug',
        'email',
        'phone',
        'rruga',
        'sip',
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
    public function prona_cats() {
        return $this->belongsTo('App\PronaCat');
    }


    public function country() {
        return $this->belongsTo('App\Country');
    }
}
