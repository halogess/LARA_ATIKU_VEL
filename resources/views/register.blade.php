@extends('template.login_register')

@section('title')
    Register
@endsection

{{-- @section('register')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register</h2>
            <a href="{{ url('/') }}">Back</a>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" method="POST">
                @csrf

                @yield('form')

            </form>
        </div>
    </div>
@endsection --}}

@section('form')
    <div>
        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
            Username</label>
        <div class="mt-2">
            <input id="username" name="username" value="{{old('username')}}"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
        </div>
    </div>
    <div>
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
            Name</label>
        <div class="mt-2">
            <input id="name" name="name" value="{{old('name')}}"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
        </div>
    </div>
    <div>
        <label for="telp" class="block text-sm font-medium leading-6 text-gray-900">
            Phone Number</label>
        <div class="mt-2">
            <input id="telp" name="telp" value="{{old('telp')}}"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
        </div>
    </div>
    <div>
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
            Password</label>
        <div class="mt-2">
            <input id="password" name="password" value="{{old('password')}}"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
        </div>
    </div>
    <div>
        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">
            Confirm Password</label>
        <div class="mt-2">
            <input id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
        </div>

        @error('username')
            <label style="font-size: 0.8em; color:red; font-weight:700;">
                {{ $message }} <br>
            </label>
        @enderror
        @error('name')
            <label style="font-size: 0.8em; color:red; font-weight:700;">
                {{ $message }} <br>
            </label>
        @enderror
        @error('telp')
            <label style="font-size: 0.8em; color:red; font-weight:700;">
                {{ $message }} <br>
            </label>
        @enderror
        @error('password')
            <label style="font-size: 0.8em; color:red; font-weight:700;">
                {{ $message }} <br>
            </label>
        @enderror
    </div>



    <div>
        <input type="submit" value="Register"
            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
    </div>

    <span class="text-sm font-medium">Already have an account ? <a href="login" class="text-blue-800">Log In
            Here</a></span>
@endsection
