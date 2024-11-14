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

        /* Styling untuk kontainer tabel */
        .table-container {
            overflow-x: auto;
            margin-top: 2rem;
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

        /* Styling untuk Search Box */
        .search-box {
            max-width: 400px;
            width: 100%;
            display: flex;
            align-items: center;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 16px;
            background-color: white;
        }

        .search-box input {
            border: none;
            outline: none;
            padding: 8px;
            width: 100%;
            font-size: 14px;
            border-radius: 6px;
        }

        .search-box i {
            color: #4b5563;
            font-size: 18px;
            margin-right: 8px;
        }

        /* Pagination */
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
        <!-- Search Box -->
        <div class="search-box mb-4">
            <input type="text" placeholder="Search..." id="searchInput">
            <i class="bi bi-search"></i>
        </div>

        <!-- Table -->
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
                            <td>
                                @if ($data->cek == 0)
                                    <span>Belum Selesai</span>
                                @else
                                    <span>Selesai</span>
                                @endif
                            </td>
                            <td class="actions">
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

        <!-- Pagination Links -->
        <div class="pagination">
            {{ $formUser->links() }}
        </div>
    </div>

    <!-- SweetAlert Script -->
    @if (session('statusUpdate'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Status Updated!',
                text: '{{ session('statusUpdate') }}',
                confirmButtonText: 'Okay'
            });
        </script>
    @endif

</body>
</html>
