<?php

namespace App\Http\Controllers\Show;

use App\Country;
use App\Femra;
use App\FemraCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FemraController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::pluck('name', 'id')->all();
        $categories = FemraCat::pluck('name', 'id')->all();
        $femrat = Femra::orderBy('updated_at', 'desc')->paginate(10);
        return view('femrat.index', compact('femrat', 'countries', 'categories'));
    }

    public function show($slug)
    {
        $shiko_femrat = Femra::where('slug',$slug)->first();
        $mnm = Femra::where('slug', '!=', $slug)->orderBy('created_at', 'desk')->take(8)->get();

        return view('femrat.show', compact('shiko_femrat', 'mnm'));
    }

    public function search(Request $request, Femra $femrat)
    {
        $femrat = $femrat->newQuery();

        if ($request->has('title')){
            $femrat->where('title', $request->input('title'));
        }


        if ($request->has('femrat_cats_id')){
            $femrat->whereHas('femra_cats', function ($query) use ($request){
                $query->where('id', $request->input('femrat_cats_id'));
            });
        }

        if ($request->has('country_id')){
            $femrat->whereHas('country', function ($query) use ($request){
                $query->where('id', $request->input('country_id'));
            });
        }
        $get_femrat = $femrat->orderBy('updated_at', 'desc')->paginate(8);

        return view('femrat.kerko', compact('get_femrat'));

    }
}
