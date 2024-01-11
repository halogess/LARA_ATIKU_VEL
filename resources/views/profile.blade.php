@extends('template.main')
@section('content')
    {{-- <form method="POST">
        @csrf --}}
    <div class="w-full text-center py-10">
        <div class="flex items-center pb-10 gap-10 justify-center">
            <div class="w-2/12">
                <div class="">
                    <div class="p-5">
                        <img src='{{ asset(Auth::user()->foto_user) }}' class="rounded-full border-2 border-black"
                            id="photo">
                    </div>
                    <div class="pb-10 text-xl font-medium">
                        {{ '[' . Auth::user()->id_user . '] ' . Auth::user()->nama_user }}
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap w-4/12 p-5 rounded-xl border">
                @for ($i = 0; $i < count($pp); $i++)
                    <button class="w-1/5 p-2" onclick="ubah('{{ $pp[$i] }} ', '{{ $i + 1 }}')"><img
                            src="{{ $pp[$i] }}" id="{{ $i + 1 }}"
                            class="rounded-full @if (strpos(Auth::user()->foto_user, $i + 1) !== false) border-2 border-black @endif">
                    </button>
                @endfor

                <button class="bg-yellow-400 rounded py-2 px-10 my-2" id="setProfile">
                    Change
                </button>
            </div>
        </div>

        <div class="flex w-full">
            <div class="w-1/2 justify-items-center mx-20 border-t border-black">
                <div class="text-3xl font-bold p-5">Edit Profile</div>
                <div class="flex pb-5">
                    <span
                        class="w-36 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        Username
                    </span>
                    <input type="text" name="username" value="{{ Auth::user()->username }}" id="username"
                        class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="flex pb-5">
                    <span
                        class="w-36 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        Phone Number
                    </span>
                    <input type="text" name="telp" id="telp"
                        class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Bonnie Green" value="{{ Auth::user()->telp }}">
                </div>

                <button type="button" id="ganti_profile"
                    class="rounded-lg bg-yellow-400 p-2 w-full border border-slate-200 hover:bg-black hover:text-yellow-400 mb-5">Save</button>

                {{-- @error('username')
                    <div class="p-2 text-sm text-red-800 rounded-lg bg-red-300 border mb-2" role="alert">
                        <span class="font-medium">
                            {{ $message }}
                        </span>
                    </div>
                @enderror

                @error('telp')
                    <div class="p-2 text-sm text-red-800 rounded-lg bg-red-300 border mb-2" role="alert">
                        <span class="font-medium">
                            {{ $message }}
                        </span>
                    </div>
                @enderror

                @if (Session::has('message'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 border"
                        role="alert">
                        <span class="font-medium">
                            {{ Session::get('message') }}
                        </span>
                    </div>
                @endif --}}

            </div>
            <div class="w-1/2 justify-items-center mx-20 border-t border-black">
                <div class=" text-3xl font-bold p-5">Change Password</div>
                <div class="flex pb-5">
                    <span
                        class="w-36 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        Old Password
                    </span>
                    <input type="password" name="old_password"
                        class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="flex pb-5">
                    <span
                        class="w-36 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        New Password
                    </span>
                    <input type="password" name="password"
                        class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="flex pb-5">
                    <span
                        class="w-36 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        Confirm Password
                    </span>
                    <input type="password" name="password_confirmation"
                        class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <input type="submit" name="button" value="Change"
                    class="rounded-lg bg-yellow-400 p-2 w-full border border-slate-200 hover:bg-black hover:text-yellow-400">

                {{-- @error('old_password')
                    <div class="p-2 text-sm text-red-800 rounded-lg bg-red-300 border mb-2" role="alert">
                        <span class="font-medium">
                            {{ $message }}
                        </span>
                    </div>
                @enderror
                @error('password')
                    <div class="p-2 text-sm text-red-800 rounded-lg bg-red-300 border mb-2" role="alert">
                        <span class="font-medium">
                            {{ $message }}
                        </span>
                    </div>
                @enderror --}}

                @if (Session::has('messagePassword'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 border"
                        role="alert">
                        <span class="font-medium">
                            {{ Session::get('messagePassword') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

    </div>
    {{-- </form> --}}


    <script>
        var photo;
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $("#setProfile").click(
            function() {
                $.ajax({
                    url: "{{ route('do_profile') }}",
                    method: "post",
                    data: {
                        action: "ganti_foto",
                        foto: photo
                    },
                    success: function(response) {
                        alert("Berhasil mengubah foto profile");
                    }
                });
            }
        );

        $("#ganti_profile").click(
            function() {
                alert($("#telp").val());
                $.ajax({
                    url: "{{ route('do_profile') }}",
                    method: "post",
                    data: {
                        action: "ganti_profile",
                        username: $("#username").val(),
                        telp: $("#telp").val()
                    },

                    success: function(response) {
                        if(response == "gagal"){
                            alert("input invalid");
                        }
                    },
                    error: function(response) {
                        alert(response);
                        // if (response.status == 422) {
                        //     // Validation error
                        //     var errors = response.responseJSON.errors;
                        //     var errorMessage = '';

                        //     $.each(errors, function(key, value) {
                        //         errorMessage += value[0] + '\n';
                        //     });

                        //     alert(errorMessage);
                        // } else {
                        //     alert("Error: " + response.statusText);
                        // }
                    },
                });
            }
        );


        function ubah(param, border) {
            var url = param;
            photo = border;
            $("#photo").attr("src", url);

            for (i = 1; i <= 10; i++) {
                $("#" + [i]).removeClass("border-2 border-black");
            }
            $("#" + photo).addClass("border-2 border-black");
        }
    </script>
@endsection
