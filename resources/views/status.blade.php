@extends('template.main')

@section('content')
    <p class="text-5xl">Status Pembelian Anda</p>

    @if ($barangnya != null)
        <table>
            <tr>
                <th>nomor_nota</th>
                <th>kode_barang</th>
                <th>deskripsi_barang</th>
                <th>sub_total</th>
            </tr>
            <tr>
                <td>{{ $barangnya['nomor_nota'] }}</td>
                <td>{{ $barangnya['kode_barang'] }}</td>
                <td>{{ $barangnya['deskripsi_barang'] }}</td>
                <td>{{ $barangnya['sub_total'] }}</td>
            </tr>
        </table>
    @else
        <p>Belum ada barang yang dibeli!</p>
    @endif
@endsection
