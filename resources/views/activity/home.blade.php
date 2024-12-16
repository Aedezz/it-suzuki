@include('layout.menu-navbar')
<style>
    a.edit-btn:hover {
        background-color: #0f6f91 !important;
        /* Warna hover */
    }
</style>
<!-- Pastikan SweetAlert2 sudah disertakan -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <div class="flex justify-center items-center mt-5">
        <div
            class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-auto">
            <!-- Title, Filter, and Create Button -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex justify-between items-center mb-4 gap-3">
                    <!-- Activity Title -->
                    <h2 class="font-sans text-xl sm:text-2xl font-bold text-gray-800">
                        Aktifitas
                    </h2>             
                </div>
                
                <!-- Create Button -->
                <a href="{{ route('activity.create', ['nama_cabang' => request('nama_cabang'), 'nama' => request('nama')]) }}"
                    id="addButton"  style="margin-top: -25px"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 flex items-center hidden">
                    <i class="fa-solid fa-plus mr-2"></i> <!-- Menambahkan margin kanan -->
                    Tambah
                </a>
                   
            </div>
            <hr style="margin-top: -20px">
            <form action="{{ route('home-activity') }}" method="GET" class="flex space-x-4" style="margin-top: 25px; margin-bottom: 30px;">
                <!-- Filter inputs -->
                <select name="nama_cabang" class="border rounded-md py-2 px-4 text-gray-900 text-sm" required>
                    <option value="">Semua Cabang</option>
                    @foreach ($cabangs as $cabang)
                        <option value="{{ $cabang->nama_cabang }}"
                            {{ request('nama_cabang') == $cabang->nama_cabang ? 'selected' : '' }}>
                            {{ $cabang->nama_cabang }}
                        </option>
                    @endforeach
                </select>
            
                <select name="nama" class="border rounded-md py-2 px-4 w-72 text-gray-900 text-sm">
                    <option value="">Pilih Nama</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->nama }}"
                            {{ request('nama') == $user->nama ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
            
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">
                    Filter
                </button>
            </form>
            
            <!-- Content area (table) -->
            <div class="mt-15 w-full">
                <div id="tableContainer" class="transition-all duration-500 ease-in-out">
                    @if (count($viewActivity) > 0)
                        <table id="example" class="display w-full table-auto border-collapse">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold">No</th>
                                    <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold">Cabang</th>
                                    <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold">Grup</th>
                                    <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold">Nama Kegiatan
                                    </th>
                                    <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold">Username</th>
                                    <th class="py-2 px-4 border-b-2 text-center text-gray-800 font-semibold">
                                        <div class="flex justify-center">Aksi</div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($viewActivity as $index => $a)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                                        <td class="py-2 px-4 border-b">{{ $a->nama_cabang }}</td>
                                        <td class="py-2 px-4 border-b">{{ $a->nama_grup }}</td>
                                        <td class="py-2 px-4 border-b">{{ $a->nama_kegiatan }}</td>
                                        <td class="py-2 px-4 border-b">{{ $a->nama }}</td>
                                        <td class="py-2 px-4 border-b text-center flex items-center justify-center">
                                            <!-- Aksi -->
                                            <a href="{{ route('activity.edit', $a->id_kegiatan) }}"
                                                class="text-white p-1 w-8 rounded-md transition duration-300 edit-btn"
                                                title="Edit" style="background-color: #17a2b8;">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button
                                            onclick="confirmDelete('{{ route('activity.destroy', $a->id_kegiatan) }}')"
                                            class="bg-red-500 text-white p-1 w-8 rounded-md hover:bg-red-600 transition duration-300 ml-2"
                                            title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-500 text-center mt-10">Silakan Gunakan Filter Untuk Menampilkan Data Yang Anda
                            Inginkan.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <script>
        // Fungsi untuk memeriksa apakah URL memiliki query string
        function checkFilterApplied() {
            const urlParams = new URLSearchParams(window.location.search);
            // Jika ada parameter query string, munculkan tombol Tambah
            if (urlParams.has('nama_cabang') || urlParams.has('nama')) {
                document.getElementById('addButton').classList.remove('hidden');
            }
        }

        // Jalankan fungsi setelah halaman dimuat
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
