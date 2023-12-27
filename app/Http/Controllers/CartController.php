<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $kode_barang)
    {
        $product = Barang::find($kode_barang);

        // Insert into cart table
        Cart::create([
            'id_pembeli ' => auth()->user()->id, // Assuming you are using authentication
            'kode_barang' => $product->kode_barang,
            'qty' => $request->jumlah,
            'total_harga' => $product->harga_barang * $request->jumlah,
        ]);

        // Update product stock
        $product->stok_barang -= $request->jumlah;
        $product->save();

        $cartItems = Cart::where('id_pembeli', auth()->user()->id)->get();
        // Calculate the cart count (example: count of unique items)
        $cartCount = Cart::where('id_pembeli', auth()->user()->id)->count();

        // Return the updated cart count
        return view('cart', compact('cartItems', 'cartCount'));
    }

    public function addItemToCart(Request $request)
    {
    }

    public function showCart(Request $request)
    {
        $cartItems = Cart::where('id_pembeli', auth()->user()->id)->get();
        $cartCount = Cart::where('id_pembeli', auth()->user()->id)->count();

        return view('cart', compact('cartItems', 'cardCount'));
    }
}
