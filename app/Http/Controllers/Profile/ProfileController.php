<?php

namespace App\Http\Controllers\Profile;

use App\Country;
use App\Gjinia;
use App\Photo;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class ProfileController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();

        return view('profile.index', compact('user'));

    }


    public function create($slug)
    {
        $user = User::where('slug', $slug)->first();
        $countries = Country::pluck('name', 'id')->all();
        $gjinia = Gjinia::pluck('name', 'id')->all();
        return view('profile.create', compact('countries', 'gjinia', 'user'));
    }

    public function store(Request $request, $slug)
    {
        $user  = User::where('slug', $slug)->first();

        $profile = $user->profile;


          $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->country_id = $request->country_id;
        $profile->gjinia_id = $request->gjinia_id;
        $profile->city_id = $request->city_id;
         $profile->arsimi = $request->arsimi;
         $profile->adresa = $request->adresa;
          $profile->email = $request->email;
                $profile->cel = $request->cel;
                $profile->save();



        return redirect($slug.'/profile');
    }

    public function show($slug, $id)
    {
        $user= User::where('slug', $slug)->first();
        $profile = $user->profile->whereId($id)->first();
        return view('profile.show',[$slug, $id], compact('profile'));
        
    }

    public function edit($slug, $id, Request $request)
    {
        $countries = Country::pluck('name', 'id')->all();
        $gjinia = Gjinia::pluck('name', 'id')->all();
        $user = User::where('slug', $slug)->first();
        $profile = $user->profile()->whereId($id)->first();

        return view('profile.edit',[$slug, $id], compact('profile', 'gjinia', 'countries'));


    }

    public function update(Request $request, $slug, $id)
    {
        $user= User::where('slug', $slug)->first();
        $profile = $user->profile()->whereId($id)->first();

        $input = $request->all();
        $profile->update($input);
        return redirect($slug.'/profile');
    }

    public function addPhoto($slug,$id, Request $request)
    {
        $user = User::where('slug', $slug)->first();
        $profile = $user->profile()->whereId($id)->first();

        if ($request->hasFile('avatar')){
            if (!is_null($profile->avatar)){
                File::delete(storage_path('app/public'). $profile->avatar);

            }
            $avatar = $request->file('avatar');
            $name = time(). $avatar->getClientOriginalName();
            if (!file_exists(storage_path('app/public/profile'))){
                mkdir(storage_path('app/public/profile', 0777, true));
            }

            if (!file_exists(storage_path('app/public/profile/img300'))){
                mkdir(storage_path('app/public/profile/img300', 0777, true));
            }

            $path = '/profile';
//            $avatar->move(storage_path('app/public').$path, $name);
            Image::make($avatar)->resize(300, 300)->save(storage_path('app/public')
                .$path.'/img300/'.$name);
                $profile->update([
                   'avatar' => $path . '/img300/' . $name,
                ]);
        }
        return back();

    }

}
