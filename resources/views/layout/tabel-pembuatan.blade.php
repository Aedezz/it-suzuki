<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="icon" href="{{ asset('images/logo-tab.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        .tabs {
            display: flex;
            gap: 20px;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #ddd;
            padding: 0 1rem;
        }
        .tab {
    padding: 10px 20px;
    margin-right: 10px;
    background-color: #f5f5f5;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.tab.active {
    background-color: #4CAF50;
    color: white;
}

.tab:hover {
    background-color: #ddd;
}
        .table-wrapper {
            overflow-x: auto;
            margin: 2rem 0;
        }
        /* Styling untuk Tab Content */
.tab-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    display: none; /* Secara default tab lainnya disembunyikan */
}

/* Styling untuk Form Container */
.form-container {
    max-width: 800px;
    margin: 0 auto;
}

/* Styling untuk form-select dan form-label */
.form-label {
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.form-select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 14px;
}

.form-select:focus {
    border-color: #5c9ded;
    outline: none;
}

/* Tombol untuk Pending dan Print */
.btn-warning, .btn-success {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
}

.btn-warning {
    background-color: #f39c12;
    color: #fff;
    transition: background-color 0.3s ease;
}

.btn-warning:hover {
    background-color: #e67e22;
}

.btn-success {
    background-color: #2ecc71;
    color: #fff;
    transition: background-color 0.3s ease;
}

.btn-success:hover {
    background-color: #27ae60;
}

/* Layout untuk tombol Pending dan Print */
.d-flex {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-top: 20px;
}


        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            background: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 16px;
            border-bottom: 1px solid #e5e7eb;
        }
        thead th {
            background-color: #2563eb;
            color: white;
            font-weight: bold;
        }
        tbody tr:hover {
            background-color: #f9fafb;
        }
        .btn-icon {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: #f3f4f6;
    transition: all 0.3s;
    border: none;
    cursor: pointer;
}

.btn-icon:hover {
    background-color: #e5e7eb;
}

.btn-icon i {
    font-size: 18px;
    color: #4b5563;
}

.btn-icon.btn-delete:hover i {
    color: #ef4444;
}

.btn-icon.btn-complete:hover i {
    color: #10b981;
}

.btn-icon.btn-print:hover i {
    color: #3b82f6;
}

    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layout.menu-navbar')

    <!-- Main Content -->
    <div class="container mx-auto mt-16 px-4">
        @yield('content')
    </div>

    <!-- Mengimpor Library yang Diperlukan -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100]
        });

        // Switching tabs
        const tabs = document.querySelectorAll('.tab');
        const contents = document.querySelectorAll('.tab-content');
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.style.display = 'none');
                tab.classList.add('active');
                contents[index].style.display = 'block';
            });
        });
    });
    
    // Konfirmasi Update Status
    function confirmUpdateStatus(button) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Status akan diubah menjadi selesai.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Ubah Status!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form otomatis setelah konfirmasi
                button.closest('form').submit();
            }
        });
    }

    // Konfirmasi Hapus Data
    function confirmDelete(button) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data ini akan dihapus secara permanen.',
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form otomatis setelah konfirmasi
                button.closest('form').submit();
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.checkbox-hide').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var row = this.closest('tr'); // Menemukan baris yang berisi checkbox
            if (this.checked) {
                row.style.display = 'none'; // Sembunyikan baris jika checkbox dicentang
            } else {
                row.style.display = ''; // Tampilkan kembali baris jika checkbox tidak dicentang
            }
        });
    });
});
</script>


</body>
</html>
