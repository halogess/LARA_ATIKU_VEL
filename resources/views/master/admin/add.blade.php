@extends('template.master.master')

@section('content')

    <form method="POST">
        @csrf

        Nama : <input type="text" name="name" class="border-2 ml-8"><br><br>
        Username : <input type="text" name="username" class="border-2 ml-[3px]"><br><br>
        Password : <input type="text" name="password" class="border-2 ml-2"><br><br>
        Telp : <input type="text" name="telp" class="border-2 ml-11"><br><br>

        <input type="submit" value="Add Admin" class="border-2 bg-gray-300 text-black border-yellow-400 p-1">
    </form>
@endsection
