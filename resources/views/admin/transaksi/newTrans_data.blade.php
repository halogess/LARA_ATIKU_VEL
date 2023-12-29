@foreach ($trans as $t)
    <div class=" p-2 h-auto rounded-lg w-full font-bold"
        {{-- onclick="window.location='{{ url('admin/transaksi/detail/' . $t->nomor_nota) }}';"> --}}
        onclick = "showDetail('{{ $t->nomor_nota }}')"
        >
        <div class="border-2 border-black flex justify-between bg-yellow-400 p-3 rounded-lg">
            <div class="p-2 w-1/6">{{ \Carbon\Carbon::parse($t->tanggal_beli)->format('d M Y') }} </div>
            <div class="p-2 w-1/5">{{ $t->Pembeli->nama_user }}</div>
            <div class="p-2 w-1/5"> Rp {{ number_format($t->total_harga, 2, ',', '.') }}</div>
            <div class="p-2 w-1/5">Item : {{ $t->total_item }}</div>

            <div class="w-auto flex items-center justify-center">
                <a href='{{ url('admin/transaksi/new/approve/' . "$t->nomor_nota") }}'><button
                        class="mr-1 text-black rounded-md border-black border-2 w-8 h-8 flex items-center justify-center">
                        <svg xmlns="{{ asset('icons/chat-dots-fill.svg') }}" width="20" height="20"
                            fill="currentColor" class="bi bi-chat-dots-fill text-center" viewBox="0 0 16 16">
                            <path
                                d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                        </svg>
                    </button></a>
                <a href='{{ url('admin/transaksi/new/approve/' . "$t->nomor_nota") }}'><button
                        class=" mr-1 bg-green-700 text-white rounded-md border-black border-2 w-8 h-8 flex items-center justify-center"><svg
                            xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-check" viewBox="0 0 16 16">
                            <path
                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg></button></a>
                <a href='{{ url('admin/transaksi/decline/' . "$t->nomor_nota") }}'><button
                        class="bg-red-700 text-white rounded-md border-black border-2 w-8 h-8 flex items-center justify-center"><svg
                            xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-x" viewBox="0 0 16 16">
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                        </svg></button></a>
            </div>
        </div>
    </div>
@endforeach
