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

        $barangnya = Session::get('barangnya', []);
        return view('status', compact('barangnya'));
    }
}
