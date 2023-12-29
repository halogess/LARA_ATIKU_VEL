<a href="{{ url('admin/transaksi/new') }}"><button
        class="w-1/12 bg-yellow-400 border border-black p-2 rounded-lg mb-5">Back</button></a>
<div class="border-4 border-black rounded-3xl pb-10">
    <div class="flex items-stretch justify-between">
        <img src="{{ asset('img/logo.png') }}" class="w-1/4">
        <div class="font-bold flex items-center">
            <div class="block text-center">
                <div class="text-2xl">Invoice</div>
                <div class="text-xl">No Nota : {{ $htrans->nomor_nota }}</div>
            </div>
        </div>

        <div class="p-10 min-h-10 text-sm">

            <table>
                <tr>
                    <td>Tanggal Pembelian</td>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::parse($htrans->tanggal_beli)->format('d M Y') }}</td>

                </tr>
                <tr>
                    <td>Customer</td>
                    <td>:</td>
                    <td>{{ $htrans->Pembeli->nama_user }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>{{ $htrans->Pembeli->telp }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="px-10 text-sm">
        <table class="w-full">
            <tr class="text-center">
                <th class="border border-black">No</th>
                <th class="border border-black">Kode Produk</th>
                <th class="border border-black">Nama Produk</th>
                <th class="border border-black">Deskripsi</th>
                <th class="border border-black">Harga</th>
                <th class="border border-black">QTY</th>
                <th class="border border-black">Subtotal</th>
            </tr>

            @php
                $no = 1;
            @endphp
            @foreach ($dtrans as $d)
                <tr class="border border-black">
                    <td class="border border-black text-center px-2">{{ $no }}</td>
                    <td class="border border-black text-center px-2">{{ $d->kode_barang }}</td>
                    <td class="border border-black px-2">{{ $d->nama_barang }}</td>
                    <td class="border border-black px-2">{{ $d->deskripsi_barang }}</td>
                    <td class="border border-black text-end px-2">Rp {{ number_format($d->harga_barang, 2, ',', '.') }}
                    </td>
                    <td class="border border-black text-center px-2">{{ $d->qty }}</td>
                    <td class="border border-black text-end px-2">Rp {{ number_format($d->sub_total, 2, ',', '.') }}
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
        </table>

        <div class="text-end mt-10 font-bold">Total : Rp {{ number_format($htrans->total_harga, 2, ',', '.') }}</div>
    </div>

</div>
