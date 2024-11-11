<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Dropdown transition */
        .menuDropdown {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(-10px);
            min-width: max-content; /* Ensures the width adjusts based on content */
        }

        /* Show menu with animation */
        .menuDropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Menu item hover effect - bigger shadow and text highlight */
        .menuDropdown a:hover {
            background-color: #cbd5e1;
            text-decoration: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Rotate arrow icon smoothly */
        .rotate-180 {
            transform: rotate(180deg);
            transition: transform 0.3s ease;
        }

        /* Hover effect for menu items */
        .menu-link {
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease, font-weight 0.3s ease, border 0.3s ease;
            text-decoration: none;
            border: 2px solid transparent;
            border-radius: 4px;
        }

        .menu-link:hover {
            background-color: #e2e8f0;
            color: #2d3748;
            transform: scale(1.1);
            font-weight: bold;
            border-color: #4b5563;
        }

        /* Hover effect for caret icon */
        .caret-hover:hover {
            transform: scale(1.2);
            transition: transform 0.2s ease-in-out;
        }

        /* Focus effect on the button */
        button:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Focus ring effect */
        }

        /* Smooth dropdown for profile */
        #profileDropdown {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(-10px);
        }

        /* Show profile dropdown with animation */
        #profileDropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    </style>
</head>
<body bgcolor="#E2F1E7">
    <div class="navbar bg-gray-800 text-white flex items-center p-4">
        <div class="navbar-links flex gap-8">
            <!-- Icon Home -->
            <a href="#" class="hover:text-gray-400 flex items-center ml-8">
                <i class="bi bi-bar-chart-fill text-2xl"></i>
            </a>              
    
            <!-- All Link -->
            <a href="#" class="flex items-center text-xl font-semibold focus:outline-none">Log Book</a>
            <a href="#" class="flex items-center text-xl font-semibold focus:outline-none">OutStanding</a>
            <a href="#" class="flex items-center text-xl font-semibold focus:outline-none">Branch Information</a>
            <a href="#" class="flex items-center text-xl font-semibold focus:outline-none">Help</a>
            <a href="#" class="flex items-center text-xl font-semibold focus:outline-none">Report</a>
    
            <!-- Network Dropdown -->
            <div class="relative">
                <button onclick="toggleMenuDropdown('networkDropdown', 'networkIcon')" class="flex items-center text-xl font-semibold focus:outline-none">
                    <span class="mr-2">Network</span>
                    <i id="networkIcon" class="bi bi-caret-down-fill text-2xl caret-hover"></i>
                </button>
                <div id="networkDropdown" class="menuDropdown absolute bg-white text-gray-800 left-0 mt-2 w-48 rounded-lg shadow-lg">
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Problem</a>
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Bandwidth</a>
                </div>
            </div>
    
            <!-- Service Dropdown -->
            <div class="relative">
                <button onclick="toggleMenuDropdown('serviceDropdown', 'serviceIcon')" class="flex items-center text-xl font-semibold focus:outline-none">
                    <span class="mr-2">Service</span>
                    <i id="serviceIcon" class="bi bi-caret-down-fill text-2xl caret-hover"></i>
                </button>
                <div id="serviceDropdown" class="menuDropdown absolute bg-white text-gray-800 left-0 mt-2 w-48 rounded-lg shadow-lg">
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Barang</a>
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Item</a>
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">History</a>
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Komputer</a>
                </div>
            </div>
    
            <!-- General Dropdown -->
            <div class="relative">
                <button onclick="toggleMenuDropdown('generalDropdown', 'generalIcon')" class="flex items-center text-xl font-semibold focus:outline-none">
                    <span class="mr-2">General</span>
                    <i id="generalIcon" class="bi bi-caret-down-fill text-2xl caret-hover"></i>
                </button>
                <div id="generalDropdown" class="menuDropdown absolute bg-white text-gray-800 left-0 mt-2 w-48 rounded-lg shadow-lg">
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Period</a>
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Activity</a>
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Branch</a>
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Group</a>
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Deskripsi</a>
                    <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Modul</a>
                </div>
            </div>
    
            <!-- Form Dropdown -->
            <div class="relative">
                <button onclick="toggleMenuDropdown('formDropdown', 'formIcon')" class="flex items-center text-xl font-semibold focus:outline-none">
                    <span class="mr-2">Form</span>
                    <i id="formIcon" class="bi bi-caret-down-fill text-2xl caret-hover"></i>
                </button>
                <div id="formDropdown" class="menuDropdown absolute bg-white text-gray-800 left-0 mt-2 w-48 rounded-lg shadow-lg">
                    <a href="{{ route('pc.create') }}" class="menu-link block px-4 py-2 hover:bg-gray-200">Install Komputer/Laptop</a>
                    <a href="{{ route('pembuatan-user') }}" class="menu-link block px-4 py-2 hover:bg-gray-200">Pembuatan User/Reset Password</a>
                    <a href="{{ route('perbaikan') }}" class="menu-link block px-4 py-2 hover:bg-gray-200">Perbaikan Perangkat</a>
                </div>
            </div>
        </div>
    
        <!-- Profile Dropdown (aligned to the right) -->
        <div class="ml-auto relative">
            <button onclick="toggleMenuDropdown('profileDropdown', 'profileIcon')" class="flex items-center text-xl font-semibold focus:outline-none">
                <span class="mr-2">Profile</span>
                <i id="profileIcon" class="bi bi-caret-down-fill text-2xl caret-hover"></i>
            </button>
            <div id="profileDropdown" class="menuDropdown absolute bg-white text-gray-800 right-0 mt-2 w-48 rounded-lg shadow-lg">
                <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Settings</a>
                <a href="#" class="menu-link block px-4 py-2 hover:bg-gray-200">Log Out</a>
            </div>
        </div>
    </div>    
    

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
