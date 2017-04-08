<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Femra;
use App\FemraCat;
use App\Http\Requests\FemraCreateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class FemraController extends Controller
{
    //
    public function index()
    {
        //
        $femrat = Femra::all();
        return view('admin.femrat.index', compact('femrat'));
    }

    public function create()
    {
        //
        $femra_cats = FemraCat::pluck('name', 'id')->all();
        return view('admin.femrat.create', compact('femra_cats'));
    }

    public function store(FemraCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $post = $user->femrat()->create($input);
        return redirect('admin/femrat/'. $post->id .'/edit');
    }

    public function edit($id)
    {
        //
        $femra_cats = FemraCat::pluck('name', 'id')->all();
        $post = Femra::findOrFail($id);
        return view('admin.femrat.edit', compact('post', 'femra_cats'));
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
        $post = Auth::user()->femrat()->whereId($id)->first();
        $post->update($input);
        return redirect('/admin/femrat');
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
        $post = Femra::findOrFail($id);
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/femrat');
    }

    public function addPhoto($id, Request $request)
    {
        $femrat = Femra::findOrFail($id);
        $photos = $femrat->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/femraPhoto'))){
            mkdir(storage_path('app/public/femraPhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/femraPhoto/img300'))){
            mkdir(storage_path('app/public/femraPhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/femraPhoto/img550'))){
            mkdir(storage_path('app/public/femraPhoto/img550', 0777, true));
        }
        $path = '/femraPhoto';
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
