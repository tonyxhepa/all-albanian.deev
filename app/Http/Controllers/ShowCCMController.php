<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowCCMController extends Controller
{
    public function mycarformAjax($id)
    {
        $carmodel = DB::table("car_models")
            ->where("car_make_id",$id)
            ->pluck("name","id");
        return json_encode($carmodel);
    }
    public function mycityformAjax($id)
    {
        $cities = DB::table("cities")
            ->where("countries_id",$id)
            ->pluck("name","id");
        return json_encode($cities);
    }
    public function myteamformAjax($id)
    {
        $cities = DB::table("teams")
            ->where("competition_id",$id)
            ->pluck("name","id");
        return json_encode($cities);
    }
}
