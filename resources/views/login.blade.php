    @extends('template.login_register')

    @section('title')
        Log In
    @endsection
    @section('form')
        <div>
            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                Username</label>
            <div class="mt-2">
                <input id="username" name="username"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="text-sm">
                    <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                        password?</a>
                </div>
            </div>
            <div class="mt-2">
                <input id="password" name="password" type="password" 
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
            </div>
            @error('username')
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
            <input type="submit" value="Sign In"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        </div>

        <span class="text-sm font-medium">Didn't have account? <a href="register" class="text-blue-800">Register
                Here</a></span>
    @endsection
