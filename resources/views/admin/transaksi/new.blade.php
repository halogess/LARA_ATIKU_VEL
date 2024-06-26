@extends('template.admin.admin')
@section('content')
    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    <div id="konten"></div>

    <script>
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
                        $("#konten").html(response);
                    }
                });
            }

            load();

            let int = setInterval(function() {
                load();
            }, 5000);

        });
    </script>
@endsection
