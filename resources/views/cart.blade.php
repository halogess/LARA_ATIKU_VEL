@extends('template.main')

@section('content')
    <p class="text-6xl">Shopping Cart</p>

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
                            <form action="{{ route('hapusItem', ['id_cart' => $item->id_cart]) }}" method="get"
                                class="float-left p-1">
                                @csrf
                                <input type="submit" value="Hapus" id="btnHapus" name="btnHapus" class="w-full">
                            </form>
                            <form
                                action="{{ route('beli-barang', ['kode_barang' => $item->kode_barang, 'id_pembeli' => $item->id_pembeli]) }}"
                                method="get" class="float-left ml-5 p-1">
                                @csrf
                                <input type="submit" value="Beli" id="btnBeli" name="btnBeli" class="w-full">
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form action="{{ route('hapus') }}" method="post"
                            onsubmit="return confirm('Anda yakin ingin menghapus semua barang di keranjang?');">
                            @csrf
                            <input type="submit" value="Hapus Semua" id="btnHapusSemua" name="btnHapusSemua"
                                class="mb-3 bg-red-500 text-white py-2 px-4 rounded">
                        </form>
                    </td>
                    <td>
                        <form
                            action="{{ route('beli-semua-barang', ['id_pembeli' => $cartItems[0]->id_pembeli, 'cartCount' => $cartCount]) }}"
                            method="post"
                            onsubmit="return confirm('Anda yakin ingin membeli semua barang di keranjang?');">
                            @csrf

                            {{-- Hidden input for each kode_barang --}}
                            @foreach ($cartItems as $item)
                                <input type="hidden" name="kode_barang[]" value="{{ $item->kode_barang }}">
                            @endforeach

                            <input type="submit" value="Beli Semua" id="btnBeliSemua" name="btnBeliSemua"
                                class="mb-3 bg-green-500 text-white py-2 px-4 rounded">
                        </form>
                    </td>
                </tr>
            </table>
        @else
            <p class="text-xl mt-5">Keranjang kosong!</p>
        @endif
    </div>
@endsection
