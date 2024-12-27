@extends('../dalam/layout')

@section('style')
<style>
    .rectangle-container {
        width: 100%;
        padding: 16px;
    }

    #tableContainer {
        width: 100%;
        overflow-x: auto; /* Allows horizontal scrolling on smaller screens */
    }

    table.dataTable {
        width: 100% !important;
        table-layout: fixed; /* Fixed layout for more control over column width */
    }

    table.dataTable th,
    table.dataTable td {
        white-space: normal; /* Allows text to wrap */
        word-wrap: break-word; /* Breaks long words onto the next line */
        text-align: center; /* Centers text for better alignment */
        padding: 4px 8px; /* Reduced padding for tighter cells */
        font-size: 14px; /* Optional: Reduce font size for tighter appearance */
    }

    /* Adjust "No" column width */
    table.dataTable th:first-child,
    table.dataTable td:first-child {
        width: 50px; /* Set a fixed width for the "No" column */
    }

    /* Allow "Nama Item" to take remaining space */
    table.dataTable th:nth-child(2),
    table.dataTable td:nth-child(2) {
        width: auto; /* Let it grow to take available space */
    }

    /* Adjust "Aksi" column width */
    table.dataTable th:last-child,
    table.dataTable td:last-child {
        width: 130px; /* Set a fixed width for the "Aksi" column */
    }

    /* Orange Aksi Buttons */
    .aksi-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background-color: #e40a0a;
        color: white;
        transition: background-color 0.3s;
    }

    .aksi-button:hover {
        background-color: #a70808;
    }

    .add-button-container {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 16px; /* Space between button and table */
    }

    .dataTables_length, .dataTables_filter {
        padding: 8px;
        border-radius: 8px;
    }

    .dataTables_length select, .dataTables_filter input {
        border: 1px solid #e2e8f0;
        padding: 4px 8px;
        border-radius: 4px;
    }
</style>
@endsection

<link rel="icon" href="../images/perbaikan/logo-tab.png">

<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <!-- SweetAlert Status Message -->
    @if (session('status'))
    <script>
        Swal.fire({
            title: '{{ session('status')['judul'] }}',
            text: '{{ session('status')['pesan'] }}',
            icon: '{{ session('status')['icon'] }}',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    <!-- Main Container -->
    <div class="flex justify-center items-center mt-10">
        <div class="relative w-full lg:w-11/12 xl:w-10/12 bg-white rounded-lg shadow-md p-6">
            
            <!-- Title and Action Menu -->
            <div class="flex justify-between items-center px-4 py-8">
                <!-- Title -->
                <h2 class="font-sans font-bold text-lg md:text-2xl" style="font-size: 20px; margin-top: -20px;">
                    Daftar Item
                </h2>
            
                <!-- Create Button -->
                {{-- <a href="{{ route('item.create') }}"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-plus mr-2"></i>
                    Tambah
                </a> --}}
            </div>

            <!-- Table Container -->
            <div id="tableContainer" class="w-full">
                <table id="example" class="display w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Nama Item</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->nama }}</td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="flex justify-center space-x-2">
                                        <!-- Edit Button -->
                                        <div class="flex justify-center w-full">
                                            <a href="{{ route('item.edit', $data->id) }}" title="Perbarui"
                                                class="relative w-8 h-8 rounded-lg bg-blue-500 text-white flex justify-center items-center hover:bg-blue-600" title="Perbarui">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true,
                pageLength: 25,
                lengthMenu: [10, 25, 50, 100]
            });
        });
    </script>
</body>