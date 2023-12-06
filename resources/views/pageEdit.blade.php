@extends('template.profile')
@section('title')
    Profile Edit
@endsection
@section('content')
    <div class="w-8/12 h-[500px] mt-16">
        <div class="w-2/5 h-[500px] float-left flex justify-center">
            <div class="mt-28">
                <p class="text-3xl font-semibold font-serif">JJHC Automotive</p>
                <img src="/img/profilepic.png" alt="" class="h-32 w-32 mt-5 ml-16">
                <p class="text-2xl font-semibold font-serif text-center mt-6">Born to Be Fast</p>
            </div>
        </div>

        <div class="w-3/5 h-[500px] float-left p-5 flex justify-center">
            <div class="w-11/12 h-[500px] border-solid border-black border-2 float-left rounded-2xl p-2">
                <a href={{ url('/profile') }} class="text-2xl font-semibold ml-[400px]">X</a>
                <p class="text-2xl text-center font-semibold">Edit Profile</p>
                <form action="" method="POST" class="ml-10">
                    @csrf
                    <p class="font-medium text-lg">Nama</p>
                    <input type="text" name="" id="" class="mb-2 w-96">
                    <p class="font-medium text-lg">No.Hp</p>
                    <input type="text" name="" id="" class="mb-2 w-96">
                    <p class="font-medium text-lg">New Password</p>
                    <input type="text" name="" id="" class="mb-2 w-96">
                    <p class="font-medium text-lg">Confirm New Password</p>
                    <input type="text" name="" id="" class="mb-2 w-96">
                    <p class="font-medium text-lg">Old Password</p>
                    <input type="text" name="" id="" class="mb-2 w-96">
                    <p class="font-medium text-lg">Confirm Old Password</p>
                    <input type="text" name="" id="" class="mb-2 w-96">
                    <button type="submit" class="mr-5 w-16 h-auto p-2 rounded-xl hover:cursor-pointer font-bold text-xl bg-[#e77438] ml-40 mt-2">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
