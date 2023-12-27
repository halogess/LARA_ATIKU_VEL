<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Status;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function page_new(){



        return view("admin.transaksi.new");
    }
}
