<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Models\Kategori;
use App\Models\Barang;

use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    public function pageBarang()
    {
        $kategori = Kategori::all();
        return view("master.barang.display", compact("kategori"));
    }

    public function getBarang(Request $request)
    {
        $action = $request->input("action");
        if ($action == "load") {

            $key = $request->input("key");
            $field = $request->input("combo_box");
            $active = $request->input("active");
            $sortField = $request->input("sortField");
            $sortUrutan = $request->input("sortUrutan");
            $kategori = $request->input("kategori");

            $tandaKategori = "=";
            if ($kategori == 0) $tandaKategori = ">";

            $tanda = "=";
            if ($active == "active") $active = "1";
            else if ($active == "banned") $active = "0";
            else {
                $tanda = ">";
                $active = "-1";
            }

            $barang = DB::table('barang')
                ->where("$field", "LIKE", "%$key%")
                ->where("active", "$tanda", "$active")
                ->where("id_kategori", $tandaKategori, $kategori)
                ->orderBy("$sortField", "$sortUrutan")
                ->get();

            $view = view("master.barang.tabel", compact("barang"));
            return $view;
        } else if ($action == "delete") {

            $id = $request->input("kode_barang");

            $p = DB::table('barang')
                ->where("kode_barang", "$id")
                ->value("active");

            if ($p == "1") {
                DB::table('barang')
                    ->where("kode_barang", "$id")
                    ->update(["active" => 0]);
            } else {
                DB::table('barang')
                    ->where("kode_barang", "$id")
                    ->update(["active" => 1]);
            }
            return;
        }
    }
    public function pageAddBarang()
    {
        $kategori = Kategori::all();
        return view("master.barang.add", compact("kategori"));
    }

    public function addBarang(Request $request)
    {
        $barang = new Barang();

        $kode = Barang::all()->count() + 1;
        $barang->kode_barang = "B" . sprintf("%04d", $kode);
        $barang->id_kategori = $request->kategori;
        $barang->nama_barang = $request->name;
        $barang->deskripsi_barang = $request->deskripsi;
        $barang->harga_barang = floatval($request->harga);
        $barang->stok_barang = $request->stok;

        $file = $request->file("gambar");
        $fileName = $barang->kode_barang . '.' . $file->getClientOriginalExtension();

        if ($barang->id_kategori == 1) {
            $path = "img/barang/unit";
        } else if ($barang->id_kategori == 2) {
            $path = "img/barang/sparepart";
        } else if ($barang->id_kategori == 3) {
            $path = "img/barang/aftermarket";
        } else {
            $path = "img/barang/interior";
        }

        $file->move(public_path($path), $fileName);
        $barang->gambar_barang = "$path/$fileName";

        $barang->save();
        return redirect("master/barang");
    }

    public function pageEditBarang(Request $request)
    {
        $param["barang"] = Barang::where("kode_barang", $request->kode)->first();
        $param["kategori"] = Kategori::all();

        return view("master.barang.edit", $param);
    }

    public function editBarang(Request $request)
    {
        $barang = Barang::where("kode_barang", $request->kode)->first();
        $barang->nama_barang = $request->name;
        $barang->deskripsi_barang = $request->deskripsi;
        $barang->harga_barang = floatval($request->harga);
        $barang->stok_barang = $request->stok;

        $file = $request->file("gambar");
        if ($file) {
            if ($barang->gambar_barang && File::exists(public_path($barang->gambar_barang))) {
                File::delete(public_path($barang->gambar_barang));
            }

            $fileName = $barang->kode_barang . '.' . $file->getClientOriginalExtension();

            if ($request->id_kategori == 1) {
                $path = "img/barang/unit";
            } else if ($barang->id_kategori == 2) {
                $path = "img/barang/sparepart";
            } else if ($barang->id_kategori == 3) {
                $path = "img/barang/aftermarket";
            } else {
                $path = "img/barang/interior";
            }

            $file->move(public_path($path), $fileName);
            $barang->gambar_barang = "$path/$fileName";
        } else if ($barang->id_kategori != $request->kategori) {

            $oldPath = public_path($barang->gambar_barang);
            if ($request->kategori == 1) {
                $path = "img/barang/unit";
            } else if ($request->kategori == 2) {
                $path = "img/barang/sparepart";
            } else if ($request->kategori == 3) {
                $path = "img/barang/aftermarket";
            } else {
                $path = "img/barang/interior";
            }

            $newFileName = pathinfo($oldPath, PATHINFO_FILENAME) . '.' . pathinfo($oldPath, PATHINFO_EXTENSION);
            $newFilePath = public_path("$path/$newFileName");

            if (File::exists($oldPath)) {
                File::move($oldPath, $newFilePath);
                $barang->gambar_barang = "$path/$newFileName";
            }
        }

        $barang->id_kategori = $request->kategori;
        $barang->save();
        return redirect("master/barang");
    }
}
