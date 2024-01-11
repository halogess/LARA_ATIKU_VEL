@extends('template.main')

@section('content')
    <p class="text-6xl">Shopping Cart</p>

    <div class="data w-full mt-16 mb-16 flex flex-wrap">
        @if ($cartCount > 0)
            <table border="1" class="mx-auto table text-center w-full" style="border: 1px solid black;">
                <tr class="bg-black">
                    <th class="border-black border-2 text-yellow-400">ID Cart</th>
                    <th class="border-black border-2 text-yellow-400">ID Pembeli</th>
                    <th class="border-black border-2 text-yellow-400">Kode Barang</th>
                    <th class="border-black border-2 text-yellow-400">Jumlah</th>
                    <th class="border-black border-2 text-yellow-400">Subtotal</th>
                    <th class="border-black border-2 text-yellow-400">Action</th>
                </tr>
                @foreach ($cartItems as $item)
                    <tr class="bg-gray-200">
                        <td class="border-black border-2">{{ $item->id_cart }}</td>
                        <td class="border-black border-2">{{ $item->id_pembeli }}</td>
                        <td class="border-black border-2">{{ $item->kode_barang }}</td>
                        <td class="border-black border-2">{{ $item->qty }}</td>
                        <td class="border-black border-2">Rp{{ $item->total_harga }}</td>
                        <td class="border-black border-2 flex justify-center">
                            <form action="{{ route('hapusItem', ['id_cart' => $item->id_cart]) }}" method="get"
                                class="float-left p-1">
                                @csrf
                                <input type="submit" value="Hapus" id="btnHapus" name="btnHapus" class="w-full w-10 p-3">
                            </form>
                            <form
                                action="{{ route('beli-barang', ['kode_barang' => $item->kode_barang, 'id_pembeli' => $item->id_pembeli]) }}"
                                method="get" class="float-left ml-5 p-1">
                                @csrf
                                <input type="submit" value="Beli" id="btnBeli" name="btnBeli" class="w-full w-10 p-3">
                            </form>
                        </td>
                    </tr>
                @endforeach
                {{-- <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    </td>
                    <td> --}}
                    {{-- </td>
                </tr> --}}
            </table>

                        <form action="{{ route('hapus') }}" method="post"
                            onsubmit="return confirm('Anda yakin ingin menghapus semua barang di keranjang?');">
                            @csrf
                            <input type="submit" value="Hapus Semua" id="btnHapusSemua" name="btnHapusSemua"
                                class="mb-3 mr-4 bg-red-500 text-white py-2 px-4 rounded ml-[1070px]">
                        </form>
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
                                class="mb-3 bg-green-500 text-white py-2 px-4 rounded float-right">
                        </form>
        @else
            <p class="text-xl mt-5">Keranjang kosong!</p>
        @endif
    </div>
@endsection
