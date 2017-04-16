<?php

namespace App\Http\Controllers\Show;

use App\Argetim;
use App\Competition;
use App\Country;
use App\Femra;
use App\Kuzhina;
use App\Lajme;
use App\Magazina;
use App\Makina;
use App\Sport;
use App\SportCat;
use App\Team;
use App\Tech;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SportController extends Controller
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

        $bota = Competition::where('name', 'bota')->first();
        $boterori = Competition::where('name', 'boterori')->first();
        $bundesliga = Competition::where('name', 'bundesliga')->first();
        $eredivisie = Competition::where('name', 'eredivisie')->first();
        $formula_1 = Competition::where('name', 'formula-1')->first();
        $laliga = Competition::where('name', 'laliga')->first();
        $liga_pare = Competition::where('name', 'liga-pare')->first();
        $liga1 = Competition::where('name', 'liga1')->first();
        $premier = Competition::where('name', 'premier')->first();
        $seria_a = Competition::where('name', 'seria-a')->first();
        $sup_kosoves = Competition::where('name', 'sup-kosoves')->first();
        $superliga = Competition::where('name', 'superliga')->first();
        $teams = Team::pluck('name', 'id')->all();

        $superliga_1 = Sport::where('competition_id', $superliga->id)->orderBy('updated_at', 'desk')->take(1)->get();
        $seria_a_kater = Sport::where('competition_id', $seria_a->id)->orderBy('updated_at', 'desk')->take(4)->get();
        $premier_kater = Sport::where('competition_id', $premier->id)->orderBy('updated_at', 'desk')->take(4)->get();

        $bota_news = Sport::where('competition_id', $bota->id)->orderBy('updated_at', 'desk')->take(16)->get();
        $boterori_news = Sport::where('competition_id', $boterori->id)->orderBy('updated_at', 'desk')->take(16)->get();
        $bundesliga_news = Sport::where('competition_id', $bundesliga->id)->orderBy('updated_at', 'desk')->take(16)->get();
        $eredivisie_news = Sport::where('competition_id', $eredivisie->id)->orderBy('updated_at', 'desk')->take(16)->get();
        $formula_1_news = Sport::where('competition_id', $formula_1->id)->orderBy('updated_at', 'desk')->take(16)->get();
        $laliga_news = Sport::where('competition_id', $laliga->id)->orderBy('updated_at', 'desk')->take(16)->get();
        $liga_pare_news = Sport::where('competition_id', $liga_pare->id)->orderBy('updated_at', 'desk')->take(16)->get();
        $liga1_news = Sport::where('competition_id', $liga1->id)->orderBy('updated_at', 'desk')->take(16)->get();
        $premier_news = Sport::where('competition_id', $premier->id)->orderBy('updated_at', 'desk')->skip(4)->take(16)->get();
        $seria_a_news = Sport::where('competition_id', $seria_a->id)->orderBy('updated_at', 'desk')->skip(4)->take(16)->get();
        $sup_kosoves_news = Sport::where('competition_id', $sup_kosoves->id)->orderBy('updated_at', 'desk')->take(16)->get();
        $superliga_news = Sport::where('competition_id', $superliga->id)->orderBy('updated_at', 'desk')->skip(1)->take(16)->get();

        return view('sport.index', compact('superliga_1', 'seria_a_kater', 'premier_kater',
            'bota_news', 'boterori_news', 'bundesliga_news', 'eredivisie_news', 'formula_1_news', 'laliga_news',
            'liga_pare_news', 'liga1_news', 'premier_news', 'seria_a_news', 'sup_kosoves_news', 'superliga_news',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function bota()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $bota = Competition::where('name', 'bota')->first();

       $all_bota = Sport::where('competition_id', $bota->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('sport.bota.index', compact('all_bota',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function boterori()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $boterori = Competition::where('name', 'boterori')->first();

        $all_boterori = Sport::where('competition_id', $boterori->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('sport.boterori.index', compact('all_boterori',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function bundesliga()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $bundesliga = Competition::where('name', 'bundesliga')->first();

        $all_bundesliga = Sport::where('competition_id', $bundesliga->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('sport.bundesliga.index', compact('all_bundesliga',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function eredivisie()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $eredivisie = Competition::where('name', 'eredivisie')->first();

        $all_eredivisie = Sport::where('competition_id', $eredivisie->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('sport.eredivisie.index', compact('all_eredivisie',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function formula_1()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $formula_1 = Competition::where('name', 'formula-1')->first();

        $all_formula_1 = Sport::where('competition_id', $formula_1->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('sport.formula-1.index', compact('all_formula_1',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function laliga()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $laliga = Competition::where('name', 'laliga')->first();

        $all_laliga = Sport::where('competition_id', $laliga->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('sport.laliga.index', compact('all_laliga',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function liga_pare()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $liga_pare = Competition::where('name', 'liga-pare')->first();

        $all_liga_pare = Sport::where('competition_id', $liga_pare->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('sport.liga-pare.index', compact('all_liga_pare',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function liga1()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $liga1 = Competition::where('name', 'liga1')->first();

        $all_liga1 = Sport::where('competition_id', $liga1->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('sport.liga1.index', compact('all_liga1',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function premier()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $premier = Competition::where('name', 'premier')->first();

        $all_premier = Sport::where('competition_id', $premier->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('sport.premier.index', compact('all_premier',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }


    public function seria_a()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $seria_a = Competition::where('name', 'seria-a')->first();

        $all_seria_a = Sport::where('competition_id', $seria_a->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('sport.seria-a.index', compact('all_seria_a',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function sup_kosoves()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $sup_kosoves = Competition::where('name', 'sup-kosoves')->first();

        $all_sup_kosoves = Sport::where('competition_id', $sup_kosoves->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('sport.sup-kosoves.index', compact('all_sup_kosoves',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function superliga()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $superliga = Competition::where('name', 'superliga')->first();

        $all_superliga = Sport::where('competition_id', $superliga->id)->orderBy('updated_at', 'desk')->paginate(20);

        return view('sport.superliga.index', compact('all_superliga',
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

        $shiko_sportin = Sport::where('slug',$slug)->first();
        $mnm = Sport::where('slug', '!=', $slug)->orderBy('created_at', 'desk')->take(8)->get();

        return view('sport.show', compact('shiko_sportin', 'mnm',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

}
