<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\Models\Admin;
use App\Models\Pembeli;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function master()
    {
        return view("master.master");
    }
}
