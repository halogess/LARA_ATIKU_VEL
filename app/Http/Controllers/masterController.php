<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class masterController extends Controller
{
    public function master()
    {
        return view('pageMaster');
    }
}
