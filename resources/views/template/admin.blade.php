<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/style/tailwind.js"></script>
    <script src="/style/jquery.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <nav>
        <a href="{{url('admin/transaksi/new')}}">New</a>

    </nav>

    @yield("content")
</body>
</html>
