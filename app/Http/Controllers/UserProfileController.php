<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class UserProfileController extends Controller
{
    public function page_profile()
    {
        $pp = [];
        for ($i = 1; $i <= 10; $i++) {
            array_push($pp, "img/profile/user/" . $i . ".png");
        }

        Session::put('page', 'profile');
        return view("profile", compact("pp"));
    }

    public function do_profile(Request $request)
    {

        if ($request->action == "ganti_profile") {

            if ($request->username == Auth::user()->username && $request->telp == Auth::user()->telp) {
                return "";
            }

            if ($request->username == "" || $request->telp == "") {
                return "Input tidak boleh kosong";
            }

            if (!is_numeric($request->telp) || strlen($request->telp) > 13 || strlen($request->telp) < 12) {
                return ("Format No Telepon Salah");
            }

            $all = User::all();
            foreach ($all as $a) {
                if ($request->username == $a->username && $request->username != Auth::user()->username) {
                    return "Username sudah digunakan";
                }
            }

            $user = User::find(Auth::user()->id_user);
            $user->username = $request->username;
            $user->telp = $request->telp;
            $user->save();
            return "oke";
        } else if ($request->action == "ganti_password") {

            if ($request->old_password == "" || $request->password == "" || $request->confirm == "") {
                return "Input tidak boleh kosong!";
            }

            if ($request->password != $request->confirm) {
                return "Konfirmasi password tidak cocok";
            }

            $user = User::find(Auth::user()->id_user);
            if (Hash::check($request->password, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                return "Berhasil mengubah password!";
            }

            return "Password salah!";

        } else {
            $user = User::find(Auth::user()->id_user);
            $user->foto_user = "img/profile/user/" . $request->foto . ".png";
            $user->save();
            return;
        }
        //return response()->json(['message' => 'Invalid input'], 422);
    }
}
