<tr>
    <td onclick="sortID()">ID
        <button id="id_asc">🡹</button>
        <button id="id_dsc">🡻</button>
    </td>

    <td onclick="sortName()">Name
        <button id="nama_asc">🡹</button>
        <button id="nama_dsc">🡻</button>
    </td>
    <td onclick="sortUsername()">Username
        <button id="usr_asc">🡹</button>
        <button id="usr_dsc">🡻</button>
    </td>
    <td onclick="sortTelp()">Phone Number
        <button id="telp_asc">🡹</button>
        <button id="telp_dsc">🡻</button>
    </td>
    <td>Action</td>
</tr>

@foreach ($admin as $p)
    @php
        if ($p->active == 0) {
            $bg = 'bg-slate-400';
            $btn = 'Activate';
        } else {
            $bg = '';
            $btn = 'Ban';
        }
    @endphp

    <tr class="{{ $bg }}">
        <td>{{ $p->id_user }}</td>
        <td>{{ $p->nama_user }}</td>
        <td>{{ $p->username }}</td>
        <td>{{ $p->telp }}</td>
        <td>
            <button onclick="ban('{{ $p->id_user }}')" class="w-full h-full border rounded p-2">{{ $btn }}
            </button>
        </td>
    </tr>
@endforeach
