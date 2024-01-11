<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Cart;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class CartController extends Controller
{
    public function addToCart(Request $request, $kode_barang)
    {
        $product = Barang::find($kode_barang);
        $userID = Auth::id();

        // Insert into cart table
        Cart::create([
            'id_cart' => Cart::max('id_cart') + 1,
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
        $namaKategori = $barang->kategorinya->nama_kategori;
        // Return the updated cart count
        return view('/detail', compact('barang', 'namaKategori'));
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
        $userID = Auth::id();

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

        return view('status', compact('barangnya'));
    }

    public function hapus()
    {
        $userID = Auth::id();
        Cart::where('id_pembeli', $userID)->delete();
        $cartItems = Cart::where('id_pembeli', $userID)->get();
        $cartCount = Cart::where('id_pembeli', $userID)->count();

        return view('cart', compact('cartItems', 'cartCount'));
    }

    public function hapusItem(Request $request, $id_cart)
    {
        $id_pembeli = Auth::id();
        Cart::where('id_cart', $id_cart)->delete();
        $cartItems = Cart::where('id_pembeli', $id_pembeli)->get();
        $cartCount = Cart::where('id_pembeli', $id_pembeli)->count();

        return view('cart', compact('cartItems', 'cartCount'));
    }
}
