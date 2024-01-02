@extends('template.main')

@section('content')
    <p class="text-5xl text-center">Status Pembelian Anda</p>

    @if ($barangnya)
        <div class="mx-auto mt-24 mb-24">
            <table border="1" class="table text-center"
                style="margin-left: auto; margin-right: auto; border: 1px solid black;">
                <tr>
                    <th>Nomor Nota</th>
                    <th>Kode Barang</th>
                    <th>Deskripsi Barang</th>
                    <th>Sub Total</th>
                    <th>Tanggal Transaksi</th>
                    <th>Keterangan</th>
                </tr>
                <tr>
                    <td>{{ $barangnya['nomor_nota'] }}</td>
                    <td>{{ $barangnya['kode_barang'] }}</td>
                    <td>{{ $barangnya['deskripsi_barang'] }}</td>
                    <td class="text-green-500">Rp{{ $barangnya['sub_total'] }}</td>
                    <td>{{ $barangnya['tanggal'] }}</td>
                    <td>{{ $barangnya['keterangan'] }}</td>
                </tr>
            </table>
        @else
            <p>Belum ada barang yang dibeli!</p>
    @endif
    </div>
@endsection
