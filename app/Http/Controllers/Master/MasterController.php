<?php

namespace App\Http\Controllers\Master;

use App\Charts\myChart;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Status;
use App\Models\Htrans;
use App\Models\Dtrans;
use App\Charts\pembeliChart;
use DateTime;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class MasterController extends Controller
{

    public function master(Request $request)
    {
        Session::put("page", "dashboard");

        $dataTahunan = Htrans::selectRaw('YEAR(tanggal_beli) as year, SUM(total_harga) as total_transactions_amount')
            ->join("status_transaksi", 'htrans.nomor_nota', '=', 'status_transaksi.nomor_nota')
            ->where('status_transaksi.kode_status', '4')
            ->groupBy('year')
            ->orderBy('year');

        $chartTahunan = new myChart;
        $chartTahunan->labels($dataTahunan->pluck('year')->toArray());
        $chartTahunan->dataset("Total Transactions", 'line', $dataTahunan->pluck('total_transactions_amount')->toArray())
            ->backgroundColor('rgba(255, 234, 0, 0.5)');
        $chartTahunan->displayLegend(false);

        $dataBulanan = Htrans::selectRaw('MONTH(tanggal_beli) as month, SUM(total_harga) as total_transactions_amount')
            ->join("status_transaksi", 'htrans.nomor_nota', '=', 'status_transaksi.nomor_nota')
            ->where('status_transaksi.kode_status', '4')
            ->whereYear('tanggal_beli', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $chartBulanan = new myChart;
        $chartBulanan->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $chartBulanan->dataset("Total Transactions", 'bar', $dataBulanan->pluck('total_transactions_amount')->toArray())
            ->backgroundColor('rgba(255, 234, 0, 0.5)');
        $chartBulanan->displayLegend(false);


        $param["chartTahunan"] = $chartTahunan;
        $param["chartBulanan"] = $chartBulanan;

        return view("master.master", $param);
    }


    // public function master()
    // {
    //     $purchaseData = Htrans::selectRaw('YEAR(tanggal_beli) as year, MONTH(tanggal_beli) as month, SUM(total_harga) as total_transactions_amount')
    //         ->groupBy('year', 'month')
    //         ->orderBy('year')
    //         ->orderBy('month')
    //         ->get();

    //     $chart = new myChart;
    //     $datasets = [];

    //     $colors = [
    //         'rgba(255, 99, 132, 1)',
    //         'rgba(54, 162, 235, 1)',
    //         'rgba(255, 206, 86, 1)',
    //         'rgba(75, 192, 192, 1)',
    //         'rgba(153, 102, 255, 1)',
    //         'rgba(255, 159, 64, 1)',
    //         'rgba(50, 205, 50, 1)',
    //         'rgba(255, 140, 0, 1)',
    //         'rgba(70, 130, 180, 1)',
    //         'rgba(255, 0, 0, 1)',
    //     ];

    //     $i = 0;
    //     $allMonths = range(1, 12);
    //     foreach ($purchaseData->groupBy('year') as $year => $yearlyData) {
    //         $dataByMonth = $yearlyData->pluck('total_transactions_amount', 'month')->toArray();

    //         $filledData = array_replace(array_fill_keys($allMonths, 0), $dataByMonth);

    //         $datasets[] = [
    //             'label' => "$year",
    //             'color' => $colors[$i],
    //             'data' => array_values($filledData),
    //         ];
    //         $i++;
    //     }

    //     $chart->labels(["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des"]);
    //     foreach ($datasets as $dataset) {
    //         $chart->dataset($dataset['label'], 'bar', $dataset['data'])->color($dataset['color']);
    //     }

    //     $param["chart"] = $chart;
    //     Session::put("page", "dashboard");
    //     return view("master.master", $param);
    // }

    public function users()
    {
        Session::put("page", "users");
        return view("master.users");
    }
    public function trans()
    {

        Session::put("search", "");
        Session::put("start", "01 " . now()->format('M Y'));
        Session::put("end", now()->format('d M Y'));
        Session::put("page", "trans");
        Session::put("nav", "");
        return view("master.trans");
    }

    public function detail(Request $request)
    {
        $param["htrans"] = Htrans::where("nomor_nota", $request->no)->first();
        $param["dtrans"] = Dtrans::where("nomor_nota", $request->no)->get();

        return view("master.transaksi.detail", $param);
    }

    //======================================================== PROFILE

    public function page_profile()
    {
        Session::put('page', 'profile');
        return view('master.profile');
    }

    public function do_profile(Request $request)
    {
        if ($request->button == "Save") {
            $request->validate([
                "username" => "required|regex:/^\S*$/",
                "telp" => "required|numeric"
            ]);

            if ($request->username != Auth::user()->username || $request->telp != Auth::user()->telp) {
                $user = User::find(Auth::user()->id_user);
                $user->username = $request->username;
                $user->telp = $request->telp;
                $user->save();
                return redirect("master/profile")->with('message', "Berhasil mengubah profile");
            }
        } else {
            $request->validate([
                "old_password" => 'required',
                "password" => "required|confirmed",
                "password_confirmation" => 'required'
            ]);
            $user = User::find(Auth::user()->id_user);

            if (Hash::check($request->password, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect("master/profile")->with('messagePassword', "Berhasil mengubah password");
            } else {
                return back()->with('messagePassword', "Password Salah");
            }
        }
        return back();
    }
}
