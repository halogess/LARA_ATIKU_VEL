<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Cart;
use App\Models\Dtrans;
use App\Models\Htrans;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    public function doTrans(Request $request, $kode_barang, $id_pembeli)
    {
        $userID = Auth::id(); // mengambil user yang sedang login

        $currentDate = now(); // mengambil tanggal hari ini

        $formattedDate = Carbon::now()->format('Y-m-d'); // atur format tanggal

        $product = Barang::find($kode_barang);

        $sub_total = Cart::sum('total_harga'); // count total harga and qty
        $totalItem = Cart::sum('qty');

        Htrans::create([ // insert htrans
            'tanggal_beli' => $formattedDate,
            'id_pembeli' => $userID,
            'total_item' => $totalItem,
            'total_harga' => $sub_total,
            'active' => 1
        ]);

        $keranjang = Cart::find($kode_barang);

        $barangnya = [ // make data to passing into status.blade.php
            'nomor_nota' => 1,
            'kode_barang' => $kode_barang,
            'harga_barang' => $product->harga_barang,
            'deskripsi_barang' => $product->deskripsi_barang,
            'sub_total' => $product->harga_barang
        ];

        Dtrans::create([ // insert dtrans
            'nomor_nota' => 1,
            'kode_barang' => $kode_barang,
            'harga_barang' => $product->harga_barang,
            'deskripsi_barang' => $product->deskripsi_barang,
            'qty' => 1,
            'sub_total' => $product->harga_barang
        ]);

        Cart::where('id_pembeli', $userID)->delete(); // delete cart after transaction

        return view('status', compact('barangnya'));
    }
}
