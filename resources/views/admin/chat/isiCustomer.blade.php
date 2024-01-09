@foreach ($pembeli as $item)
    <button type="submit" name="btnUser" value={{ $item->id_user }} id="{{ $item->id_user }}"
        onclick='show("{{ $item->id_user }}")'
        class="text-slate-50 @if (Session::get('chat_user') == $item->id_user) {{ 'bg-yellow-400' }}
        @else {{ 'bg-slate-800' }} @endif w-full h-auto py-3 text-left px-4 hover:bg-slate-800">
        {{ $item->nama_user }}
        @if ($newMessage[$item->id_user] > 0)
            <div
                class="inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                {{ $newMessage[$item->id_user] }}
            </div>
        @endif
    </button>
    <hr>
@endforeach
