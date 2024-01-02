@extends('template.master.master')

@section('content')
    <form method="POST" enctype="multipart/form-data">
        @csrf

        <img src='{{ asset("$barang->gambar_barang") }}' alt="Picture" class="w-1/3">
        Ubah Gambar :
        <input type="file" name="gambar" accept=".jpg, .jpeg, .png"><br><br>

        Kode Barang : <input type="text" name="kode" readonly value="{{ $barang->kode_barang }}"
            class="border-2 border-black p-1 ml-2"><br><br>
        Nama Barang : <input type="text" name="name" value="{{ $barang->nama_barang }}"
            class="border-2 border-black p-1 ml-[2px]"><br><br>

        Kategori :
        <select name="kategori" class="border-2 border-gray-950 p-2 inline-flex ml-[38px]">
            @foreach ($kategori as $k)
                <option value="{{ $k->id_kategori }}" @if ($barang->id_kategori == $k->id_kategori) selected @endif>
                    {{ $k->nama_kategori }}</option>
            @endforeach
        </select><br>

        Deskripsi : <br>
        <textarea name="deskripsi" class="border-2 border-black p-1 resize-none ml-[108px] mt-4" rows="5">{{ $barang->deskripsi_barang }}</textarea><br><br>

        Harga : <input type="number" name="harga" step="1000" value="{{ $barang->harga_barang }}"
            class="border-2 border-black ml-[52px]"><br>
        Stok : <input type="number" name="stok" value="{{ $barang->stok_barang }}" class="border-2 border-black ml-[64px]"><br>

        <a href="{{ url('master/barang') }}" class="border-2 border-black p-1">Cancel</a>
        <input type="submit" value="Update" class="border-2 border-black p-1">
    </form>
@endsection
