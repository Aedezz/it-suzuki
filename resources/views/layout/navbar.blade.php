<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('images/logo-tab.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IT Suzuki</title>
    <link rel="icon" href="{{ asset('computing.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Gaya umum navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: #2d3748;
            color: white;
            position: relative;
            z-index: 2000;
        }

        .navbar-logo h2 {
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        .navbar-links {
            display: flex;
            gap: 10px;
        }

        .navbar-links a {
            color: white;
            font-size: 16px;
            text-decoration: none;
            position: relative;
            padding: 8px 12px;
        }

        /* Garis bawah dan warna hover */
        .navbar-links a::after,
        .sidebar a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background-color: #cbd5e0;
            transition: width 0.3s;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .navbar-links a:hover::after,
        .sidebar a:hover::after {
            width: 100%;
        }

        .navbar-links a:hover,
        .sidebar a:hover {
            color: #cbd5e0;
            /* Warna hover */
        }

        /* Dropdown styles */
        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            padding: 10px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            min-width: 150px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #4a5568;
        }

        /* Gaya sidebar responsif */
        .sidebar {
            display: none;
            position: fixed;
            top: 0;
            right: -250px;
            width: 250px;
            height: 100%;
            background-color: #2d3748;
            padding-top: 20px;
            z-index: 1000;
            transition: 0.3s;
        }

        .sidebar.show {
            right: 0;
        }

        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            position: relative;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #4a5568;
            color: #cbd5e0;
        }

        /* Tombol hamburger */
        .menu-btn {
            display: none;
            font-size: 30px;
            color: white;
            cursor: pointer;
            position: absolute;
            right: 20px;
        }

        /* Responsif untuk tampilan mobile */
        @media (max-width: 768px) {
            .navbar-links {
                display: none;
            }

            .navbar {
                height: 60px;
            }

            .menu-btn {
                display: block;
                right: 20px;
            }

            /* Sidebar tampil di mode responsif */
            .sidebar {
                display: block;
            }

            .sidebar a {
                padding: 15px;
                font-size: 18px;
            }

            /* Navbar-logo tetap di kiri pada tampilan mobile */
            .navbar-logo {
                position: absolute;
                top: 15px;
                left: 15px;
            }
        }
    </style>
</head>

<body bgcolor="#E2F1E7">
    <div class="navbar bg-gray-800 text-white flex items-center p-4">
        <div class="navbar-logo ml-2 mr-2">
            <a href="{{ route('login') }}" class="text-xl font-bold">LOGIN IT</a>
        </div>
        <div class="navbar-links flex gap-10">
            {{-- Icon Home --}}
            <a href="/" class="hover:text-gray-400 flex items-center ml-20">
                <i class="bi bi-house-fill mr-1"></i>
                Beranda
            </a>
            {{-- Menu --}}
            <a href="{{ route('pc.create') }}" class="hover:text-gray-400 font-sans">Install Komputer & Laptop</a>
            <a href="{{ route('pembuatan-user') }}" class="hover:text-gray-400 font-sans">Pembuatan User & Reset Password</a>
            <a href="{{ route('perbaikan') }}" class="hover:text-gray-400 font-sans">Perbaikan Perangkat</a>
            <a href="#" class="hover:text-gray-400 font-sans">Download Berita Acara</a>
        </div>
        {{-- Login --}}
       

        <div class="menu-btn" onclick="toggleSidebar()">☰</div>
    </div>

    <div id="sidebar" class="sidebar">

        <a href="{{ route('pc.create') }}" class="hover:text-gray-400 font-sans">Install Komputer/Laptop</a>
        <a href="{{ route('pembuatan-user') }}" class="hover:text-gray-400 font-sans">Pembuatan User/Reset Password</a>
        <a href="{{ route('perbaikan') }}" class="hover:text-gray-400 font-sans">Perbaikan Perangkat</a>
        <a href="#" class="hover:text-gray-400 font-sans">Download Berita Acara</a>

    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }
    </script>

</body>

</html>
