<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

Use App\Models\User;

class LoginController extends Controller
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

        $cek = [
            "username" => $req->username,
            "password" => $req->password,
        ];

        //punya jewe
        // if(Auth::attempt($cek)){
        //     if(Auth::user()->role == 0){
        //         return redirect("user/home");
        //     } else if(Auth::user()->role==1){
        //         return redirect("admin");
        //     } else{
        //         return redirect("master");
        //     }
        // }

        if (Auth::attempt($cek)) {
            $userID = Auth::id(); // Mendapatkan ID pengguna
            session(['user_id' => $userID]); // Menyimpan ID pengguna dalam sesi

            if (Auth::user()->role == 0) {
                return redirect("user/home");
            } else if (Auth::user()->role == 1) {
                return redirect("admin/home");
            } else {
                return redirect("master");
            }
        }
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
                "username" => "required|regex:/^\S*$/",
                "name" => "required",
                "telp" => "required",
                'password' => "required|confirmed"
            ],
            [
                //ini perubahan error messagenya
                "username.required" => "Username harus terisi!",
                "username.regex" => "Username tidak boleh mengandung spasi",
                "name.required" => "Name harus terisi!",
                "telp.required" => "Phone Number harus terisi!",
                "password.confirmed" => "Password dan Confirm Password harus sama!",
                "password.required" => "Password harus terisi!"

            ]
        );

        $user = User::where("id_user", $req->username);
        if($user != null){
            $user = new User();

            $id = User::where("role",0)->count()+1;
            $user->id_user = "P" . sprintf("%04d", $id);
            $user->nama_user = $req->name;
            $user->username = $req->username;
            $user->password = Hash::make($req->password);
            $user->telp = $req->telp;
            $user->role = 0;
            $user->foto_user = "";

            $user->save();
            return redirect("login")->with("message", "Anda telah berhasil register");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect("login");
    }
}
