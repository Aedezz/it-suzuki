@extends('layout.grup')

@section('title', 'Daftar Grup')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
@section('body')
<h2 class="font-sans text-xl sm:text-2xl font-bold absolute top-6 left-7" style="color: rgb(45, 45, 45)">
    Group
</h2>
    <a href="{{ route('group.create') }}" class="inline-block">
        <button type="button"
            class="flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition duration-300 shadow-md"
            title="Tambah Data" style="margin-left: 1125px;">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah</span>
        </button>
    </a>
    <hr style="margin-top: 20px">

    <div class="mt-10 w-full">
        <div id="tableContainer" class="transition-all duration-500 ease-in-out p-4">
            <script>
                $(document).ready(function() {
                    $('#example').DataTable({
                        "columnDefs": [{
                            "targets": 2, // Mengatur agar kolom Aksi (kolom ke-3, indeks 2) tidak disembunyikan
                            "visible": true, // Pastikan kolom Aksi terlihat
                        }]
                    });
                });
            </script>
            <table id="example" class="display w-full table-auto border-collapse">
                <thead>
                    <tr>
                        <th data-priority="1" class="text-center">No</th>
                        <th data-priority="2" class="text-center">Nama Grup</th>
                        <th data-priority="3" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groups as $group)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $group->nama_grup }}</td>
                            <td class="p-4 border-b border-blue-gray-50 text-center">
                                <div class="flex justify-center space-x-2">
                                    <!-- Button Edit -->
                                    <a href="{{ route('group.edit', $group->id_grup) }}"
                                        class="text-white p-1 w-8 rounded-md transition duration-300 edit-btn"
                                        title="Perbarui"
                                        style="background-color: #17a2b8; display: inline-flex; justify-content: center; align-items: center;">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- Tombol Hapus (Delete) -->
                                    <button type="button"
                                        onclick="confirmDelete('{{ route('group.destroy', $group->id_grup) }}')"
                                        class="bg-red-500 text-white p-1 w-8 h-8 rounded-md hover:bg-red-600 transition duration-300"
                                        title="Hapus Data">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
