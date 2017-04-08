<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Requests\KuzhinaCreateRequest;
use App\Kuzhina;
use App\KuzhinaCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class KuzhinaController extends Controller
{
    //
    public function index()
    {
        //
        $kuzhina = Kuzhina::all();
        return view('admin.kuzhina.index', compact('kuzhina'));
    }

    public function create()
    {
        //
        $kuzhina_cats = KuzhinaCat::pluck('name', 'id')->all();
        return view('admin.kuzhina.create', compact('kuzhina_cats'));
    }

    public function store(KuzhinaCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $post = $user->kuzhina()->create($input);
        return redirect('admin/kuzhina/'. $post->id .'/edit');
    }

    public function edit($id)
    {
        //
        $kuzhina_cats = KuzhinaCat::pluck('name', 'id')->all();
        $post = Kuzhina::findOrFail($id);
        return view('admin.kuzhina.edit', compact('post', 'kuzhina_cats'));
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
        $post = Auth::user()->kuzhina()->whereId($id)->first();
        $post->update($input);
        return redirect('/admin/kuzhina');
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
        $post = Kuzhina::findOrFail($id);
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/kuzhina');
    }

    public function addPhoto($id, Request $request)
    {
        $kuzhina = Kuzhina::findOrFail($id);
        $photos = $kuzhina->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/kuzhinaPhoto'))){
            mkdir(storage_path('app/public/kuzhinaPhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/kuzhinaPhoto/img300'))){
            mkdir(storage_path('app/public/kuzhinaPhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/kuzhinaPhoto/img550'))){
            mkdir(storage_path('app/public/kuzhinaPhoto/img550', 0777, true));
        }
        $path = '/kuzhinaPhoto';
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
