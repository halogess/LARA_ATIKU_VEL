<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use App\Models\Status;
use App\Models\Htrans;
use App\Models\User;
use App\Models\Dtrans;
use Illuminate\Http\Request;

class MasterHistoryController extends Controller
{
    public function page_history()
    {
        Session::put("search", "");
        Session::put("sort", "asc");
        Session::put("page", "trans");
        Session::put("nav", "history");
        Session::put("url", "master/transaksi/history");
        return view("master.history.all");
    }

    public function page_completed()
    {
        Session::put("search", "");
        Session::put("sort", "asc");
        Session::put("page", "trans");
        Session::put("nav", "completed");
        Session::put("url", "master/transaksi/completed");
        return view("master.history.completed");
    }

    public function page_canceled()
    {
        Session::put("search", "");
        Session::put("sort", "asc");
        Session::put("page", "trans");
        Session::put("nav", "canceled");
        Session::put("url", "master/transaksi/canceled");
        return view("master.history.canceled");
    }

    public function loadHistory(Request $request)
    {
        Session::put("search", $request->search);
        Session::put("sort", $request->sort);
        Session::put("start", $request->start);
        Session::put("end", $request->end);
        Session::put("fieldSort", $request->fieldSort);

        $allTrans = Htrans::where("active", 0)->orderBy($request->fieldSort, $request->sort)
            ->where("tanggal_beli", ">=", Carbon::parse($request->start)->toDateString())
            ->where("tanggal_beli", "<=", Carbon::parse($request->end)->toDateString())
            ->get();
        $trans = $this->filterName($request->search, $allTrans);
        $view = view("master.transaksi.data", compact("trans"));
        return $view;
    }

    public function loadCompleted(Request $request){
        $trans = $this->getTransByStatus(4,$request->sort,$request->fieldSort, $request->start, $request->end);
        $trans = $this->filterName($request->search,$trans);
        $view = view("master.transaksi.data", compact("trans"));
        return $view;
    }

    public function loadCanceled(Request $request){
        $trans = $this->getTransByStatus(-1,$request->sort,$request->fieldSort, $request->start, $request->end);
        $trans = $this->filterName($request->search,$trans);
        $view = view("master.transaksi.data", compact("trans"));
        return $view;
    }


    private function filterName($name, $htrans)
    {
        $user = User::where("nama_user", "LIKE", "%$name%")->get();
        $new = [];
        foreach ($htrans as $t) {
            foreach ($user as $u) {
                if ($t->id_pembeli == $u->id_user) {
                    array_push($new, $t);
                    break;
                }
            }
        }
        return $new;
    }
    private function getTransByStatus($param, $sort, $fieldSort,$start,$end)
    {
        $allTrans = Htrans::where("active", 0)->orderBy($fieldSort, $sort)
            ->where("tanggal_beli", ">=", Carbon::parse($start)->toDateString())
            ->where("tanggal_beli", "<=", Carbon::parse($end)->toDateString())
            ->get();
        $trans = [];
        foreach ($allTrans as $p) {
            if ($p->Status->last()->kode_status == $param) {
                array_push($trans, $p);
            }
        }
        return $trans;
    }
}
