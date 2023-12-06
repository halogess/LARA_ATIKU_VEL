@extends("template.profile")

@section("content")

<div class="w-8/12 h-[500px] mt-16">
    <div class="w-2/5 h-[500px] float-left flex justify-center">
        <div class="mt-28">
            <p class="text-3xl font-semibold font-serif">JJHC Automotive</p>
            <img src="/img/profilepic.png" alt="" class="h-32 w-32 mt-5 ml-16">
            <p class="text-2xl font-semibold font-serif text-center mt-6">Born to Be Fast</p>
        </div>
    </div>

    <div class="w-3/5 h-[500px] bg-yellow-100 float-left p-10 flex justify-center">
        <div class="w-11/12 h-[430px] border-solid border-black border-2 float-left rounded-2xl p-2">
            <a href={{url('/')}} class="text-2xl font-semibold ml-[400px]">X</a>
            <p class="text-2xl text-center font-semibold pt-4">Profile</p>
            <div class="bg-pink-100 w-2/6 h-[300px] float-left pt-4 pl-5">
                <p class="pb-3 font-medium text-lg">Nama</p>
                <p class="pb-3 font-medium text-lg">Username</p>
                <p class="pb-3 font-medium text-lg">No.Hp</p>
                <p class="pb-3 font-medium text-lg">Password</p>
                <a href= {{url("/pageEdit")}} class="bg-[#e77438] p-3"> Edit Profile </a>
            </div>
            <div class="bg-green-100 w-4/6 h-[300px] float-left">

            </div>
        </div>
    </div>
</div>
@endsection
