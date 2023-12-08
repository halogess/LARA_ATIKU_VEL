@extends('template.master')

@section('content')
    Search By
    <select id="combo_box" class="border-2 border-gray-950 p-2 rounded-lg inline-flex">
        <option value="id_admin">ID</option>
        <option value="nama_admin">Name</option>
        <option value="username_admin">Username</option>
        <option value="telp_admin">Phone Number</option>
    </select>

    <input type="search" id="search" placeholder="Search" class="border-2 border-gray-950 p-2 rounded-lg inline-flex">

    <div>
        <input type="radio" name="rb" id="active" value="active">
        <label for="active">Active</label>

        <input type="radio" name="rb" id="banned" value="banned">
        <label for="banned">Banned</label>

        <input type="radio" name="rb" id="all" value="all" checked>
        <label for="banned">All</label>
    </div>

    <table id="table"></table>

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
            sortBy["field"] = "id_admin";
            sortBy["urutan"] = "asc";
            sortActive = "id_asc";
            load();
        }

        function setSort(){
            hideAll();
            if(sortActive == "id_asc") $("#id_asc").show();
            else if(sortActive == "id_dsc") $("#id_dsc").show();
            else if(sortActive == "nama_asc") $("#nama_asc").show();
            else if(sortActive == "nama_dsc") $("#nama_dsc").show();
            else if(sortActive == "usr_asc") $("#usr_asc").show();
            else if(sortActive == "usr_dsc") $("#usr_dsc").show();
            else if(sortActive == "telp_asc") $("#telp_asc").show();
            else if(sortActive == "telp_dsc") $("#telp_dsc").show();
        }

        function ban(id) {
            $.ajax({
                url: "{{ route('loadAdmin') }}",
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}',
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
            sortBy["field"] = "id_admin";
            if (sortActive=="id_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "id_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "id_asc";
            }
            sort(sortBy);
        }

        function sortName() {
            sortBy["field"] = "nama_admin";
            if (sortActive=="nama_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "nama_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "nama_asc";
            }
            sort(sortBy);
        }

        function sortUsername() {
            sortBy["field"] = "username_admin";
            if (sortActive=="usr_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "usr_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "usr_asc";
            }
            sort(sortBy);
        }

        function sortTelp() {
            sortBy["field"] = "telp_admin";
            if (sortActive=="telp_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "telp_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "telp_asc";
            }
            sort(sortBy);
        }

        function sortSaldo() {
            sortBy["field"] = "saldo";
            if (sortActive=="saldo_asc") {
                sortBy["urutan"] = "desc";
                sortActive = "saldo_dsc"
            } else {
                sortBy["urutan"] = "asc";
                sortActive = "saldo_asc";
            }
            sort(sortBy);
        }

        function hideAll(){
            $("#id_asc").hide();
            $("#id_dsc").hide();
            $("#nama_asc").hide();
            $("#nama_dsc").hide();
            $("#usr_asc").hide();
            $("#usr_dsc").hide();
            $("#telp_asc").hide();
            $("#telp_dsc").hide();
            $("#saldo_asc").hide();
            $("#saldo_dsc").hide();
        }

        function load() {
            $.ajax({
                url: "{{ route('loadAdmin') }}",
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
