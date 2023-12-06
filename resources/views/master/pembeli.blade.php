@extends('template.master')

@section('content')
    <table>
        <tr>
            <td>ID</td>
            <td>Name </td>
            <td>Username</td>
            <td>Phone Number</td>
            <td>Saldo</td>
        </tr>
        @foreach ($pembeli as $p)
            <tr>
                <td>{{ $p['id_pembeli'] }}</td>
                <td>{{ $p['nama_pembeli'] }}</td>
                <td>{{ $p['username_pembeli'] }}</td>
                <td>{{ $p['telp_pembeli'] }}</td>
                <td>{{ $p['saldo'] }}</td>
            </tr>
        @endforeach
    </table>
@endsection
