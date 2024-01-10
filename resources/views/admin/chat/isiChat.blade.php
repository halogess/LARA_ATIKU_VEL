@foreach ($chat as $c)
    @if ($c->pengirim === 'user')
        <div class="flex justify-start">
            <div class="w-3/4">
                <div class=" w-fit admin-chat m-2 p-2 rounded-lg rounded-tl-none mr-auto ml-7 max-w-10 bg-yellow-300"
                    style="word-break: break-word;">
                    <p class="text-black">
                        {{ $c->chat_content }}
                    </p>
                </div>
            </div>
        </div>
    @else
        <div class="flex justify-end">
            <div class="w-3/4">
                <div class=" w-fit user-chat m-2 p-2 rounded-lg rounded-tr-none ml-auto mr-7 max-w-10 bg-black text-start"
                    style="word-break: break-word;">
                    <p class="text-white">
                        {{ $c->chat_content }}
                    </p>
                </div>
            </div>
        </div>
    @endif
@endforeach
