<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="/style/cdn.tailwindcss.com_3.3.3"></script>
</head>

<body>
    <div class="w-full h-screen bg-[#f8d1b0]">
        <nav class="w-full h-20 bg-[#546175] text-[#e7dfdc]">
            <div class="judul h-auto w-auto ml-24 float-left">
                <p class="font-bold text-4xl pt-4">JJHC Automotive</p>
            </div>
            <div class="buttons h-auto w-auto mr-24 mt-5 pb-4 float-right">
                <a href={{ url('/') }}
                    class="mr-5 w-16 h-auto text-[#e7dfdc] p-2 rounded-xl hover:cursor-pointer font-bold text-xl"> Home
                </a>
                <a href={{ url('login') }}
                    class="mr-5 w-16 h-auto text-[#e7dfdc] p-2 rounded-xl hover:cursor-pointer font-bold text-xl"> Log
                    In </a>
                <a href={{ url('register') }}
                    class="w-auto h-auto bg-[#433537] text-[#e7dfdc] p-3 rounded-xl hover:cursor-pointer font-bold text-xl drop-shadow-lg">
                    Sign Up</a>
            </div>
        </nav>
        <div class="flex justify-center items-center">
            @yield('content')

        </div>

        <footer class="bg-[#546175] text-[#e7dfdc] mt-[60px]">
            <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="https://flowbite.com/" class="flex items-center">
                            <img src="/img/image.png" class="h-36 me-3" alt="FlowBite Logo" />
                            <span
                                class="self-center text-2xl font-semibold whitespace-nowrap">JJHC Automotive</span>
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
                                    <p>Jawa Timur, 60284</p></p>
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

    </div>
</body>

</html>
