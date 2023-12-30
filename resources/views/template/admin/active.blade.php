@extends('template.admin.admin')

@section('content')
    @php
        $notCurrentPage = 'text-black bg-yellow-400';
        $currentPage = 'text-yellow-400 bg-black';

        $navPacking = $notCurrentPage;
        $navShipping = $notCurrentPage;
        $navDelivered = $notCurrentPage;

        $linkPacking = 'admin/transaksi/active/packing';
        $linkShipping = 'admin/transaksi/active/shipping';
        $linkDelivered = 'admin/transaksi/active/delivered';
        $linkAll = 'admin/transaksi/active';

        if (Session::get('nav') == 'packing') {
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
    <div id="konten">
        <ul class="flex text-sm font-medium text-center text-black my-5">
            <li class="w-full">
                <a href='{{ url($linkPacking) }}'
                    class="{{ $navPacking }} inline-block w-full p-1 rounded-s-xl border border-black hover:text-yellow-400 hover:bg-black shadow">
                    Packing</a>
            </li>
            <li class="w-full">
                <a href="{{ url($linkShipping) }}"
                    class="{{ $navShipping }} inline-block w-full p-1 border border-black border-x-0 hover:text-yellow-400 hover:bg-black shadow">
                    Shipping</a>
            </li>
            <li class="w-full">
                <a href="{{ url($linkDelivered) }}"
                    class="{{ $navDelivered }} inline-block w-full p-1 rounded-e-xl border border-black hover:text-yellow-400 hover:bg-black shadow">
                    Delivered</a>
            </li>
        </ul>
        @yield('subcontent')
    </div>
@endsection
