<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IT System | Dashboard</title>
    <link rel="icon" href="{{ asset('images/logo-tab.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Styling untuk tombol */
        .btn {
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* Tombol Biru */
        .btn-blue {
            background-color: #3b82f6;
            color: white;
        }
        .btn-blue:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
        }

        /* Tombol Hijau */
        .btn-green {
            background-color: #10b981;
            color: white;
        }
        .btn-green:hover {
            background-color: #059669;
            transform: translateY(-2px);
        }

        /* Tombol Merah */
        .btn-red {
            background-color: #ef4444;
            color: white;
        }
        .btn-red:hover {
            background-color: #dc2626;
            transform: translateY(-2px);
        }

        /* Tombol Teal */
        .btn-teal {
            background-color: #14b8a6;
            color: white;
        }
        .btn-teal:hover {
            background-color: #0d9488;
            transform: translateY(-2px);
        }

        /* Menambahkan flexbox untuk men-center-kan tabel */
        .table-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        /* Styling untuk kontainer tabel */
        .table-container {
            width: 90%; /* Atur lebar tabel agar tidak terlalu besar */
            max-width: 1200px; /* Maksimal lebar tabel */
            overflow-x: auto;
            background: linear-gradient(135deg, #e2e8f0, #f3f4f6);
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }

        thead {
            background-color: #4CAF50;
            color: white;
            z-index: 10;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            position: relative;
            z-index: 1;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        /* Menangani pointer events agar tidak terpengaruh */
        thead {
            pointer-events: none;
        }

        /* Styling untuk form container */
        .form-container {
            background-color: #f9fafb;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
            width: 90%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Styling untuk Tab Navigation */
        .tabs {
            display: flex;
            gap: 20px;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #ddd;
        }

        .tab {
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 8px;
            background-color: #f3f4f6;
            transition: background-color 0.3s;
        }

        .tab.active-tab {
            background-color: #ddd;
            font-weight: bold;
        }

        /* Menyembunyikan konten tab yang tidak aktif */
        .tab-content.hidden {
            display: none;
        }

        /* Styling untuk pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 20px;
        }

        .pagination a {
            padding: 8px 12px;
            background-color: #f3f4f6;
            border-radius: 6px;
            color: #4b5563;
            text-decoration: none;
        }

        .pagination a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Navbar or Header -->
    @include('layout.menu-navbar')

    <!-- Content Area -->
    <div class="container mx-auto mt-16 px-4">
        <!-- Tab Navigation -->
        <div class="tabs">
            <div class="tab active-tab" onclick="switchTab(1)">Data</div>
            <div class="tab" onclick="switchTab(2)">Laporan</div>
            <div class="tab" onclick="switchTab(3)">Ceklist</div> <!-- Tab ke-3 -->
        </div>

        <!-- Form Tabel (Tab 1) -->
        <div class="tab-content" id="tab-1">
            <!-- Search Box -->
            <div class="search-box mb-4">
                <input type="text" placeholder="Search..." id="searchInput">
                <i class="bi bi-search"></i>
            </div>

            <!-- Table -->
            <div class="table-wrapper">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Divisi Cabang</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formUser as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nik }}</td>
                                    <td>{{ $data->nomor }}</td>
                                    <td>{{ $data->tanggal }}</td>
                                    <td>{{ $data->nama_lengkap }}</td>
                                    <td>{{ $data->jabatan }}</td>
                                    <td>{{ $data->divisi_cabang }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td>{{ $data->cek == 0 ? 'Belum Selesai' : 'Selesai' }}</td>
                                    <td>
                                        @if ($data->cek == 0)
                                            <form action="{{ route('form-pembuatan.updateStatus', $data->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-green">
                                                    <i class="bi bi-check-circle"></i> Status
                                                </button>
                                            </form>
                                        @endif

                                        <form action="{{ route('form-pembuatan.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-red" onclick="return confirm('Are you sure you want to delete this item?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>

                                        <a href="#" class="btn btn-teal"><i class="bi bi-printer"></i> Print</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination Links -->
            <div class="pagination">
                {{ $formUser->links() }}
            </div>
        </div>

        <!-- Form Tambah Data (Tab 2) -->
        <div class="form-container">
            <form action="{{ route('form-pembuatan.updateStatusByYear') }}" method="POST">
                @csrf
                <!-- Pilih Tahun -->
                <div class="mb-4">
                    <label for="year" class="block text-sm font-medium text-gray-700">Pilih Tahun</label>
                    <select name="year" id="year" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                        @for ($i = 2024; $i <= 2033; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <!-- Pilih Status -->
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Pilih Status</label>
                    <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                        <option value="0">Belum Selesai</option>
                        <option value="1">Selesai</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-blue mt-4 w-auto px-4 py-2 text-sm">Pending</button>
<a href="#" class="btn btn-teal w-auto px-4 py-2 text-sm">Print</a>

            </form>
        </div>
    </div>
            </div>
        </div>

    </div>

    <script>
        // Function to switch between tabs
        function switchTab(tabNumber) {
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach((tab, index) => {
                if (index === tabNumber - 1) {
                    tab.classList.add('active-tab');
                    tabContents[index].classList.remove('hidden');
                } else {
                    tab.classList.remove('active-tab');
                    tabContents[index].classList.add('hidden');
                }
            });
        }

        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();

            const form = event.target;
            const year = form.year.value;
            const status = form.status.value;
            
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: `Status untuk tahun ${year} akan diubah menjadi ${status == 1 ? 'Selesai' : 'Belum Selesai'}.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Ubah Status!',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>

</body>
</html>
