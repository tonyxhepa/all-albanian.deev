<?php

namespace App\Http\Controllers\Show;

use App\Country;
use App\Shitje;
use App\ShitjeCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShitjeController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::pluck('name', 'id')->all();
        $categories = ShitjeCat::pluck('name', 'id')->all();
        $shitjet = Shitje::orderBy('updated_at', 'desc')->paginate(10);
        return view('shitje.index', compact('shitjet', 'countries', 'categories'));
    }

    public function show($slug)
    {
        $shiko_shitjet = Shitje::where('slug',$slug)->first();
        $mnm = Shitje::where('slug', '!=', $slug)->orderBy('created_at', 'desk')->take(8)->get();

        return view('shitje.show', compact('shiko_shitjet', 'mnm'));
    }

    public function search(Request $request, Shitje $shitje)
    {
        $shitje = $shitje->newQuery();

        if ($request->has('title')){
            $shitje->where('title', $request->input('title'));
        }


        if ($request->has('shitje_cats_id')){
            $shitje->whereHas('shitje_cats', function ($query) use ($request){
                $query->where('id', $request->input('shitje_cats_id'));
            });
        }

        if ($request->has('min_price') && $request->has('max_price')){
            $shitje->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        }

        if ($request->has('country_id')){
            $shitje->whereHas('country', function ($query) use ($request){
                $query->where('id', $request->input('country_id'));
            });
        }
        $get_shitje = $shitje->orderBy('updated_at', 'desc')->paginate(8);

        return view('shitje.kerko', compact('get_shitje'));

    }
}
