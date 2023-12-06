<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pembeli;
use Illuminate\Http\Request;


class userController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function doLogin(Request $req)
    {
        if($req->input("email") == "master" && $req->input("password") == "master"){
            return redirect("master");
        }

        $pembeli = Pembeli::all();
        foreach($pembeli as $p){
            if($req->input("email") == $p["username_pembeli"]){
                if($req->input("password") == $p["username_password"]){
                    return back();
                }
            }
        }
    }

    public function register(){
        return view("register");
    }
}
