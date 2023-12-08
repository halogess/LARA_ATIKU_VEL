<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Admin;
use App\Models\Pembeli;

use Illuminate\Http\Request;

class masterController extends Controller
{
    public function master()
    {
        return view("master.master");
    }

    public function listPembeli()
    {
        $pembeli = Pembeli::All();
        return view("master.pembeli.display", compact("pembeli"));
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

            $pembeli = DB::table('pembeli')
                ->where("$field", "LIKE", "%$key%")
                ->where("active", "$tanda", "$active")
                ->orderBy("$sortField", "$sortUrutan")
                ->get();

            $view = view("master.pembeli.tabel", compact("pembeli"));
            return $view;
        } else if ($action == "delete") {

            $id = $request->input("id_pembeli");

            $p = DB::table('pembeli')
                ->where("id_pembeli", "$id")
                ->value("active");

            if($p=="1"){
                DB::table('pembeli')
                ->where("id_pembeli", "$id")
                ->update(["active"=>0]);
            } else {
                DB::table('pembeli')
                ->where("id_pembeli", "$id")
                ->update(["active"=>1]);
            }
            return;
        }
    }

    public function listAdmin()
    {
        $admin = Admin::All();
        return view("master.admin.display", compact("admin"));
    }

    public function getAdmin(Request $request)
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

            $admin = DB::table('admin')
                ->where("$field", "LIKE", "%$key%")
                ->where("active", "$tanda", "$active")
                ->orderBy("$sortField", "$sortUrutan")
                ->get();

            $view = view("master.admin.tabel", compact("admin"));
            return $view;
        } else if ($action == "delete") {

            $id = $request->input("id_admin");

            $p = DB::table('admin')
                ->where("id_admin", "$id")
                ->value("active");

            if($p=="1"){
                DB::table('admin')
                ->where("id_admin", "$id")
                ->update(["active"=>0]);
            } else {
                DB::table('admin')
                ->where("id_admin", "$id")
                ->update(["active"=>1]);
            }
            return;
        }
    }
}
