<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/style/cdn.tailwindcss.com_3.3.3"></script>
</head>

<body>

    <nav class="w-full h-20 p-3 bg-gray-400 text">
        <p>Welcome, Master!</p>
        <form action="" class="mt-2">
            <input type="submit" value="List Pembeli" class="ml-64 mr-16"><input type="submit" value="List Admin"
                class="mr-16"><input type="submit" value="List Barang" class="mr-16"><input type="submit"
                value="List Pesanan" class="mr-16"><input type="submit" value="List Transaksi" class="mr-16"><input
                type="submit" value="Chat Server">
        </form>
    </nav>
    @yield('content')

    <div class="footer w-full h-auto bg-gray-500 bottom-0 text-center">
        <p class="text-lg">JJHC Automotive @2023 Copyright</p>
    </div>
</body>

</html>