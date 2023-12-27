<tr>
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

    <td onclick="sortHarga()">Harga
        <button id="hrg_asc">🡹</button>
        <button id="hrg_dsc">🡻</button>
    </td>
    <td onclick="sortStok()">Stok
        <button id="stok_asc">🡹</button>
        <button id="stok_dsc">🡻</button>
    </td>

    <td>Action</td>
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

    <tr class="{{ $bg }}">
        <td>{{ $p->kode_barang }}</td>
        <td>{{ $p->nama_barang }}</td>
        <td><img src="{{asset("$p->gambar_barang")}}" alt="Picture" width="200px"></td>
        <td>{{ $p->deskripsi_barang }}</td>
        <td class="text-end">Rp {{ number_format($p->harga_barang,2,',','.') }}</td>
        <td class="text-end">{{ number_format($p->stok_barang, 0, ',', '.') }}</td>
        <td>
            <button onclick="ban('{{ $p->kode_barang }}')" class="w-50 h-full border rounded p-2">{{ $btn }}
            </button>
            <a href="{{url('master/barang/edit/'. $p->kode_barang)}}" class="w-50 h-full border rounded p-2">Edit
            </a>
        </td>
    </tr>
@endforeach
