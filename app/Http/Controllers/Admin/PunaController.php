<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Requests\PunaCreateRequest;
use App\Puna;
use App\PunaCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class PunaController extends Controller
{
    //
    public function index()
    {
        //
        $puna = Puna::all();
        return view('admin.puna.index', compact('puna'));
    }

    public function create()
    {
        //
        $puna_cats = PunaCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('admin.puna.create', compact('puna_cats', 'countries'));
    }

    public function store(PunaCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $post = $user->puna()->create($input);
        return redirect('admin/puna/'. $post->id .'/edit');
    }

    public function edit($id)
    {
        //
        $puna_cats = PunaCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $post = Puna::findOrFail($id);
        return view('admin.puna.edit', compact('post', 'puna_cats', 'countries'));
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
        $post = Auth::user()->puna()->whereId($id)->first();
        $post->update($input);
        return redirect('/admin/puna');
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
        $post = Puna::findOrFail($id);
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/puna');
    }

    public function addPhoto($id, Request $request)
    {
        $puna = Puna::findOrFail($id);
        $photos = $puna->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/punaPhoto'))){
            mkdir(storage_path('app/public/punaPhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/punaPhoto/img300'))){
            mkdir(storage_path('app/public/punaPhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/punaPhoto/img550'))){
            mkdir(storage_path('app/public/punaPhoto/img550', 0777, true));
        }
        $path = '/punaPhoto';
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
