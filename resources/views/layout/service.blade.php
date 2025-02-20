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
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
        /* Add slide-down and slide-up animation */

        nav {
            margin-bottom: 10px;
        }

        .s1,
        .s2,
        .s3,
        .s4,
        .s5 {
            padding-left: -20px;
        }

        .slide-up {
            transition: max-height 0.5s ease-in-out;
            max-height: 0;
            overflow: hidden;
        }

        /* Add height to navbar */
        .navbar {
            min-height: 80px;
            /* Atur tinggi navbar di desktop */
        }

        /* Make sure the items are vertically centered */
        .navbar .container {
            height: 100%;
            display: flex;
            align-items: center;
        }

        /* Additional styling for the logo to keep it centered */
        .navbar img {
            height: 3.5rem;
            /* Set logo height for desktop */
        }

        /* Hover line effect on navbar items */
        .navbar .container a {
            position: relative;
            display: inline-block;
        }

        .navbar .container a:hover::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #008a0e;
            /* Warna garis bawah */
            transition: width 1s ease;
            width: 100%;
        }

        /* Hover line effect on sidebar items */
        .slide-up ul li a {
            position: relative;
            display: inline-block;
        }

        .slide-up ul li a:hover::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #008a0e;
            /* Warna garis bawah */
            transition: width 0.3s ease;
            width: 100%;
        }

        .relative ul {
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform-origin: top;
            transform: scaleY(0);
            opacity: 0;
            display: block;
            /* Tetap menampilkan ul, tetapi kontrol visibilitas melalui opacity dan scale */
        }

        .relative ul.opacity-100 {
            transform: scaleY(1);
            opacity: 1;
        }

        #form-dropdown {
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform-origin: top;
            transform: scaleY(0);
            opacity: 0;
        }

        #form-dropdown.opacity-100 {
            transform: scaleY(1);
            opacity: 1;
        }

        i.fa-angle-down {
            transition: transform 0.3s ease;
            /* Animasi rotasi ikon */
        }

        i.fa-angle-down.rotate-180 {
            transform: rotate(180deg);
            /* Putar ikon ke atas */
        }
    </style>
</head>

