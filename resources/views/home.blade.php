@extends('template.main')

@section('content')
    <div class="content h-auto">
        <div id="animation-carousel" class="relative w-full mt-5" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden md:h-96">
                <!-- Item 1 -->
                <div class="duration-200 ease-linear" data-carousel-item>
                    <img src="{{ asset('porschetaycan.jpg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="duration-200 ease-linear" data-carousel-item>
                    <img src="{{ asset('fordranger.jpg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="duration-200 ease-linear" data-carousel-item="active">
                    <img src="{{ asset('wulingairev.jpg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="duration-200 ease-linear" data-carousel-item>
                    <img src="{{ asset('kiaev9.jpg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="duration-200 ease-linear" data-carousel-item>
                    <img src="{{ asset('chevroletcamaro.jpg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        {{-- menu awal --}}
        <div class="menu mt-20 ml-32 w-fit h-auto">
            <div class="unitmobil text-black float-left mr-5 w-64 h-40"
                style="background-image: url('{{ asset('unitmobil.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
                <b class="bottom-0 right-0 text-white text-right text-2xl">Unit</b>
            </div>
            <div class="spareparts text-black float-left mr-5 w-64 h-40"
                style="background-image: url('{{ asset('spareparts.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
                <b class="bottom-0 right-0 text-white text-right text-2xl">Spareparts</b>
            </div>
            <div class="aftermarket text-black float-left mr-5 w-64 h-40"
                style="background-image: url('{{ asset('aftermarket.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
                <b class="bottom-0 right-0 text-white text-right text-2xl">Aftermarket</b>
            </div>
            <div class="interior text-black float-right mr-5 w-64 h-40"
                style="background-image: url('{{ asset('interior.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
                <b class="bottom-0 right-0 text-white text-right text-2xl">Interior</b>
            </div>
        </div>

        {{-- alasan pilih --}}
        <div class="judul text-center mt-80 text-black w-auto h-auto">
            <p class="text-4xl">Why Choose Us?</p>
        </div>
        <div class="alasan1 relative text-right w-full h-96 p-5 overflow-hidden">
            <div class="blur-background absolute inset-0 w-full h-full"
                style="background-image: url('{{ asset('trusted.jpg') }}'); background-repeat: no-repeat; background-size: cover; filter: blur(4px); -webkit-filter: blur(8px);">
            </div>
            <div class="text-content relative text-white z-10">
                <p class="text-7xl mr-32 mt-32">Trusted</p>
                <p class="text-4xl mr-32">You can consult with admins who already have high experience. Don't be late
                    to check out our products!</p>
            </div>
        </div>
        <div class="alasan2 relative text-left w-full h-96 p-5 overflow-hidden">
            <div class="blur-background absolute inset-0 w-full h-full"
                style="background-image: url('{{ asset('secure.jpg') }}'); background-repeat: no-repeat; background-size: cover; filter: blur(4px); -webkit-filter: blur(8px);">
            </div>
            <div class="text-content relative text-white z-10">
                <p class="text-7xl ml-32 mt-32">Secure</p>
                <p class="text-4xl ml-32">All transactions carried out are protected by insurance that our company has and
                    has verified!</p>
            </div>
        </div>
    </div>
    <div class="alasan3 relative text-right w-full h-96 p-5 overflow-hidden">
        <div class="blur-background absolute inset-0 w-full h-full"
            style="background-image: url('{{ asset('express.jpeg') }}'); background-repeat: no-repeat; background-size: cover; filter: blur(4px); -webkit-filter: blur(8px);">
        </div>
        <div class="text-content relative text-white z-10">
            <p class="text-7xl mr-32 mt-32">Express</p>
            <p class="text-4xl mr-32">Checking, transactions and shipping are sent by fast and trusted agents. You
                won't be late trying!</p>
        </div>
    </div>
@endsection
