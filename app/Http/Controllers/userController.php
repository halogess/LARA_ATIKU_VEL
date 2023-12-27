<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pembeli;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;


class userController extends Controller
{


    public function home()
    {

        $user = Session::get("user");
        return view("user", compact("user"));
    }

    public function terbeli(Request $req)
    {
        $jumlah = $req->input('jumlah');
        return view('terbeli', compact('jumlah'));
    }

}
