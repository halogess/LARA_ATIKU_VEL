@extends('template.admin.admin')

@section('content')
    <div class="flex">
        <div class="text-center w-1/5 text-slate-50 font-semibold pb-4 pt-4 bg-slate-950 h-auto">
            Customers
        </div>
        <div class="text-end pe-10 w-full text-slate-50 font-semibold pb-4 pt-4 bg-slate-950 h-auto">
            Chats
        </div>
    </div>
    <div class="h-screen pb-52 flex">

        {{-- customer --}}
        <div class="w-1/5">
            <div class="bg-slate-600 overflow-y-auto h-full w-full" id="isiCustomers"></div>
        </div>

        {{-- chat --}}
        <div class="w-4/5 bg-slate-600 h-full" id="chatContainer">
            <div class="h-full w-1/3 mx-auto flex justify-items-center text-white" id="gada-user">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat-dots-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                </svg>

            </div>

            <div class="h-5/6 ada-user">
                <div class="h-full bg-slate-400 text-center py-5 overflow-y-auto overflow-x-hidden" id="isiChat"></div>
            </div>


            <div class="h-1/6 flex justify-between items-center align-middle w-full p-5 gap-5 bg-slate-900 ada-user">
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
        let userScrolled = false;

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var pembeli = @json(session('chat_user', ''));
            if (pembeli == "") {
                $(".ada-user").hide();
                $("#gada-user").show();
            } else {
                $(".ada-user").show();
                $("#gada-user").hide();
            }
            load();
            loadCustomers();
            set();
        });

        function scrollChatToUser() {
            var idPenggunaDichat = @json(session('chat_user', ''));
            alert("oke");
            if (idPenggunaDichat != "") {
                var userElement = $('#' + idPenggunaDichat);

                if (userElement.length > 0) {
                    $('#isiCustomers').animate({
                        scrollTop: userElement.offset().top - $('#isiCustomers').offset().top + $('#isiCustomers').scrollTop()
                    }, 1000);

                }
            }
        }

        $('#isiChat').on('scroll', function() {
            if ($('#isiChat').scrollTop() < ($('#isiChat')[0].scrollHeight - $('#isiChat').height()) + 20) {
                userScrolled = true;
            } else {
                userScrolled = false;
            }
        });

        function load() {
            $.ajax({
                url: "{{ route('adminChat') }}",
                method: "post",
                success: function(response) {
                    $("#isiChat").html(response);
                    if (!userScrolled) {
                        scrollChatToBottom();
                    }
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
            }, 1000);
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
                    load();
                    loadCustomers();
                    scrollChatToBottom();
                    set();
                }
            });
            $(".ada-user").show();
            $("#gada-user").hide();
            userScrolled = false;


        }

        $("#btnKirim").click(function() {
            var chat = $("#textChat").val();
            if (chat != "") {
                clearInterval(chatInt);


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
                        $("#textChat").val("");
                        scrollChatToBottom();
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
