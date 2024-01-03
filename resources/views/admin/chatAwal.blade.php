<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Chat</title>
    <script src="/style/tailwind.js"></script>
    <script src="/style/jquery.js"></script>
</head>
<body>
    <div class="w-1/5 bg-slate-600 h-screen float-left overflow-auto">
        <div class="text-center text-slate-50 font-semibold pb-4 pt-4">
            CHAT
        </div>
        <form action="{{ route('adminChat') }}" method="post">
            @csrf
            @foreach ($namaUsers as $item)
                <button type="submit" name="btnUser" value={{$item->id_user}} class="text-slate-50 bg-slate-500 w-full h-fit py-3 text-left px-4 hover:bg-slate-800">
                    {{$item->nama_user}}
                </button>
                <hr>
            @endforeach
        </form>
    </div>
    <div class="w-4/5 bg-slate-600 h-screen float-left">
        {{-- <div class="w-full bg-slate-400 text-center">

        </div>
        @foreach ($chat as $c)
                    @if ($c->pengirim === 'user')
                        <div class="admin-chat w-fit m-2 p-2 rounded" style="background-color: #FFFF00;">
                            <p class="text-black">
                                {{$c->chat_content}}
                            </p>
                        </div>
                    @else
                        <div class="user-chat w-fit m-2 p-2 rounded ml-auto mr-7"
                            style="background-color: #000000;">
                            <p class="text-white">
                                {{$c->chat_content}}
                            </p>
                        </div>
                    @endif
                @endforeach

        <div class="relative w-full h-12 bg-pink-400 mt-10">
            <div class="absolute inset-x-0 bottom-0 h-16 ...">08</div>
          </div> --}}
    </div>
</body>
</html>
