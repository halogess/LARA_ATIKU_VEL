<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $cartKey = $request->kode_barang;
        $product = Barang::find($cartKey);

        $cart[$cartKey] = [
            'kode_barang' => $product->kode_barang,
            'nama_barang' => $product->nama_barang,
            'harga_barang' => $product->harga_barang,
            'jumlah' => $request->jumlah,
            'subtotal' => $product->harga_barang * $request->jumlah,
        ];

        $product->stok_barang -= $request->jumlah;

        return view('cart', compact('cart'));
    }

    public function showCart(Request $request)
    {
    }
}
