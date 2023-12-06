<?php

namespace App\Http\Controllers;

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

        $pembeli = Pembeli::all();
        $param["pembeli"] = $pembeli;
        return view("master.pembeli", $param);
    }
}
