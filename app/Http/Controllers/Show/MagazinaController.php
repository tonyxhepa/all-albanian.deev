<?php

namespace App\Http\Controllers\Show;

use App\Country;
use App\Magazina;
use App\MagazinaCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MagazinaController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::pluck('name', 'id')->all();
        $categories = MagazinaCat::pluck('name', 'id')->all();
        $magazinat = Magazina::orderBy('updated_at', 'desc')->paginate(10);
        return view('magazina.index', compact('magazinat', 'countries', 'categories'));
    }

    public function show($slug)
    {
        $shiko_magazinat = Magazina::where('slug',$slug)->first();
        $mnm = Magazina::where('slug', '!=', $slug)->orderBy('created_at', 'desk')->take(8)->get();

        return view('magazina.show', compact('shiko_magazinat', 'mnm'));
    }

    public function search(Request $request, Magazina $magazina)
    {
        $magazina = $magazina->newQuery();

        if ($request->has('title')){
            $magazina->where('title', $request->input('title'));
        }


        if ($request->has('magazina_cats_id')){
            $magazina->whereHas('magazina_cats', function ($query) use ($request){
                $query->where('id', $request->input('magazina_cats_id'));
            });
        }

        if ($request->has('country_id')){
            $magazina->whereHas('country', function ($query) use ($request){
                $query->where('id', $request->input('country_id'));
            });
        }
        $get_magazina = $magazina->orderBy('updated_at', 'desc')->paginate(8);

        return view('magazina.kerko', compact('get_magazina'));

    }
}
