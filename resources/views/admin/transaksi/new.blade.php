@extends('template.admin')
@section('content')
    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    <div id="newTrans"></div>

    <script>
        var int;
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function load() {
                $.ajax({
                    url: "{{ route('loadNewTrans') }}",
                    method: "post",
                    success: function(response) {
                        $("#newTrans").html(response);
                    }
                });
            }

            load();

            int = setInterval(function() {
                load();
            }, 5000);

        });

        function showDetail(nomor_nota) {
            clearInterval(int);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            alert("oke");
            $.ajax({
                url: "{{ route('loadDetailTrans') }}",
                method: "post",
                data:{
                    no : nomor_nota
                },
                success: function(response) {
                    $("#newTrans").html(response);
                }
            });
        }
    </script>
@endsection
