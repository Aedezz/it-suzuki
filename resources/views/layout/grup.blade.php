<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Halaman Grup')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* CSS Custom untuk Bagian Main */
        .content-wrapper {
            padding: 2rem;
            background-color: #f9fafb; /* Warna latar belakang utama */
            min-height: 90vh;
        }

        .table-container {
            overflow-x: auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            font-weight: 600;
            color: #333;
        }

        td {
            background-color: #ffffff;
            border-top: 1px solid #ddd;
        }

        .btn {
            transition: background-color 0.3s;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .btn-add {
            background-color: #4CAF50;
            color: white;
        }

        .btn-add:hover {
            background-color: #45a049;
        }

        .btn-edit {
            background-color: #ff9800;
            color: white;
        }

        .btn-edit:hover {
            background-color: #f57c00;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
        }

        .btn-delete:hover {
            background-color: #d32f2f;
        }

        /* Styling for pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 1.5rem;
        }

        .pagination a {
            padding: 6px 12px;
            background-color: #f3f4f6;
            border-radius: 4px;
            color: #333;
            transition: background-color 0.2s;
        }

        .pagination a:hover {
            background-color: #e5e7eb;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    @include('layout.menu-navbar')  <!-- Memanggil navbar di sini -->

    <!-- Main Content -->
    <main>
        <div class="content-wrapper">
            @yield('content')
        </div>
    </main>

    <footer class="bg-gray-800 text-white p-4 text-center mt-8">
        <p>&copy; 2024 Grup Management. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Fungsi SweetAlert konfirmasi untuk update/edit dan delete
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @elseif(session('delete_success'))
            Swal.fire({
                icon: 'success',
                title: 'Grup Dihapus!',
                text: '{{ session('delete_success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @elseif(session('edit_success'))
            Swal.fire({
                icon: 'success',
                title: 'Grup Diperbarui!',
                text: '{{ session('edit_success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        // Konfirmasi SweetAlert untuk menghapus
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Mencegah form submit otomatis

                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Data ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit form jika dikonfirmasi
                    }
                });
            });
        });

        // Konfirmasi SweetAlert untuk update/edit
        const updateForms = document.querySelectorAll('.update-form');
        updateForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Mencegah form submit otomatis

                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Kamu akan menyimpan perubahan ini.",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Simpan Perubahan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit form jika dikonfirmasi
                    }
                });
            });
        });
    </script>
</body>
</html>
