@extends('template.mainUser')

@section('navbarUser')
    <nav class="bg-black">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <p class="text-yellow-400">JJHC Automotive</p>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                    <li>
                        <a href="#" class="block py-2 px-3 text-yellow-400 rounded md:bg-transparent md:p-0"
                            aria-current="page">Home</a>

                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-yellow-400 md:p-0">Cart</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}"
                            class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-yellow-400 md:p-0">Log
                            Out</a>
                    </li>
                    <li>
                        <p
                            class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-yellow-400 md:p-0">
                            Welcome, {{ Auth::user()->nama_user}}</p>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    {{-- px py buat lebih responsif untuk panjang atau tinggi --}}
    <div class="searcBar w-full bg-[#f8cc2d] px-16 py-8">
        <form action="" class="">
            <input type="text" name="keyword" id="keyword" placeholder="TOYOTA AVANZA" class="w-full p-3 rounded">
        </form>
    </div>

    <div id="hasil-pencarian"></div>

    {{-- merk mobil --}}
    <div class="merkMobil w-full h-auto px-16 py-8">
        <p class="text-5xl text-black font-semibold font-serif">Merk Mobil</p>
        <div class="line1 w-full mt-5">
            <div class="mobil1 px-4 py-4 border-black border-x-2 border-y-2 w-1/6 text-center rounded float-left"
                style="transition: transform .2s;">
                <img src="{{ asset('img/toyota.jpeg') }}" alt="" style="width: 200px; height: 100px;">
                <p>Toyota</p>
            </div>
            <div class="mobil2 px-4 py-4 border-black border-x-2 border-y-2 w-1/6 text-center ml-10 rounded float-left"
                style="transition: transform .2s;">
                <img src="{{ asset('img/daihatsu.png') }}" alt="" style="width: 200px; height: 100px;">
                <p>Daihatsu</p>
            </div>
            <div class="mobil3 px-4 py-4 border-black border-x-2 border-y-2 w-1/6 text-center ml-10 rounded float-left"
                style="transition: transform .2s;">
                <img src="{{ asset('img/honda1.png') }}" alt="" style="width: 200px; height: 100px;">
                <p>Honda</p>
            </div>
            <div class="mobil4 px-4 py-4 border-black border-x-2 border-y-2 w-1/6 text-center ml-10 rounded float-left"
                style="transition: transform .2s;">
                <img src="{{ asset('img/suzuki.jpg') }}" alt="" style="width: 200px; height: 100px;">
                <p>Suzuki</p>
            </div>
            <div class="mobil5 px-4 py-4 border-black border-x-2 border-y-2 w-1/6 text-center ml-10 rounded float-left"
                style="transition: transform .2s;">
                <img src="{{ asset('img/mitsubishi.png') }}" alt="" style="width: 200px; height: 100px;">
                <p>Mitsubishi</p>
            </div>
        </div>

        <div class="line2 w-full mt-56">
            <div class="mobil1 px-4 py-4 border-black border-x-2 border-y-2 w-1/6 text-center rounded float-left">
                <img src="{{ asset('img/hyundai.jpg') }}" alt="" style="width: 200px; height: 100px;">
                <p>Hyundai</p>
            </div>
            <div class="mobil2 px-4 py-4 border-black border-x-2 border-y-2 w-1/6 text-center ml-10 rounded float-left">
                <img src="{{ asset('img/wuling.png') }}" alt="" style="width: 200px; height: 100px;">
                <p>Wuling</p>
            </div>
            <div class="mobil3 px-4 py-4 border-black border-x-2 border-y-2 w-1/6 text-center ml-10 rounded float-left">
                <img src="{{ asset('img/chery.jpg') }}" alt="" style="width: 200px; height: 100px;">
                <p>Chery</p>
            </div>
            <div class="mobil4 px-4 py-4 border-black border-x-2 border-y-2 w-1/6 text-center ml-10 rounded float-left">
                <img src="{{ asset('img/kia.jpeg') }}" alt="" style="width: 200px; height: 100px;">
                <p>KIA</p>
            </div>
            <div class="mobil5 px-4 py-4 border-black border-x-2 border-y-2 w-1/6 text-center ml-10 rounded float-left">
                <img src="{{ asset('img/nissan.png') }}" alt="" style="width: 200px; height: 100px;">
                <p>Nissan</p>
            </div>
        </div>
    </div>

    {{-- mobil sesuai anggaran --}}
    <div class="anggaran w-full h-auto px-16 py-8 mt-48">
        <p class="text-5xl text-black font-semibold font-serif">Mobil Sesuai Anggaran</p>
        <form action="" class="mt-5" id="myForm">
            <input type="button" value="Dibawah Rp 150 Juta" class="mr-10 bg-black text-white p-2 rounded" id="harga1"
                onclick="showContent('harga1')">
            <input type="button" value="Dibawah Rp 200 Juta" class="mr-10 bg-black text-white p-2 rounded" id="harga2"
                onclick="showContent('harga2')">
            <input type="button" value="Rp 200 - 400 Juta" class="mr-10 bg-black text-white p-2 rounded" id="harga3"
                onclick="showContent('harga3')">
            <input type="button" value="Rp 400 - 800 Juta" class="mr-10 bg-black text-white p-2 rounded" id="harga4"
                onclick="showContent('harga4')">
            <input type="button" value="Rp 800 - 1200 Juta" class="mr-10 bg-black text-white p-2 rounded" id="harga5"
                onclick="showContent('harga5')">
            <input type="button" value="Diatas Rp 1200 Juta" class="mr-10 bg-black text-white p-2 rounded"
                id="harga6" onclick="showContent('harga6')">
        </form>

        <div id="contohMobil" class="w-full h-auto pt-3 "></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            var inputNama = $('#keyword');
            var hasilPencarian = $('#hasil-pencarian');

            inputNama.on('input', function() {
                var keyword = inputNama.val();

                if (keyword === '') {
                    hasilPencarian.html('');
                    return;
                }

                $.ajax({
                    url: '/search',
                    type: 'GET',
                    data: {
                        keyword: keyword
                    },
                    success: function(data) {
                        hasilPencarian.html(data);
                    }
                });
            });
        });

        function showContent(buttonId) {
            // Menentukan isi yang sesuai dengan tombol yang diklik
            var content = getContentForButton(buttonId);

            // Menampilkan isi di dalam result-container
            document.getElementById('contohMobil').innerHTML = content;
        }

        // Fungsi untuk mendapatkan isi sesuai dengan tombol yang diklik
        function getContentForButton(buttonId) {
            switch (buttonId) {
                case 'harga1':
                    var ayla = "{{ asset('img/ayla.png') }}";
                    var brio = "{{ asset('img/brio.jpg') }}";
                    var agya = "{{ asset('img/agya.png') }}";
                    return "<div class='float-left'><img src='" + ayla +
                        "' style='width: 300px; height: 200px;'></img><p>Daihatsu Ayla</p></div><div class='float-left'><img src='" +
                        brio +
                        "' style='width: 350px; height: 200px;'></img><p>Honda Brio</p></div><div><img src='" +
                        agya +
                        "' style='width: 300px; height: 200px;'></img><p>Daihatsu Agya</p></div>";
                case 'harga2':
                    var sigra = "{{ asset('img/sigra.png') }}";
                    var calya = "{{ asset('img/calya.png') }}";
                    var spresso = "{{ asset('img/spresso.png') }}";
                    return "<div class='float-left'><img src='" + sigra +
                        "' style='width: 300px; height: 200px;'></img><p>Daihatsu Sigra</p></div><div class='float-left'><img src='" +
                        calya +
                        "' style='width: 300px; height: 200px;'></img><p>Toyota Calya</p></div><div class='float-left'><img src='" +
                        spresso +
                        "' style='width: 300px; height: 200px;'></img><p>Suzuki S Presso</p></div>";
                case 'harga3':
                    var ayla = "{{ asset('img/innovaD.png') }}";
                    var brio = "{{ asset('img/HRV.png') }}";
                    var agya = "{{ asset('img/ayla.jpg') }}";
                    return "<div class='float-left'><img src='" + ayla +
                        "' style='width: 300px; height: 200px;'></img><p>Toyota Innova Reborn Diesel</p></div><div class='float-left'><img src='" +
                        "'></img><p></p></div><div class='float-left'><img src='" + brio +
                        "' style='width: 300px; height: 200px;'></img><p>HRV RS</p></div><div class='float-left'><img src='" +
                        "'></img><p></p></div>";
                case 'harga4':
                    var ayla = "{{ asset('img/civicT.png') }}";
                    var brio = "{{ asset('img/audiA3.png') }}";
                    var agya = "{{ asset('img/ayla.jpg') }}";
                    return "<div class='float-left'><img src='" + ayla +
                        "' style='width: 300px; height: 200px;'></img><p>Civic Turbo Type R</p></div><div class='float-left'><img src='" +
                        "'></img><p></p></div><div class='float-left'><img src='" + brio +
                        "' style='width: 300px; height: 200px;'></img><p>Audi A3</p></div><div class='float-left'><img src='" +
                        "'></img><p></p></div>";
                case 'harga5':
                    var ayla = "{{ asset('img/Palisade.png') }}";
                    var brio = "{{ asset('img/Ioniq.png') }}";
                    var agya = "{{ asset('img/ayla.jpg') }}";
                    return "<div class='float-left'><img src='" + ayla +
                        "' style='width: 380px; height: 200px;'></img><p>Hyundai Palisade</p></div><div class='float-left'><img src='" +
                        "'></img><p></p></div><div class='float-left'><img src='" + brio +
                        "' style='width: 350px; height: 200px;'></img><p>Ioniq 6</p></div><div class='float-left'><img src='" +
                        "'></img><p></p></div>";
                case 'harga6':
                    var ayla = "{{ asset('img/Pagani.png') }}";
                    var brio = "{{ asset('img/AgeraR.png') }}";
                    var agya = "{{ asset('img/VenomF5.png') }}";
                    return "<div class='float-left'><img src='" + ayla +
                        "' style='width: 320px; height: 200px;'></img><p>Pagani Zonda Kiryu</p></div><div class='float-left'><img src='" +
                        "'></img><p></p></div><div class='float-left'><img src='" + brio +
                        "' style='width: 350px; height: 200px;'></img><p>Koenisegg Agera R</p></div><div class='float-left'><img src='" +
                        "'></img><p></p></div>" +
                        "<div class='float-left'><img src='" + agya +
                        "' style='width: 320px; height: 200px;'></img><p>Hennessey Venom F5</p></div><div class='float-left'><img src='";
                default:
                    return "Silahkan pilih filter yang cocok...";
            }
        }
    </script>
@endsection
