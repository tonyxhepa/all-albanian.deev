<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Requests\TechCreateRequest;
use App\Tech;
use App\TechCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class TechController extends Controller
{
    //
    public function index()
    {
        //
        $techs = Tech::all();
        return view('admin.tech.index', compact('techs'));
    }

    public function create()
    {
        //
        $tech_cats = TechCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('admin.tech.create', compact('tech_cats', 'countries'));
    }

    public function store(TechCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $post = $user->tech()->create($input);
        return redirect('admin/tech/'. $post->id .'/edit');
    }

    public function edit($id)
    {
        //
        $tech_cats = TechCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $post = Tech::findOrFail($id);
        return view('admin.tech.edit', compact('post', 'tech_cats', 'countries'));
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
        $post = Auth::user()->tech()->whereId($id)->first();
        $post->update($input);
        return redirect('/admin/tech');
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
        $post = Tech::findOrFail($id);
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/tech');
    }

    public function addPhoto($id, Request $request)
    {
        $tech = Tech::findOrFail($id);
        $photos = $tech->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/techPhoto'))){
            mkdir(storage_path('app/public/techPhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/techPhoto/img300'))){
            mkdir(storage_path('app/public/techPhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/techPhoto/img550'))){
            mkdir(storage_path('app/public/techPhoto/img550', 0777, true));
        }
        $path = '/techPhoto';
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
