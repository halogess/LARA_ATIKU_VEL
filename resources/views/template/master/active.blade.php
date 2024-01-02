@extends('template.master.master')

@section('content')
    @php
        $notCurrentPage = 'text-black bg-yellow-400';
        $currentPage = 'text-yellow-400 bg-black';

        $navNew = $notCurrentPage;
        $navPacking = $notCurrentPage;
        $navShipping = $notCurrentPage;
        $navDelivered = $notCurrentPage;

        $linkNew = 'master/transaksi/new';
        $linkPacking = 'master/transaksi/packing';
        $linkShipping = 'master/transaksi/shipping';
        $linkDelivered = 'master/transaksi/delivered';
        $linkAll = 'master/transaksi/active';

        if (Session::get('nav') == 'new') {
            $navNew = $currentPage;
            $linkNew = $linkAll;
        } elseif (Session::get('nav') == 'packing') {
            $navPacking = $currentPage;
            $linkPacking = $linkAll;
        } elseif (Session::get('nav') == 'shipping') {
            $navShipping = $currentPage;
            $linkShipping = $linkAll;
        } elseif (Session::get('nav') == 'delivered') {
            $navDelivered = $currentPage;
            $linkDelivered = $linkAll;
        }
    @endphp

    <div class="flex gap-3 items-center w-full">
        <a href="{{ url('master/transaksi') }}"
            class="bg-red-700 text-white border border-black text-xs rounded w-auto text-center px-2 py-1">Back
        </a>

        <div class="w-full">
            <ul class="flex text-sm font-medium text-center text-black my-5">
                <li class="w-full">
                    <a href="{{ url($linkNew) }}"
                        class=" {{ $navNew }} inline-block w-full p-1 rounded-s-xl border border-black hover:text-yellow-400 hover:bg-black shadow">
                        New</a>
                </li>
                <li class="w-full">
                    <a href="{{ url($linkPacking) }}"
                        class=" {{ $navPacking }} inline-block w-full p-1 border border-black border-x-0 hover:text-yellow-400 hover:bg-black shadow">
                        Packing</a>
                </li>
                <li class="w-full">
                    <a href="{{ url($linkShipping) }}"
                        class="{{ $navShipping }}  inline-block w-full p-1 border border-black border-r-0 hover:text-yellow-400 hover:bg-black shadow">
                        Shipping</a>
                </li>
                <li class="w-full">
                    <a href="{{ url($linkDelivered) }}"
                        class=" {{ $navDelivered }} inline-block w-full p-1 rounded-e-xl border border-black hover:text-yellow-400 hover:bg-black shadow">
                        Delivered</a>
                </li>
            </ul>
        </div>

        <div class=" hidden sm:flex gap-3 text-sm items-center w-auto">
            <div id="btnSort"
                class="bg-yellow-400 text-black border border-black rounded-md w-auto h-auto hover:text-yellow-400 hover:bg-black">
                <input id="sort" value="{{ Session::get('sort') }}" type="button" class="hidden">
                <div class="flex ps-1 items-center"> Sort
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-arrow-up-short @if (Session::get("sort") == "desc") hidden @endif" viewBox="0 0 16 16" id="asc">
                        <path fill-rule="evenodd"
                            d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-arrow-down-short @if (Session::get("sort") == "asc") hidden @endif" viewBox="0 0 16 16" id="desc">
                        <path fill-rule="evenodd"
                            d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4" />
                    </svg>
                </div>
            </div>

            <div class="flex border border-black rounded bg-gray-50 h-full">
                <input type="search" id="search" value="{{ Session::get('search') }}"
                    class="w-full text-xs text-gray-900 border-none rounded bg-gray-50 p-1 px-2"
                    placeholder="&#128269; Name">
            </div>
        </div>
    </div>

    <div id="konten">
        @yield('subcontent')
    </div>
@endsection
