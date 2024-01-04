<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Cart;
use App\Models\Dtrans;
use App\Models\Htrans;
use App\Models\Status;
use App\Models\Keterangan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    public function doTrans(Request $request, $kode_barang, $id_pembeli)
    {
        $userID = Auth::id(); // ambil id pembeli yang sedang login
        $currentDate = now(); // ambil waktu sekarang
        $tanggalHtrans = Carbon::now()->format('Y-m-d');
        // Find product
        $product = Barang::find($kode_barang);

        // Check if the product is found
        if (!$product) {
            // Handle the case when the product is not found, for example, redirect or display an error
            $barangnya = [];
            return view('status', compact('barangnya'));
        } else {
            $sub_total = Cart::sum('total_harga'); // ambil total harga dan total qty
            $totalItem = Cart::sum('qty');
            $nomorNotaTerakhir = Htrans::max('nomor_nota'); // ambil nomor_nota terakhir

            $htrans = Htrans::create([ // create htrans
                'nomor_nota' => $nomorNotaTerakhir + 1,
                'tanggal_beli' => $tanggalHtrans,
                'id_pembeli' => $userID,
                'total_item' => $totalItem,
                'total_harga' => $sub_total,
                'active' => 1
            ]);

            for ($i = 0; $i < $totalItem; $i++) {
                $id_dtransTerakhir = Dtrans::max('id_dtrans'); // ambil id_dtrans terakhir
                Dtrans::create([ // create dtrans
                    'id_dtrans' => $id_dtransTerakhir + 1,
                    'nomor_nota' => $nomorNotaTerakhir + 1,
                    'kode_barang' => $kode_barang,
                    'harga_barang' => $product->harga_barang,
                    'deskripsi_barang' => $product->deskripsi_barang,
                    'qty' => 1,
                    'sub_total' => $product->harga_barang
                ]);
            }

            $tanggalStatus = $currentDate->format('Y-m-d H:i:s'); // format tanggal buat status
            $nomorStatusTerakhir = Status::max('id_status'); // ambil id_status terakhir
            $statusKode = 0; // set kode_status dan ambil nama_status nya
            $keterangan = Keterangan::where('kode_status', $statusKode)->value('nama_status');

            $status = Status::create([ // create status
                'id_status' => $nomorStatusTerakhir + 1,
                'nomor_nota' => $nomorNotaTerakhir + 1,
                'tanggal' => $tanggalStatus,
                'kode_status' => 0,
                'keterangan' => $keterangan
            ]);

            $jumlah = Dtrans::where('kode_barang', $kode_barang)->sum('qty'); // jumlahkan qty dari suatu barang

            $data = DB::table('htrans')
                ->join('dtrans', 'htrans.nomor_nota', '=', 'dtrans.nomor_nota')
                ->join('status_transaksi', 'htrans.nomor_nota', '=', 'status_transaksi.nomor_nota')
                ->select(
                    'htrans.nomor_nota',
                    'dtrans.kode_barang',
                    'dtrans.deskripsi_barang',
                    'dtrans.sub_total',
                    'htrans.tanggal_beli',
                    'status_transaksi.keterangan'
                )
                ->where('htrans.id_pembeli', $userID)
                ->get();

            $barangnya = [];
            foreach ($data as $item) {
                $barangnya[] = [
                    'nomor_nota' => $item->nomor_nota,
                    'tanggal' => $item->tanggal_beli,
                    'kode_barang' => $item->kode_barang,
                    'deskripsi_barang' => $item->deskripsi_barang,
                    'sub_total' => $item->sub_total,
                    'keterangan' => $item->keterangan
                ];
            }
            Session::put('barangnya', $barangnya);
            Cart::where('kode_barang', $kode_barang)->delete();
            return view('status', compact('barangnya'));
        }
    }
}
