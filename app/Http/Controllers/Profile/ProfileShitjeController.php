<?php

namespace App\Http\Controllers\Profile;

use App\Country;
use App\Http\Requests\ShtijeCreateRequest;
use App\Shitje;
use App\ShitjeCat;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use File;

class ProfileShitjeController extends Controller
{
    public function index($slug)
    {
        //
        $user = User::where('slug', $slug)->first();
        $shitjet = $user->shitje->all();
        return view('profile.shjitjetemia.index', compact('shitjet'));
    }

    public function create()
    {
        //
        $shitje_cats = ShitjeCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('profile.shjitjetemia.create', compact('shitje_cats', 'countries'));
    }

    public function store(ShtijeCreateRequest $request, $slug)
    {
        //
        $user = User::where('slug', $slug)->first();
        $input = $request->all();
        $post = $user->shitje()->create($input);
        return redirect($slug. '/profile/shitjetemia/'. $post->id .'/edit');
    }

    public function edit($slug,$id)
    {
        //
        $user = User::where('slug', $slug)->first();
        $shitje_cats = ShitjeCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $post = $user->shitje()->whereId($id)->first();
        return view('profile.shjitjetemia.edit', compact('post','user', 'shitje_cats', 'countries'));
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
        $post = $user->shitje()->whereId($id)->first();
        $post->update($input);
        return redirect($slug. '/profile/shitjetemia');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug, $id)
    {
        //
        $user = User::where('slug', $slug)->first();
        $post = $user->shitje()->whereId($id)->first();
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect($slug. '/profile/shitjetemia');
    }

    public function addPhoto($slug, $id, Request $request)
    {
        $user = User::where('slug', $slug)->first();
        $shitje = $user->shitje()->whereId($id)->first();
        $photos = $shitje->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/shitjePhoto'))){
            mkdir(storage_path('app/public/shitjePhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/shitjePhoto/img300'))){
            mkdir(storage_path('app/public/shitjePhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/shitjePhoto/img550'))){
            mkdir(storage_path('app/public/shitjePhoto/img550', 0777, true));
        }
        $path = '/shitjePhoto';
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
