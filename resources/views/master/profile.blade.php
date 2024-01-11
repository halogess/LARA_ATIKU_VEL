@extends('template.master.master')
@section('content')
    <form method="POST">
        @csrf
        <div class="w-full text-center">
            <div class="w-2/12 mx-auto rounded-full">
                <img src='{{ asset(Auth::user()->foto_user) }}' class="rounded-full p-5">
            </div>
            <div class="pb-10 text-xl font-medium">{{ '[' . Auth::user()->id_user . '] ' . Auth::user()->nama_user }}</div>

            <div class="flex w-full">

                <div class="w-1/2 justify-items-center mx-20">
                    <div class=" text-3xl font-bold pb-5">Edit Profile</div>
                    <div class="flex pb-5">
                        <span
                            class="w-36 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            Username
                        </span>
                        <input type="text" name="username" value="{{ Auth::user()->username }}"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="flex pb-5">
                        <span
                            class="w-36 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            Phone Number
                        </span>
                        <input type="text" name="telp"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Bonnie Green" value="{{ Auth::user()->telp }}">
                    </div>

                    <input type="submit" name="button" value="Save"
                        class="rounded-lg bg-yellow-400 p-2 w-full border border-slate-200 hover:bg-black hover:text-yellow-400 mb-5">


                    @error('username')
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
                    @endif

                </div>
                <div class="w-1/2 justify-items-center mx-20">
                    <div class=" text-3xl font-bold pb-5">Change Password</div>
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

                    @error('old_password')
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
                    @enderror

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
    </form>
@endsection
