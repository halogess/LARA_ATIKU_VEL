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
            $user = User::find(Auth::user()->id_user);

            $all = User::all();
            foreach($all as $a){
                if($request->username == $a->username){
                    return "gagal";
                }
            }

            if ($request->username != Auth::user()->username || $request->telp != Auth::user()->telp) {
                $user->username = $request->username;
                $user->telp = $request->telp;
                $user->save();
                return response()->json(['message' => 'Berhasil mengubah profil']);
            }

        } else if ($request->action == "ganti_password") {
            $request->validate([
                "old_password" => 'required',
                "password" => "required|confirmed",
                "password_confirmation" => 'required'
            ]);
            $user = User::find(Auth::user()->id_user);

            if (Hash::check($request->password, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect("profile")->with('messagePassword', "Berhasil mengubah password");
            }
        } else {
            $user = User::find(Auth::user()->id_user);
            $user->foto_user = "img/profile/user/" . $request->foto . ".png";
            $user->save();
            return;
        }
        //return response()->json(['message' => 'Invalid input'], 422);
    }
}
