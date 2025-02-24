<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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

    .nav {
        position: relative;
        /* Menjadikan .nav sebagai posisi acuan */
    }

    .nav ul {
        position: absolute;
        left: 0;
        top: 100%;
        /* Mengatur dropdown muncul tepat di bawah menu */
        background: white;
        text-gray-500;
        font-semibold;
        width: 200px;
        /* Sesuaikan dengan kebutuhan */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        opacity: 0;
        transform: scaleY(0);
        transform-origin: top;
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .nav:hover ul,
    .nav ul.opacity-100 {
        opacity: 1;
        transform: scaleY(1);
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

<nav class="bg-white shadow shadow-gray-300 w-full px-8">
    <div class="container mx-auto flex items-center justify-between flex-wrap" style="margin-top: -10px;">
        <!-- Logo -->
        <div class="flex items-center text-indigo-500" style="margin-bottom: -10px; margin-left: -50px;">
            <img src="../images/logo.PNG" class=" w-auto mt-5 mb-5" style="width: 200px" alt="Logo">
            <!-- Perbesar logo -->
        </div>

        <!-- Mobile menu button (Only visible on mobile) -->
        <div class="block md:hidden">
            <button id="menu-toggle" class="focus:outline-none">
                <svg id="menu-icon" class="h-8 w-9 pt" style="margin-top: 20px;" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex md:items-center md:w-auto md:max-h-full"
            style="margin-bottom: -10px; margin-right: -90px;">
            <ul class="text-gray-500 font-semibold md:space-x-2 md:flex md:flex-row" style="font-size: 16px;">
                <li><a href="{{ route('dashboard2') }}" class="s1 px-4 py-2 hover:text-indigo-500">Beranda</a>
                </li>

                <li><a href="{{ route('branch-info') }}" class="s3 px-2 py-1 hover:text-indigo-400">Branch
                        Information</a></li>
                <li><a href="{{ route('help') }}" class="s4 px-2 py-1 hover:text-indigo-400">Help</a></li>
                <li><a href="{{ route('aktifitas.preview') }}" class="s5 px-2 py-1 hover:text-indigo-400">Report</a>
                </li>
                <li class="nav">
                    <a href="#" id="form-menu" class="s5 px-2 py-1 hover:text-indigo-400">Network <i
                            class="fa-solid fa-angle-down" style="margin-left: 3px;"></i></a>
                    <!-- Dropdown Items -->
                    <ul id="form-dropdown-network" style="margin-top: 20px;"
                        class="absolute left-0 hidden bg-white text-gray-500 font-semibold space-y-2 w-48 shadow-md mt-2 rounded-lg z-10">
                        <li><a href="{{ route('problem.index') }}"
                                class="block px-4 py-2 hover:text-indigo-400">Problem</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:text-indigo-400">Bandwith</a></li>
                    </ul>
                </li>
                <li class="nav relato">
                    <a href="#" id="form-services" class="s5 px-2 py-1 hover:text-indigo-400">Services <i
                            class="fa-solid fa-angle-down" style="margin-left: 3px;"></i></a>
                    <!-- Dropdown Items -->
                    <ul id="form-dropdown-services" style=" margin-top: 20px;"
                        class="absolute left-0 hidden bg-white text-gray-500 font-semibold space-y-2 w-48 shadow-md mt-2 rounded-lg z-10">
                        <li><a href="{{ route('barang.index') }}"
                                class="block px-4 py-2 hover:text-indigo-400">Barang</a></li>
                        <li><a href="{{ route('item.index') }}" class="block px-4 py-2 hover:text-indigo-400">Item</a>
                        </li>
                        <li><a href="{{ route('history.index') }}"
                                class="block px-4 py-2 hover:text-indigo-400">History</a></li>
                        <li><a href="{{ route('komputer') }}    "
                                class="block px-4 py-2 hover:text-indigo-400">Komputer</a></li>
                        @if (auth()->user()->id_level === 3)
                            <a href="{{ route('history.approve') }}"
                                class="menu-link block px-4 py-2 hover:bg-gray-200">History - Approved</a>
                        @endif
                    </ul>
                </li>
                <li class="nav">
                    <a href="#" id="form-general" class="s5 px-2 py-1 hover:text-indigo-400">General <i
                            class="fa-solid fa-angle-down" style="margin-left: 3px;"></i></a>
                    <!-- Dropdown Items -->
                    <ul id="form-dropdown-general"style=" margin-top: 20px;"
                    
                        class="absolute left-0 hidden bg-white text-gray-500 font-semibold space-y-2 w-48 shadow-md mt-2 rounded-lg z-10">
                        
                        <li><a href="{{ route('periode.index') }}"
                                class="block px-4 py-2 hover:text-indigo-400">Period</a></li>
                        <li><a href="{{ route('home-activity') }}"
                                class="block px-4 py-2 hover:text-indigo-400">Activity</a></li>
                        <li><a href="{{ route('branch') }}" class="block px-4 py-2 hover:text-indigo-400">Branch</a>
                        </li>
                        <li><a href="{{ route('group.index') }}"
                                class="block px-4 py-2 hover:text-indigo-400">Group</a></li>
                        <li><a href="{{ route('deskripsi.index') }}"
                                class="block px-4 py-2 hover:text-indigo-400">Deskripsi</a></li>
                        <li><a href="{{ route('modul.index') }}"
                                class="block px-4 py-2 hover:text-indigo-400">Modul</a></li>
                    </ul>
                </li>
                <!-- Dropdown Menu for 'Form' -->
                <li class="nav">
                    <a href="#" id="form-form" class="s5 px-2 py-1 hover:text-indigo-400">Form <i
                            class="fa-solid fa-angle-down" style="margin-left: 3px;"></i></a>
                    <!-- Dropdown Items -->
                    <ul id="form-dropdown-form"style=" margin-top: 20px;"
                        class="absolute left-0 hidden bg-white text-gray-500 font-semibold space-y-2 w-48 shadow-md mt-2 rounded-lg z-10">
                        <li><a href="{{ route('table') }}" class="block px-4 py-2 hover:text-indigo-400">Install
                                Komputer &
                                Laptop</a>
                        </li>
                        <li><a href="{{ route('form-pembuatan.index') }}"
                                class="block px-4 py-2 hover:text-indigo-400">Pembuatan User & Reset
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
                    <i class="bi bi-caret-up-fill absolute -top-3.5 text-gray-300 text-xl" style="margin-left: 18px"></i>
            
                    <a href="{{ route('reset.password.form') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Reset Password</a>
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