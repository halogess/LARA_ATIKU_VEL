<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="/style/tailwind.js"></script>
    <script src="/style/jquery.js"></script>

</head>

<body class="bg-gray-200">
    <nav class="w-full h-20 bg-black text-[#e7dfdc]">
        <div class="judul h-auto w-auto ml-24 float-left">
            <p class="font-bold text-4xl pt-4 text-yellow-400">JJHC Automotive</p>
        </div>
        <div class="buttons h-auto w-auto mr-24 mt-5 pb-4 float-right">
            <a href={{ url('master/pembeli') }}
                class="mr-5 w-16 h-auto text-yellow-400 p-2 rounded-xl hover:cursor-pointer font-bold text-xl"> Pembeli
            </a>
            <a href={{ url('master/admin') }}
                class="mr-5 w-16 h-auto text-yellow-400 p-2 rounded-xl hover:cursor-pointer font-bold text-xl"> Admin
            </a>
            <a href={{ url('master/barang') }}
                class="w-auto h-auto text-yellow-400 p-3 rounded-xl hover:cursor-pointer font-bold text-xl drop-shadow-lg">
                Barang</a>
            <a href={{ url('logout') }}
                class="w-auto h-auto text-yellow-400 p-3 rounded-xl hover:cursor-pointer font-bold text-xl drop-shadow-lg">
                Logout</a>
        </div>
    </nav>
    @yield('content')
</body>

</html>
