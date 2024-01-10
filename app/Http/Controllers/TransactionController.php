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
            $total = Cart::where('kode_barang', $kode_barang)->first();
            $nomorNotaTerakhir = Htrans::max('nomor_nota'); // ambil nomor_nota terakhir

            $htrans = Htrans::create([ // create htrans
                'nomor_nota' => $nomorNotaTerakhir + 1,
                'tanggal_beli' => $tanggalHtrans,
                'id_pembeli' => $userID,
                'total_item' => $total->qty,
                'total_harga' => $total->total_harga,
                'active' => 1
            ]);

            $cart = Cart::where('id_pembeli', $userID)->get();
            $jumlah = Cart::where('kode_barang', $kode_barang)->sum('qty');

            foreach ($cart as $cartItem) {
                if ($cartItem->kode_barang == $kode_barang) {
                    $id_dtransTerakhir = Dtrans::max('id_dtrans');
                    Dtrans::create([
                        'id_dtrans' => $id_dtransTerakhir + 1,
                        'nomor_nota' => $nomorNotaTerakhir + 1,
                        'kode_barang' => $kode_barang,
                        'harga_barang' => $product->harga_barang,
                        'deskripsi_barang' => $product->deskripsi_barang,
                        'qty' => $jumlah,
                        'sub_total' => $jumlah * $product->harga_barang
                    ]);
                }
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

            $jumlah = Dtrans::where('kode_barang', $kode_barang)->sum('qty');

            $data = DB::table('htrans')
                ->join('dtrans', 'htrans.nomor_nota', '=', 'dtrans.nomor_nota')
                ->join('status_transaksi', 'htrans.nomor_nota', '=', 'status_transaksi.nomor_nota')
                ->select(
                    'htrans.nomor_nota',
                    'dtrans.kode_barang',
                    'dtrans.harga_barang',
                    'dtrans.qty',
                    'dtrans.deskripsi_barang',
                    'htrans.total_item',
                    'dtrans.sub_total',
                    'htrans.tanggal_beli',
                    'status_transaksi.keterangan'
                )
                ->where('htrans.id_pembeli', $userID)
                ->get();

            $barangnya = [];
            foreach ($data as $item) {
                $nomorNota = $item->nomor_nota;

                // Check if the nomorNota already exists in $barangnya
                if (!isset($barangnya[$nomorNota])) {
                    $barangnya[$nomorNota] = [
                        'tanggal' => $item->tanggal_beli,
                        'items' => [],
                    ];
                }

                // Add the current item to the 'items' array
                $barangnya[$nomorNota]['items'][] = [
                    'kode_barang' => $item->kode_barang,
                    'deskripsi_barang' => $item->deskripsi_barang,
                    'harga' => $item->harga_barang,
                    'jumlah' => $item->qty,
                    'sub_total' => $item->sub_total,
                    'keterangan' => $item->keterangan,
                ];
            }

            Session::put('barangnya', $barangnya);
            Cart::where('kode_barang', $kode_barang)->delete();
            return view('status', compact('barangnya'));
        }
    }

    public function doTransAll(Request $request, $id_pembeli)
    {
        // Get an array of kode_barang values
        $kode_barang_array = $request->input('kode_barang');
        $jumlahDtrans = $request->cartCount;

        // Get all cart items for the user
        $cartItems = Cart::where('id_pembeli', $id_pembeli)->get();

        // Calculate total_item and total_harga for all items
        $totalItemAll = $cartItems->sum('qty');
        $totalHargaAll = $cartItems->sum('total_harga');

        // Create a new Htrans record
        $nomorNotaTerakhir = Htrans::max('nomor_nota');
        $htrans = Htrans::create([
            'nomor_nota' => $nomorNotaTerakhir + 1,
            'tanggal_beli' => now(),
            'id_pembeli' => $id_pembeli,
            'total_item' => $totalItemAll,
            'total_harga' => $totalHargaAll,
            'active' => 1,
        ]);

        // Loop through each kode_barang and create a Dtrans record for each
        foreach ($kode_barang_array as $kode_barang) {
            // Find the product
            $product = Barang::find($kode_barang);
            $cartItem = $cartItems->where('kode_barang', $kode_barang)->first();

            // Check if the product is found
            if ($product && $cartItem) {
                // Create a new Dtrans record
                Dtrans::create([
                    'id_dtrans' => Dtrans::max('id_dtrans') + 1,
                    'nomor_nota' => $htrans->nomor_nota,
                    'kode_barang' => $kode_barang,
                    'harga_barang' => $product->harga_barang,
                    'deskripsi_barang' => $product->deskripsi_barang,
                    'qty' => $cartItem->qty,
                    'sub_total' => $product->harga_barang * $cartItem->qty,
                ]);
            }
        }

        // Clear the user's cart
        Cart::where('id_pembeli', $id_pembeli)->delete();
        Session::forget('barangnya');

        // Retrieve the purchased items for the current transaction
        $data = DB::table('dtrans')
            ->join(
                'htrans',
                'dtrans.nomor_nota',
                '=',
                'htrans.nomor_nota'
            )
            ->join('status_transaksi', 'htrans.nomor_nota', '=', 'status_transaksi.nomor_nota')
            ->select(
                'htrans.nomor_nota',
                'dtrans.kode_barang',
                'dtrans.deskripsi_barang',
                'dtrans.harga_barang',
                'dtrans.qty',
                'dtrans.sub_total',
                'htrans.tanggal_beli',
                'status_transaksi.keterangan'
            )
            ->where('htrans.id_pembeli', $id_pembeli)
            ->get();

        $barangnya = [];
        foreach ($data as $item) {
            $nomorNota = $item->nomor_nota;

            // Check if the nomorNota already exists in $barangnya
            if (!isset($barangnya[$nomorNota])) {
                $barangnya[$nomorNota] = [
                    'tanggal' => $item->tanggal_beli,
                    'items' => [],
                ];
            }

            // Add the current item to the 'items' array
            $barangnya[$nomorNota]['items'][] = [
                'kode_barang' => $item->kode_barang,
                'deskripsi_barang' => $item->deskripsi_barang,
                'harga' => $item->harga_barang,
                'jumlah' => $item->qty,
                'sub_total' => $item->sub_total,
                'keterangan' => $item->keterangan,
            ];
        }

        Session::push('barangnya', $barangnya);
        return view('status', compact('barangnya'));
    }
}
