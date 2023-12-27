<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
</head>

<body>
    <!-- resources/views/cart.blade.php -->

    <h1>Shopping Cart</h1>

    <table border="1">
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
        @foreach ($cart as $c)
            <tr>
                <td>{{ $c['kode_barang'] }}</td>
                <td>{{ $c['nama_barang'] }}</td>
                <td>{{ $c['harga_barang'] }}</td>
                <td>{{ $c['jumlah'] }}</td>
                <td>{{ $c['subtotal'] }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
