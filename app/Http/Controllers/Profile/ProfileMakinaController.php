<?php

namespace App\Http\Controllers\Profile;

use App\CarMake;
use App\Country;
use App\Http\Requests\MakinaCreateRequest;
use App\Makina;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class ProfileMakinaController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
        $makinat = Makina::where('user_id', $user->id)->paginate(10);

        return view('profile.makinaime.index', compact('makinat', 'slug'));

    }

    public function create()
    {
        //

        $car_make = CarMake::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('profile.makinaime.create', compact('car_make', 'countries'));
    }

    public function store(MakinaCreateRequest $request, $slug)
    {
        //
        $input = $request->all();
        $user  = User::where('slug', $slug)->first();
        $post = $user->makina()->create($input);

        return redirect($slug. '/profile/makinaime/'. $post->id .'/edit');
    }

    public function edit($slug,$id)
    {
        //
        $user  = User::where('slug', $slug)->first();
        $car_make = CarMake::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        $post = Makina::findOrFail($id);
        return view('profile.makinaime.edit', compact('post', 'car_make', 'countries', 'user'));

    }

    public function update(Request $request, $slug, $id)
    {
        //


        $input = $request->all();
        $user = User::where('slug', $slug)->first();
        $post = $user->makina()->whereId($id)->first();
        if ($request->hasFile('photo')) {
            if (count($request->file('photo'))){
                foreach ($request->file('photo') as $key => $photo) {
                    $name = time() . $photo->getClientOriginalName();
                        if (!file_exists(storage_path('app/public/makinaPhoto'))){
                            mkdir(storage_path('app/public/makinaPhoto', 0777, true));
                        }

                        if (!file_exists(storage_path('app/public/makinaPhoto/img300'))){
                            mkdir(storage_path('app/public/makinaPhoto/img300', 0777, true));
                        }

                        if (!file_exists(storage_path('app/public/makinaPhoto/img550'))){
                            mkdir(storage_path('app/public/makinaPhoto/img550', 0777, true));
                        }


                        $path = '/makinaPhoto';
                        $photo->move(storage_path('app/public').$path, $name);

                        $threzerozero = Image::make(storage_path('app/public')
                            .$path . '/'.$name)->fit(300, 215)->save(storage_path('app/public')
                            .$path.'/img300/'.$name);
                        $fivefivezero = Image::make(storage_path('app/public')
                            .$path . '/'.$name)->fit(550, 330)->save(storage_path('app/public')
                            .$path.'/img550/'.$name);
                        $post->photos()->create([
                            'threezerozero' => "$path/img300/{$name}",
                            'fivefivezero' => "$path/img550/{$name}",
                            'thumbnail' => "$path/{$name}",
                        ]);

                }
            }
        }



        $post->update($input);
        return redirect($slug.'/profile/makinaime');
    }

    public function destroy($slug, $id)
    {
        //
        $post = Makina::findOrFail($id);
        $photos = $post->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $post->photos()->delete();
        $post->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect($slug. '/profile/makinaime');
    }

    public function addPhoto($slug, $id, Request $request)
    {
        $makina = Makina::findOrFail($id);
        $photos = $makina->photos();
         $user = User::where('slug', $slug)->first();

        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/makinaPhoto'))){
            mkdir(storage_path('app/public/makinaPhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/makinaPhoto/img300'))){
            mkdir(storage_path('app/public/makinaPhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/makinaPhoto/img550'))){
            mkdir(storage_path('app/public/makinaPhoto/img550', 0777, true));
        }
        $path = '/makinaPhoto';
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
