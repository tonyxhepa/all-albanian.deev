<?php

namespace App\Http\Controllers\Show;

use App\CarMake;
use App\CarModel;
use App\Country;
use App\Makina;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MakinaController extends Controller
{
    //
    public function index(Request $request)
    {
        $makina_e_par = Makina::orderBy('updated_at', 'desk')->take(1)->get();
        $makina_e_dyt = Makina::orderBy('updated_at', 'desk')->skip(1)->take(1)->get();
        $tre_makina = Makina::orderBy('updated_at', 'desk')->skip(2)->take(3)->get();
        $ttre_makina = Makina::orderBy('updated_at', 'desk')->skip(5)->take(3)->get();
        $makinat = Makina::all();
        $car_make = CarMake::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();

        return view('makina.index', compact('makina_e_par', 'car_make', 'makinat','countries', 'makina_e_dyt', 'tre_makina', 'ttre_makina'));
    }

    public function show($slug)
    {
        $shiko_makinen = Makina::where('slug',$slug)->first();
        $modeli = $shiko_makinen->car_make;
        $mnm = Makina::where('car_make_id', $modeli->id)->where('id', '!=', $shiko_makinen->id)->orderBy('created_at', 'desk')->take(8)->get();

        return view('makina.show', compact('shiko_makinen', 'mnm'));
    }

    public function search(Request $request, Makina $makina)
     {
         $makina = $makina->newQuery();

         if ($request->has('title')){
             $makina->where('title', 'like' ,"%{$request->input('title')}%");
         }

         if ($request->has('karburanti')){
             $makina->where('karburanti', $request->input('karburanti'));
         }

         if ($request->has('min_price') && $request->has('max_price')){
             $makina->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
         }


         if ($request->has('car_make_id')){
             $makina->whereHas('car_make', function ($query) use ($request){
                 $query->where('id', $request->input('car_make_id'));
             });
         }

         if ($request->has('country_id')){
             $makina->whereHas('country', function ($query) use ($request){
                 $query->where('id', $request->input('country_id'));
             });
         }
          $get_makina = $makina->orderBy('updated_at', 'desc')->paginate(8);
         $makinat = Makina::all();
         $car_make = CarMake::pluck('name', 'id')->all();
         $countries = Country::pluck('name', 'id')->all();

         return view('makina.kerko', compact('get_makina', 'car_make', 'makinat','countries'));

     }
}
