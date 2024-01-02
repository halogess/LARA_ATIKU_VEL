@extends('template.master.master')

@section('content')
    @php
        $notCurrentPage = 'text-black bg-yellow-400';
        $currentPage = 'text-yellow-400 bg-black';

        $navCompleted = $notCurrentPage;
        $navCanceled = $notCurrentPage;

        $linkCompleted = 'master/transaksi/completed';
        $linkCanceled = 'master/transaksi/canceled';
        $linkAll = 'master/transaksi/history';

        if (Session::get('nav') == 'completed') {
            $navCompleted = $currentPage;
            $linkCompleted = $linkAll;
        } elseif (Session::get('nav') == 'canceled') {
            $navCanceled = $currentPage;
            $linkCanceled = $linkAll;
        }

    @endphp

    <div class="flex gap-3 items-center w-full">
        <a href="{{ url('master/transaksi') }}"
            class="bg-red-700 text-white border border-black text-xs rounded w-auto text-center px-2 py-1 align-middle">Back
        </a>

        <div class="w-full">
            <ul class="flex text-sm font-medium text-center text-black my-3">
                <li class="w-full">
                    <a href="{{ url($linkCompleted ) }}"
                        class=" {{ $navCompleted }} inline-block w-full p-1 rounded-s-xl border border-black hover:text-yellow-400 hover:bg-black shadow">
                        Completed</a>
                </li>
                <li class="w-full">
                    <a href="{{ url($linkCanceled ) }}"
                        class=" {{ $navCanceled }} inline-block w-full p-1 rounded-e-xl border border-black border-s-0 hover:text-yellow-400 hover:bg-black shadow">
                        Canceled</a>
                </li>
            </ul>
        </div>


    </div>
    <div class="hidden sm:flex justify-center items-center gap-3 text-sm mb-5 w-full mx-auto">
        <div class="flex w-full">
            <div date-rangepicker datepicker-format="dd M yyyy"
                class="flex items-center w-full text-xs border border-black rounded">
                <input id="start" type="text" value="{{ Session::get('start') }}"
                    class="text-gray-900 text-sm rounded-s py-0.5 px-1 w-1/2 border-none text-center"
                    placeholder="📅 Select date start">
                <div class="mx-1 text-black">to</div>
                <input id="end" type="text" value="{{ Session::get('end') }}"
                    class="text-gray-900 text-sm py-0.5 px-1 w-1/2 border-none rounded-e text-center"
                    placeholder="📅 Select date end">

            </div>
        </div>


        <div class="flex rounded w-full border rounded-x border-black bg-yellow-400 p-0 items-stretch">
            <div class="text-xs rounded-s p-1 w-full text-nowrap border-none block text-center">Sort By</div>

            <select id="fieldSort" class="text-black text-xs border-none h-auto ps-1 w-full">
                <option value="nomor_nota" @if (Session::get('fieldSort') == 'nomor_nota') selected @endif>Invoice No</option>
                <option value="total_harga" @if (Session::get('fieldSort') == 'total_harga') selected @endif>Amount</option>
            </select>

            <div id="btnSort" class=" text-black rounded-e w-auto h-auto hover:text-yellow-400 hover:bg-black">
                <input id="sort" value="{{ Session::get('sort') }}" type="button" class="hidden">
                <div class="flex items-center border-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-arrow-up-short @if (Session::get('sort') == 'desc') hidden @endif" viewBox="0 0 16 16"
                        id="asc">
                        <path fill-rule="evenodd"
                            d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-arrow-down-short @if (Session::get('sort') == 'asc') hidden @endif" viewBox="0 0 16 16"
                        id="desc">
                        <path fill-rule="evenodd"
                            d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4" />
                    </svg>
                </div>
            </div>

        </div>

        <div class="flex border border-black rounded bg-gray-50 h-full w-full">
            <input type="search" id="search" value="{{ Session::get('search') }}"
                class="w-full text-xs text-gray-900 border-none rounded bg-gray-50 p-1 px-2" placeholder="&#128269; Name">
        </div>
    </div>

    <div id="konten">
        @yield('subcontent')
    </div>
@endsection
