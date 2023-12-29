<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Status;
use App\Models\Htrans;
use App\Models\Dtrans;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function page_new(){
        $param["page"] = "new";
        return view("admin.transaksi.new",$param);
    }

    public function getNewTrans(Request $request){
        $trans = Htrans::whereNull('id_admin')->where("active",1)->get();
        $view = view("admin.transaksi.newTrans_data",compact("trans"));
        return $view;
    }

    public function detail(Request $request){
        $param["htrans"] = Htrans::where("nomor_nota", $request->no)->first();
        $param["dtrans"] = Dtrans::where("nomor_nota", $request->no)->get();

        return view("admin.transaksi.detail", $param);
    }

    public function approve_new(Request $request){
        $htrans = Htrans::find($request->no);
        $htrans->id_admin = Auth::user()->id_user;
        $htrans->save();

        $this->approve($htrans);
        return redirect("admin/transaksi/new");
    }
    private function approve($htrans){

        $newStatus = new Status ();
        $newStatus->id_status = Status::all()->count()+1;
        $newStatus->nomor_nota = $htrans->nomor_nota;
        $newStatus->kode_status = $htrans->Status->last()->status +1;
        $newStatus->save();
        return;
    }

    public function declined_new(Request $request){
        $htrans = Htrans::find($request->no);
        $htrans->id_admin = Auth::user()->id_user;
        $htrans->save();

        $this->cancel($htrans);
        return redirect("admin/transaksi/new");
    }

    private function cancel($htrans){
        $htrans->active = 0;
        $htrans->save();

        $newStatus = new Status ();
        $newStatus->id_status = Status::all()->count()+1;
        $newStatus->nomor_nota = $htrans->nomor_nota;
        $newStatus->kode_status = -1;
        $newStatus->save();

        return;
    }

}
