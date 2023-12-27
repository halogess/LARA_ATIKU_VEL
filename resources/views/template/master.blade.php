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

    <nav class="w-full h-20 p-3 bg-black text-yellow-400">
        <p>Welcome, Master!</p>
        <a href="{{url('master/pembeli')}}" class="border-2 border-black p-1">Pembeli</a>
        <a href="{{url('master/admin')}}" class="border-2 border-black p-1">Admin</a>
        <a href="{{url('master/barang')}}" class="border-2 border-black p-1">Barang</a>
        <a href="{{url('logout')}}" class="border-2 border-black p-1">Logout</a>

    </nav>
    @yield('content')

</body>

</html>
