<?php

namespace App\Http\Controllers\Profile;

use App\Country;
use App\Http\Requests\PunaCreateRequest;
use App\Orari;
use App\Profesioni;
use App\PunaCat;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use File;

class ProfilePunaController extends Controller
{
    public function index($slug)
    {
        //
        $user = User::where('slug', $slug)->first();
        $puna = $user->puna->all();
        return view('profile.punaime.index', compact('puna'));
    }

    public function create()
    {
        //
        $profesioni = Profesioni::pluck('name', 'id')->all();
        $orari = Orari::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('profile.punaime.create', compact('profesioni', 'orari', 'countries'));
    }

    public function store(PunaCreateRequest $request, $slug)
    {
        //
        $input = $request->all();
        $user  = User::where('slug', $slug)->first();
        $post = $user->puna()->create($input);
        return redirect($slug. '/profile/punaime/' . $post->id . '/edit');
    }

    public function edit($slug,$id)
    {
        //
        $profesioni = Profesioni::pluck('name', 'id')->all();
        $orari = Orari::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $user  = User::where('slug', $slug)->first();
        $post = $user->puna()->whereId($id)->first();
        return view('profile.punaime.edit', compact('post','user', 'profesioni','orari', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug ,$id)
    {
        //


        $input = $request->all();
        $user  = User::where('slug', $slug)->first();
        $post = $user->puna()->whereId($id)->first();
        $post->update($input);
        return redirect($slug. '/profile/punaime');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug, $id)
    {
        //
        $user  = User::where('slug', $slug)->first();
        $post = $user->puna()->whereId($id)->first();
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public') . $photo->threezerozero);
            File::delete(storage_path('app/public') . $photo->fivefivezero);
            File::delete(storage_path('app/public') . $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect($slug. '/profile/punaime');
    }

    public function addPhoto($slug, $id, Request $request)
    {
        $user  = User::where('slug', $slug)->first();
        $puna = $user->puna()->whereId($id)->first();
        $photos = $puna->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/punaPhoto'))) {
            mkdir(storage_path('app/public/punaPhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/punaPhoto/img300'))) {
            mkdir(storage_path('app/public/punaPhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/punaPhoto/img550'))) {
            mkdir(storage_path('app/public/punaPhoto/img550', 0777, true));
        }
        $path = '/punaPhoto';
        $file->move(storage_path('app/public') . $path, $name);
        $threzerozero = Image::make(storage_path('app/public')
            . $path . '/' . $name)->fit(300, 215)->save(storage_path('app/public')
            . $path . '/img300/' . $name);
        $fivefivezero = Image::make(storage_path('app/public')
            . $path . '/' . $name)->fit(550, 330)->save(storage_path('app/public')
            . $path . '/img550/' . $name);

        $photos->create([
            'threezerozero' => "$path/img300/{$name}",
            'fivefivezero' => "$path/img550/{$name}",
            'thumbnail' => "$path/{$name}",
        ]);

    }
}
