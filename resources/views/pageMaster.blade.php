@extends('template.master')

@section('content')
    <div class="content w-full" style="height: 550px;">
        <div class="topBarang mt-5 ml-72 p-5 mr-10 border-black bg-gray-400 w-60 h-96 float-left">
            <p class="text-dark text-center text-xl">- Top 10 Transaksi -</p>
        </div>
        <div class="topAdmin mt-5 mr-10 p-5 border-black bg-gray-400 w-60 h-96 float-left">
            <p class="text-dark text-center text-xl">- Top 10 Pembeli -</p>
        </div>
        <div class="income mt-5 mr-10 p-5 border-black bg-gray-400 w-60 h-96 float-left">
            <p class="text-dark text-center text-xl">- Income -</p>
        </div>
    </div>
@endsection
