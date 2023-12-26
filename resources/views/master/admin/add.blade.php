@extends('template.master')

@section('content')

    <form method="POST">
        @csrf

        Nama : <input type="text" name="name" class="border-2"><br>
        Username : <input type="text" name="username" class="border-2"><br>
        Password : <input type="text" name="password" class="border-2"><br>
        Telp : <input type="text" name="telp" class="border-2"><br>

        <input type="submit" value="Add Admin" class="border-2 bg-yellow-300 p-1">
    </form>
@endsection
