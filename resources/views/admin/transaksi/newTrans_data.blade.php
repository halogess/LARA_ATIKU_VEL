@foreach ($trans as $t)
    <div class="p-5 border-2 border-black m-3 flex justify-between">
        <div>{{ $t->Pembeli->nama_user }}</div>

        <div>
            <a href="{{ url('admin/transaksi') }}"><button
                    class="bg-green-500 text-white p-1 rounded-md">Approve</button></a>
            <a href="{{ url('admin/transaksi') }}"><button
                    class="bg-red-500 text-white p-1 rounded-md">Decline</button></a>

        </div>
    </div>
@endforeach
