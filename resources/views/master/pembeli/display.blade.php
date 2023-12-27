@extends('template.master')

@section('content')
    <div class="mt-4 ml-4 mr-4">
        Search By
        <select id="combo_box" class="border-2 border-yellow-400 bg-black text-yellow-400 p-2 rounded-lg inline-flex">
            <option value="id_user">ID</option>
            <option value="nama_user">Name</option>
            <option value="username">Username</option>
            <option value="telp">Phone Number</option>
        </select>

        <input type="search" id="search" placeholder="Search" class="border-2 border-yellow-400 text-yellow-400 bg-black p-2 rounded-lg inline-flex">

        <div>
            <input type="radio" name="rb" id="active" value="active" checked>
            <label for="active">Active</label>

            <input type="radio" name="rb" id="banned" value="banned">
            <label for="banned">Banned</label>

            <input type="radio" name="rb" id="all" value="all">
            <label for="banned">All</label>
        </div>

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

            $('input[name="rb"]').change(function() {
                load();
            });

            $("#banned").change(function() {
                load();
            });
        });

        function setUp() {
            sortBy = [];
            sortBy["field"] = "id_user";
            sortBy["urutan"] = "asc";
            sortActive = "id_asc";
            load();
        }

        function setSort() {
            hideAll();
            if (sortActive == "id_asc") $("#id_asc").show();
            else if (sortActive == "id_dsc") $("#id_dsc").show();
            else if (sortActive == "nama_asc") $("#nama_asc").show();
            else if (sortActive == "nama_dsc") $("#nama_dsc").show();
            else if (sortActive == "usr_asc") $("#usr_asc").show();
            else if (sortActive == "usr_dsc") $("#usr_dsc").show();
            else if (sortActive == "telp_asc") $("#telp_asc").show();
            else if (sortActive == "telp_dsc") $("#telp_dsc").show();
        }

        function ban(id) {
            $.ajax({
                url: "{{ route('loadAdmin') }}",
                method: "post",
                data: {
                    action: "delete",
                    id_admin: id
                },
                success: function(response) {
                    load();
                }
            });
        }

        function sort(param) {
            load();
        }

        function sortID() {
            sortBy["field"] = "id_user";
            if (sortActive == "id_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "id_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "id_asc";
            }
            sort(sortBy);
        }

        function sortName() {
            sortBy["field"] = "nama_user";
            if (sortActive == "nama_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "nama_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "nama_asc";
            }
            sort(sortBy);
        }

        function sortUsername() {
            sortBy["field"] = "username";
            if (sortActive == "usr_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "usr_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "usr_asc";
            }
            sort(sortBy);
        }

        function sortTelp() {
            sortBy["field"] = "telp";
            if (sortActive == "telp_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "telp_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "telp_asc";
            }
            sort(sortBy);
        }

        function hideAll() {
            $("#id_asc").hide();
            $("#id_dsc").hide();
            $("#nama_asc").hide();
            $("#nama_dsc").hide();
            $("#usr_asc").hide();
            $("#usr_dsc").hide();
            $("#telp_asc").hide();
            $("#telp_dsc").hide();
        }

        function load() {
            $.ajax({
                url: "{{ route('loadPembeli') }}",
                method: "post",
                data: {
                    action: "load",
                    key: $("#search").val(),
                    combo_box: $("#combo_box").val(),
                    active: $('input[name="rb"]:checked').val(),
                    sortField: sortBy["field"],
                    sortUrutan: sortBy["urutan"],
                },
                success: function(response) {
                    $("#table").html(response);
                    setSort();
                }
            });
        }
    </script>
@endsection
