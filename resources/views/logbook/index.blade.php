@extends('layout.logbook')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold mb-4">Log Book (Daily)</h1>

        <!-- Filter (Kode Cabang dan Nama Periode) -->
        <div class="flex items-center justify-between mb-4">
            <form action="{{ route('logbook.index') }}" method="GET" class="flex items-center space-x-4">
                <!-- Filter berdasarkan Kode Cabang -->
                <label for="kode_cabang2" class="text-sm font-bold">Kode Cabang:</label>
                <select id="kode_cabang2" name="kode_cabang2" class="border rounded py-2 px-3">
                    <option value="">--Pilih Cabang--</option>
                    @foreach ($cabang2 as $cabang)
                        <option value="{{ $cabang->kode }}" @if ($cabang->kode == $kode_cabang2) selected @endif>
                            {{ $cabang->nama }}
                        </option>
                    @endforeach
                </select>


                <!-- Filter berdasarkan Nama Periode -->
                <label for="nama_periode" class="text-sm font-bold">Nama Periode:</label>
                <select id="nama_periode" name="nama_periode" class="border rounded py-2 px-3">
                    <option value="">--Pilih Periode--</option>
                    @foreach ($periode as $p)
                        <option value="{{ $p->nama_periode }}" @if ($p->nama_periode == $nama_periode) selected @endif>
                            {{ $p->nama_periode }}
                        </option>
                    @endforeach
                </select>


                <button type="submit" class="ml-2 btn btn-blue">Cari</button>
            </form>
            <!-- Buttons -->
            <div class="flex gap-2">
                <button onclick="openPopup()" class="btn btn-blue">Tambah Catatan</button>
            </div>
        </div>

        <!-- Search Bar dan Button -->
        {{-- <div class="flex items-center justify-between mb-4">
        <form action="{{ route('logbook.index') }}" method="GET" class="flex items-center">
            <label for="search_date" class="mr-2 text-sm font-bold">Cari Berdasarkan Tanggal:</label>
            <input 
                type="date" 
                id="search_date" 
                name="search_date" 
                value="{{ $search_date }}" 
                class="border rounded py-2 px-3">
            <button type="submit" class="ml-2 btn btn-blue">
                Cari
            </button>
        </form>

      
    </div> --}}
        <!-- Table -->
        <table class="table">
            <thead>
                <tr class="bg-gray-200">
                    <th>Tanggal</th>
                    <th>Modul</th>
                    <th>Grup</th>
                    <th>Keterangan</th>
                    <th>Solusi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($catatan as $item)
                    <tr>
                        <td>{{ $item->tgl_catatan }}</td>
                        <td>{{ $item->nama_modul }}</td>
                        <td>{{ $item->nama_grup }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->solusi }}</td>
                        <td>
                            <button type="button"
                                onclick="confirmDelete('{{ route('logbook.destroy', $item->id_catatan) }}')"
                                class="relative w-10 h-10 rounded-lg bg-red-500 text-white flex justify-center items-center hover:bg-red-600"
                                title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data untuk filter yang dipilih.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Popup Modal -->
        <div id="popupForm" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
                <h2 class="text-xl font-bold mb-4">Tambah Catatan</h2>
                <form action="{{ route('logbook.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="tgl_catatan" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" id="tgl_catatan" name="tgl_catatan" class="border rounded w-full py-2 px-3" required>
                    </div>
                    <div class="mb-4">
                        <label for="id_grup" class="block text-sm font-medium text-gray-700">Grup</label>
                        <select id="id_grup" name="id_grup" class="border rounded w-full py-2 px-3">
                            @foreach ($grup as $g)
                                <option value="{{ $g->id_grup }}">{{ $g->nama_grup }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="id_modul" class="block text-sm font-medium text-gray-700">Modul</label>
                        <select id="id_modul" name="id_modul" class="border rounded w-full py-2 px-3">
                            @foreach ($modul as $m)
                                <option value="{{ $m->id_modul }}">{{ $m->nama_modul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" class="border rounded w-full py-2 px-3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="solusi" class="block text-sm font-medium text-gray-700">Solusi</label>
                        <textarea id="solusi" name="solusi" class="border rounded w-full py-2 px-3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="id_cabang" class="block text-sm font-medium text-gray-700">Cabang</label>
                        <select id="id_cabang" name="id_cabang" class="border rounded w-full py-2 px-3">
                            @foreach ($cabang2 as $cabang)
                                <!-- Asumsi $cabang2 berisi data cabang -->
                                <option value="{{ $cabang->kode }}">{{ $cabang->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="closePopup()" class="btn btn-red mr-2">Batal</button>
                        <button type="submit" class="btn btn-blue">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            const csrfToken = '{{ csrf_token() }}'; // Kirim CSRF ke JS

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success mr-2",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });

            function confirmDelete(url) {
                Swal.fire({
                        title: 'Apa Anda Yakin?',
                        text: "Data Tidak Dapat Dikembalikan Setelah Dihapus",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus Data!',
                        cancelButtonText: 'Jangan Dihapus!',
                        reverseButtons: true,
                        customClass: {
                            confirmButton: 'bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 ml-6', // Jarak antar tombol dengan `mr-4`
                            cancelButton: 'bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-500'
                        },
                        buttonsStyling: false // Nonaktifkan gaya bawaan SweetAlert
                }).then((result) => {
                    if (result.isConfirmed) {
                        // SweetAlert Hapus
                        Swal.fire('Dihapus!', 'Data berhasil dihapus.', 'success').then(() => {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = url;

                            const csrfField = document.createElement('input');
                            csrfField.type = 'hidden';
                            csrfField.name = '_token';
                            csrfField.value = csrfToken; // Gunakan csrfToken
                            form.appendChild(csrfField);

                            const methodField = document.createElement('input');
                            methodField.type = 'hidden';
                            methodField.name = '_method';
                            methodField.value = 'DELETE';
                            form.appendChild(methodField);

                            document.body.appendChild(form);
                            form.submit();
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire('Dibatalkan', 'Data Anda tetap aman.', 'error');
                    }
                });
            }
        </script>
    @endsection
