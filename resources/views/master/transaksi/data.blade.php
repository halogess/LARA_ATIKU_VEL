@foreach ($trans as $t)
    @php
        $status = $t->Status->last();
        $warna = 'bg-yellow-400';

        if (Session::get('nav') == 'history') {
            if ($status->kode_status == -1) {
                $warna = 'bg-red-300';
            } else {
                $warna = 'bg-green-300';
            }
        }
    @endphp

    <div class="h-auto rounded-lg w-full font-bold mb-3">
        <div class="{{ $warna }} border border-black px-3 py-1 rounded-lg text-sm">

            @if (Session::get('nav') == 'active' || Session::get('nav') == 'history')
                <div class=" pb-1 border-b border-black">{{ $status->Keterangan->nama_status }}</div>
            @endif
            <div class="flex p-1 justify-between" onclick = "showDetail('{{ $t->nomor_nota }}')">
                <div class="p-1 w-2/12">#{{ $t->nomor_nota }} </div>
                <div class="p-1 w-5/12 md:w-4/12 hidden lg:inline-block">
                    {{ \Carbon\Carbon::parse($t->tanggal_beli)->format('d M Y') }} </div>
                <div class="p-1 w-5/12 lg:w-4/12">{{ $t->Pembeli->nama_user }}</div>
                <div class="p-1 w-5/12 text-end lg:w-4/12"> Rp {{ number_format($t->total_harga, 2, ',', '.') }}</div>
                <div class="p-1 w-3/12 text-end hidden lg:inline-block">Item : {{ $t->total_item }}</div>
            </div>
        </div>
    </div>
@endforeach
