@extends('template.main')

@section('content')
    <p class="text-5xl text-center">--- Status Pembelian Anda ---</p>

    @if ($barangnya)
        @foreach ($barangnya as $index => $b)
            <div class="mx-auto mt-12 mb-10">
                <table border="1" class="table text-center"
                    style="margin-left: auto; margin-right: auto; border: 1px solid black;">
                    <tr>
                        <th>No. Pembelian</th>
                        <th>Nomor Nota</th>
                        <th>Kode Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Sub Total</th>
                        <th>Tanggal Transaksi</th>
                        <th>Keterangan</th>
                    </tr>
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $b['nomor_nota'] }}</td>
                        <td>{{ $b['kode_barang'] }}</td>
                        <td>{{ $b['deskripsi_barang'] }}</td>
                        <td class="text-green-500">Rp{{ $b['sub_total'] }}</td>
                        <td>{{ $b['tanggal'] }}</td>
                        <td>{{ $b['keterangan'] }}</td>
                    </tr>
                </table>
            </div>
        @endforeach
    @else
        <p>Belum ada barang yang dibeli!</p>
    @endif
@endsection
