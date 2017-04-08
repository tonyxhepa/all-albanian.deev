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

        $competitions = Competition::pluck('name', 'id')->all();
        $teams = Team::pluck('name', 'id')->all();

        $seria_a = Competition::where('name', 'seria-a')->first();
        $bundesliga = Competition::where('name', 'bundesliga')->first();


        $sport_sa = Sport::where('competition_id', $seria_a->id)->orderBy('updated_at', 'desc')->take(8)->get();
        $sport_bl = Sport::where('competition_id', $bundesliga->id)->orderBy('updated_at', 'desc')->take(8)->get();

        return view('sport.index', compact('sport_bl', 'sport_sa', 'competitions', 'teams',
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

    public function search(Request $request, Sport $sport)
    {
        $sport = $sport->newQuery();

        if ($request->has('title')){
            $sport->where('title', $request->input('title'));
        }


        if ($request->has('sport_cats_id')){
            $sport->whereHas('sport_cats', function ($query) use ($request){
                $query->where('id', $request->input('sport_cats_id'));
            });
        }

        if ($request->has('country_id')){
            $sport->whereHas('country', function ($query) use ($request){
                $query->where('id', $request->input('country_id'));
            });
        }
        $get_sport = $sport->orderBy('updated_at', 'desc')->paginate(8);

        return view('sport.kerko', compact('get_sport'));

    }
}
