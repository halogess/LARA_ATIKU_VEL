@extends('template.main')

@section('content')
    <p class="text-5xl text-center">--- Status Pembelian Anda ---</p>

    @if ($barangnya)
        <div class="mt-12 mb-10">
            <table border="1" class="table text-center w-full"
                style="margin-left: auto; margin-right: auto; border: 1px solid black;">
                <tr class="bg-black">
                    <th class="border-black border-2 text-yellow-400">Kode Barang</th>
                    <th class="border-black border-2 text-yellow-400">Deskripsi Barang</th>
                    <th class="border-black border-2 text-yellow-400">Harga</th>
                    <th class="border-black border-2 text-yellow-400">Jumlah</th>
                    <th class="border-black border-2 text-yellow-400">Sub Total</th>
                    <th class="border-black border-2 text-yellow-400">Tanggal</th>
                    <th class="border-black border-2 text-yellow-400">Keterangan</th>
                </tr>
                @foreach ($barangnya as $nomorNota => $transaction)
                    @foreach ($transaction['items'] as $index => $item)
                        <tr class="bg-gray-200">
                            <td class="border-black border-2">{{ $item['kode_barang'] }}</td>
                            <td class="border-black border-2">{{ $item['deskripsi_barang'] }}</td>
                            <td class="border-black border-2">Rp{{ $item['harga'] }}</td>
                            <td class="border-black border-2">{{ $item['jumlah'] }}</td>
                            <td class="text-green-500 border-black border-2">Rp{{ $item['sub_total'] }}</td>
                            <td class="border-black border-2">{{ $transaction['tanggal'] }}</td>
                            <td class="border-black border-2">{{ $item['keterangan'] }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
        </div>
    @else
        <p>Belum ada barang yang dibeli!</p>
    @endif
@endsection
