<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Modul')</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layout.menu-navbar')

    <!-- Konten -->
    <div class="container mx-auto my-8">
        <!-- Header -->
        <div class="flex flex-wrap justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">@yield('title', 'Module')</h2>
            <div>
                @yield('button')
            </div>
        </div>

        <!-- Filter -->
        <div class="mb-6">
            @yield('filter')
        </div>

        <!-- Konten Utama -->
        <div>
            @yield('content')
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.js"></script>

    <script>
        // Menampilkan SweetAlert jika ada session 'success' atau 'error'
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 3000
            });
        @endif
    </script>

    @stack('scripts') <!-- Untuk script tambahan lainnya, seperti konfirmasi hapus -->
</body>
</html>
