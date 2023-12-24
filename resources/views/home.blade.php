@extends('template.main')

@section('content')
    <div class="">
        <div class="flex w-full">
            <img src="{{ asset('/img/GTR-R34.jpg') }}" class="w-full">
            
        </div>

        {{-- menu awal --}}
        <div class="menu justify-between items-center mt-20 w-auto h-auto">
            <p class="text-center text-yellow-400 text-4xl">Products</p>
            <hr class="my-6 sm:mx-auto border-yellow-400 lg:my-8">
            <div class="flex flex-wrap justify-center">
                <div class="unitmobil text-black justify-evenly float-left ml-3 mr-5 mt-5 w-64 h-40"
                    style="background-image: url('{{ asset('/img/GTR-R34.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
                    <b class="bottom-0 right-0 text-white text-right text-2xl">Unit</b>
                </div>
                <div class="spareparts text-black justify-evenly float-left mr-5 mt-5 w-64 h-40"
                    style="background-image: url('{{ asset('/img/Rb26Engine.jpeg') }}'); background-repeat: no-repeat; background-size: cover;">
                    <b class="bottom-0 right-0 text-white text-right text-2xl">Spareparts</b>
                </div>
                <div class="aftermarket text-black justify-evenly float-left mr-5 mt-5 w-64 h-40"
                    style="background-image: url('{{ asset('/img/Aftermarkets.jpeg') }}'); background-repeat: no-repeat; background-size: cover;">
                    <b class="bottom-0 right-0 text-white text-right text-2xl">Aftermarket</b>
                </div>
                <div class="interior text-black justify-evenly float-left mr-5 mt-5 w-64 h-40"
                    style="background-image: url('{{ asset('/img/Cabin.jpeg') }}'); background-repeat: no-repeat; background-size: cover;">
                    <b class="bottom-0 right-0 text-white text-right text-2xl">Interior</b>
                </div>
            </div>
        </div>

        {{-- alasan pilih --}}
        <div class="judul text-center mt-[100px] text-black w-auto h-auto">
            <p class="text-4xl text-yellow-400">Why Choose Us?</p>
        </div>
        <div class="alasan1 relative text-right w-full h-96 p-5 overflow-hidden mt-6">
            <div class="blur-background absolute inset-0 w-full h-full"
                style="background-image: url('{{ asset('/img/hyperion.jpg') }}'); background-repeat: no-repeat; background-size: cover; filter: blur(8px); -webkit-filter: blur(8px);">
            </div>
            <div class="text-content relative text-black z-10">
                <p class="text-7xl mr-32 mt-20">Trusted</p>
                <p class="text-4xl mr-32">You can consult with admins who already have high experience. Don't be late
                    to check out our products!</p>
            </div>
        </div>
        <div class="alasan2 relative text-left w-full h-96 p-5 overflow-hidden">
            <div class="blur-background absolute inset-0 w-full h-full"
                style="background-image: url('{{ asset('/img/ironcraft.jpeg') }}'); background-repeat: no-repeat; background-size: cover; filter: blur(8px); -webkit-filter: blur(8px);">
            </div>
            <div class="text-content relative text-black z-10">
                <p class="text-7xl ml-32 mt-20">Secure</p>
                <p class="text-4xl ml-32">All transactions carried out are protected by insurance that our company had and
                    has verified!</p>
            </div>
        </div>
    </div>
    <div class="alasan3 relative text-right w-full h-96 p-5 overflow-hidden">
        <div class="blur-background absolute inset-0 w-full h-full"
            style="background-image: url('{{ asset('/img/regera.jpeg') }}'); background-repeat: no-repeat; background-size: cover; filter: blur(8px); -webkit-filter: blur(8px);">
        </div>
        <div class="text-content relative text-black z-10">
            <p class="text-7xl mr-32 mt-20">Express</p>
            <p class="text-4xl mr-32">Checking, transactions and shipping are sent by fast and trusted agents. You
                won't be late trying!</p>
        </div>
    </div>
@endsection
