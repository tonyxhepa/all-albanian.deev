<?php

namespace App\Http\Controllers\Show;

use App\Country;
use App\Tech;
use App\TechCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::pluck('name', 'id')->all();
        $categories = TechCat::pluck('name', 'id')->all();
        $techet = Tech::orderBy('updated_at', 'desc')->paginate(10);
        return view('tech.index', compact('techet', 'countries', 'categories'));
    }

    public function show($slug)
    {
        $shiko_techin = Tech::where('slug',$slug)->first();
        $mnm = Tech::where('slug', '!=', $slug)->orderBy('created_at', 'desk')->take(8)->get();

        return view('tech.show', compact('shiko_techin', 'mnm'));
    }

    public function search(Request $request, Tech $tech)
    {
        $tech = $tech->newQuery();

        if ($request->has('title')){
            $tech->where('title', $request->input('title'));
        }


        if ($request->has('tech_cats_id')){
            $tech->whereHas('tech_cats', function ($query) use ($request){
                $query->where('id', $request->input('tech_cats_id'));
            });
        }

        if ($request->has('country_id')){
            $tech->whereHas('country', function ($query) use ($request){
                $query->where('id', $request->input('country_id'));
            });
        }
        $get_tech = $tech->orderBy('updated_at', 'desc')->paginate(8);

        return view('tech.kerko', compact('get_tech'));

    }
}
