<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <script src="/style/cdn.tailwindcss.com_3.3.3"></script>
    <script src="/style/tailwind.js"></script>
    <script src="/style/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        #btnKirim:hover {
            background-color: yellow;
            color: black;
        }
    </style>
</head>

<body>
    {{-- navbar --}}
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <p class="text-white">JJHC Automotive</p>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Cart</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Log
                            Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- chatnya --}}

    <div class="kotak w-full mt-10 flex flex-col items-center">
        <div class="isi w-1/2 mt-4 bg-slate-200 rounded p-4">
            <div class="text-center text-black font-semibold text-lg pb-4 pt-2 ">
                CHAT
            </div>
            <div id="chatContainer" class="w-full overflow-auto h-96">
                @foreach ($chat as $c)
                    @if ($c->pengirim === 'admin')
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
            </div>

            <form id="chatForm" class="w-full mt-4">
                @csrf
                <input type="text" name="inputChat" id="inputChat" class="w-5/6 p-1 bg-slate-200 rounded float-left mt-2 ml-2"
                    style="border: 2px solid black;">
                    <button type="button" class="py-1 px-4 rounded mt-2 w-fit text-lg float-left mx-4" id="btnKirim">
                        <img src="img/send_icon.png" alt="Send Icon" class="w-6 h-7">
                    </button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
        $('#btnKirim').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{{ route('masukChat') }}',
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

    {{-- footer --}}
    <footer class="bg-[#546175] text-[#e7dfdc] mt-[200px]">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="https://flowbite.com/" class="flex items-center">
                        <img src="/img/image.png" class="h-36 me-3" alt="FlowBite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap">JJHC Automotive</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase dark:text-white">Explore</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li>
                                <p>Unit</p>
                            </li>
                            <li>
                                <p>Spareparts</p>
                            </li>
                            <li>
                                <p>Aftermarket</p>
                            </li>
                            <li>
                                <p>Interior</p>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase dark:text-white">Visit
                        </h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li>
                                <p>Jl. Ngagel Jaya Tengah 73-77</p>
                            </li>
                            <li>
                                <p>Baratajaya</p>
                            </li>
                            <li>
                                <p>Kec. Gubeng</p>
                            </li>
                            <li>
                                <p>Kota Surabaya</p>
                            </li>
                            <li>
                                <p>Jawa Timur, 60284</p>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase dark:text-white">Social Media</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li>
                                <p class="hover:underline">Instagram</p>
                            </li>
                            <li>
                                <p class="hover:underline">Facebook</p>
                            </li>
                            <li>
                                <p class="hover:underline">Youtube</p>
                            </li>
                            <li>
                                <p class="hover:underline">Tiktok</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023
                    <a>JJHC Automotive™</a>.
                </span>
            </div>
        </div>
    </footer>
</body>

</html>
