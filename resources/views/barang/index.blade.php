@extends('layout.barang')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<style>
    .rectangle-container {
        width: 100%;
        padding: 16px;
    }
    
    /* No scrolling, just ensure it stays within the layout */
    #tableContainer {
        width: 100%;
    }
</style>

<nav class="bg-white shadow shadow-gray-300 w-full px-8">
    <div class="container mx-auto flex items-center justify-between flex-wrap" style="margin-top: -10px;">
        <!-- Logo -->
        <div class="flex items-center text-indigo-500" style="margin-bottom: -10px; margin-left: -50px;">
            <img src="../images/logo.PNG" class=" w-auto mt-5 mb-5" style="width: 200px"
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

        <!-- Desktop Navigation -->
        <div class="hidden md:flex md:items-center md:w-auto md:max-h-full"
            style="margin-bottom: -10px; margin-right: -90px;">
            <ul class="text-gray-500 font-semibold md:space-x-2 md:flex md:flex-row" style="font-size: 16px;">
                <li><a href="{{ route('dashboard2') }}" class="s1 px-4 py-2 hover:text-indigo-500">Beranda</a>
                </li>

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
                    <i class="bi bi-caret-up-fill absolute -top-3 text-gray-300 text-xl" style="margin-left: 17px; margin-top: -3px;"></i>
            
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

<div class="flex justify-center items-center mt-10">
    <div class="form-it-container relative w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6">
        <!-- Title with styled bottom border -->
        <div>
            <h2 class="font-sans text-xl sm:text-2xl font-bold" style="color: rgb(45, 45, 45)">
                Daftar Barang
            </h2>
            <div class="mt-3 border-b-2 border-gray-300"></div>
        </div>

        <!-- Create Button -->
        {{-- <a href="{{ route('create') }}"
            class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 flex items-center">
            <i class="fa-solid fa-plus mr-2"></i>
            Tambah
        </a> --}}

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md shadow-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="mt-8 w-full">
            <div id="tableContainer" class="transition-all duration-500 ease-in-out">
                <table id="example" class="display w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-center">No</th>
                            <th class="px-4 py-3 text-center">Nama Barang</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $index => $barang)
                            <tr>
                                <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                                <td class="px-4 py-2">{{ $barang->nama }}</td>
                                <td class="flex justify-center space-x-2">
                                    <!-- Tombol Edit dengan Ikon -->
                                    <a href="{{ route('barang.edit', $barang->id) }}" 
                                        class="relative w-8 h-8 rounded-lg bg-blue-500 text-white flex justify-center items-center hover:bg-blue-600" title="Perbarui">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // SweetAlert for status message
    @if (session('status'))
    Swal.fire({
        title: '{{ session('status')['judul'] }}',
        text: '{{ session('status')['pesan'] }}',
        icon: '{{ session('status')['icon'] }}',
        confirmButtonText: 'OK'
    });
    @endif

    $(document).ready(function() {
        $('#example').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            responsive: true,
            pageLength: 10, // Show 25 rows by default
            lengthMenu: [10, 25, 50, 100] // Allow user to select rows displayed
        });
    });
</script>