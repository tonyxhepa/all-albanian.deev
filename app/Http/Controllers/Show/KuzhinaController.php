<?php

namespace App\Http\Controllers\Show;

use App\Country;
use App\Kuzhina;
use App\KuzhinaCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KuzhinaController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::pluck('name', 'id')->all();
        $categories = KuzhinaCat::pluck('name', 'id')->all();
        $kuzhinat = Kuzhina::orderBy('updated_at', 'desc')->paginate(10);
        return view('kuzhina.index', compact('kuzhinat', 'countries', 'categories'));
    }

    public function show($slug)
    {
        $shiko_kuzhinen = Kuzhina::where('slug',$slug)->first();
        $mnm = Kuzhina::where('slug', '!=', $slug)->orderBy('created_at', 'desk')->take(8)->get();

        return view('kuzhina.show', compact('shiko_kuzhinen', 'mnm'));
    }

    public function search(Request $request, Kuzhina $kuzhina)
    {
        $kuzhina = $kuzhina->newQuery();

        if ($request->has('title')){
            $kuzhina->where('title', $request->input('title'));
        }


        if ($request->has('kuzhina_cats_id')){
            $kuzhina->whereHas('kuzhina_cats', function ($query) use ($request){
                $query->where('id', $request->input('kuzhina_cats_id'));
            });
        }

        if ($request->has('country_id')){
            $kuzhina->whereHas('country', function ($query) use ($request){
                $query->where('id', $request->input('country_id'));
            });
        }
        $get_kuzhina = $kuzhina->orderBy('updated_at', 'desc')->paginate(8);

        return view('kuzhina.kerko', compact('get_kuzhina'));

    }
}
