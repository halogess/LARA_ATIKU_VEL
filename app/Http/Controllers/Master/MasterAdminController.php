<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class MasterAdminController extends Controller
{
    public function pageAdmin()
    {
        Session::put("page", "users");
        return view("master.admin.display");
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

            $admin = DB::table('user')->where("role", "1")
                ->where("$field", "LIKE", "%$key%")
                ->where("active", "$tanda", "$active")
                ->orderBy("$sortField", "$sortUrutan")
                ->get();

            $view = view("master.admin.tabel", compact("admin"));
            return $view;
        } else if ($action == "delete") {

            $id = $request->input("id_admin");

            $p = DB::table('user')
                ->where("id_user", "$id")
                ->value("active");

            if ($p == "1") {
                DB::table('user')
                    ->where("id_user", "$id")
                    ->update(["active" => 0]);
            } else {
                DB::table('user')
                    ->where("id_user", "$id")
                    ->update(["active" => 1]);
            }
            return;
        }
    }

    public function pageAddAdmin()
    {
        Session::put("page", "users");
        return view("master.admin.add");
    }

    public function addAdmin(Request $request)
    {
        $admin = new User();
        $id = User::where("role",1)->count() + 1;
        $admin->id_user = "A" . sprintf("%04d", $id);
        $admin->nama_user = $request->name;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->telp = $request->telp;
        $admin->role = 1;
        $admin->foto_user = "img/profile/admin.jpg";
        $admin->save();

        return redirect("master/admin")->with("message", "Sukses tambahkan Admin");
    }
}
