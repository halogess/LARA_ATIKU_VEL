<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Status;
use App\Models\Htrans;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function page_new(){

        return view("admin.transaksi.new");
    }

    public function getNewTrans(Request $request){
        $trans = Htrans::whereNull('id_admin')->get();
        $view = view("admin.transaksi.newTrans_data",compact("trans"));
        return $view;
    }
}
