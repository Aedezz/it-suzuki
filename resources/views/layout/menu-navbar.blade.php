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
     <!--Replace with your tailwind.css once created-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
     integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    
    <style>
        /* Navbar fixed to top */
        .navbar {
            position: fixed; /* Make navbar fixed */
            top: 0; /* Align navbar to top of the screen */
            left: 0;
            width: 100%; /* Make it full width */
            z-index: 1000; /* Ensure it stays above other content */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            background-color: #2d3748; /* Warna navbar sama dengan navbar1 */
            color: white; /* Teks navbar menjadi putih */
        }

        /* Adjust the body content to avoid overlap with navbar */
        body {
            padding-top: 60px; /* Adjust the top padding to the height of the navbar */
        }

        /* Hover effect for menu items - Same as navbar 1 */
        .menu-link {
            position: relative;
            display: inline-block;
            padding: 10px 3px;
            color: white;
            font-weight: normal;
            text-decoration: none;
            border-radius: 4px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        /* Add the line animation */
        .menu-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background-color: #e2e8f0; /* Warna garis */
            transition: width 0.3s ease; /* Animasi panjang garis */
        }

        /* Hover effect for menu link */
        .menu-link:hover {
            color: #e2e8f0; /* Warna teks berubah saat hover */
            transform: scale(1.05); /* Pembesaran saat hover */
        }

        .menu-link:hover::after {
            width: 100%; /* Garis akan penuh ketika hover */
        }

        /* Rotate arrow icon smoothly */
        .rotate-180 {
            transform: rotate(180deg);
            transition: transform 0.3s ease;
        }

        /* Hover effect for caret icon */
        .caret-hover:hover {
            transform: scale(1.2);
            transition: transform 0.2s ease-in-out;
        }

        /* Profile dropdown styling */
        .menuDropdown {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(-10px);
            min-width: max-content;
        }

        /* Show menu with animation */
        .menuDropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Ensure dropdown is below the button */
        .menuDropdown {
            top: 100%; /* Position it below the button */
        }

        /* Adjust position for dropdown */
        .menuDropdown a {
            display: block;
            padding: 8px 16px;
            color: #2d3748;
            text-decoration: none;
            font-weight: normal;
        }

        /* Change color on hover */
        .menuDropdown a:hover {
            background-color: #2d3748;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="navbar bg-black text-white flex items-center py-2 px-4">
        <div class="navbar-links flex gap-6 w-full items-center justify-between">
            <!-- Logo Icon -->
            <a href="/dashboard" class="hover:text-gray-300 flex items-center ml-4">
                <i class="bi bi-bar-chart-fill text-xl"></i>
            </a>

            <!-- Other menu links -->
            <a href="#" class="menu-link text-base font-medium">Log Book</a>
            <a href="#" class="menu-link text-base font-medium">OutStanding</a>
            <a href="{{route('branch-info')}}" class="menu-link text-base font-medium">Branch Information</a>
            <a href="{{route('help')}}" class="menu-link text-base font-medium">Help</a>
            <a href="#" class="menu-link text-base font-medium">Report</a>
    
            <!-- Network Dropdown -->
            <div class="relative">
                <button onclick="toggleMenuDropdown('networkDropdown', 'networkIcon')" class="flex items-center text-base font-medium focus:outline-none">
                    <span class="mr-2">Network</span>
                    <i id="networkIcon" class="bi bi-caret-down-fill text-2xl caret-hover"></i>
                </button>
                <div id="networkDropdown" class="menuDropdown absolute bg-white text-gray-800 left-0 mt-2 w-48 rounded-lg shadow-lg">
                    <a href="{{route('problem.index')}}" class="menu-link block px-4 py-2 hover:bg-gray-200">Problem</a>
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Bandwidth</a>
                </div>
            </div>
    
            <!-- Service Dropdown -->
            <div class="relative">
                <button onclick="toggleMenuDropdown('serviceDropdown', 'serviceIcon')" class="flex items-center text-base font-medium focus:outline-none">
                    <span class="mr-2">Service</span>
                    <i id="serviceIcon" class="bi bi-caret-down-fill text-2xl caret-hover"></i>
                </button>
                <div id="serviceDropdown" class="menuDropdown absolute bg-white text-gray-800 left-0 mt-2 w-48 rounded-lg shadow-lg">
                    <a href="{{route('barang.index')}}" class="menu-link block px-4 py-2 hover:bg-gray-200">Barang</a>
                    <a href="{{route('item.index')}}" class="menu-link block px-4 py-2 hover:bg-gray-200">Item</a>
                    <a href="{{route('history.index')}}" class="menu-link block px-4 py-2 hover:bg-gray-200">History</a>
                    <a href="{{route('komputer')}}" class="menu-link block px-4 py-2 hover:bg-gray-200">Komputer</a>
                </div>
            </div>

            <!-- General Dropdown -->
            <div class="relative">
                <button onclick="toggleMenuDropdown('generalDropdown', 'generalIcon')" class="flex items-center text-base font-medium focus:outline-none">
                    <span class="mr-2">General</span>
                    <i id="generalIcon" class="bi bi-caret-down-fill text-2xl caret-hover"></i>
                </button>
                <div id="generalDropdown" class="menuDropdown absolute bg-white text-gray-800 left-0 mt-2 w-48 rounded-lg shadow-lg">
                    <a href="{{route('periode.index')}}" class="menu-link block px-4 py-2 hover:bg-gray-200">Period</a>
                    <a href="{{route('home-activity')}}" class="menu-link block px-4 py-2 hover:bg-gray-200">Activity</a>
                    <a href="{{route('branch')}}" class="menu-link block px-4 py-2 hover:bg-gray-200">Branch</a>
                    <a href="{{route('group.index')}}" class="menu-link block px-4 py-2 hover:bg-gray-200">Group</a>
                    <a href="{{route('deskripsi.index')}}" class="menu-link block px-4 py-2 hover:bg-gray-200">Deskripsi</a>
                    <a href="{{route('modul.index')}}" class="menu-link block px-4 py-2 hover:bg-gray-200">Modul</a>
                </div>
            </div>

            <!-- Form Dropdown -->
            <div class="relative">
                <button onclick="toggleMenuDropdown('formDropdown', 'formIcon')" class="flex items-center text-base font-medium focus:outline-none">
                    <span class="mr-2">Form</span>
                    <i id="formIcon" class="bi bi-caret-down-fill text-2xl caret-hover"></i>
                </button>
                <div id="formDropdown" class="menuDropdown absolute bg-white text-gray-800 left-0 mt-2 w-48 rounded-lg shadow-lg">
                    <a href="{{ route('table') }}" class="menu-link block px-4 py-2 hover:bg-gray-200">Install Komputer/Laptop</a>
                    <a href="{{ route('form-pembuatan.index') }}" class="menu-link block px-4 py-2 hover:bg-gray-200">Pembuatan User Baru</a>
                    <a href="{{ route('form.index') }}" class="menu-link block px-4 py-2 hover:bg-gray-200">Perbaikan Perangkat</a>
                </div>
            </div>
    
            <!-- Profile Dropdown (aligned to the right) -->
            <div class="ml-auto relative">
                <!-- Ganti "Profile" dengan nama pengguna yang login -->
                <button onclick="toggleMenuDropdown('profileDropdown', 'profileIcon')" class="flex items-center text-base font-medium focus:outline-none">
                    <span class="mr-2">{{ Auth::user()->nama }}</span>
                    <i id="profileIcon" class="bi bi-caret-down-fill text-2xl caret-hover"></i>
                </button>
                <div id="profileDropdown" class="menuDropdown absolute bg-white text-gray-800 right-0 mt-2 w-48 rounded-lg shadow-lg">
                    <a href="{{ route('reset.password.form') }}" class="menu-link block px-4 py-2 hover:bg-gray-200">Rubah Password</a>
                    <a href="{{ route('logout') }}" class="menu-link block px-4 py-2 hover:bg-gray-200">Log Out</a>
                </div>
            </div>
        </div>  
    </div>

    {{-- <!-- Content Below the Navbar -->
    <div class="container mx-auto mt-16">
        <h1 class="text-4xl font-bold mb-6">Welcome to the IT Dashboard</h1>
        <p class="text-lg">Scroll down to see the content!</p>
        <div class="h-screen bg-gray-200 mt-6 p-8">
            <p>This is some content below the navbar. Scroll to see how the navbar stays fixed at the top.</p>
        </div>
    </div> --}}

    <script>
        // Toggle visibility of a specific menu dropdown
        function toggleMenuDropdown(dropdownId, iconId) {
            const menuDropdown = document.getElementById(dropdownId);
            const icon = document.getElementById(iconId);
            
            // Hide all dropdowns before showing the clicked one
            const allDropdowns = document.querySelectorAll('.menuDropdown');
            allDropdowns.forEach(function(dropdown) {
                if (dropdown !== menuDropdown) {
                    dropdown.classList.remove('show');
                    const otherIcons = dropdown.previousElementSibling.querySelectorAll('i');
                    otherIcons.forEach(function(icon) {
                        icon.classList.remove('rotate-180');
                    });
                }
            });

            // Toggle the clicked dropdown
            menuDropdown.classList.toggle('show');
            icon.classList.toggle('rotate-180');
        }
    </script>
</body>
</html>
