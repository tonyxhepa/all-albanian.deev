<?php

namespace App\Http\Controllers\Show;

use App\Argetim;
use App\Country;
use App\Femra;
use App\Kuzhina;
use App\Lajme;
use App\Magazina;
use App\Makina;
use App\Sport;
use App\Tech;
use App\TechCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechController extends Controller
{
    public function index()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $app_cat = TechCat::where('name', 'app')->first();
        $internet_cat = TechCat::where('name', 'internet')->first();
        $m_sociale_cat = TechCat::where('name','media-sociale')->first();
        $mobile_cat = TechCat::where('name', 'mobile')->first();

        $app_nje = Tech::where('tech_cats_id', $app_cat->id)->orderBy('updated_at', 'desc')->take(1)->get();
        $m_sociale_kater = Tech::where('tech_cats_id', $m_sociale_cat->id)->orderBy('updated_at', 'desc')->take(4)->get();
        $mobile_kater = Tech::where('tech_cats_id', $mobile_cat->id)->orderBy('updated_at', 'desc')->take(4)->get();


        $apps = Tech::where('tech_cats_id', $app_cat->id)->orderBy('updated_at', 'desc')->skip(1)->take(16)->get();
        $internetet = Tech::where('tech_cats_id', $internet_cat->id)->orderBy('updated_at', 'desc')->take(16)->get();
        $m_socialet = Tech::where('tech_cats_id', $m_sociale_cat->id)->orderBy('updated_at', 'desc')->skip(4)->take(16)->get();
        $mobilet = Tech::where('tech_cats_id', $mobile_cat->id)->orderBy('updated_at', 'desc')->skip(4)->take(16)->get();


        return view('tech.index', compact('app_nje', 'apps', 'm_sociale_kater', 'm_socialet',
            'mobile_kater', 'mobilet', 'internetet',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function app()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $app_cat = TechCat::where('name', 'app')->first();
        $apps = Tech::where('tech_cats_id', $app_cat->id)->orderBy('updated_at', 'desc')->paginate(20);


        return view('tech.app.index', compact('apps',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function internet()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $internet_cat = TechCat::where('name', 'internet')->first();
        $internetet = Tech::where('tech_cats_id', $internet_cat->id)->orderBy('updated_at', 'desc')->paginate(20);


        return view('tech.internet.index', compact('internetet',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function m_sociale()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $m_sociale_cat = TechCat::where('name', 'media-sociale')->first();
        $m_socialet = Tech::where('tech_cats_id', $m_sociale_cat->id)->orderBy('updated_at', 'desc')->paginate(20);


        return view('tech.media-sociale.index', compact('m_socialet',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function mobile()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $mobile_cat = TechCat::where('name', 'mobile')->first();
        $mobilet = Tech::where('tech_cats_id', $mobile_cat->id)->orderBy('updated_at', 'desc')->paginate(20);


        return view('tech.mobile.index', compact('mobilet',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }



    public function show($slug)
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $shiko_techin = Tech::where('slug',$slug)->first();
        $mnm = Tech::where([
            ['slug', '!=', $slug],
          ['tech_cats_id', $shiko_techin->tech_cats->id]
        ])->orderBy('created_at', 'desk')->take(8)->get();

        return view('tech.show', compact('shiko_techin', 'mnm',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }
}
