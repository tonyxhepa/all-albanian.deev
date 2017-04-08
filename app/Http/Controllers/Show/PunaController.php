<?php

namespace App\Http\Controllers\Show;

use App\Country;
use App\Puna;
use App\PunaCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PunaController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::pluck('name', 'id')->all();
        $categories = PunaCat::pluck('name', 'id')->all();
        $punet = Puna::orderBy('updated_at', 'desc')->paginate(10);
        return view('puna.index', compact('punet', 'countries', 'categories'));
    }

    public function show($slug)
    {
        $shiko_punen = Puna::where('slug',$slug)->first();
        $mnm = Puna::where('slug', '!=', $slug)->orderBy('created_at', 'desk')->take(8)->get();

        return view('puna.show', compact('shiko_punen', 'mnm'));
    }

    public function search(Request $request, Puna $puna)
    {
        $puna = $puna->newQuery();

        if ($request->has('title')){
            $puna->where('title', $request->input('title'));
        }


        if ($request->has('puna_cats_id')){
            $puna->whereHas('puna_cats', function ($query) use ($request){
                $query->where('id', $request->input('puna_cats_id'));
            });
        }

        if ($request->has('country_id')){
            $puna->whereHas('country', function ($query) use ($request){
                $query->where('id', $request->input('country_id'));
            });
        }
        $get_puna = $puna->orderBy('updated_at', 'desc')->paginate(8);

        return view('puna.kerko', compact('get_puna'));

    }
}
