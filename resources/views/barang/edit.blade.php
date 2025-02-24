@extends('layout.barang')
<nav class="bg-white shadow shadow-gray-300 w-full px-8">
    <div class="container mx-auto flex items-center justify-between flex-wrap" style="margin-top: -10px;">
        <!-- Logo -->
        <div class="flex items-center text-indigo-500" style="margin-bottom: -10px; margin-left: -50px;">
            <img src="../../images/logo.PNG" class=" w-auto mt-5 mb-5" style="width: 200px"
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

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-extrabold text-center mb-6 text-gray-800">Edit Barang</h1>

    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.update', $barang->id) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md max-w-lg mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Barang</label>
            <input type="text" id="nama" name="nama" value="{{ $barang->nama }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="flex space-x-4 justify-start mt-6">
            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-md shadow hover:bg-yellow-600 transition duration-300 w-full sm:w-auto text-center">Update</button>
            <a href="{{ route('barang.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-md shadow hover:bg-gray-600 transition duration-300 w-full sm:w-auto text-center ml-auto">Kembali</a>
        </div>
    </form>
</div>
@endsection
