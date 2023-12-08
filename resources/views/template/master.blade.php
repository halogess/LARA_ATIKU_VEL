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

<body>

    <nav class="w-full h-20 p-3 bg-gray-400 text">
        <p>Welcome, Master!</p>
        <a href="{{url('master/pembeli')}}">List Pembeli</a>
        <a href="{{url('master/admin')}}">List Admin</a>

    </nav>
    @yield('content')

</body>

</html>
