@extends('template.admin')
@section('content')
    <div class="border-2 border-black rounded-lg p-5 mx-5">
        <div id="newTrans"></div>
    </div>

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
                        $("#newTrans").html(response);
                    }
                });
            }

            load();

            // Refresh every 10 seconds (adjust the interval as needed)
            setInterval(function() {
                load();
            }, 10000);

        });
    </script>
@endsection
