@extends('template.main')

@section('content')
    <div class="detailBarang w-3/4 mt-5 ml-40 mr-5 bg-gray-300 border-black border-x-2 border-y-2 p-10 text-center">
        <p class="text-black text-6xl">Selamat!</p>
        <p class="text-black text-2xl">Anda berhasil membeli {{ $jumlah }} barang</p>
        <img src="{{ asset('img/success.png') }}" alt="" class="w-1/2 h-1/2 mt-5 ml-56">
    </div>
@endsection
