@extends("template.admin.history")

@section('subcontent')
    <div id="data"></div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function load() {
                $.ajax({
                    url: "{{ route('loadCanceled') }}",
                    method: "post",
                    success: function(response) {
                        $("#data").html(response);
                    }
                });
            }
            load();
        });
    </script>
@endsection
