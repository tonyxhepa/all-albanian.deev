<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Requests\LajmeCreateRequest;
use App\Lajme;
use App\LajmeCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class LajmeController extends Controller
{
    //
    public function index()
    {
        //
        $lajmet = Lajme::all();
        return view('admin.lajme.index', compact('lajmet'));
    }

    public function create()
    {
        //
        $lajmet_cats = LajmeCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('admin.lajme.create', compact('lajmet_cats', 'countries'));
    }

    public function store(LajmeCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $post = $user->lajme()->create($input);
        return redirect('admin/lajme/'. $post->id .'/edit');
    }

    public function edit($id)
    {
        $lajmet_cats = LajmeCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $post = Lajme::findOrFail($id);
        return view('admin.lajme.edit', compact('post', 'lajmet_cats', 'countries'));
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
        $post = Auth::user()->lajme()->whereId($id)->first();
        $post->update($input);
        return redirect('/admin/lajme')
            ->with('created_post', 'ok');
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
        $post = Lajme::findOrFail($id);
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/lajme');
    }

    public function addPhoto($id, Request $request)
    {
        $lajme = Lajme::findOrFail($id);
        $photos = $lajme->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/lajmePhoto'))){
            mkdir(storage_path('app/public/lajmePhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/lajmePhoto/img300'))){
            mkdir(storage_path('app/public/lajmePhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/lajmePhoto/img550'))){
            mkdir(storage_path('app/public/lajmePhoto/img550', 0777, true));
        }
        $path = '/lajmePhoto';
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
