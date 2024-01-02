<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Cart;
use App\Models\Dtrans;
use App\Models\Htrans;
use App\Models\Status;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    // public function doTrans(Request $request, $kode_barang, $id_pembeli)
    // {
    //     $userID = Auth::id(); // mengambil user yang sedang login

    //     $currentDate = now(); // mengambil tanggal hari ini

    //     $formattedDate = Carbon::now()->format('Y-m-d'); // atur format tanggal

    //     $product = Barang::find($kode_barang); // finf product

    //     $sub_total = Cart::sum('total_harga'); // count total harga and qty
    //     $totalItem = Cart::sum('qty');

    //     $htrans = Htrans::create([ // insert htrans
    //         'tanggal_beli' => $formattedDate,
    //         'id_pembeli' => $userID,
    //         'total_item' => $totalItem,
    //         'total_harga' => $sub_total,
    //         'active' => 1
    //     ]);

    //     Dtrans::create([ // insert dtrans
    //         'kode_barang' => $kode_barang,
    //         'harga_barang' => $product->harga_barang,
    //         'deskripsi_barang' => $product->deskripsi_barang,
    //         'qty' => 1,
    //         'sub_total' => $product->harga_barang
    //     ]);

    //     $barangnya = [ // make data to passing into status.blade.php
    //         'nomor_nota' => $htrans->nomor_nota,
    //         'kode_barang' => $kode_barang,
    //         'deskripsi_barang' => $product->deskripsi_barang,
    //         'sub_total' => $product->harga_barang
    //     ];

    //     $keranjang = Cart::find($kode_barang);
    //     Cart::where('id_pembeli', $userID)->delete(); // delete cart after transaction

    //     return view('status', compact('barangnya'));
    // }

    public function doTrans(Request $request, $kode_barang, $id_pembeli)
    {
        $userID = Auth::id();
        $currentDate = now();
        $tanggalHtrans = Carbon::now()->format('Y-m-d');

        // Find product
        $product = Barang::find($kode_barang);

        // Check if the product is found
        if (!$product) {
            // Handle the case when the product is not found, for example, redirect or display an error
            $barangnya = [];
            return view('status', compact('barangnya'));
        } else {
            $sub_total = Cart::sum('total_harga');
            $totalItem = Cart::sum('qty');

            // $nomorNotaTerakhir = Htrans::max('nomor_nota');

            $htrans = Htrans::create([
                'tanggal_beli' => $tanggalHtrans,
                'id_pembeli' => $userID,
                'total_item' => $totalItem,
                'total_harga' => $sub_total,
                'active' => 1
            ]);

            $nomorNotaTerakhir = $htrans->nomor_nota;

            for ($i = 0; $i < $totalItem; $i++) {
                Dtrans::create([
                    'nomor_nota' => $nomorNotaTerakhir + 1,
                    'kode_barang' => $kode_barang,
                    'harga_barang' => $product->harga_barang,
                    'deskripsi_barang' => $product->deskripsi_barang,
                    'qty' => 1,
                    'sub_total' => $product->harga_barang
                ]);
            }

            $currentDate = now();
            $tanggalStatus = $currentDate->format('Y-m-d H:i:s');
            $nomorStatusTerakhir = Status::max('id_status');

            $status = Status::create([
                'id_status' => $nomorStatusTerakhir + 1,
                'nomor_nota' => $nomorNotaTerakhir + 1,
                'tanggal' => $tanggalStatus,
                'kode_status' => 0,
                'keterangan' => "Pesanan menunggu dikonfirmasi"
            ]);

            $barangnya = [
                'nomor_nota' => $nomorNotaTerakhir + 1,
                'kode_barang' => $kode_barang,
                'deskripsi_barang' => $product->deskripsi_barang,
                'sub_total' => $product->harga_barang,
                'tanggal' => $tanggalStatus,
                'keterangan' => $status->keterangan
            ];

            Cart::where('id_pembeli', $userID)->delete();

            return view('status', compact('barangnya'));
        }
    }
}
