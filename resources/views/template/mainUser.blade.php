<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/style/cdn.tailwindcss.com_3.3.3"></script>
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

    <footer class="bg-[#546175] text-[#e7dfdc] mt-[150px]">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="https://flowbite.com/" class="flex items-center">
                        <img src="/img/image.png" class="h-36 me-3" alt="FlowBite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap">JJHC Automotive</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase dark:text-white">Explore</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
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
                        <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase dark:text-white">Visit
                        </h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
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
                        <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase dark:text-white">Social Media</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
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
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023
                    <a>JJHC Automotive™</a>.
                </span>
            </div>
        </div>
    </footer>
</body>

</html>
