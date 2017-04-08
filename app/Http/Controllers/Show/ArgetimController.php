<?php

namespace App\Http\Controllers\Show;

use App\Argetim;
use App\ArgetimCat;
use App\Country;
use App\Femra;
use App\Kuzhina;
use App\Lajme;
use App\Magazina;
use App\Makina;
use App\Sport;
use App\Tech;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArgetimController extends Controller
{
    //

    public function index(Request $request)
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $argetimet = Argetim::orderBy('updated_at', 'desc')->paginate(20);

        
        return view('argetim.index', compact('argetimet', 'countries', 'categories', 'tre_makina',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function fun_lajme()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $fun_lajme = Argetim::where('argetim_cats_id', 1)->orderBy('updated_at', 'desc')->paginate('20');


        return view('argetim.funlajme.index', compact('fun_lajme', 'countries', 'categories', 'tre_makina',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function fun_video()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();


        $fun_video_1 = Argetim::where('argetim_cats_id', 3)->orderBy('updated_at', 'desc')->take('1')->get();
        $fun_video = Argetim::where('argetim_cats_id', 3)->orderBy('updated_at', 'desc')->paginate('20');


        return view('argetim.funvideo.index', compact('fun_video_1','fun_video', 'countries', 'categories', 'tre_makina',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function games()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $games = Argetim::where('argetim_cats_id', 4)->orderBy('updated_at', 'desc')->paginate('20');


        return view('argetim.games.index', compact('games', 'countries', 'categories', 'tre_makina',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function show($slug)
    {
        $shiko_argetimin = Argetim::where('slug',$slug)->first();
        $mnm = Argetim::where('slug', '!=', $slug)->orderBy('created_at', 'desk')->take(8)->get();

        return view('argetim.show', compact('shiko_argetimin', 'mnm'));
    }

    public function search(Request $request, Argetim $argetim)
    {
        $argetim = $argetim->newQuery();

        if ($request->has('title')){
            $argetim->where('title', 'like', "%{$request->input('title')}%");
        }


        if ($request->has('argetim_cats_id')){
            $argetim->whereHas('argetim_cats', function ($query) use ($request){
                $query->where('id', $request->input('argetim_cats_id'));
            });
        }

        if ($request->has('country_id')){
            $argetim->whereHas('country', function ($query) use ($request){
                $query->where('id', $request->input('country_id'));
            });
        }
        $get_argetim = $argetim->orderBy('updated_at', 'desc')->paginate(8);

        return view('argetim.kerko', compact('get_argetim'));

    }
}
