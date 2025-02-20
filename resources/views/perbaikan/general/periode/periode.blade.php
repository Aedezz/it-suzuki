@extends('perbaikan.general.periode.layout')


<link rel="icon" href="../images/perbaikan/logo-tab.png">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    @if (session('status'))
        Swal.fire({
            title: '{{ session('status')['judul'] }}',
            text: '{{ session('status')['pesan'] }}',
            icon: '{{ session('status')['icon'] }}',
            confirmButtonText: 'OK'
        });
    @endif
</script>

<!-- Form Content (Inside the form layout) -->
@section('body')
<a href="{{ route('periode.create') }}" class="inline-block">
    <button type="button" 
            class="flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition duration-300 shadow-md"
            title="Tambah Data" style="margin-left: 1125px;">
        <i class="fa-solid fa-plus"></i>
        <span>Tambah</span>
    </button>
</a>
<hr style="margin-top: 20px">
    <!--Container-->
    <div class="mt-10 w-full">
        <div id="tableContainer" class="transition-all duration-500 ease-in-out">
            <table id="example" class="display w-full table-auto border-collapse">
                <thead>
                    <tr>
                        <th data-priority="1" class="text-center">No</th>
                        <th style="display: none;" data-priority="6">ID Periode</th> <!-- Kolom disembunyikan -->
                        <th data-priority="2" class="text-center">Nama Periode</th>
                        <th data-priority="3" class="text-center">Tanggal Awal</th>
                        <th data-priority="4" class="text-center">Tanggal Akhir</th>
                        <th data-priority="5" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periode as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td style="display: none;">{{ $data->id_periode }}</td>
                            <td class="text-center">{{ $data->nama_periode }}</td>
                            <td class="text-center">{{ $data->tgl_awal }}</td>
                            <td class="text-center">{{ $data->tgl_akhir }}</td>
                            <td class="p-4 border-b border-blue-gray-50 text-center">
                                <div class="flex justify-center space-x-2">
                                    <!-- Button Edit -->
                                    <a href="{{ route('periode.edit', $data->id_periode) }}"
                                        class="text-white p-1 w-8 rounded-md transition duration-300 edit-btn"
                                        title="Perbarui" style="background-color: #17a2b8; display: inline-flex; justify-content: center; align-items: center;">
                                        <i class="bi bi-pencil"></i>
                                    </a>                                    

                                    <!-- Tombol Hapus (Delete) -->
                                    <button type="button"
                                        onclick="confirmDelete('{{ route('periode.destroy', $data->id_periode) }}')"
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

@push('script')
    <script>5
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [
                    [0, 'asc']
                ], // Urutan berdasarkan nomor
                "columnDefs": [{
                    "targets": [1], // Kolom ID Periode (kolom kedua)
                    "visible": false, // Sembunyikan kolom
                    "searchable": false // Nonaktifkan pencarian di kolom ini
                }]
            });
        });
    </script>
@endpush
