<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Elektronik;
use App\ElektronikCat;
use App\Http\Requests\ElektronikCreateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class ElektroniksController extends Controller
{
    //
    public function index()
    {
        //
        $elektronik = Elektronik::all();
        return view('admin.elektronik.index', compact('elektronik'));
    }

    public function create()
    {
        //
        $elektronik_cats = ElektronikCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('admin.elektronik.create', compact('elektronik_cats', 'countries'));
    }

    public function store(ElektronikCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $post = $user->elektronik()->create($input);
        return redirect('admin/elektronik/'. $post->id .'/edit');
    }

    public function edit($id)
    {
        //
        $elektronik_cats = ElektronikCat::pluck('name', 'id')->all();
        $post = Elektronik::findOrFail($id);

        $countries = Country::pluck('name', 'id')->all();
        return view('admin.elektronik.edit', compact('post', 'countries', 'elektronik_cats'));
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
        $post = Auth::user()->elektronik()->whereId($id)->first();
        $post->update($input);
        return redirect('/admin/elektronik');
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
        $post = Elektronik::findOrFail($id);
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/elektronik');
    }

    public function addPhoto($id, Request $request)
    {
        $elektronik = Elektronik::findOrFail($id);
        $photos = $elektronik->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/elektronikPhoto'))){
            mkdir(storage_path('app/public/elektronikPhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/elektronikPhoto/img300'))){
            mkdir(storage_path('app/public/elektronikPhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/elektronikPhoto/img550'))){
            mkdir(storage_path('app/public/elektronikPhoto/img550', 0777, true));
        }
        $path = '/elektronikPhoto';
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
