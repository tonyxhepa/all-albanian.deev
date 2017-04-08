<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Requests\MagazinaCreateRequest;
use App\Magazina;
use App\MagazinaCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class MagazinaController extends Controller
{
    //
    public function index()
    {
        //
        $magazinat = Magazina::all();
        return view('admin.magazina.index', compact('magazinat'));
    }

    public function create()
    {
        //
        $magazina_cats = MagazinaCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('admin.magazina.create', compact('magazina_cats', 'countries'));
    }

    public function store(MagazinaCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $post = $user->magazina()->create($input);
        return redirect('admin/magazina/'. $post->id .'/edit');
    }

    public function edit($id)
    {
        //
        $magazina_cats = MagazinaCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $post = Magazina::findOrFail($id);
        return view('admin.magazina.edit', compact('post', 'magazina_cats', 'countries'));
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
        $post = Auth::user()->magazina()->whereId($id)->first();
        $post->update($input);
        return redirect('/admin/magazina');
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
        $post = Magazina::findOrFail($id);
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/magazina');
    }

    public function addPhoto($id, Request $request)
    {
        $magazina = Magazina::findOrFail($id);
        $photos = $magazina->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/magazinaPhoto'))){
            mkdir(storage_path('app/public/magazinaPhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/magazinaPhoto/img300'))){
            mkdir(storage_path('app/public/magazinaPhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/magazinaPhoto/img550'))){
            mkdir(storage_path('app/public/magazinaPhoto/img550', 0777, true));
        }
        $path = '/magazinaPhoto';
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
