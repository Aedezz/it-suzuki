<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('images/logo-tab.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IT Suzuki</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
        .slide-down {
            transition: max-height 0.5s ease-in-out;
            max-height: 500px;
        }

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
    </style>
</head>

<body>
    <nav class="bg-white shadow shadow-gray-300 w-full px-8">
        <div class="container mx-auto flex items-center justify-between flex-wrap" style="margin-top: -8px;">
            <!-- Logo -->
            <div class="flex items-center text-indigo-500" style="margin-bottom: -10px">
                <img src="../images/perbaikan/images.JPG" class="h-14 w-auto mt-5 mb-5" alt="">
            </div>

            <!-- Mobile menu button (Only visible on mobile) -->
            <div class="block md:hidden">
                <button id="menu-toggle" class="focus:outline-none">
                    <svg id="menu-icon" class="h-8 w-9 pt" style="margin-top: 20px;" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>


            <!-- Desktop Navigation (hidden on mobile) -->
            <!-- Desktop Navigation (hidden on mobile) -->
            <div class="hidden md:flex md:items-center md:w-auto md:max-h-full"
                style="margin-bottom: -10px; margin-right: 90px;">
                <ul class="text-gray-500 font-semibold md:space-x-2 md:flex md:flex-row" style="font-size: 16px;">
                    <li><a href="#" class="s2 px-2 py-1 hover:text-indigo-400">Outstanding</a></li>
                    <li><a href="#" class="s3 px-2 py-1 hover:text-indigo-400">Branch Information</a></li>
                    <li><a href="#" class="s4 px-2 py-1 hover:text-indigo-400">Help</a></li>
                    <li><a href="#" class="s5 px-2 py-1 hover:text-indigo-400">Report</a></li>
                    <li><a href="#" class="s5 px-2 py-1 hover:text-indigo-400">Network</a></li>
                    <li><a href="#" class="s5 px-2 py-1 hover:text-indigo-400">Service</a></li>
                    <li><a href="#" class="s5 px-2 py-1 hover:text-indigo-400">General</a></li>

                    <!-- Dropdown Menu for 'Form' -->
                    <li class="relative">
                        <a href="#" class="s5 px-2 py-1 hover:text-indigo-400">Form</a>
                        <!-- Dropdown Items -->
                        <ul
                            class="absolute left-0 hidden bg-white text-gray-500 font-semibold space-y-2 w-48 shadow-md mt-2 rounded-lg z-10">
                            <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Install Komputer & Laptop</a>
                            </li>
                            <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Pembuatan User & Reset
                                    Password</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Perbaikan Perangkat</a></li>
                        </ul>
                    </li>
                </ul>
            </div>


            <!-- Mobile Sidebar Menu (hidden on desktop) -->
            <div id="menu" class="slide-up w-full md:hidden">
                <ul class="text-gray-500 font-semibold space-y-2">
  
                    <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Outstanding</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Branch Information</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Help</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Report</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Network</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Service</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">General</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Form</a></li>
                </ul>
                <a href="{{ route('logout') }}">
                    <div class="mt-4">
                        <button
                            class="w-full px-4 py-2 bg-red-500 hover:bg-indigo-600 text-white rounded-xl flex items-center justify-center gap-2"
                            style="margin-bottom: 20px">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>LOGOUT</span>
                        </button>
                    </div>
                </a>
            </div>
        </div>
    </nav>

    <script>
        document.getElementById("menu-toggle").onclick = function () {
            let menu = document.getElementById("menu");
            let icon = document.getElementById("menu-icon");

            if (menu.classList.contains("slide-up")) {
                menu.classList.remove("slide-up");
                menu.classList.add("slide-down");
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
            } else {
                menu.classList.remove("slide-down");
                menu.classList.add("slide-up");
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
            }
        };

        // Menangani dropdown pada menu "Form"
        const formMenu = document.querySelector('.relative');
        const dropdown = formMenu.querySelector('ul');

        // Tampilkan dropdown saat hover
        formMenu.addEventListener('mouseenter', () => {
            dropdown.classList.remove('hidden');
        });

        // Sembunyikan dropdown saat mouse meninggalkan area
        formMenu.addEventListener('mouseleave', () => {
            dropdown.classList.add('hidden');
        });
    </script>
</body>

</html>