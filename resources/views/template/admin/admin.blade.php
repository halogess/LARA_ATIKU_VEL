@php
    $notCurrentPage = 'text-yellow-400';
    $currentPage = 'text-black bg-yellow-400';

    $newPage = $notCurrentPage;
    $activePage = $notCurrentPage;
    $chatPage = $notCurrentPage;
    $historyPage = $notCurrentPage;
    $profilePage = $notCurrentPage;

    if (Session::get('page') == 'new') {
        $newPage = $currentPage;
    } elseif (Session::get('page') == 'active') {
        $activePage = $currentPage;
    } elseif (Session::get('page') == 'chat') {
        $chatPage = $currentPage;
    } elseif (Session::get('page') == 'history') {
        $historyPage = $currentPage;
    } else if(Session::get('page') == 'profile'){
        $profilePage = $currentPage;
    }
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JJHC</title>
    <script src="/style/tailwind.js"></script>
    <script src="/style/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <style>
        body {
            overflow-x: hidden;
        }

        body::-webkit-scrollbar {
            width: 0px;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #ffffff00;
            border-radius: 0px;
        }

        body::-webkit-scrollbar-track {
            background-color: #ffffff00;
        }
    </style>
</head>

<body class="bg-slate-100">
    <nav class="fixed w-full h-20 bg-black text-yellow-400 flex justify-between px-5 shadow-2xl">
        <div class="h-auto w-auto float-left flex justify-center align-middle items-center ">
            <button data-collapse-toggle="navbar-hamburger" type="button" onclick="ganti()" id="button_ham"
                class="mr-5 inline-flex items-center justify-center w-10 h-10 text-yellow-400 rounded-lg hover:border-yellow-400 hover:border-2"
                aria-controls="navbar-hamburger" aria-expanded="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
            </button>
            <p class="font-bold hidden sm:inline text-sm sm:text-2xl md:text-4xl text-yellow-400">JJHC Automotive</p>
            <p class="font-bold text-2xl sm:hidden text-yellow-400">JJHC</p>

        </div>
        <div href="admin/profile" class="h-full w-auto flex items-center align-middle p-2">
            <div class="flex gap-4 px-2 py-1 items-center" type="button">
                <a href="{{ url('admin/profile') }}"><img class="w-10 h-10 rounded-full border-2 border-yellow-400"
                        src='{{ asset(Auth::user()->foto_user) }}' alt="">
                </a>

                <div class="font-medium text-start">
                    <a href="{{ url('admin/profile') }}">
                        <div>{{ Auth::user()->nama_user }}</div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex w-screen min-h-screen">
        <div class="top-20 pt-24" id="navbar-hamburger">
            <ul class="top-20 font-medium fixed flex-row bg-black w-auto min-h-screen px-5">
                <li class="py-1">
                    <a href="{{ url('admin/transaksi/new') }}"
                        class=" {{ $newPage }} flex items-center p-2 rounded-lg hover:bg-yellow-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-plus-lg flex-shrink-0 w-5 h-5" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                        </svg>
                        <div class="ms-3 whitespace-nowrap hidden md:flex">New Orders</div>
                    </a>
                </li>
                <li class="py-1">
                    <a href="{{ url('admin/transaksi/active') }}"
                        class="{{ $activePage }} flex items-center p-2 rounded-lg hover:bg-yellow-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-pencil-square flex-shrink-0 w-5 h-5" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg>
                        <div class="ms-3 whitespace-nowrap hidden md:flex">Processing Orders</div>
                    </a>
                </li>
                <li class="py-1">
                    <a href="{{url('admin/chat')}}"
                        class="{{ $chatPage }} flex items-center p-2 rounded-lg hover:bg-yellow-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-chat-dots flex-shrink-0 w-5 h-5" viewBox="0 0 16 16">
                            <path
                                d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            <path
                                d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2" />
                        </svg>
                        <div class="ms-3 whitespace-nowrap hidden md:flex">Chat</div>
                    </a>
                </li>

                <li class="py-1">
                    <a href="{{ url('admin/history') }}"
                        class="{{ $historyPage }} flex items-center p-2 rounded-lg hover:bg-yellow-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-clock-history flex-shrink-0 w-5 h-5" viewBox="0 0 16 16">
                            <path
                                d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483m.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535m-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                            <path
                                d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
                        </svg>
                        <div class="ms-3 whitespace-nowrap hidden md:flex">History</div>
                    </a>
                </li>
                <li class="py-1">
                    <a href="{{ url('admin/profile') }}"
                        class="{{ $profilePage }} flex items-center p-2 rounded-lg hover:bg-yellow-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-person flex-shrink-0 w-5 h-5" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <div class="ms-3 whitespace-nowrap hidden md:flex">Profile</div>
                    </a>
                </li>
                <li class="py-1">
                    <a href="{{ url('logout') }}"
                        class="flex items-center p-2 text-yellow-400 rounded-lg hover:bg-yellow-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-box-arrow-right flex-shrink-0 w-5 h-5" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                            <path fill-rule="evenodd"
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                        <div class="ms-3 whitespace-nowrap hidden md:flex">Logout</div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="px-20 pt-28 ps-36 md:ps-72 min-h-80 w-full items-stretch" id="content">
            @yield('content')
        </div>
    </div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

<script>
    isOpen = false;

    function ganti() {
        if (isOpen) {
            $("#button_ham").html(
                '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/></svg>'
            );
            $("#content").addClass("ps-36 md:ps-72");
            isOpen = false;
        } else {
            $("#button_ham").html(
                '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" /></svg>'
            );
            $("#content").removeClass("ps-36 md:ps-72");
            isOpen = true;
        }

    }

    function showDetail(nomor_nota) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('loadDetailTrans') }}",
            method: "post",
            data: {
                no: nomor_nota
            },
            success: function(response) {
                $("#konten").html(response);
            }
        });
    }
</script>
