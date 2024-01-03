<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Chat</title>
    <script src="/style/tailwind.js"></script>
    <script src="/style/jquery.js"></script>

    <style>
        #btnKirim:hover {
            background-color: yellow;
            color: black;
        }
    </style>
</head>

<body>
    <div class="w-1/5 bg-slate-600 h-screen float-left overflow-auto">
        <div class="text-center text-slate-50 font-semibold pb-4 pt-4">
            CHAT
        </div>
        <form action="{{ route('adminChat') }}" method="post">
            @csrf
            @foreach ($namaUsers as $item)
                <button type="submit" name="btnUser" value={{ $item->id_user }}
                    class="text-slate-50 bg-slate-500 w-full h-fit py-3 text-left px-4 hover:bg-slate-800">
                    {{ $item->nama_user }}
                </button>
                <hr>
            @endforeach
        </form>
    </div>

    <div class="w-4/5 bg-slate-600 h-screen float-left relative" id="chatContainer">
        <div class="w-full bg-slate-400 text-center">

        </div>
        @foreach ($chat as $c)
            @if ($c->pengirim === 'user')
                <div class="admin-chat w-fit m-2 p-2 rounded" style="background-color: #FFFF00;">
                    <p class="text-black">
                        {{ $c->chat_content }}
                    </p>
                </div>
            @else
                <div class="user-chat w-fit m-2 p-2 rounded ml-auto mr-7" style="background-color: #000000;">
                    <p class="text-white">
                        {{ $c->chat_content }}
                    </p>
                </div>
            @endif
        @endforeach

        <div class="absolute inset-x-0 bottom-0 w-full h-12 mt-10">
            <div class="absolute inset-x-0 text-center">
                <form action="" method="post">
                    @csrf
                    <input type="text" name="textChat" id="textChat" class="w-3/4 p-2 float-left ml-36">
                    <button type="button" class="py-1 px-4 rounded mt-2 w-fit text-lg float-left mx-2" id="btnKirim">
                        <img src="/img/send_icon.png" alt="" class="w-6 h-7">
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
        $('#btnKirim').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{{ route('adminSend') }}',
            data: $('#chatForm').serialize(),
            dataType: 'json',
            success: function(response) {
                var chatContainer = $('#chatContainer');
                var newChatDiv = $('<div></div>');
                newChatDiv.addClass(response.pengirim === 'admin' ? 'admin-chat w-fit m-2 p-2 rounded' : 'user-chat w-fit m-2 p-2 rounded ml-auto mr-7');
                newChatDiv.css('background-color', response.pengirim === 'admin' ? '#FFFF00' : '#000000');

                var newChatP = $('<p></p>');
                newChatP.addClass(response.pengirim === 'admin' ? 'text-black' : 'text-white');
                newChatP.text(response.chat_content);

                newChatDiv.append(newChatP);
                chatContainer.append(newChatDiv);

                $('#inputChat').val('');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                console.error(status);
                console.error(error);
            }
        });
    });
});
    </script>
</body>

</html>
