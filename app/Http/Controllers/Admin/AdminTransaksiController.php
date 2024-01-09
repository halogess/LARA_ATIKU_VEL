<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\Status;
use App\Models\Htrans;
use App\Models\Dtrans;
use Illuminate\Http\Request;
class AdminTransaksiController extends Controller
{
    public function page_new()
    {
        Session::put("page", "new");
        Session::put("url", "admin/transaksi/new");
        return view("admin.transaksi.new");
    }
    public function page_active()
    {
        Session::put("page", "active");
        Session::put("nav", "");
        Session::put("url", "admin/transaksi/active");
        return view("admin.active_trans.all");
    }

    public function page_packing()
    {
        Session::put("page", "active");
        Session::put("nav", "packing");
        Session::put("url", "admin/transaksi/active/packing");
        return view("admin.active_trans.packing");
    }

    public function page_shipping()
    {
        Session::put("page", "active");
        Session::put("nav", "shipping");
        Session::put("url", "admin/transaksi/active/shipping");
        return view("admin.active_trans.shipping");
    }
    public function page_delivered()
    {
        Session::put("page", "active");
        Session::put("nav", "delivered");
        Session::put("url", "admin/transaksi/active/delivered");
        return view("admin.active_trans.delivered");
    }

    public function getNewTrans(Request $request)
    {
        $trans = Htrans::whereNull('id_admin')->where("active", 1)->get();
        $view = view("admin.transaksi.trans_data", compact("trans"));
        return $view;
    }

    public function detail(Request $request)
    {
        $param["htrans"] = Htrans::where("nomor_nota", $request->no)->first();
        $param["dtrans"] = Dtrans::where("nomor_nota", $request->no)->get();

        return view("admin.transaksi.detail", $param);
    }

    public function loadActive(Request $request)
    {
        $trans = Htrans::where("id_admin", Auth::user()->id_user)->where("active", 1)->get();
        $view = view("admin.transaksi.trans_data", compact("trans"));
        return $view;
    }

    public function loadPacking(Request $request)
    {
        $trans = $this->getTransByStatus(1);
        $view = view("admin.transaksi.trans_data", compact("trans"));
        return $view;
    }

    public function loadShipping(Request $request)
    {
        $trans = $this->getTransByStatus(2);
        $view = view("admin.transaksi.trans_data", compact("trans"));
        return $view;
    }

    public function loadDelivered(Request $request)
    {
        $trans = $this->getTransByStatus(3);
        $view = view("admin.transaksi.trans_data", compact("trans"));
        return $view;
    }

    private function getTransByStatus($param)
    {
        $all = Htrans::where("id_admin", Auth::user()->id_user)->where("active", 1)->get();
        $trans = [];
        foreach ($all as $p) {
            if ($p->Status->last()->kode_status == $param) {
                array_push($trans, $p);
            }
        }
        return $trans;
    }

    public function approve(Request $request)
    {
        $htrans = Htrans::find($request->no);
        if ($htrans->id_admin == null) {
            $htrans->id_admin = Auth::user()->id_user;
        }

        $newStatus = new Status();
        $newStatus->id_status = Status::all()->count() + 1;
        $newStatus->nomor_nota = $htrans->nomor_nota;
        $newStatus->kode_status = $htrans->Status->last()->kode_status + 1;
        if ($newStatus->kode_status == 4) {
            $htrans->active = 0;
        }
        $newStatus->save();
        $htrans->save();

        return redirect(Session::get("url"));
    }

    public function cancel(Request $request)
    {
        $htrans = Htrans::find($request->no);
        if ($htrans->id_admin == null) {
            $htrans->id_admin = Auth::user()->id_user;
            $htrans->save();
        }
        $htrans->active = 0;
        $htrans->save();

        $newStatus = new Status();
        $newStatus->id_status = Status::all()->count() + 1;
        $newStatus->nomor_nota = $htrans->nomor_nota;
        $newStatus->kode_status = $htrans->Status->last()->kode_status;
        $newStatus->kode_status = -1;
        $newStatus->save();

        return redirect(Session::get("url"));
    }
}
