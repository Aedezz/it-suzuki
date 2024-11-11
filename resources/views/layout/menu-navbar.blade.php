<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Dropdown transition */
        #menuDropdown {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(-10px);
            min-width: max-content; /* Ensures the width adjusts based on content */
        }

        /* Profile Dropdown */
        #profileDropdown {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(-10px);
            min-width: max-content; /* Ensures the width adjusts based on content */
        }

        /* Show menu with animation */
        #menuDropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Menu item hover effect - bigger shadow and text highlight */
        #menuDropdown a:hover {
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
        <div class="navbar-links flex gap-10">
            <!-- Icon Home -->
            <a href="/" class="hover:text-gray-400 flex items-center ml-20">
                <i class="bi bi-house-fill mr-1"></i>
            </a>

            <!-- Menu Dropdown with Toggle (Positioned Below Navbar) -->
            <div class="relative">
                <button onclick="toggleMenuDropdown()" class="flex items-center text-xl font-bold focus:outline-none">
                    <span class="mr-2">Form</span>
                    <i id="dropdownIcon" class="bi bi-caret-down-fill text-2xl caret-hover"></i> <!-- Added caret-hover for animation -->
                </button>
                <div id="menuDropdown" class="absolute bg-white text-gray-800 left-0 mt-3 w-40 rounded-lg shadow-lg">
                    <a href="{{ route('pc.create') }}" class="menu-link block px-4 py-2 hover:bg-gray-200">Install Komputer/Laptop</a>
                    <a href="{{ route('pembuatan-user') }}" class="menu-link block px-4 py-2 hover:bg-gray-200">Pembuatan User/Reset Password</a>
                    <a href="{{ route('perbaikan') }}" class="menu-link block px-4 py-2 hover:bg-gray-200">Perbaikan Perangkat</a>
                </div>
            </div>
        </div>

        <!-- Profile Dropdown for IT Section (Aligned Right) -->
        <div class="navbar-logo ml-auto mr-10 relative">
            <button onclick="toggleProfileDropdown()" class="flex items-center text-xl font-bold focus:outline-none">
                <span class="mr-2">IT</span>
                <i id="profileIcon" class="bi bi-caret-down-fill text-2xl caret-hover"></i> <!-- Added caret-hover for animation -->
            </button>
            <div id="profileDropdown" class="absolute bg-white text-gray-800 right-0 mt-3 w-40 rounded-lg shadow-lg">
                <a href="#" class="block px-4 py-2 hover:bg-gray-200">Rubah Password</a>
                <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-200">Logout</a>
            </div>
        </div>
    </div>

    <script>
        let isMenuDropdownVisible = false;

        function toggleMenuDropdown() {
            const menuDropdown = document.getElementById('menuDropdown');
            const icon = document.getElementById('dropdownIcon');
            
            // Toggle menu visibility
            isMenuDropdownVisible = !isMenuDropdownVisible;
            menuDropdown.classList.toggle('show', isMenuDropdownVisible);
            icon.classList.toggle('rotate-180', isMenuDropdownVisible);
        }

        let isProfileDropdownVisible = false;

        function toggleProfileDropdown() {
            const profileDropdown = document.getElementById('profileDropdown');
            const icon = document.getElementById('profileIcon');
            
            // Toggle profile dropdown visibility
            isProfileDropdownVisible = !isProfileDropdownVisible;
            profileDropdown.classList.toggle('show', isProfileDropdownVisible);
            icon.classList.toggle('rotate-180', isProfileDropdownVisible);
        }

        // Close dropdowns if clicked outside
        window.onclick = function(event) {
            const menuDropdown = document.getElementById('menuDropdown');
            const profileDropdown = document.getElementById('profileDropdown');
            const menuIcon = document.getElementById('dropdownIcon');
            const profileIcon = document.getElementById('profileIcon');

            if (!event.target.closest('.relative')) {
                menuDropdown.classList.remove('show');
                menuIcon.classList.remove('rotate-180');
                isMenuDropdownVisible = false;
            }

            if (!event.target.closest('.navbar-logo')) {
                profileDropdown.classList.remove('show');
                profileIcon.classList.remove('rotate-180');
                isProfileDropdownVisible = false;
            }
        }
    </script>
</body>
</html>
