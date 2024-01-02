<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
</head>

<body>
    <h1>Shopping Cart</h1>

    <div class="data w-full">
        @if ($cartCount > 0)
            <table border="1" class="mx-auto">
                <tr>
                    <th>ID Cart</th>
                    <th>ID Pembeli</th>
                    <th>Kode Barang</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->id_cart }}</td>
                        <td>{{ $item->id_pembeli }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp{{ $item->total_harga }}</td>
                        <td>
                            <form
                                action="{{ route('beli-barang', ['kode_barang' => $item->kode_barang, 'id_pembeli' => $item->id_pembeli]) }}"
                                method="get">
                                @csrf
                                <input type="submit" value="Beli" id="btnBeli" name="btnBeli" class="w-full">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>Keranjang kosong!</p>
        @endif
    </div>

</body>

</html>
