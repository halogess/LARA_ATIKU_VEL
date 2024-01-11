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
    <script src="https://unpkg.com/vue"></script>
@endsection
