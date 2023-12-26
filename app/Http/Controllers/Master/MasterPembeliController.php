<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MasterPembeliController extends Controller
{
    public function pagePembeli()
    {
        return view("master.pembeli.display");
    }
    public function getPembeli(Request $request)
    {
        $action = $request->input("action");
        if ($action == "load") {
            $key = $request->input("key");
            $field = $request->input("combo_box");
            $active = $request->input("active");
            $sortField = $request->input("sortField");
            $sortUrutan = $request->input("sortUrutan");

            $tanda = "=";
            if ($active == "active") $active = "1";
            else if ($active == "banned") $active = "0";
            else {
                $tanda = ">";
                $active = "-1";
            }

            $pembeli = DB::table('user')->where("role",0)
                ->where("$field", "LIKE", "%$key%")
                ->where("active", "$tanda", "$active")
                ->orderBy("$sortField", "$sortUrutan")
                ->get();

            $view = view("master.pembeli.tabel", compact("pembeli"));
            return $view;

        } else if ($action == "delete") {

            $id = $request->input("id_pembeli");

            $p = DB::table('user')
                ->where("id_user", "$id")
                ->value("active");

            if($p=="1"){
                DB::table('user')
                ->where("id_user", "$id")
                ->update(["active"=>0]);
            } else {
                DB::table('user')
                ->where("id_user", "$id")
                ->update(["active"=>1]);
            }
            return;
        }
    }
}
