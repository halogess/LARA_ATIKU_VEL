@extends("template.admin.history")

@section('subcontent')
    <div id="data" class="overscroll-contain scroll-m-0"></div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function load() {
                $.ajax({
                    url: "{{ route('loadHistory') }}",
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
