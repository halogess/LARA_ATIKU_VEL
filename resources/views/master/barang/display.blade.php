@extends('template.master.master')

@section('content')
    <div class="mt-4 ml-4 mr-4">
        @if (Session::has('message'))
            {{ Session::get('message') }}
        @endif

        <a href="{{ url('master/barang/add') }}"
            class="bg-black border-yellow-400 border-2 p-2 rounded-lg text-yellow-400 ml-2">Add Barang</a> <br> <br>
        Search By
        <select id="combo_box" class="border-2 border-yellow-400 bg-black text-yellow-400 p-2 rounded-lg inline-flex">
            <option value="kode_barang">Kode</option>
            <option value="nama_barang" selected>Nama</option>
            <option value="deskripsi_barang">Deskripsi</option>
        </select>

        <input type="search" id="search" placeholder="Search"
            class="border-2 border-yellow-400 bg-black text-yellow-400 p-2 rounded-lg inline-flex ml-4">
        Kategori
        <select id="kategori" class="border-2 border-yellow-400 p-2 rounded-lg inline-flex text-yellow-400 bg-black">
            <option value="0">All</option>
            @foreach ($kategori as $k)
                <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
            @endforeach
        </select>

            <input type="radio" name="rb" id="active" value="active" checked>
            <label for="active">Active</label>

            <input type="radio" name="rb" id="banned" value="banned">
            <label for="banned">Deleted</label>

            <input type="radio" name="rb" id="all" value="all">
            <label for="banned">All</label>

            <br><br>

        <div class="w-full overflow-x-auto">
            <table id="table" class="min w-full"></table>
        </div>

    </div>


    <script>
        var sortBy;
        var sortActive;

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            setUp();

            $("#search").keyup(function() {
                load();
            });

            $("#combo_box").change(function() {
                load();
            });

            $("#kategori").change(function() {
                load();
            });

            $('input[name="rb"]').change(function() {
                load();
            });

            $("#banned").change(function() {
                load();
            });
        });

        function setUp() {
            sortBy = [];
            sortBy["field"] = "kode_barang";
            sortBy["urutan"] = "asc";
            sortActive = "kode_asc";
            load();
        }

        function setSort() {
            hideAll();
            if (sortActive == "kode_asc") $("#kode_asc").show();
            else if (sortActive == "kode_dsc") $("#kode_dsc").show();
            else if (sortActive == "nama_asc") $("#nama_asc").show();
            else if (sortActive == "nama_dsc") $("#nama_dsc").show();
            else if (sortActive == "hrg_asc") $("#hrg_asc").show();
            else if (sortActive == "hrg_dsc") $("#hrg_dsc").show();
            else if (sortActive == "stok_asc") $("#stok_asc").show();
            else if (sortActive == "stok_dsc") $("#stok_dsc").show();
        }

        function ban(id) {
            $.ajax({
                url: "{{ route('loadBarang') }}",
                method: "post",
                data: {
                    action: "delete",
                    kode_barang: id
                },
                success: function(response) {
                    load();
                }
            });
        }

        function sort(param) {
            load();
        }

        function sortKode() {
            sortBy["field"] = "kode_barang";
            if (sortActive == "kode_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "kode_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "kode_asc";
            }
            sort(sortBy);
        }

        function sortName() {
            sortBy["field"] = "nama_barang";
            if (sortActive == "nama_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "nama_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "nama_asc";
            }
            sort(sortBy);
        }

        function sortHarga() {
            sortBy["field"] = "harga_barang";
            if (sortActive == "hrg_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "hrg_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "hrg_asc";
            }
            sort(sortBy);
        }

        function sortStok() {
            sortBy["field"] = "stok_barang";
            if (sortActive == "stok_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "stok_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "stok_asc";
            }
            sort(sortBy);
        }

        function hideAll() {
            $("#kode_asc").hide();
            $("#kode_dsc").hide();
            $("#nama_asc").hide();
            $("#nama_dsc").hide();
            $("#hrg_asc").hide();
            $("#hrg_dsc").hide();
            $("#stok_asc").hide();
            $("#stok_dsc").hide();
        }

        function load() {
            $.ajax({
                url: "{{ route('loadBarang') }}",
                method: "post",
                data: {
                    action: "load",
                    key: $("#search").val(),
                    combo_box: $("#combo_box").val(),
                    active: $('input[name="rb"]:checked').val(),
                    sortField: sortBy["field"],
                    sortUrutan: sortBy["urutan"],
                    kategori: $("#kategori").val(),
                },
                success: function(response) {
                    $("#table").html(response);
                    setSort();
                }
            });
        }
    </script>
@endsection
