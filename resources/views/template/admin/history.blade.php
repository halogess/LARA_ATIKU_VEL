@extends('template.admin.admin')

@section('content')
    @php
        $notCurrentPage = 'text-black bg-yellow-400';
        $currentPage = 'text-yellow-400 bg-black';

        $navCompleted = $notCurrentPage;
        $navCanceled = $notCurrentPage;

        $linkCompleted = 'admin/history/completed';
        $linkCanceled = 'admin/history/canceled';
        $linkAll = 'admin/history';

        if (Session::get('nav') == 'completed') {
            $navCompleted = $currentPage;
            $linkCompleted = $linkAll;
        } elseif (Session::get('nav') == 'canceled') {
            $navCanceled = $currentPage;
            $linkCanceled = $linkAll;
        }

    @endphp
    <div id="konten">
        <ul class="flex text-sm font-medium text-center text-black my-5">
            <li class="w-full">
                <a href='{{ url($linkCompleted) }}'
                    class="{{ $navCompleted }} inline-block w-full p-1 rounded-s-xl border border-black border-r-0 hover:text-yellow-400 hover:bg-black shadow">
                    Completed</a>
            </li>
            <li class="w-full">
                <a href="{{ url($linkCanceled) }}"
                    class="{{ $navCanceled }} inline-block w-full p-1 rounded-e-xl border border-black hover:text-yellow-400 hover:bg-black shadow">
                    Canceled</a>
            </li>
        </ul>
        @yield('subcontent')
    </div>
@endsection
