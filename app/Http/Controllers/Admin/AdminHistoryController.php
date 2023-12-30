<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\Status;
use App\Models\Htrans;
use App\Models\Dtrans;
use Illuminate\Http\Request;

class AdminHistoryController extends Controller
{
    public function page_history(){
        Session::put("page","history");
        Session::put("nav","");
        Session::put("url","admin/history");
        return view("admin.history.all");
    }
    public function page_completed(){
        Session::put("page","history");
        Session::put("nav","completed");
        Session::put("url","admin/history/completed");
        return view("admin.history.completed");
    }

    public function page_canceled(){
        Session::put("page","history");
        Session::put("nav","canceled");
        Session::put("url","admin/history/canceled");
        return view("admin.history.canceled");
    }

    private function getData($param){
        $all = Htrans::where("id_admin", Auth::user()->id_user)->where("active", 0)->get();
        if($param == 0) return $all;

        $trans = [];
        foreach($all as $t){
            if($t->Status->last()->kode_status == $param) array_push($trans , $t);
        }
        return $trans;
    }

    public function loadHistory(Request $request)
    {
        $trans = $this->getData(0);
        $view = view("admin.transaksi.trans_data", compact("trans"));
        return $view;
    }

    public function loadCompleted(Request $request)
    {
        $trans = $this->getData(4);
        $view = view("admin.transaksi.trans_data", compact("trans"));
        return $view;
    }

    public function loadCanceled(Request $request)
    {
        $trans = $this->getData(-1);
        $view = view("admin.transaksi.trans_data", compact("trans"));
        return $view;
    }

}
