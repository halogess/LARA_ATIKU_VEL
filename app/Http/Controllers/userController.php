<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;


class userController extends Controller
{
    public function home()
    {

        $user = Session::get("user");
        return view("user", compact("user"));
    }

    public function terbeli(Request $req)
    {
        $cart = session()->get('cart', []);

        $cartKey = $req->kode_barang;
        $product = Barang::find($cartKey);

        $cart[$cartKey] = [
            'kode_barang' => $product->kode_barang,
            'nama_barang' => $product->nama_barang,
            'jumlahBeli' => $req->jumlahBeli,
            'subtotalBeli' => $product->harga_barang * $req->jumlahBeli,
        ];

        return view('terbeli', compact('cart'));
    }
}
