<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = Barang::where('nama_barang', 'like', '%' . $keyword . '%')->get();

        $hasil = "";
        foreach ($results as $result) {

            $url = "detail?id=" . $result["kode_barang"];

            // $url = route('detail', ['id' => $result['kode_barang'], 'nama' => $result['nama_barang'], 'gambar' => $result['gambar_barang']]);

            $imagePath = asset($result['gambar_barang']);

            $hasil .= '<a href="' . $url . '">' . $result['nama_barang'] . '</a><img src="' . $imagePath . '" style="width: 200px; height: 100px;"></img>';
        }

        return $hasil;
    }

    public function detail(Request $request)
    {
        $id = $request->input('id');
        $barang = Barang::where("kode_barang", "$id")->first();

        return view('detail', compact('barang'));
    }

    public function performSearch($keyword)
    {
        // saran viery: kalau pake db, select pake query, trs dipush ke array biar ndak ganti struktur
        $data = ['TOYOTA AVANZA', 'TOYOTA CAMRY', 'HONDA CIVIC', 'HONDA ACCORD', 'SUZUKI S PRESSO', 'HONDA MOBILIO'];
        $results = [];

        foreach ($data as $item) {
            // Jika keyword cocok dengan bagian dari nama, tambahkan ke hasil pencarian
            if (stripos($item, $keyword) !== false) {
                $results[] = $item;
            }
        }

        return $results;
    }
}
