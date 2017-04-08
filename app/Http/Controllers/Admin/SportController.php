<?php

namespace App\Http\Controllers\Admin;

use App\Competition;
use App\Country;
use App\Http\Requests\SportCreateRequest;
use App\Sport;
use App\SportCat;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class SportController extends Controller
{
    //
    public function index()
    {
        //
        $sport = Sport::all();
        return view('admin.sport.index', compact('sport'));
    }

    public function create()
    {
        //
        $competitions = Competition::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $teams = Team::pluck('name', 'id')->all();

        return view('admin.sport.create', compact('competitions', 'countries', 'teams'));
    }

    public function store(SportCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $post = $user->sport()->create($input);
        return redirect('admin/sport/'. $post->id .'/edit');
    }

    public function edit($id)
    {
        //
        $teams = Team::pluck('name', 'id')->all();
        $competitions = Competition::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $post = Sport::findOrFail($id);
        return view('admin.sport.edit', compact('post', 'competitions', 'teams'));
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
        $post = Auth::user()->sport()->whereId($id)->first();
        $post->update($input);
        return redirect('/admin/sport');
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
        $post = Sport::findOrFail($id);
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/sport');
    }

    public function addPhoto($id, Request $request)
    {
        $sport = Sport::findOrFail($id);
        $photos = $sport->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/sportPhoto'))){
            mkdir(storage_path('app/public/sportPhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/sportPhoto/img300'))){
            mkdir(storage_path('app/public/sportPhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/sportPhoto/img550'))){
            mkdir(storage_path('app/public/sportPhoto/img550', 0777, true));
        }
        $path = '/sportPhoto';
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
