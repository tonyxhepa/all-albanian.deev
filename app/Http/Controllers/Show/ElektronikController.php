<?php

namespace App\Http\Controllers\Show;

use App\Country;
use App\Elektronik;
use App\ElektronikCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ElektronikController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::pluck('name', 'id')->all();
        $categories = ElektronikCat::pluck('name', 'id')->all();
        $elektroniket = Elektronik::orderBy('updated_at', 'desc')->paginate(10);
        return view('elektronike.index', compact('elektroniket', 'countries', 'categories'));
    }

    public function show($slug)
    {
        $shiko_elektroniket = Elektronik::where('slug',$slug)->first();
        $mnm = Elektronik::where('slug', '!=', $slug)->orderBy('created_at', 'desk')->take(8)->get();

        return view('elektronike.show', compact('shiko_elektroniket', 'mnm'));
    }

    public function search(Request $request, Elektronik $elektronik)
    {
        $elektronik = $elektronik->newQuery();

        if ($request->has('title')){
            $elektronik->where('title', $request->input('title'));
        }


        if ($request->has('elektronik_cats_id')){
            $elektronik->whereHas('elektronik_cats', function ($query) use ($request){
                $query->where('id', $request->input('elektronik_cats_id'));
            });
        }

        if ($request->has('country_id')){
            $elektronik->whereHas('country', function ($query) use ($request){
                $query->where('id', $request->input('country_id'));
            });
        }
        $get_elektronik = $elektronik->orderBy('updated_at', 'desc')->paginate(8);

        return view('elektronike.kerko', compact('get_elektronik'));

    }
}
