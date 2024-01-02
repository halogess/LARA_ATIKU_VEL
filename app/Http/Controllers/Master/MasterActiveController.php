<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Status;
use App\Models\Htrans;
use App\Models\User;
use App\Models\Dtrans;
use Illuminate\Http\Request;

class MasterActiveController extends Controller
{
    public function page_active()
    {
        Session::put("search","");
        Session::put("sort","asc");
        Session::put("page", "trans");
        Session::put("nav", "active");
        Session::put("url", "master/transaksi/active");
        return view("master.active.all");
    }

    public function page_new()
    {
        Session::put("page", "trans");
        Session::put("nav", "new");
        Session::put("url", "master/transaksi/new");
        return view("master.active.new");
    }

    public function page_packing()
    {
        Session::put("page", "trans");
        Session::put("nav", "packing");
        Session::put("url", "master/transaksi/packing");
        return view("master.active.packing");
    }

    public function page_shipping()
    {
        Session::put("page", "trans");
        Session::put("nav", "shipping");
        Session::put("url", "master/transaksi/shipping");
        return view("master.active.shipping");
    }

    public function page_delivered()
    {
        Session::put("page", "trans");
        Session::put("nav", "delivered");
        Session::put("url", "master/transaksi/delivered");
        return view("master.active.delivered");
    }

    private function filterName($name, $htrans)
    {
        $user = User::where("nama_user", "LIKE" ,"%$name%")->get();
        $new = [];
        foreach ($htrans as $t) {
            foreach ($user as $u) {
                if($t->id_pembeli == $u->id_user){
                    array_push($new,$t);
                    break;
                }
            }
        }
        return $new;
    }

    public function loadActive(Request $request)
    {
        Session::put("search",$request->search);
        Session::put("sort",$request->sort);
        $allTrans = Htrans::where("active", 1)->orderBy("nomor_nota", $request->sort)->get();
        $trans = $this->filterName($request->search, $allTrans);
        $view = view("master.transaksi.data", compact("trans"));
        return $view;
    }
    public function loadNew(Request $request)
    {
        Session::put("search",$request->search);
        Session::put("sort",$request->sort);
        $allTrans = Htrans::whereNull('id_admin')->where("active", 1)->orderBy("nomor_nota", $request->sort)->get();
        $trans = $this->filterName($request->search, $allTrans);
        $view = view("master.transaksi.data", compact("trans"));
        return $view;
    }

    public function loadPacking(Request $request)
    {
        Session::put("search",$request->search);
        Session::put("sort",$request->sort);
        $allTrans = $this->getTransByStatus(1,$request->sort);
        $trans = $this->filterName($request->search, $allTrans);
        $view = view("admin.transaksi.trans_data", compact("trans"));
        return $view;
    }

    public function loadShipping(Request $request)
    {
        Session::put("search",$request->search);
        Session::put("sort",$request->sort);
        $allTrans = $this->getTransByStatus(2,$request->sort);
        $trans = $this->filterName($request->search, $allTrans);
        $view = view("admin.transaksi.trans_data", compact("trans"));
        return $view;
    }

    public function loadDelivered(Request $request)
    {
        Session::put("search",$request->search);
        Session::put("sort",$request->sort);
        $allTrans = $this->getTransByStatus(3,$request->sort);
        $trans = $this->filterName($request->search, $allTrans);
        $view = view("admin.transaksi.trans_data", compact("trans"));
        return $view;
    }

    private function getTransByStatus($param, $sort)
    {
        $all = Htrans::where("active", 1)->orderBy("nomor_nota",$sort)->get();
        $trans = [];
        foreach ($all as $p) {
            if ($p->Status->last()->kode_status == $param) {
                array_push($trans, $p);
            }
        }
        return $trans;
    }
}
