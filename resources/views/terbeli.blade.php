@extends('template.main')

@section('content')
    <div class="detailBarang w-3/4 mt-5 ml-40 mr-5 bg-gray-300 border-black border-x-2 border-y-2 p-10 text-center">
        <p class="text-black text-6xl">Selamat!</p>
        <p class="text-black text-2xl">Anda berhasil membeli</p>
        <table class="mx-auto mt-10" border="1">
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Subtotal</th>
            </tr>
            <tr>
                @foreach ($cart as $c)
                    <td>{{ $c['kode_barang'] }}</td>
                    <td>{{ $c['nama_barang'] }}</td>
                    <td>{{ $c['jumlahBeli'] }}</td>
                    <td>{{ $c['subtotalBeli'] }}</td>
                @endforeach
            </tr>
        </table>
        <img src="{{ asset('img/success.png') }}" alt="" class="w-1/2 h-1/2 mt-5 ml-56">
    </div>
@endsection