<body class="bg-gray-50">
    <nav class="bg-white shadow shadow-gray-300 w-full px-8">
        <div class="container mx-auto flex items-center justify-between flex-wrap" style="margin-top: -10px;">
            <!-- Logo -->
            <div class="flex items-center text-indigo-500" style="margin-bottom: -10px; margin-left: -50px;">
                <img src="../../../images/logo.PNG" class=" w-auto mt-5 mb-5" style="width: 200px"
                    alt="Logo"> <!-- Perbesar logo -->
            </div>

            <!-- Mobile menu button (Only visible on mobile) -->
            <div class="block md:hidden">
                <button id="menu-toggle" class="focus:outline-none">
                    <svg id="menu-icon" class="h-8 w-9 pt" style="margin-top: 20px;"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <div class="hidden md:flex md:items-center md:w-auto md:max-h-full"
                style="margin-bottom: -10px; margin-right: -90px;">
                <ul class="text-gray-500 font-semibold md:space-x-2 md:flex md:flex-row" style="font-size: 16px;">
                    <li><a href="{{ route('dashboard') }}" class="s1 px-4 py-2 hover:text-indigo-500">Beranda</a>
                    </li>
                    <li><a href="#" class="s5 px-2 py-1 hover:text-indigo-400">Logbook</a></li>

                    <li><a href="{{ route('branch-info') }}" class="s3 px-2 py-1 hover:text-indigo-400">Branch Information</a></li>
                    <li><a href="{{ route('help') }}" class="s4 px-2 py-1 hover:text-indigo-400">Help</a></li>
                    <li><a href="{{ route('aktifitas.preview') }}" class="s5 px-2 py-1 hover:text-indigo-400">Report</a></li>
                    <li class="relative">
                        <a href="#" id="form-menu" class="s5 px-2 py-1 hover:text-indigo-400">Network <i
                                class="fa-solid fa-angle-down" style="margin-left: 3px;"></i></a>
                        <!-- Dropdown Items -->
                        <ul id="form-dropdown-network" style="margin-top: 20px;"
                            class="absolute left-0 hidden bg-white text-gray-500 font-semibold space-y-2 w-48 shadow-md mt-2 rounded-lg z-10">
                            <li><a href="{{ route('problem.index') }}" class="block px-4 py-2 hover:text-indigo-400">Problem</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Bandwith</a></li>
                        </ul>
                    </li>
                    <li class="relative">
                        <a href="#" id="form-services" class="s5 px-2 py-1 hover:text-indigo-400">Services <i
                                class="fa-solid fa-angle-down" style="margin-left: 3px;"></i></a>
                        <!-- Dropdown Items -->
                        <ul id="form-dropdown-services" style=" margin-top: 20px;"
                            class="absolute left-0 hidden bg-white text-gray-500 font-semibold space-y-2 w-48 shadow-md mt-2 rounded-lg z-10">
                            <li><a href="{{ route('barang.index') }}" class="block px-4 py-2 hover:text-indigo-400">Barang</a></li>
                            <li><a href="{{ route('item.index') }}"
                                    class="block px-4 py-2 hover:text-indigo-400">Item</a></li>
                            <li><a href="{{ route('history.index') }}"
                                    class="block px-4 py-2 hover:text-indigo-400">History</a></li>
                            <li><a href="{{ route('komputer') }}    " class="block px-4 py-2 hover:text-indigo-400">Komputer</a></li>
                            @if (auth()->user()->id_level === 3)
                            <a href="{{ route('history.approve') }}"
                                class="menu-link block px-4 py-2 hover:bg-gray-200">History - Approved</a>
                        @endif
                        </ul>
                    </li>
                    <li class="relative">
                        <a href="#" id="form-general" class="s5 px-2 py-1 hover:text-indigo-400">General <i
                                class="fa-solid fa-angle-down" style="margin-left: 3px;"></i></a>
                        <!-- Dropdown Items -->
                        <ul id="form-dropdown-general"style=" margin-top: 20px;"
                            class="absolute left-0 hidden bg-white text-gray-500 font-semibold space-y-2 w-48 shadow-md mt-2 rounded-lg z-10">
                            <li><a href="{{ route('periode.index') }}"
                                    class="block px-4 py-2 hover:text-indigo-400">Period</a></li>
                            <li><a href="{{ route('home-activity') }}" class="block px-4 py-2 hover:text-indigo-400">Activity</a></li>
                            <li><a href="{{ route('branch') }}" class="block px-4 py-2 hover:text-indigo-400">Branch</a></li>
                            <li><a href="{{ route('group.index') }}" class="block px-4 py-2 hover:text-indigo-400">Group</a></li>
                            <li><a href="{{ route('deskripsi.index') }}"
                                    class="block px-4 py-2 hover:text-indigo-400">Deskripsi</a></li>
                            <li><a href="{{ route('modul.index') }}" class="block px-4 py-2 hover:text-indigo-400">Modul</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown Menu for 'Form' -->
                    <li class="relative">
                        <a href="#" id="form-form" class="s5 px-2 py-1 hover:text-indigo-400">Form <i
                                class="fa-solid fa-angle-down" style="margin-left: 3px;"></i></a>
                        <!-- Dropdown Items -->
                        <ul id="form-dropdown-form"style=" margin-top: 20px;"
                            class="absolute left-0 hidden bg-white text-gray-500 font-semibold space-y-2 w-48 shadow-md mt-2 rounded-lg z-10">
                            <li><a href="{{ route('table') }}" class="block px-4 py-2 hover:text-indigo-400">Install Komputer &
                                    Laptop</a>
                            </li>
                            <li><a href="{{ route('form-pembuatan.index') }}" class="block px-4 py-2 hover:text-indigo-400">Pembuatan User & Reset
                                    Password</a></li>
                            <li><a href="{{ route('form.index') }}"class="block px-4 py-2 hover:text-indigo-400">Perbaikan
                                    Perangkat</a></li>
                        </ul>
                    </li>
                </ul>
            </div>


            <!-- Profile button -->
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex relative">
                    <!-- Tombol Profile -->
                    <button id="profile-btn"
                        class="flex items-center gap-2 p-3 text-gray-800 rounded-xl focus:outline-none">
                        <i class="fas fa-user-circle text-3xl"></i>
                        <span>{{ auth()->user()->nama }}</span>
                    </button>
                
                    <!-- Dropdown Menu -->
                    <div id="dropdown-menu"
                        class="absolute left-0 mt-14 w-48 bg-white border border-gray-300 rounded-lg shadow-lg opacity-0 transform scale-y-0 origin-top transition-all duration-500 z-50">
                        
                        <!-- Pucuk (Arrow) dengan Icon -->
                        <i class="bi bi-caret-up-fill absolute -top-4 text-gray-300 text-xl" style="margin-left: 17px; margin-top: px;"></i>
                
                        <a href="{{ route('reset.password.form') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Change Password</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Log
                            Out</a>
                    </div>
                </div>
                
    
                <!-- For Mobile -->
                <div class="block md:hidden">
                    <button class="focus:outline-none">
                        <i class="fas fa-user-circle text-2xl text-gray-800"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Sidebar Menu -->
        <div id="menu" class="slide-up w-full md:hidden">
            
            <ul class="text-gray-500 font-semibold space-y-2">
                <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Logbook</a></li>
                <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Outstanding</a></li>
                <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Branch Information</a></li>
                <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Help</a></li>
                <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Report</a></li>
                <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Network</a></li>
                <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Service</a></li>
                <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">General</a></li>
                <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Form</a></li>
                <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Profile</a></li>
            </ul>
        </div>
    </nav>
    @yield('content')
    <script>
        // Menu toggle untuk mobile menu
        document.getElementById("menu-toggle").onclick = function() {
            let menu = document.getElementById("menu");
            let icon = document.getElementById("menu-icon");

            if (menu.classList.contains("slide-up")) {
                menu.classList.remove("slide-up");
                menu.classList.add("slide-down");
                icon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
            } else {
                menu.classList.remove("slide-down");
                menu.classList.add("slide-up");
                icon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
            }
        };

        // Dropdown untuk menu "Network"
        const formMenuNetwork = document.getElementById("form-menu");
        const dropdownNetwork = document.getElementById("form-dropdown-network");
        const iconNetwork = formMenuNetwork.querySelector("i");

        // Dropdown untuk menu "Services"
        const formMenuServices = document.getElementById("form-services");
        const dropdownServices = document.getElementById("form-dropdown-services");
        const iconServices = formMenuServices.querySelector("i");

        // Dropdown untuk menu "General"
        const formMenuGeneral = document.getElementById("form-general");
        const dropdownGeneral = document.getElementById("form-dropdown-general");
        const iconGeneral = formMenuGeneral.querySelector("i");

        // Dropdown untuk menu "Form"
        const formMenuForm = document.getElementById("form-form");
        const dropdownForm = document.getElementById("form-dropdown-form");
        const iconForm = formMenuForm.querySelector("i");

        // Menambahkan event listener untuk setiap menu dropdown
        formMenuNetwork.addEventListener("click", (event) => {
            event.preventDefault(); // Mencegah pengalihan link
            if (dropdownNetwork.classList.contains("hidden")) {
                dropdownNetwork.classList.remove("hidden");
                dropdownNetwork.classList.add("opacity-100", "scale-y-100");
                iconNetwork.classList.add("rotate-180");
            } else {
                dropdownNetwork.classList.add("hidden");
                dropdownNetwork.classList.remove("opacity-100", "scale-y-100");
                iconNetwork.classList.remove("rotate-180");
            }
        });

        formMenuServices.addEventListener("click", (event) => {
            event.preventDefault(); // Mencegah pengalihan link
            if (dropdownServices.classList.contains("hidden")) {
                dropdownServices.classList.remove("hidden");
                dropdownServices.classList.add("opacity-100", "scale-y-100");
                iconServices.classList.add("rotate-180");
            } else {
                dropdownServices.classList.add("hidden");
                dropdownServices.classList.remove("opacity-100", "scale-y-100");
                iconServices.classList.remove("rotate-180");
            }
        });

        formMenuGeneral.addEventListener("click", (event) => {
            event.preventDefault(); // Mencegah pengalihan link
            if (dropdownGeneral.classList.contains("hidden")) {
                dropdownGeneral.classList.remove("hidden");
                dropdownGeneral.classList.add("opacity-100", "scale-y-100");
                iconGeneral.classList.add("rotate-180");
            } else {
                dropdownGeneral.classList.add("hidden");
                dropdownGeneral.classList.remove("opacity-100", "scale-y-100");
                iconGeneral.classList.remove("rotate-180");
            }
        });

        formMenuForm.addEventListener("click", (event) => {
            event.preventDefault(); // Mencegah pengalihan link
            if (dropdownForm.classList.contains("hidden")) {
                dropdownForm.classList.remove("hidden");
                dropdownForm.classList.add("opacity-100", "scale-y-100");
                iconForm.classList.add("rotate-180");
            } else {
                dropdownForm.classList.add("hidden");
                dropdownForm.classList.remove("opacity-100", "scale-y-100");
                iconForm.classList.remove("rotate-180");
            }
        });


        // Desktop Profile Button
        const profileBtn = document.getElementById("profile-btn");
        const dropdownMenu = document.getElementById("dropdown-menu");

        profileBtn.addEventListener("click", () => {
            if (dropdownMenu.classList.contains("opacity-0")) {
                dropdownMenu.classList.remove("opacity-0", "scale-y-0");
                dropdownMenu.classList.add("opacity-100", "scale-y-100");
            } else {
                dropdownMenu.classList.remove("opacity-100", "scale-y-100");
                dropdownMenu.classList.add("opacity-0", "scale-y-0");
            }
        });

        // Mobile Profile Button
        const mobileProfileBtn = document.getElementById("mobile-profile-btn");
        const mobileDropdownMenu = document.getElementById("mobile-dropdown-menu");

        mobileProfileBtn.addEventListener("click", () => {
            if (mobileDropdownMenu.classList.contains("opacity-0")) {
                mobileDropdownMenu.classList.remove("opacity-0", "scale-y-0");
                mobileDropdownMenu.classList.add("opacity-100", "scale-y-100");
            } else {
                mobileDropdownMenu.classList.remove("opacity-100", "scale-y-100");
                mobileDropdownMenu.classList.add("opacity-0", "scale-y-0");
            }
        });

        // SWEET ALERT
    </script>
</body>
</html>