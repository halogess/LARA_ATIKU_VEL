<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JJHC</title>
    <script src="/style/tailwind.js"></script>
    <script src="/style/jquery.js"></script>
    <style>
        table,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    {{-- <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Pass</th>
            <th>Saldo</th>
        </tr>

        @foreach ($users as $user)
            <tr>
                <td>{{ $user['id_pembeli'] }}</td>
                <td>{{ $user['username_pembeli'] }}</td>
            </tr>
        @endforeach

    </table> --}}


    <nav class="w-full h-20 bg-black text-[#e7dfdc]">
        <div class="judul h-auto w-auto ml-24 float-left">
            <p class="font-bold text-4xl pt-4 text-yellow-400">JJHC Automotive</p>
        </div>
        <div class="buttons h-auto w-auto mr-24 mt-5 pb-4 float-right">
            <a href={{url("/")}} class="mr-5 w-16 h-auto text-yellow-400 p-2 rounded-xl hover:cursor-pointer font-bold text-xl"> Home </a>
            <a href={{url("login")}} class="mr-5 w-16 h-auto text-yellow-400 p-2 rounded-xl hover:cursor-pointer font-bold text-xl"> Log In </a>
            <a href={{url("register")}} class="w-auto h-auto text-yellow-400 p-3 rounded-xl hover:cursor-pointer font-bold text-xl drop-shadow-lg"> Sign Up</a>
        </div>
    </nav>
    <div class="flex min-h-full flex-col justify-center px-6 py-9 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-28 w-auto" src="/img/logo.png"
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">@yield('title')</h2>
            {{-- <a href="{{ url('/') }}">Back</a> --}}
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" method="POST">
                @csrf

                @yield('form')

            </form>
        </div>
    </div>
    <footer class="bg-black text-[#e7dfdc] pb-9">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <p class="flex items-center">
                        <img src="/img/logo.png" class="h-36 me-3 " alt="FlowBite Logo" />
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap text-yellow-400">JJHC Automotive</span>
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-yellow-400 uppercase">Explore</h2>
                        <ul class="text-yellow-400 font-medium">
                            <li>
                                <p>Unit</p>
                            </li>
                            <li>
                                <p>Spareparts</p>
                            </li>
                            <li>
                                <p>Aftermarket</p>
                            </li>
                            <li>
                                <p>Interior</p>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-yellow-400 uppercase">Visit
                        </h2>
                        <ul class="text-yellow-400 font-medium">
                            <li>
                                <p>Jl. Ngagel Jaya Tengah 73-77</p>
                            </li>
                            <li>
                                <p>Baratajaya</p>
                            </li>
                            <li>
                                <p>Kec. Gubeng</p>
                            </li>
                            <li>
                                <p>Kota Surabaya</p>
                            </li>
                            <li>
                                <p>Jawa Timur, 60284</p></p>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-yellow-400 uppercase">Social Media</h2>
                        <ul class="text-yellow-400 font-medium">
                            <li>
                                <p class="hover:underline">Instagram</p>
                            </li>
                            <li>
                                <p class="hover:underline">Facebook</p>
                            </li>
                            <li>
                                <p class="hover:underline">Youtube</p>
                            </li>
                            <li>
                                <p class="hover:underline">Tiktok</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-yellow-400 sm:mx-auto lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-yellow-400 sm:text-center">© 2023
                    <a>JJHC Automotive™</a>.
                </span>
            </div>
        </div>
    </footer>
</body>

</html>
