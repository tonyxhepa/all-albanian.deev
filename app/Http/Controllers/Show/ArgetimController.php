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

        $funlajme = ArgetimCat::where('name', 'fun_lajme')->first();
        $funvideo = ArgetimCat::where('name', 'fun_video')->first();
        $barsoleta = ArgetimCat::where('name', 'barsoleta')->first();

        $argetimet_funlajme = Argetim::where('argetim_cats_id', $funlajme->id)->orderBy('updated_at', 'desc')->paginate(20);
        $argetimet_funvideo = Argetim::where('argetim_cats_id', $funvideo->id)->orderBy('updated_at', 'desc')->paginate(20);
        $argetimet_barsoleta = Argetim::where('argetim_cats_id', $barsoleta->id)->orderBy('updated_at', 'desc')->paginate(20);

        
        return view('argetim.index', compact('', 'argetimet_funlajme', 'argetimet_funvideo', 'argetimet_barsoleta',
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

    public function showfun_lajme($slug)
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $fun = Argetim::where('slug', $slug)->first();

        $funshow_lajme = Argetim::where([
            ['argetim_cats_id', $fun->argetim_cats->id],
             ['slug', '<>', $slug]
        ])->orderBy('updated_at', 'desc')->paginate('20');


        return view('argetim.funlajme.show', compact('funshow_lajme', 'fun', 'countries', 'categories', 'tre_makina',
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


        $fun_video_1 = Argetim::where('argetim_cats_id', 3)->latest()->limit(1)->first();
        $fun_video = Argetim::where('argetim_cats_id', 3)->orderBy('updated_at', 'desc')->skip(1)->paginate('5');


        return view('argetim.funvideo.index', compact('fun_video_1','fun_video', 'countries', 'categories', 'tre_makina',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }
    public function funshow_video($slug)
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();


        $funshow_video = Argetim::where('slug', $slug)->first();
        $fun_video = Argetim::where([
            ['argetim_cats_id', 3],
            ['slug', '<>', $slug]
        ])->orderBy('updated_at', 'desc')->skip(1)->paginate('5');


        return view('argetim.funvideo.show', compact('funshow_video','fun_video', 'countries', 'categories', 'tre_makina',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function barsoleta()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $basroleta_cat = ArgetimCat::where('name', 'barsoleta')->first();

        $barsoletat = Argetim::where('argetim_cats_id', $basroleta_cat->id)->orderBy('updated_at', 'desc')->paginate(10);


        return view('argetim.barsoleta.index', compact('barsoletat', 'countries', 'categories', 'tre_makina',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function show_barsoleta($slug)
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $barsoleta = Argetim::where('slug', $slug)->first();

        $barsoletat = Argetim::where([
            ['argetim_cats_id', $barsoleta->argetim_cats->id],
             ['slug', '<>', $slug]
        ])->orderBy('updated_at', 'desc')->paginate(10);


        return view('argetim.barsoleta.show', compact('barsoletat', 'barsoleta', 'countries', 'categories', 'tre_makina',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }


//    public function search(Request $request, Argetim $argetim)
//    {
//        $argetim = $argetim->newQuery();
//
//        if ($request->has('title')){
//            $argetim->where('title', 'like', "%{$request->input('title')}%");
//        }
//
//
//        if ($request->has('argetim_cats_id')){
//            $argetim->whereHas('argetim_cats', function ($query) use ($request){
//                $query->where('id', $request->input('argetim_cats_id'));
//            });
//        }
//
//        if ($request->has('country_id')){
//            $argetim->whereHas('country', function ($query) use ($request){
//                $query->where('id', $request->input('country_id'));
//            });
//        }
//        $get_argetim = $argetim->orderBy('updated_at', 'desc')->paginate(8);
//
//        return view('argetim.kerko', compact('get_argetim'));
//
//    }
}
