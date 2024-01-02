<tr class="border-2 border-black bg-black text-yellow-400">
    <td onclick="sortKode()">ID
        <button id="kode_asc">🡹</button>
        <button id="kode_dsc">🡻</button>
    </td>

    <td onclick="sortName()">Name
        <button id="nama_asc">🡹</button>
        <button id="nama_dsc">🡻</button>
    </td>

    <td>Gambar</td>
    <td>Deskripsi</td>

    <td onclick="sortHarga()" class="text-center">Harga
        <button id="hrg_asc">🡹</button>
        <button id="hrg_dsc">🡻</button>
    </td>
    <td onclick="sortStok()">Stok
        <button id="stok_asc">🡹</button>
        <button id="stok_dsc">🡻</button>
    </td>

    <td class="text-center">Action</td>
</tr>

@foreach ($barang as $p)
    @php
        if ($p->active == 0) {
            $bg = 'bg-slate-400';
            $btn = 'Activate';
        } else {
            $bg = '';
            $btn = 'Delete';
        }
    @endphp

    <tr class="{{ $bg }} border-2 border-black bg-gray-200 text-black">
        <td>{{ $p->kode_barang }}</td>
        <td>{{ $p->nama_barang }}</td>
        <td><img src="{{asset("$p->gambar_barang")}}" alt="Picture" width="170px"></td>
        <td class="break-words">{{ $p->deskripsi_barang }}</td>
        <td class="text-center">Rp {{ number_format($p->harga_barang,2,',','.') }}</td>
        <td class="text-center">{{ number_format($p->stok_barang, 0, ',', '.') }}</td>
        <td>
            <button onclick="ban('{{ $p->kode_barang }}')" class="w-[61px] h-full border rounded p-2 border-yellow-400 mb-2 bg-gray-300 hover:ring-white hover:bg-black hover:text-white">{{ $btn }}
            </button>
            <a href="{{url('master/barang/edit/'. $p->kode_barang)}}" class="w-[30px] h-full border rounded p-2 border-yellow-400 bg-gray-300 hover:ring-white hover:bg-black hover:text-white mr-2">Edit
            </a>
        </td>
    </tr>
@endforeach
