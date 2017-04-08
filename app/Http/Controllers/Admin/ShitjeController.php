<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Requests\ShtijeCreateRequest;
use App\Shitje;
use App\ShitjeCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class ShitjeController extends Controller
{
    //
    public function index()
    {
        //
        $shitjet = Shitje::all();
        return view('admin.shitje.index', compact('shitjet'));
    }

    public function create()
    {
        //
        $shitje_cats = ShitjeCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('admin.shitje.create', compact('shitje_cats', 'countries'));
    }

    public function store(ShtijeCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $post = $user->shitje()->create($input);
        return redirect('admin/shitje/'. $post->id .'/edit');
    }

    public function edit($id)
    {
        //
        $shitje_cats = ShitjeCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $post = Shitje::findOrFail($id);
        return view('admin.shitje.edit', compact('post', 'shitje_cats', 'countries'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


        $input = $request->all();
        $post = Auth::user()->shitje()->whereId($id)->first();
        $post->update($input);
        return redirect('/admin/shitje');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Shitje::findOrFail($id);
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/shitje');
    }

    public function addPhoto($id, Request $request)
    {
        $shitje = Shitje::findOrFail($id);
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
