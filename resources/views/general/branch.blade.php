@include('layout.menu-navbar')
<style>
    a.edit-btn:hover {
        background-color: #0f6f91 !important;
        /* Warna hover */
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <body class="bg-gray-50">
    <div class="flex justify-center items-center mt-10">
        <div
            class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-auto">
            <!-- Title and Create Button -->
            <div class="flex justify-between items-center">
                <h2 class="font-sans text-xl sm:text-2xl font-bold text-gray-800">
                    Branch
                </h2>
                <hr>
                <!-- Create Button (positioned to the right) -->
                <a href="{{ route('branch.create') }}"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-plus mr-2"></i> <!-- Menambahkan margin kanan -->
                    Tambah
                </a>
            </div>

            <hr style="margin-top: 20px">

            <!-- Content area (table) -->
            <div class="mt-10 w-full">
                <div id="tableContainer" class="transition-all duration-500 ease-in-out">
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
                                <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold">No</th>
                                <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold" style="padding-right: 700px">Nama Cabang</th> <!-- Padding untuk Nama Cabang -->
                                <th class="py-2 px-4 border-b-2 text-center text-gray-800 font-semibold">
                                    <div class="flex justify-center">Aksi</div> <!-- Center kolom Aksi -->
                                </th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach ($viewBranch as $index => $b)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                                    <td class="py-2 px-4 border-b pr-10">{{ $b->nama_cabang }}</td> <!-- Menambahkan padding kanan -->
                                    <td class="py-2 px-4 border-b text-center flex items-center justify-center">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('branch.edit', $b->id_cabang) }}"
                                            class="text-white p-1 w-8 rounded-md transition duration-300 edit-btn"
                                            title="Edit" style="background-color: #17a2b8;">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</body>
        @push('script')
            <script>
                $(document).ready(function() {
                    $('#example').DataTable({
                        "columnDefs": [{
                            "targets": 1 , // Mengatur agar kolom Aksi (kolom ke-9) tidak disembunyikan
                            "visible": true, // Pastikan kolom Aksi terlihat
                        }]
                    });
                });
            </script>

        @endpush
