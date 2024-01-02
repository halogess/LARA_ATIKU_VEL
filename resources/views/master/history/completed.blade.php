@extends('template.master.history')
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

            $("#fieldSort").change(function() {
                load();
            });

            $("#start").blur(function() {
                clearInterval(int);
                load();
                int = setInterval(function() {
                    load();
                }, 5000);
            });

            $("#end").blur(function() {
                clearInterval(int);
                load();
                int = setInterval(function() {
                    load();
                }, 5000);
            });

            $("#search").keyup(
                function() {
                    load();
                }
            );
        })

        function load() {
            $.ajax({
                url: "{{ route('loadCompletedMaster') }}",
                method: "post",
                data: {
                    sort: $("#sort").val(),
                    search: $("#search").val(),
                    start: $("#start").val(),
                    end: $("#end").val(),
                    fieldSort: $("#fieldSort").val(),
                },
                success: function(response) {
                    $("#data").html(response);
                }
            });
        }
    </script>
@endsection
