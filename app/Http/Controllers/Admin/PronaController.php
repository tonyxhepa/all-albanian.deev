<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Requests\PronaCreateRequest;
use App\Prona;
use App\PronaCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class PronaController extends Controller
{
    //
    public function index()
    {
        //
        $pronat = Prona::all();
        return view('admin.prona.index', compact('pronat'));
    }

    public function create()
    {
        //
        $prona_cats = PronaCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('admin.prona.create', compact('prona_cats', 'countries'));
    }

    public function store(PronaCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $post = $user->prona()->create($input);
        return redirect('admin/prona/'. $post->id .'/edit');
    }

    public function edit($id)
    {
        //
        $prona_cats = PronaCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $post = Prona::findOrFail($id);
        return view('admin.prona.edit', compact('post', 'prona_cats', 'countries'));
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
        $post = Auth::user()->prona()->whereId($id)->first();
        $post->update($input);
        return redirect('/admin/prona');
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
        return redirect('/admin/prona');
    }

    public function addPhoto($id, Request $request)
    {
        $prona = Prona::findOrFail($id);
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
