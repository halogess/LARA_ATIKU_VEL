<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/style/cdn.tailwindcss.com_3.3.3"></script>
    <script src="/style/tailwind.js"></script>
    <script src="/style/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <style>
        #harga1:hover {
            background-color: yellow;
            color: black;
        }

        #harga2:hover {
            background-color: yellow;
            color: black;
        }

        #harga3:hover {
            background-color: yellow;
            color: black;
        }

        #harga4:hover {
            background-color: yellow;
            color: black;
        }

        #harga5:hover {
            background-color: yellow;
            color: black;
        }

        #harga6:hover {
            background-color: yellow;
            color: black;
        }

        .mobil1:hover {
            transform: scale(1.5);
        }

        .mobil2:hover {
            transform: scale(1.5);
        }

        .mobil3:hover {
            transform: scale(1.5);
        }

        .mobil4:hover {
            transform: scale(1.5);
        }

        .mobil5:hover {
            transform: scale(1.5);
        }
    </style>
</head>

<body>
    @yield('navbarUser')
    @yield('content')

    <footer class="bg-black text-[#e7dfdc] mt-[200px]">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="https://flowbite.com/" class="flex items-center">
                        <img src="/img/logo.png" class="h-36 me-3" alt="FlowBite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap text-yellow-400">JJHC Automotive</span>
                    </a>
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
                                <p>Jawa Timur, 60284</p>
                                </p>
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
            <hr class="my-6 border-yellow-400 sm:mx-auto  lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-yellow-400 sm:text-center">© 2023
                    <a>JJHC Automotive™</a>.
                </span>
            </div>
        </div>
    </footer>
</body>

</html>
