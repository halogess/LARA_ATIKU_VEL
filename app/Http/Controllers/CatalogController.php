<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class CatalogController extends Controller
{
    public function pageHome()
    {
        $unit = Barang::where('id_kategori', 1)->get();
        $param["unit"] = $unit;
        $param['sparepart'] = Barang::where('id_kategori', 2)->get();
        $param['aftermarket'] = Barang::where('id_kategori', 3)->get();
        $param['interior'] = Barang::where('id_kategori', 4)->get();

        return view('user', $param);
    }
}
