<?php

namespace App\Http\Controllers\Show;

use App\Argetim;
use App\Country;
use App\Femra;
use App\FemraCat;
use App\Kuzhina;
use App\Lajme;
use App\Magazina;
use App\Makina;
use App\Sport;
use App\Tech;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FemraController extends Controller
{
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

        $bukuri_cat = FemraCat::where('name', 'bukuri')->first();
        $familja_cat = FemraCat::where('name', 'familja')->first();
        $karriera_cat = FemraCat::where('name','karriera')->first();
        $mode_cat = FemraCat::where('name', 'mode')->first();

        $bukuri_nje = Femra::where('femra_cats_id', $bukuri_cat->id)->orderBy('updated_at', 'desk')->take(1)->get();
        $familja_kater = Femra::where('femra_cats_id', $familja_cat->id)->orderBy('updated_at', 'desk')->take(4)->get();
        $mode_kater = Femra::where('femra_cats_id', $mode_cat->id)->orderBy('updated_at', 'desk')->take(4)->get();

        $bukurit = Femra::where('femra_cats_id', $bukuri_cat->id)->orderBy('updated_at', 'desk')->skip(1)->take(16)->get();
        $familjet = Femra::where('femra_cats_id', $familja_cat->id)->orderBy('updated_at', 'desk')->skip(4)->take(16)->get();
        $karrierat = Femra::where('femra_cats_id', $karriera_cat->id)->orderBy('updated_at', 'desk')->take(16)->get();
        $modat = Femra::where('femra_cats_id', $mode_cat->id)->orderBy('updated_at', 'desk')->skip(4)->take(16)->get();

        return view('femrat.index', compact('bukuri_nje', 'bukurit', 'familja_kater',
            'familjet', 'mode_kater', 'modat', 'karrierat',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function mode()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $mode_cat = FemraCat::where('name', 'mode')->first();
        $modat = Femra::where('femra_cats_id', $mode_cat->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('femrat.mode.index', compact('modat',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function familja()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $familja_cat = FemraCat::where('name', 'familja')->first();
        $familjet = Femra::where('femra_cats_id', $familja_cat->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('femrat.familja.index', compact('familjet',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function karriera()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $karriera_cat = FemraCat::where('name', 'karriera')->first();
        $karrierat = Femra::where('femra_cats_id', $karriera_cat->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('femrat.karriera.index', compact('karrierat',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function bukuri()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $bukuri_cat = FemraCat::where('name', 'mode')->first();
        $bukurit = Femra::where('femra_cats_id', $bukuri_cat->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('femrat.bukuri.index', compact('bukurit',
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

        $shiko_femrat = Femra::where('slug',$slug)->first();
        $mnm = Femra::where([
            ['slug', '!=', $slug],
            ['femra_cats_id', $shiko_femrat->femra_cats->id]

        ])->orderBy('created_at', 'desk')->take(8)->get();

        return view('femrat.show', compact('shiko_femrat', 'mnm',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

}
