@php
    $notCurrentPage = 'text-yellow-400';
    $currentPage = 'text-black bg-yellow-400';

    $dashboardPage = $notCurrentPage;
    $barangPage = $notCurrentPage;
    $usersPage = $notCurrentPage;
    $transPage = $notCurrentPage;
    $reportPage = $notCurrentPage;

    if (Session::get('page') == 'dashboard') {
        $dashboardPage = $currentPage;
    } elseif (Session::get('page') == 'barang') {
        $barangPage = $currentPage;
    } elseif (Session::get('page') == 'users') {
        $usersPage = $currentPage;
    } elseif (Session::get('page') == 'trans') {
        $transPage = $currentPage;
    } elseif (Session::get('page') == 'report') {
        $transPage = $currentPage;
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

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
            <div class="flex gap-4 px-2 py-1" type="button">
                <a href="{{ url('admin/profile') }}"><img class="w-10 h-10 rounded-full border-2 border-yellow-400"
                        src="{{ Auth::user()->foto_user }}" alt="">
                </a>

                <div class="font-medium text-start">
                    <a href="{{ url('admin/profile') }}">
                        <div>{{ Auth::user()->nama_user }}</div>
                    </a>
                    <div class="text-sm text-yellow-400 font-extralight">Joined in August 2014</div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex w-screen min-h-screen">
        <div class="top-20 pt-24" id="navbar-hamburger">
            <ul class="top-20 font-medium fixed flex-row bg-black w-auto min-h-screen px-5">
                <li class="py-1">
                    <a href="{{ url('master') }}"
                        class=" {{ $dashboardPage }} flex items-center p-2 rounded-lg hover:bg-yellow-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-plus-lg flex-shrink-0 w-5 h-5" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                        </svg>
                        <div class="ms-3 whitespace-nowrap hidden md:flex">Dashboard</div>
                    </a>
                </li>
                <li class="py-1">
                    <a href="{{ url('master/barang') }}"
                        class="{{ $barangPage }} flex items-center p-2 rounded-lg hover:bg-yellow-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-pencil-square flex-shrink-0 w-5 h-5" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg>
                        <div class="ms-3 whitespace-nowrap hidden md:flex">Products</div>
                    </a>
                </li>
                <li class="py-1">
                    <a href="{{ url('master/users') }}"
                        class="{{ $usersPage }} flex items-center p-2 rounded-lg hover:bg-yellow-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-person-vcard flex-shrink-0 w-5 h-5" viewBox="0 0 16 16">
                            <path
                                d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                            <path
                                d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12z" />
                        </svg>
                        <div class="ms-3 whitespace-nowrap hidden md:flex">Users</div>
                    </a>
                </li>
                <li class="py-1">
                    <a href="{{ url('master/transaksi') }}"
                        class="{{ $transPage }} flex items-center p-2 rounded-lg hover:bg-yellow-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-receipt-cutoff flex-shrink-0 w-5 h-5" viewBox="0 0 16 16">
                            <path
                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                            <path
                                d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z" />
                        </svg>
                        <div class="ms-3 whitespace-nowrap hidden md:flex">Transactions</div>
                    </a>
                </li>

                <li class="py-1">
                    <a href="{{ url('master/report') }}"
                        class="{{ $reportPage }} flex items-center p-2 rounded-lg hover:bg-yellow-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-flag flex-shrink-0 w-5 h-5" viewBox="0 0 16 16">
                            <path
                                d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z" />
                        </svg>
                        <div class="ms-3 whitespace-nowrap hidden md:flex">Customer Reports</div>
                    </a>
                </li>
                <li class="py-1">
                    <a href="{{ url('master/profile') }}"
                        class="flex items-center p-2 text-yellow-400 rounded-lg hover:bg-yellow-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-shield-lock flex-shrink-0 w-5 h-5" viewBox="0 0 16 16">
                            <path
                                d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56" />
                            <path
                                d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
                        </svg>
                        <div class="ms-3 whitespace-nowrap hidden md:flex">My Account</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>

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
        clearInterval(int);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('loadDetailTransMaster') }}",
            method: "post",
            data: {
                no: nomor_nota
            },
            success: function(response) {
                $("#content").html(response);
            }
        });
    }
</script>
