<?php

namespace App\Http\Controllers\Show;

use App\Argetim;
use App\Country;
use App\Femra;
use App\Kuzhina;
use App\KuzhinaCat;
use App\Lajme;
use App\Magazina;
use App\Makina;
use App\Sport;
use App\Tech;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KuzhinaController extends Controller
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

        $embelsia_cat = KuzhinaCat::where('name', 'embelsira')->first();
        $gjellera_cat = KuzhinaCat::where('name', 'gjellera')->first();
        $sallata_cat = KuzhinaCat::where('name','sallata')->first();
        $tradic_cat = KuzhinaCat::where('name', 'tradicionale')->first();

        $embelsire_nje = Kuzhina::where('kuzhina_cats_id', $embelsia_cat->id)->orderBy('updated_at', 'desc')->take(1)->get();
        $sallata_kater = Kuzhina::where('kuzhina_cats_id', $sallata_cat->id)->orderBy('updated_at', 'desc')->take(4)->get();
        $tradicionale_kater = Kuzhina::where('kuzhina_cats_id', $tradic_cat->id)->orderBy('updated_at', 'desc')->take(4)->get();


        $embelsirat = Kuzhina::where('kuzhina_cats_id', $embelsia_cat->id)->orderBy('updated_at', 'desc')->skip(1)->take(16)->get();
        $gjellerat = Kuzhina::where('kuzhina_cats_id', $gjellera_cat->id)->orderBy('updated_at', 'desc')->take(16)->get();
        $sallatat = Kuzhina::where('kuzhina_cats_id', $sallata_cat->id)->orderBy('updated_at', 'desc')->skip(4)->take(16)->get();
        $tradicionalet = Kuzhina::where('kuzhina_cats_id', $tradic_cat->id)->orderBy('updated_at', 'desc')->skip(4)->take(16)->get();


        return view('kuzhina.index', compact('embelsire_nje', 'embelsirat', 'sallata_kater', 'sallatat',
            'tradicionale_kater', 'tradicionalet', 'gjellerat',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function embelsira()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $embelsia_cat = KuzhinaCat::where('name', 'embelsira')->first();
        $embelsirat = Kuzhina::where('kuzhina_cats_id', $embelsia_cat->id)->orderBy('updated_at', 'desc')->paginate(20);


        return view('kuzhina.embelsira.index', compact('embelsirat',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function sallata()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $sallata_cat = KuzhinaCat::where('name', 'sallata')->first();
        $sallatat = Kuzhina::where('kuzhina_cats_id', $sallata_cat->id)->orderBy('updated_at', 'desc')->paginate(20);


        return view('kuzhina.sallata.index', compact('sallatat',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function gjellera()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $gjellera_cat = KuzhinaCat::where('name', 'gjellera')->first();
        $gjellerat = Kuzhina::where('kuzhina_cats_id', $gjellera_cat->id)->orderBy('updated_at', 'desc')->paginate(20);


        return view('kuzhina.gjellera.index', compact('gjellerat',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function tradicionale()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $tradic_cat = KuzhinaCat::where('name', 'tradicionale')->first();
        $tradicionalet = Kuzhina::where('kuzhina_cats_id', $tradic_cat->id)->orderBy('updated_at', 'desc')->paginate(20);


        return view('kuzhina.tradicionale.index', compact('tradicionalet',
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

        $shiko_kuzhinen = Kuzhina::where('slug',$slug)->first();
        $mnm = Kuzhina::where([
            ['slug', '!=', $slug],
            ['kuzhina_cats_id', $shiko_kuzhinen->kuzhina_cats->id]
        ])->orderBy('created_at', 'desk')->take(8)->get();

        return view('kuzhina.show', compact('shiko_kuzhinen', 'mnm',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

}
