@extends('template.master.active')
@section('subcontent')
    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    <div id="data"></div>

    <script>
        let int;
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            load();
            int = setInterval(function() {
                load();
            }, 5000);

            $("#btnSort").click(function() {
                if ($("#sort").val() == "asc") {
                    $("#sort").val("desc");
                    $("#desc").removeClass("hidden");
                    $("#asc").addClass("hidden");

                } else {
                    $("#sort").val("asc");
                    $("#asc").removeClass("hidden");
                    $("#desc").addClass("hidden");

                }
                load();
            });

            $("#search").keyup(
                function() {
                    load();
                }
            );
        })

        function load() {
            $.ajax({
                url: "{{ route('loadActiveMaster') }}",
                method: "post",
                data: {
                    sort: $("#sort").val(),
                    search: $("#search").val()
                },
                success: function(response) {
                    $("#data").html(response);
                }
            });
        }

    </script>
@endsection
