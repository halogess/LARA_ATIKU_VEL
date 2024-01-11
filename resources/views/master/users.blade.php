@extends('template.master.master')

@section('content')
    <div class="block md:flex p-10 h-auto justify-between gap-10">
        <a href="{{ url('master/admin') }}"
            class="w-full bg-yellow-400 border border-black rounded-xl flex items-center justify-center py-10 hover:bg-black hover:text-yellow-400">
            <div class="w-11/12 items-center">
                <div class="w-full flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pc-display-horizontal w-1/3"
                        viewBox="0 0 16 16">
                        <path
                            d="M1.5 0A1.5 1.5 0 0 0 0 1.5v7A1.5 1.5 0 0 0 1.5 10H6v1H1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5v-1h4.5A1.5 1.5 0 0 0 16 8.5v-7A1.5 1.5 0 0 0 14.5 0zm0 1h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5M12 12.5a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0m2 0a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0M1.5 12h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M1 14.25a.25.25 0 0 1 .25-.25h5.5a.25.25 0 1 1 0 .5h-5.5a.25.25 0 0 1-.25-.25" />
                    </svg>
                </div>

                <div class="text-center text-xl font-bold mt-5 text-nowrap">
                    Admin
                </div>
            </div>
        </a>
        <a href="{{ url('master/pembeli') }}"
            class="w-full bg-yellow-400 border border-black rounded-xl flex items-center justify-center py-10 mt-10 md:m-0 hover:bg-black hover:text-yellow-400">
            <div class="w-11/12 items-center">
                <div class="w-full flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cart w-1/3"
                        viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                    </svg>
                </div>

                <div class="text-center text-xl font-bold mt-5 text-nowrap">
                    Customer
                </div>
            </div>
        </a>
    </div>
@endsection
