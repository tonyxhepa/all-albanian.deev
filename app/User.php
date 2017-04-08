<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function makina()
    {
        return $this->hasMany('App\Makina');

    }

    public function argetim()
    {
        return $this->hasMany('App\Argetim');

    }

    public function elektronik()
    {
        return $this->hasMany('App\Elektronik');

    }

    public function femrat()
    {
        return $this->hasMany('App\Femra');

    }

    public function kuzhina()
    {
        return $this->hasMany('App\Kuzhina');

    }

    public function lajme()
    {
        return $this->hasMany('App\Lajme');

    }

    public function magazina()
    {
        return $this->hasMany('App\Magazina');

    }

    public function prona()
    {
        return $this->hasMany('App\Prona');

    }

    public function puna()
    {
        return $this->hasMany('App\Puna');

    }

    public function shitje()
    {
        return $this->hasMany('App\Shitje');

    }

    public function sport()
    {
        return $this->hasMany('App\Sport');

    }

    public function tech()
    {
        return $this->hasMany('App\Tech');

    }


    public function isAdmin() {
        if($this->role->name == "administrator" && $this->verified == 1) {
            return true;
        }
        return false;
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
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

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

}
