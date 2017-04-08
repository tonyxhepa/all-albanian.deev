<?php

namespace App\Http\Controllers\Admin;

use App\Argetim;
use App\ArgetimCat;
use App\Country;
use App\Http\Requests\ArgetimCreateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class ArgetimController extends Controller
{
    //
    public function index()
    {
        //
        $argetims = Argetim::all();
        return view('admin.argetim.index', compact('argetims'));
    }

    public function create()
    {
        //
        $argetim_cats = ArgetimCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('admin.argetim.create', compact('argetim_cats', 'countries'));
    }

    public function store(ArgetimCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $post = $user->argetim()->create($input);
        return redirect('admin/argetim/'. $post->id .'/edit');
    }

    public function edit($id)
    {
        //
        $argetim_cats = ArgetimCat::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $post = Argetim::findOrFail($id);
        return view('admin.argetim.edit', compact('post', 'argetim_cats', 'countries'));
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
        $post = Auth::user()->argetim()->whereId($id)->first();
        $post->update($input);
        return redirect('/admin/argetim');
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
        $post = Argetim::findOrFail($id);
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/argetim');
    }

    public function addEmbed($id, Request $request)
    {
        $argetim = Argetim::findOrFail($id);
        $embeds = $argetim->embeds();

        $embeds->create([
             'url' => "$request->url",
        ]);

        return back();
    }

    public function addPhoto($id, Request $request)
    {
        $argetim = Argetim::findOrFail($id);
        $photos = $argetim->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/argetimPhoto'))){
            mkdir(storage_path('app/public/argetimPhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/argetimPhoto/img300'))){
            mkdir(storage_path('app/public/argetimPhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/argetimPhoto/img550'))){
            mkdir(storage_path('app/public/argetimPhoto/img550', 0777, true));
        }
        $path = '/argetimPhoto';
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
