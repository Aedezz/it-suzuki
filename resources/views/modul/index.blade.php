@include('layout.menu-navbar')
<style>
    a.edit-btn:hover {
        background-color: #0f6f91 !important;
        /* Warna hover */
    }
</style>
<!-- Pastikan SweetAlert2 sudah disertakan -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<body class="bg-gray-100">
    <div class="flex justify-center items-center mt-5">
        <div
            class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-auto">
            <!-- Title, Filter, and Create Button -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex justify-between items-center mb-4 gap-3">
                    <!-- Activity Title -->
                    <h2 class="font-sans text-xl sm:text-2xl font-bold text-gray-800">
                        Modul
                    </h2>
                </div>

                <a href="{{ route('modul.create') }}" id="addButton"
                    style="margin-top: -25px"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 flex items-center hidden">
                    <i class="fa-solid fa-plus mr-2"></i> <!-- Menambahkan margin kanan -->
                    Tambah
                </a>
            </div>

            <hr style="margin-top: -20px">
            <form action="{{ route('modul.index') }}" method="GET" class="flex space-x-4"
                style="margin-top: 25px; margin-bottom: 30px;">
                <!-- Filter inputs -->
                <select name="id_kategori" id="id_kategori" class="border rounded-md py-2 px-4 text-gray-900 text-sm"
                    required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id_kategori }}" 
                            {{ request('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">
                    Filter
                </button>
            </form>

            <div class="mt-15 w-full">
                <div id="tableContainer" class="transition-all duration-500 ease-in-out">
                    {{-- Periksa apakah filter diterapkan --}}
                    @if ($filterApplied)
                        {{-- Tabel hanya muncul jika filter sudah diterapkan --}}
                        @if ($moduls->isNotEmpty())
                            <table id="example" class="display w-full table-auto border-collapse">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b-2 text-center text-gray-800 font-semibold">No</th>
                                        <th class="py-2 px-4 border-b-2 text-center text-gray-800 font-semibold">Kategori
                                        </th>
                                        <th class="py-2 px-4 border-b-2 text-center text-gray-800 font-semibold">Nama Modul</th>
                                        <th class="py-2 px-4 border-b-2 text-center text-gray-800 font-semibold">
                                            <div class="flex justify-center">Aksi</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($moduls->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data ditemukan</td>
                                        </tr>
                                    @else
                                    @foreach ($moduls as $modul)
                                            <tr>
                                                <td class="py-2 px-4 border-b text-center">{{ $loop->iteration }}</td>

                                                <td class="py-2 px-4 border-b text-center">{{ $modul->nama_kategori }}</td>
                                                
                                                <td class="py-2 px-4 border-b text-center">{{ $modul->nama_modul }}</td>
                                                <td class="py-2 px-4 border-b text-center">
                                                    <div class="flex justify-center space-x-2">

                                                        <a href="{{ route('modul.edit', $modul->id_modul) }}"
                                                            class="relative w-10 h-10 rounded-lg text-white flex justify-center items-centertransition duration-300 edit-btn"
                                                            title="Perbarui"
                                                            style="background-color: #17a2b8; display: inline-flex; justify-content: center; align-items: center;">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>

                                                        <button type="button"
                                                            onclick="confirmDelete('{{ route('modul.destroy', $modul->id_modul) }}')"
                                                            class="relative w-10 h-10 rounded-lg bg-red-500 text-white flex justify-center items-center hover:bg-red-600"
                                                            title="Delete">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        @else
                            <p class="text-gray-500 text-center mt-10">Tidak Ada Data Yang Sesuai Dengan Data Pada
                                Filter.</p>
                        @endif
                    @else
                        {{-- Pesan untuk filter yang belum diterapkan --}}
                        <p class="text-gray-500 text-center mt-10">Silakan Gunakan Filter Untuk Menampilkan Data Yang
                            Anda Inginkan.</p>
                    @endif
                </div>
            </div>
        </body>


{{-- @section('content')
<div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
    @if ($moduls->isNotEmpty())
    <table class="w-full border-collapse border border-gray-200 rounded-lg">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="px-4 py-3 text-left font-medium">No</th>
                <th class="px-4 py-3 text-left font-medium">Kategori</th>
                <th class="px-4 py-3 text-left font-medium">Nama Modul</th>
                <th class="px-4 py-3 text-left font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($moduls as $modul)
            <tr class="hover:bg-green-100 transition duration-300">
                <td class="border-t px-4 py-3 text-gray-800">{{ $loop->iteration }}</td>
                <td class="border-t px-4 py-3 text-gray-800">{{ $modul->nama_kategori }}</td>
                <td class="border-t px-4 py-3 text-gray-800">{{ $modul->nama_modul }}</td>
                <td class="border-t px-4 py-3 flex space-x-2">
                    <!-- Tombol Edit -->
                    <a href="{{ route('modul.edit', $modul->id_modul) }}" class="text-green-600 hover:bg-green-200 rounded-full p-2" title="Edit Modul">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5l5 5M9 5l5-5"></path>
                        </svg>
                    </a>
                    
                    <!-- Tombol Hapus -->
                    <form action="{{ route('modul.destroy', $modul->id_modul) }}" method="POST" class="inline" title="Hapus Modul">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:bg-red-200 rounded-full p-2" onclick="return confirm('Yakin ingin menghapus modul ini?')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="text-center text-gray-500 mt-4">Tidak ada data untuk kategori yang dipilih.</p>
    @endif
</div>
@endsection --}}


<script>
    // Fungsi untuk memeriksa apakah URL memiliki query string
    function checkFilterApplied() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('id_kategori')) {
            document.getElementById('addButton').classList.remove('hidden');
            console.log('Filter diterapkan, tombol tampil');
        }
    }

    document.addEventListener('DOMContentLoaded', checkFilterApplied);
</script>

<script>
    $(document).ready(function() {
        if ($('#example').length) {
            $('#example').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true
            });
        }
    });
</script>

<script>
    // Fungsi untuk konfirmasi Delete
    // Konfigurasi SweetAlert dengan Bootstrap Buttons
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success", // Tombol konfirmasi menggunakan gaya Bootstrap sukses
            cancelButton: "btn btn-danger" // Tombol batal menggunakan gaya Bootstrap bahaya
        },
        buttonsStyling: false // Menonaktifkan styling default SweetAlert
    });

    // Fungsi konfirmasi penghapusan dengan SweetAlert
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
                // Jika pengguna mengonfirmasi penghapusan
                Swal.fire({
                    title: 'Dihapus!',
                    text: 'Data berhasil dihapus.',
                    icon: 'success',
                    customClass: {
                        confirmButton: 'bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500',
                    },
                    buttonsStyling: false
                }).then(() => {
                    // Membuat form untuk submit DELETE ke URL
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = url;

                    // Menambahkan CSRF Token
                    const csrfField = document.createElement('input');
                    csrfField.type = 'hidden';
                    csrfField.name = '_token';
                    csrfField.value =
                        '{{ csrf_token() }}'; // Pastikan ini dapat dieksekusi dalam Blade template
                    form.appendChild(csrfField);

                    // Menambahkan Method DELETE
                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';
                    form.appendChild(methodField);

                    // Submit form untuk delete data
                    document.body.appendChild(form);
                    form.submit();
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Jika pengguna membatalkan penghapusan
                Swal.fire({
                    title: 'Dibatalkan',
                    text: 'Data Anda tetap aman.',
                    icon: 'error',
                    customClass: {
                        confirmButton: 'bg-red-600 text-white font-bold py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500',
                    },
                    buttonsStyling: false
                });
            }
        });
    }
</script>
