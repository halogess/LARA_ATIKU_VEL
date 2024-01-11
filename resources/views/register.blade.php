@extends('template.login_register')

@section('title')
    Register
@endsection

@section('form')
    <div>
        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
            Username</label>
        <div class="mt-2">
            <input id="username" name="username" value="{{ old('username') }}"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
        </div>
    </div>
    <div>
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
            Name</label>
        <div class="mt-2">
            <input id="name" name="name" value="{{ old('name') }}"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
        </div>
    </div>
    <div>
        <label for="telp" class="block text-sm font-medium leading-6 text-gray-900">
            Phone Number</label>
        <div class="mt-2">
            <input id="telp" name="telp" value="{{ old('telp') }}" 
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
        </div>
    </div>
    <div>
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
            Password</label>
        <div class="mt-2">
            <input id="password" name="password" value="{{ old('password') }}" type="password"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
        </div>
    </div>
    <div>
        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">
            Confirm Password</label>
        <div class="mt-2">
            <input id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" type="password"
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
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>


    <div>
        <input type="submit" value="Register"
            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
    </div>

    <span class="text-sm font-medium">Already have an account ? <a href="login" class="text-blue-800">Log In
            Here</a></span>
@endsection
