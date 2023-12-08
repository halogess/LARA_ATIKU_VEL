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
            $hasil .= '<p>' . $result['nama_barang'] . '</p><img src="' . $result['gambar_barang'] . '" style="width: 200px; height: 100px;"></img>';
        }

        return $hasil;
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
