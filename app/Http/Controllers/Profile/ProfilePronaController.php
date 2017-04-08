<?php

namespace App\Http\Controllers\Profile;

use App\Country;
use App\Http\Requests\PronaCreateRequest;
use App\Prona;
use App\PronaCat;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use File;

class ProfilePronaController extends Controller
{
    public function index($slug)
    {
        //
        $user  = User::where('slug', $slug)->first();
        $pronat = $user->prona->all();
        return view('profile.pronaime.index', compact('pronat'));
    }

    public function create()
    {
        //
        $prona_cats = PronaCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('profile.pronaime.create', compact('prona_cats', 'countries'));
    }

    public function store(PronaCreateRequest $request, $slug)
    {
        //
        $input = $request->all();
        $user  = User::where('slug', $slug)->first();
        $post = $user->prona()->create($input);
        return redirect($slug. '/profile/pronaime/'. $post->id .'/edit');
    }

    public function edit($slug, $id)
    {
        //
        $prona_cats = PronaCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $user = User::where('slug', $slug)->first();
        $post = $user->prona()->whereId($id)->first();
        return view('profile.pronaime.edit', compact('post','user', 'prona_cats', 'countries'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug,$id)
    {
        //


        $input = $request->all();
        $user = User::where('slug', $slug)->first();
        $post = $user->prona()->whereId($id)->first();
        $post->update($input);
        return redirect($slug.'/profile/pronaime');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug,$id)
    {
        //
        $post = Prona::findOrFail($id);
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect($slug.'/profile/pronaime');
    }

    public function addPhoto($slug, $id, Request $request)
    {
        $user = User::where('slug', $slug)->first();
        $prona = $user->prona()->whereId($id)->first();
        $photos = $prona->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/pronaPhoto'))){
            mkdir(storage_path('app/public/pronaPhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/pronaPhoto/img300'))){
            mkdir(storage_path('app/public/pronaPhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/pronaPhoto/img550'))){
            mkdir(storage_path('app/public/pronaPhoto/img550', 0777, true));
        }
        $path = '/pronaPhoto';
        $file->move(storage_path('app/public').$path, $name);
        $threzerozero = Image::make(storage_path('app/public')
            .$path . '/'.$name)->fit(300, 215)->save(storage_path('app/public')
            .$path.'/img300/'.$name);
        $fivefivezero = Image::make(storage_path('app/public')
            .$path . '/'.$name)->fit(550, 330)->save(storage_path('app/public')
            .$path.'/img550/'.$name);

        $photos->create([
            'threezerozero' => "$path/img300/{$name}",
            'fivefivezero' => "$path/img550/{$name}",
            'thumbnail' => "$path/{$name}",
        ]);


    }
}
