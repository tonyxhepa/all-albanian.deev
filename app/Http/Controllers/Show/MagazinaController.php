<?php

namespace App\Http\Controllers\Show;

use App\Argetim;
use App\Country;
use App\Femra;
use App\Kuzhina;
use App\Lajme;
use App\Magazina;
use App\MagazinaCat;
use App\Makina;
use App\Sport;
use App\Tech;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MagazinaController extends Controller
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

       $vipat_cat = MagazinaCat::where('name', 'vipa')->first();
       $filma_cat = MagazinaCat::where('name', 'film')->first();
       $muzike_cat = MagazinaCat::where('name', 'muzike')->first();

       $filma_kater = Magazina::where('magazina_cats_id', $filma_cat->id)->orderBy('updated_at', 'desc')->take(4)->get();
        $vipa_nje = Magazina::where('magazina_cats_id', $vipat_cat->id)->orderBy('updated_at', 'desc')->take(1)->get();
        $muzike_kater = Magazina::where('magazina_cats_id', $muzike_cat->id)->orderBy('updated_at', 'desc')->take(4)->get();
        $filmat = Magazina::where('magazina_cats_id', $filma_cat->id)->orderBy('updated_at', 'desc')->skip(4)->take(16)->get();
        $vipat = Magazina::where('magazina_cats_id', $vipat_cat->id)->orderBy('updated_at', 'desc')->skip(1)->take(16)->get();
        $muziket = Magazina::where('magazina_cats_id', $muzike_cat->id)->orderBy('updated_at', 'desc')->skip(4)->take(16)->get();

        return view('magazina.index', compact('filma_kater', 'vipa_nje', 'muzike_kater', 'filmat', 'vipat', 'muziket',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

    public function vipat()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $vipat_cat = MagazinaCat::where('name', 'vipa')->first();
        $vipat = Magazina::where('magazina_cats_id', $vipat_cat->id)->orderBy('updated_at', 'desc')->paginate(20);

         return view('magazina.vipat.index', compact('vipat',
             'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
             'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu' ));
    }

    public function muzike()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $muziket_cat = MagazinaCat::where('name', 'muzike')->first();
        $muziket = Magazina::where('magazina_cats_id', $muziket_cat->id)->orderBy('updated_at', 'desc')->paginate(20);

        return view('magazina.muzike.index', compact('muziket',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu' ));
    }

    public function film()
    {
        $makina_menu = Makina::orderBy('updated_at', 'desk')->take(3)->get();
        $lajme_menu = Lajme::orderBy('updated_at', 'desk')->take(3)->get();
        $argetim_menu = Argetim::orderBy('updated_at', 'desk')->take(3)->get();
        $magazina_menu = Magazina::orderBy('updated_at', 'desk')->take(3)->get();
        $femrat_menu = Femra::orderBy('updated_at', 'desk')->take(3)->get();
        $kuzhina_menu = Kuzhina::orderBy('updated_at', 'desk')->take(3)->get();
        $tech_menu = Tech::orderBy('updated_at', 'desk')->take(3)->get();
        $sport_menu = Sport::orderBy('updated_at', 'desk')->take(3)->get();

        $filmet_cat = MagazinaCat::where('name', 'film')->first();
        $filmet = Magazina::where('magazina_cats_id', $filmet_cat->id)->orderBy('updated_at', 'desc')->paginate(20);

        return view('magazina.film.index', compact('filmet',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu' ));
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

        $shiko_magazinat = Magazina::where('slug',$slug)->first();
        $mnm = Magazina::where('slug', '!=', $slug)->orderBy('created_at', 'desk')->take(8)->get();

        return view('magazina.show', compact('shiko_magazinat', 'mnm',
            'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
            'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
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
