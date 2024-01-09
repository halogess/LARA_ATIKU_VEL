@extends('template.admin.admin')

@section('content')
    <div class="h-screen pb-52 flex">

        {{-- customer --}}
        <div class="w-1/5">
            <div class="text-center text-slate-50 font-semibold pb-4 pt-4 bg-slate-900 h-auto">
                Customers
            </div>
            <div class="bg-slate-600 overflow-y-auto h-full w-full">
                @foreach ($pembeli as $item)
                    <a href='{{ url("admin/chat/$item->id_user") }}'>
                        <button type="submit" name="btnUser" value={{ $item->id_user }} id="{{ $item->id_user }}"
                            onclick='show("{{ $item->id_user }}")'
                            class="text-slate-50 @if (Session::get('chat_user') == $item->id_user) {{ 'bg-yellow-400' }}
        @else {{ 'bg-slate-800' }} @endif w-full h-auto py-3 text-left px-4 hover:bg-slate-800">
                            {{ $item->nama_user }}
                        </button>
                        <hr>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- chat --}}
        <div class="w-4/5 bg-slate-600 h-full" id="chatContainer">

            <div class="text-center text-slate-50 font-semibold pb-4 pt-4 bg-slate-900">
                Customers
            </div>

            <div class="h-5/6">
                <div class="h-full bg-slate-400 text-center py-5 overflow-auto" id="isiChat">

                </div>
            </div>


            <div class="h-1/6 flex justify-between items-center align-middle w-full p-5 gap-5 bg-slate-900">
                <input type="text" name="textChat" id="textChat" class="w-full p-2 rounded h-full">
                <button type="button"
                    class="rounded w-fit h-full text-lg p-5 hover:bg-yellow-400 bg-slate-400 flex items-center"
                    id="btnKirim">
                    <img src="/img/send_icon.png" alt="" class="w-6 h-7">
                </button>
            </div>
        </div>
    </div>

    <script>
        let chatInt;
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            load();
            set();
        });

        function load() {
            $.ajax({
                url: "{{ route('adminChat') }}",
                method: "post",
                success: function(response) {
                    $("#isiChat").html(response);
                    scrollChatToBottom();

                }
            });
        }

        function set() {
            chatInt = setInterval(function() {
                load();
            }, 5000);
        }

        function show(param) {
            clearInterval(chatInt);
            $.ajax({
                url: "{{ route('showChat') }}",
                method: "post",
                data: {
                    id_pembeli: param
                },
                success: function() {
                    loadCustomers();
                    load();
                }
            });
        }


        $("#btnKirim").click(function() {
            $.ajax({
                url: "{{ route('adminSend') }}",
                method: "post",
                data: {
                    chat: $("#textChat").val()
                },
                success: function(response) {
                    alert("oke");
                    $("#textChat").val("");
                    $("#isiChat").append(response);
                    scrollChatToBottom();
                }
            });
        })

        function scrollChatToBottom() {
            var chatContainer = document.getElementById('isiChat');
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
    </script>
@endsection
