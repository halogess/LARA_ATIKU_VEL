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
