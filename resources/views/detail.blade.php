@extends('template.main')

@section('content')
    <div class="detailBarang w-3/4 mt-5 ml-40 mr-5 bg-gray-300 border-black border-x-2 border-y-2 p-10 flex">
        <div class="gambar text-black text-2xl">
            @foreach ($barang as $b)
                <img src="{{ asset($b->gambar_barang) }}" alt="" style="width: 500px; height: 300px;">
                <p>{{ $b->nama_barang }}</p>
                <table>
                    <tr>
                        <td class="text-sm">Jenis: </td>
                        <td class="text-sm">{{ $b->kategori_barang }}</td>
                    </tr>
                    <tr>
                        <td class="text-sm">Stok: </td>
                        <td class="text-sm">{{ $b->stok_barang }}</td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="formBeli text-center border border-black p-20 justify-items-center">
            <p class="text-4xl"><b>Atur Jumlah</b></p>
            <form action="{{ route('add-to-cart', ['kode_barang' => $b->kode_barang]) }}" class="mt-5" method="post">
                @csrf
                <input type="number" name="jumlah" id="jumlah" class="w-full" oninput="updateSubtotal()"
                    min="0"><br>
                <table class="mt-2">
                    <tr>
                        <td>Subtotal</td>
                        <td id="subtotal">Rp{{ $b->harga_barang }}</td>
                    </tr>
                </table>
                <input type="submit" value="+ Keranjang" id="btnAddKeranjang"
                    class="btn btn-success text-yellow-300 bg-black w-full rounded p-1 mt-3"><br>
            </form><br>
            <form action="{{ route('membeli', ['kode_barang' => $b->kode_barang]) }}" method="post">
                @csrf
                <input type="number" name="jumlahBeli" id="jumlahBeli" class="w-full" oninput="updateSubtotalBeli()"
                    min="0"><br>
                <table class="mt-2">
                    <tr>
                        <td>Subtotal</td>
                        <td id="subtotalBeli">Rp{{ $b->harga_barang }}</td>
                    </tr>
                </table>
                <input type="submit" value="Beli" id="btnBeli"
                    class="btn btn-success text-yellow-300 bg-black w-full rounded p-1 mt-3">
            </form>
            <table class="w-full mt-2">
                <tr>
                    <td><a href="{{ route('chat') }}">Chat</a></td>
                    <td>Wishlist</td>
                    <td>Share</td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        function updateSubtotal() {
            // Get the value of the input
            var jumlah = document.getElementById('jumlah').value;

            // Assuming $b->harga_barang is the base price, update the subtotal
            var hargaBarang = {{ $b->harga_barang }};
            var subtotal = jumlah * hargaBarang;

            // Update the subtotal in the HTML
            document.getElementById('subtotal').innerHTML = 'Rp' + subtotal;
        }

        function updateSubtotalBeli() {
            // Get the value of the input
            var jumlahBeli = document.getElementById('jumlahBeli').value;

            // Assuming $b->harga_barang is the base price, update the subtotal
            var hargaBarang = {{ $b->harga_barang }};
            var subtotalBeli = jumlahBeli * hargaBarang;

            // Update the subtotal in the HTML
            document.getElementById('subtotalBeli').innerHTML = 'Rp' + subtotalBeli;
        }
    </script>
@endsection
