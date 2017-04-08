<?php

namespace App\Http\Controllers;

use App\Argetim;
use App\Femra;
use App\Kuzhina;
use App\Lajme;
use App\Magazina;
use App\Makina;
use App\Sport;
use App\Tech;
use Illuminate\Http\Request;

class ShowEightController extends Controller
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


        $makina_e_par = Makina::orderBy('updated_at', 'desk')->take(1)->get();
        $makina_e_dyt = Makina::orderBy('updated_at', 'desk')->skip(1)->take(1)->get();
        $tre_makina = Makina::orderBy('updated_at', 'desk')->skip(2)->take(3)->get();
        $ttre_makina = Makina::orderBy('updated_at', 'desk')->skip(5)->take(3)->get();

        $lajmi_e_par = Lajme::orderBy('updated_at', 'desk')->take(1)->get();
        $lajmi_i_dyt = Lajme::orderBy('updated_at', 'desk')->skip(1)->take(1)->get();
        $tre_lajme = Lajme::orderBy('updated_at', 'desk')->skip(2)->take(3)->get();
        $ttre_lajme = Lajme::orderBy('updated_at', 'desk')->skip(5)->take(3)->get();
     return view('welcome', compact('makina_e_par', 'makina_e_dyt',
         'tre_makina', 'ttre_makina', 'lajmi_e_par','lajmi_i_dyt', 'tre_lajme', 'ttre_lajme',
         'makina_menu', 'lajme_menu', 'argetim_menu', 'makina_menu', 'magazina_menu',
         'femrat_menu', 'kuzhina_menu', 'tech_menu', 'sport_menu'));
    }

}
