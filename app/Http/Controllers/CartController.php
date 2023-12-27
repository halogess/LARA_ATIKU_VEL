<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class CartController extends Controller
{
    public function addToCart(Request $request, $kode_barang)
    {
        $product = Barang::find($kode_barang);

        $request->validate([
            'jumlah' => 'required|numeric|min:1',
        ]);

        // Simpan informasi barang ke dalam session (contoh sederhana)
        $cart = session()->get('cart', []);

        $cart[$kode_barang] = [
            'nama_barang' => $product->nama_barang,
            'harga_barang' => $product->harga_barang,
            'jumlah' => $request->jumlah,
            'subtotal' => $product->harga_barang * $request->jumlah,
        ];

        session()->put('cart', $cart);

        return view('cart', compact('cart'));
    }

    public function showCart()
    {
        return view('cart');
    }
}
