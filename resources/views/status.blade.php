@extends('template.main')

@section('content')
    <p class="text-5xl text-center">--- Status Pembelian Anda ---</p>

    @if ($barangnya)
        <div class="mx-auto mt-12 mb-10">
            @foreach ($barangnya as $nomorNota => $transaction)
                <h3 class="text-lg font-bold mb-2">Tanggal Transaksi: {{ $transaction['tanggal'] }}</h3>
                <table border="1" class="table text-center"
                    style="margin-left: auto; margin-right: auto; border: 1px solid black;">
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                        <th>Keterangan</th>
                    </tr>
                    @foreach ($transaction['items'] as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['kode_barang'] }}</td>
                            <td>{{ $item['deskripsi_barang'] }}</td>
                            <td>Rp{{ $item['harga'] }}</td>
                            <td>{{ $item['jumlah'] }}</td>
                            <td class="text-green-500">Rp{{ $item['sub_total'] }}</td>
                            <td>{{ $item['keterangan'] }}</td>
                        </tr>
                    @endforeach
                </table>
            @endforeach
        </div>
    @else
        <p>Belum ada barang yang dibeli!</p>
    @endif
@endsection

