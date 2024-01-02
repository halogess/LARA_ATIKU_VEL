@extends('template.master.master')

@section('content')
    <div class="w-full flex items-center gap-10">
        <div class="w-1/2">
            <div class="text-center text-2xl font-bold p-5">All Income </div>
            <div id="app" class="container border border-black p-5 flex justify-center">
                {!! $chartTahunan->container() !!}
                {!! $chartTahunan->script() !!}
            </div>
        </div>
        <div class="w-1/2">
            <div class="text-center text-2xl font-bold p-5">{{ now()->year }} Income </div>
            <div id="app" class="container border border-black p-5 flex justify-center">
                {!! $chartBulanan->container() !!}
                {!! $chartBulanan->script() !!}
            </div>
        </div>
    </div>

    <div class="pt-10 pb-3 text-2xl text-center font-bold">
        Favorite Products
    </div>
    <div class="w-full flex items-center justify-between gap-5">
        <div class="w-1/4">
            <div id="app" class="container border border-black pb-2">
                {!! $chartTahunan->container() !!}
                {!! $chartTahunan->script() !!}
            </div>
            <div class="text-center text-lg font-bold">Unit</div>

        </div>
        <div class="w-1/4">
            <div id="app" class="container border border-black pb-2">
                {!! $chartBulanan->container() !!}
                {!! $chartBulanan->script() !!}
            </div>
            <div class="text-center text-lg font-bold">SpareParts</div>

        </div>
        <div class="w-1/4">
            <div id="app" class="container border border-black pb-2">
                {!! $chartBulanan->container() !!}
                {!! $chartBulanan->script() !!}
            </div>
            <div class="text-center text-lg font-bold"> AfterMarket</div>

        </div>
        <div class="w-1/4">
            <div id="app" class="container border border-black pb-2">
                {!! $chartBulanan->container() !!}
                {!! $chartBulanan->script() !!}
            </div>
            <div class="text-center text-lg font-bold">Interior </div>

        </div>
    </div>

    <script src="https://unpkg.com/vue"></script>
@endsection
