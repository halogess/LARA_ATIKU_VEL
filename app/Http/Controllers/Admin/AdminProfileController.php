<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Chat;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class AdminProfileController extends Controller
{
    public function page_profile()
    {
        Session::put("page", "profile");
        return view("admin.profile");
    }

    public function do_profile(Request $request)
    {
        if ($request->button == "Save") {
            $request->validate([
                "username" => "required|regex:/^\S*$/",
                "telp" => "required|numeric"
            ]);

            if ($request->username != Auth::user()->username || $request->telp != Auth::user()->telp) {
                $user = User::find(Auth::user()->id_user);
                $user->username = $request->username;
                $user->telp = $request->telp;
                $user->save();
                return redirect("admin/profile")->with('message', "Berhasil mengubah profile");
            }
        } else {
            $request->validate([
                "old_password" => 'required',
                "password" => "required|confirmed",
                "password_confirmation" => 'required'
            ]);
            $user = User::find(Auth::user()->id_user);

            if (Hash::check($request->password, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect("admin/profile")->with('messagePassword', "Berhasil mengubah password");
            } else {
                return back()->with('messagePassword', "Password Salah");
            }
        }
        return back();
    }
}
