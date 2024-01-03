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
        @foreach ($chat as $item)
            {{$item->chat_content}}
        @endforeach
    </div>
</body>
</html>
