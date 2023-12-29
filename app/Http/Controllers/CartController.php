<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Cart;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $kode_barang)
    {
        $product = Barang::find($kode_barang);
        $userID = Auth::id();

        // Insert into cart table
        Cart::create([
            'id_pembeli' => $userID, // Assuming you are using authentication
            'kode_barang' => $product->kode_barang,
            'qty' => $request->jumlah,
            'total_harga' => $product->harga_barang * $request->jumlah,
        ]);

        // Update product stock
        $product->stok_barang -= $request->jumlah;
        $product->save();

        $cartItems = Cart::where('id_pembeli', $userID)->get();
        // Calculate the cart count (example: count of unique items)
        $cartCount = Cart::where('id_pembeli', $userID)->count();

        $barang = $product;

        // Return the updated cart count
        return view('/detail', compact('barang'));
    }

    public function addItemToCart(Request $request)
    {
    }

    public function showCart(Request $request)
    {
        $userID = Auth::id();

        $cartItems = Cart::where('id_pembeli', $userID)->get();
        $cartCount = Cart::where('id_pembeli', $userID)->count();

        return view('cart', compact('cartItems', 'cartCount'));
    }

    public function status()
    {
        return view('status');
    }
}
