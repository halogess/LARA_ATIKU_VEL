@foreach ($pembeli as $item)
    <button type="submit" name="btnUser" value={{ $item->id_user }} id="{{ $item->id_user }}"
        onclick='show("{{ $item->id_user }}")'
        class="text-slate-50 flex items-center gap-2 @if (Session::get('chat_user') == $item->id_user) {{ 'bg-' }}
        @else {{ 'bg-slate-800' }} @endif w-full h-auto py-3 text-left px-4 hover:bg-slate-500">
        <img src="{{asset($item->foto_user)}}" class="w-10 rounded-full border-2 border-yellow-400">
        <div class="">{{ $item->nama_user }}</div>
        @if ($newMessage[$item->id_user] > 0)
            <div
                class="inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                {{ $newMessage[$item->id_user] }}
            </div>
        @endif
    </button>
    <hr>
@endforeach
