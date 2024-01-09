@extends('template.admin.admin')

@section('content')
    <div class="h-screen pb-52 flex">

        {{-- customer --}}
        <div class="w-1/5">
            <div class="text-center text-slate-50 font-semibold pb-4 pt-4 bg-slate-900 h-auto">
                Customers
            </div>
            <div class="bg-slate-600 overflow-y-auto h-full w-full" id="isiCustomers"></div>
        </div>

        {{-- chat --}}

        <div class="w-4/5 bg-slate-600 h-full " id="chatContainer">
            <div class="h-full">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </div>

            <div class="text-center text-slate-50 font-semibold pb-4 pt-4 bg-slate-900 ada-user hidden">
                Customers
            </div>

            <div class="h-5/6 ada-user hidden">
                <div class="h-full bg-slate-400 text-center py-5 overflow-auto" id="isiChat"></div>
            </div>


            <div class="h-1/6 flex justify-between items-center align-middle w-full p-5 gap-5 bg-slate-900 ada-user hidden">
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
            loadCustomers();
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

        function loadCustomers() {
            $.ajax({
                url: "{{ route('loadCustomers') }}",
                method: "post",
                success: function(response) {
                    $("#isiCustomers").html(response);
                }
            });
        }

        function set() {
            chatInt = setInterval(function() {
                load();
                loadCustomers();
            }, 2000);
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
                    set();
                }
            });
        }

        $("#btnKirim").click(function() {
            var chat = $("#textChat").val();
            if (chat != "") {
                clearInterval(chatInt);
                $("#isiChat").append(
                    '<div class = "user-chat w-fit m-2 p-2 rounded ml-auto mr-7" style = "background-color: #000000;" >' +
                    '<p class = "text-white">' + $("#textChat").val() +
                    '</p> </div>');
                $("#textChat").val("");
                scrollChatToBottom();
                $.ajax({
                    url: "{{ route('adminSend') }}",
                    method: "post",
                    data: {
                        chat: chat
                    },
                    success: function(response) {
                        load();
                        loadCustomers();
                        set();
                    }
                });
            }

        })

        function scrollChatToBottom() {
            var chatContainer = document.getElementById('isiChat');
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
        $("#textChat").keypress(function(event) {
            if (event.which === 13) {
                event.preventDefault();
                $("#btnKirim").click();
            }
        });
    </script>
@endsection
