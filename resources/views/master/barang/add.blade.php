@extends("template.master")

@section("content")

<form method="POST" enctype="multipart/form-data">
    @csrf
    Nama Barang : <input type="text" name="name" class="border-2 border-black"><br>

    Kategori :
    <select name="kategori" class="border-2 border-gray-950 p-2 inline-flex">
        @foreach ($kategori as $k)
            <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
        @endforeach
    </select><br>

    Deskripsi Barang : <textarea type="text" name="deskripsi" rows="10" cols="50" class="border-2 border-black resize-none"></textarea><br>

    Harga : <input type="number" name="harga" step="1000" class="border-2 border-black"><br>
    Stok : <input type="number" name="stok" class="border-2 border-black"><br>

    Gambar :
    <input type="file" name="gambar" accept=".jpg, .jpeg, .png"><br>
    <input type="submit" value="Add Barang" class="border-2 border-black p-1">
</form>
@endsection
