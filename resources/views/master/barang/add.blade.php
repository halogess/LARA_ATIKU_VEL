@extends('template.master.master')

@section('content')
    <form method="POST" enctype="multipart/form-data">
        @csrf

        <div class="ml-4 mt-4">
            Nama Barang : <input type="text" name="name" class="border-2 border-black bg-gray-200 text-black"><br><br>

            Kategori :
            <select name="kategori" class="border-2 border-yellow-400 bg-black text-yellow-400 p-2 inline-flex ml-9">
                @foreach ($kategori as $k)
                    <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select><br><br>

            Deskripsi Barang : <br>
            <textarea type="text" name="deskripsi" rows="10" cols="50" class="border-2 border-black bg-gray-200 text-black resize-none ml-[108px] mt-4 "></textarea><br> <br>

            Harga : <input type="number" name="harga" step="1000" class="border-2 border-black bg-gray-200 text-black ml-14"><br><br>
            Stok : <input type="number" name="stok" class="border-2 border-black bg-gray-200 text-black ml-[68px]"><br><br>

            Gambar :
            <input type="file" name="gambar" accept=".jpg, .jpeg, .png" ><br><br>
            <input type="submit" value="Add Barang" class="border-2 border-yellow-400 bg-black text-yellow-400 p-1">
    </form>
    </div>
@endsection
