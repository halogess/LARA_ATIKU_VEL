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
    <nav class="w-full h-12 bg-white text-dark">
        <div class="judul h-auto w-auto ml-24 mt-4 float-left">
            <p class="font-bold">JJHC Automotive</p>
        </div>
        <div class="buttons h-auto w-auto mr-24 mt-4 float-right">
            <form action="" method="post">
                <input type="submit" value="Log In" class="mr-5 w-16 h-auto bg-gray-400 text-black p-1"><input
                    type="submit" value="Sign Up" class="w-16 h-auto bg-gray-400 text-black p-1">
            </form>
        </div>
    </nav>
    @yield('content')
</body>

</html>
