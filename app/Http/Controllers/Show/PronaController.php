<?php

namespace App\Http\Controllers\Show;

use App\Country;
use App\Prona;
use App\PronaCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PronaController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::pluck('name', 'id')->all();
        $categories = PronaCat::pluck('name', 'id')->all();
        $pronat = Prona::orderBy('updated_at', 'desc')->paginate(10);
        return view('prona.index', compact('pronat', 'countries', 'categories'));
    }

    public function show($slug)
    {
        $shiko_pronat = Prona::where('slug',$slug)->first();
        $mnm = Prona::where('slug', '!=', $slug)->orderBy('created_at', 'desk')->take(8)->get();

        return view('prona.show', compact('shiko_pronat', 'mnm'));
    }

    public function search(Request $request, Prona $prona)
    {
        $prona = $prona->newQuery();

        if ($request->has('title')){
            $prona->where('title', $request->input('title'));
        }


        if ($request->has('prona_cats_id')){
            $prona->whereHas('prona_cats', function ($query) use ($request){
                $query->where('id', $request->input('prona_cats_id'));
            });
        }

        if ($request->has('min_price') && $request->has('max_price')){
            $prona->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        }

        if ($request->has('min_price') & $request->has('max_pprice')){
            $prona->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        }

        if ($request->has('country_id')){
            $prona->whereHas('country', function ($query) use ($request){
                $query->where('id', $request->input('country_id'));
            });
        }
        $get_prona = $prona->orderBy('updated_at', 'desc')->paginate(8);

        return view('prona.kerko', compact('get_prona'));

    }
}
