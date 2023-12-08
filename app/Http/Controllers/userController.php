<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pembeli;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;


class userController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function doLogin(Request $req)
    {
        $req->validate(
            [
                //ini pengecekannya
                "username" => "required",
                'password' => "required"
            ],
            [
                //ini perubahan error messagenya
                "username.required" => "Username harus terisi!",
                "password.required" => "Password harus terisi!"

            ]
        );
        if ($req->input("username") == "master" && $req->input("password") == "master") {
            return redirect("master");
        }

        $pembeli = Pembeli::all();
        foreach ($pembeli as $p) {
            if ($req->username == $p["username_pembeli"]) {
                if ($req->password == $p["password_pembeli"]) {

                    Session::put("user",$p);
                    return redirect("user/home");
                    //return view("user", compact('nama'));
                }
            }
        }
    }

    public function home(){

        $user = Session::get("user");
        return view("user",compact("user"));
    }



    public function register()
    {
        return view("register");
    }

    public function doRegist(Request $req)
    {
        $req->validate(
            [
                //ini pengecekannya
                "username" => "required",
                "name" => "required",
                "telp" => "required",
                'password' => "required|confirmed"
            ],
            [
                //ini perubahan error messagenya
                "username.required" => "Username harus terisi!",
                "name.required" => "Name harus terisi!",
                "telp.required" => "Phone Number harus terisi!",
                "password.confirmed" => "Password dan Confirm Password harus sama!",
                "password.required" => "Password harus terisi!"

            ]
        );
    }
}
