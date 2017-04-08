<?php

namespace App\Http\Controllers\Show;

use App\Argetim;
use App\Country;
use App\Femra;
use App\Kuzhina;
use App\Lajme;
use App\LajmeCat;
use App\Magazina;
use App\Makina;
use App\Sport;
use App\Tech;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LajmeController extends Controller
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


        $lajmet = Lajme::orderBy('updated_at', 'desc')->skip(9)->paginate(10);
        $lajmi_i_pare = Lajme::orderBy('updated_at', 'desc')->take(1)->get();
        $kater_lajme = Lajme::orderBy('updated_at', 'desc')->skip(1)->take(4)->get();
        $katera_lajme = Lajme::orderBy('updated_at', 'desc')->skip(5)->take(4)->get();
        $shqiperia = Country::where('name', 'al')->first();
        $ks = Country::where('name', 'ks')->first();
        $mk = Country::where('name', 'mk')->first();
        $bota = Country::where('name', 'bota')->first();

        $lajmet_al = Lajme::where('country_id', $shqiperia->id)->orderBy('updated_at', 'desc')->take(12)->get();
        $lajmet_ks = Lajme::where('country_id', $ks->id)->orderBy('updated_at', 'desc')->take(12)->get();
        $lajmet_mk = Lajme::where('country_id', $mk->id)->orderBy('updated_at', 'desc')->take(12)->get();
        $lajmet_bota = Lajme::where('country_id', $bota->id)->orderBy('updated_at', 'desc')->take(12)->get();


        return view('lajme.index', compact('lajmet', 'lajmi_i_pare', 'kater_lajme', 'katera_lajme',
            'lajmet_al', 'lajmet_ks', 'lajmet_mk', 'lajmet_bota',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function lajme_al()
    {

        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();
        $shqiperia = Country::where('name', 'al')->first();

        $lajmet_al = Lajme::where('country_id', $shqiperia->id)->orderBy('updated_at', 'desc')->paginate(20);

        return view('lajme.al.index', compact('lajmet_al',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function lajme_ks()
    {

        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();
        $ks = Country::where('name', 'ks')->first();

        $lajmet_ks = Lajme::where('country_id', $ks->id)->orderBy('updated_at', 'desc')->paginate(20);

        return view('lajme.ks.index', compact('lajmet_ks',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function lajme_mk()
    {

        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();
        $mk = Country::where('name', 'mk')->first();

        $lajmet_mk = Lajme::where('country_id', $mk->id)->orderBy('updated_at', 'desc')->paginate(20);

        return view('lajme.mk.index', compact('lajmet_mk',
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

        $shiko_lajmet = Lajme::where('slug',$slug)->first();
        $mnm = Lajme::where('slug', '!=', $slug)->orderBy('created_at', 'desk')->take(8)->get();

        return view('lajme.show', compact('shiko_lajmet', 'mnm',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function lajme_bota()
    {

        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();
        $bota = Country::where('name', 'bota')->first();

        $lajmet_bota = Lajme::where('country_id', $bota->id)->orderBy('updated_at', 'desc')->paginate(20);

        return view('lajme.bota.index', compact('lajmet_bota',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }
}
