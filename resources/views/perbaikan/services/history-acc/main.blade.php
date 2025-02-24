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

    {{-- 
    <!-- Styles -->
    <style>
        .rectangle-container {
            width: 100%;
            padding: 16px;
        }

        #tableContainer {
            max-height: 70vh; /* Atur tinggi maksimal agar tidak terlalu panjang */
        }

        table.dataTable {
            width: 100% !important;
            table-layout: fixed; /* Fixed layout for more control over column width */
        }

        table.dataTable th,
        table.dataTable td {
            white-space: normal; /* Allows text to wrap */
            word-wrap: break-word; /* Breaks long words onto the next line */
            text-align: center; /* Centers text for better alignment */
            padding: 4px 8px; /* Reduced padding for tighter cells */
            font-size: 14px; /* Optional: Reduce font size for tighter appearance */
        }

        table.dataTable th:last-child,
        table.dataTable td:last-child {
            width: 130px; /* Adjust width of the "Aksi" column */
        }
        
        table.dataTable td div {
            display: inline-block;
            text-align: left;
            word-break: break-word;
        }
        table.dataTable td span.text-sm {
            font-size: 12px;
            color: #6b7280; /* Tailwind Gray-500 */
        }

        .add-button-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 16px; /* Space between button and table */
        }

        .dataTables_length, .dataTables_filter {
            padding: 8px;
            border-radius: 8px;
        }

        .dataTables_length select, .dataTables_filter input {
            border: 1px solid #e2e8f0;
            padding: 4px 8px;
            border-radius: 4px;
        }
    </style> --}}

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
                <img src="../../images/logo.PNG" class=" w-auto mt-5 mb-5" style="width: 200px" alt="Logo">
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

    {{-- Logo --}}
    <link rel="icon" href="../images/perbaikan/logo-tab.png">


    <!-- SweetAlert Status Message -->
    @if (session('status'))
        <script>
            Swal.fire({
                title: '{{ session('status')['judul'] }}',
                text: '{{ session('status')['pesan'] }}',
                icon: '{{ session('status')['icon'] }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- Container -->
    <div class="flex justify-center items-center mt-10">
        <div class="relative w-full lg:w-11/12 xl:w-10/12 bg-white rounded-lg shadow-md p-6">

            <!-- Title -->
            <div class="flex justify-between items-center">
                <h2 class="font-sans text-xl sm:text-2xl font-bold text-gray-800">
                    History - Approve
                </h2>
            </div>
            <hr style="margin-top: 15px"><hr>
            <!-- Data Table -->
            <div id="tableContainer" class="mt-6 w-full">
                <table id="example" class="display w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Nomor</th>
                            <th class="px-4 py-2">Tanggal</th>
                            <th class="px-4 py-2">NIK</th>
                            <th class="px-4 py-2">Pengguna</th>
                            <th class="px-4 py-2">Perangkat</th>
                            <th class="px-4 py-2">Item</th>
                            <th class="px-4 py-2">Tipe</th>
                            <th class="px-4 py-2">Keterangan</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->nomor }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->pegawai_nik }}</td>
                                <td>{{ $data->pegawai_nama }}</td>
                                <td>{{ $perangkat[$data->id_barang]->nama ?? 'Perangkat Tidak Ditemukan' }}</td>
                                <td>{{ $item[$data->id_item]->nama ?? 'Item Tidak Ditemukan' }}</td>
                                <td>{{ $data->sn }}</td>
                                <td>
                                    <div>
                                        {{ $data->keterangan }}
                                        <br>
                                        @if ($data->spv_status == 1)
                                            <span class="text-sm text-gray-500 block">Done!</span>
                                        @else
                                            <span class="text-sm text-gray-500 block">Approve by STAFF IT</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="flex justify-center space-x-1">
                                    <!-- Tombol Print (tetap di kanan) -->
                                    <form action="{{ route('history.print2', $data->id) }}" method="GET"
                                        target="_blank">
                                        <button
                                            class="bg-gray-500 text-white w-8 h-8 rounded-md hover:bg-gray-600 transition duration-300 ml-auto"
                                            title="Print">
                                            <i class="bi bi-printer"></i>
                                        </button>
                                    </form>

                                    @if ($data->spv_status == 0)
                                    <form action="{{ route('history.full-acc', $data->id) }}" method="POST" onsubmit="event.preventDefault(); confirmUpdateStatus(this.action);">
                                        @csrf
                                        <button type="submit" 
                                            class="bg-green-500 text-white w-8 h-8 rounded-md hover:bg-green-600 transition duration-300 ml-auto" 
                                            title="Approve">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                    </form>
                                    

                                    
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- jQuery & DataTables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                initComplete: function() {
                    // Styling untuk Search Box
                    $('div.dataTables_filter input')
                        .addClass(
                            'border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500'
                            )
                        .attr('placeholder', 'Cari...'); // Placeholder lebih informatif

                    // Styling untuk Select Box (Length Menu)
                    $('div.dataTables_length select')
                        .addClass(
                            'border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500 bg-white'
                            );
                }
            });
        });

         // Fungsi untuk konfirmasi Update Status
    function confirmUpdateStatus(url) {
        Swal.fire({
            title: "Apa Anda Yakin?",
            text: "Ini Akan Menandai Status Approve.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3bb143", // Warna tombol konfirmasi (hijau)
            cancelButtonColor: "#d33", // Warna tombol batal (merah)
            confirmButtonText: "Perbarui Data!", // Teks tombol konfirmasi
            cancelButtonText: "Batal Perbarui", // Teks tombol batal
            reverseButtons: true // Menukar posisi tombol konfirmasi dan batal
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Diperbarui!",
                    text: "Status berhasil diperbarui.",
                    icon: "success"
                }).then(() => {
                    // Membuat form untuk submit POST ke URL
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = url;

                    // Menambahkan CSRF Token
                    const csrfField = document.createElement('input');
                    csrfField.type = 'hidden';
                    csrfField.name = '_token';
                    csrfField.value =
                        '{{ csrf_token() }}'; // Pastikan ini dapat dieksekusi dalam Blade template
                    form.appendChild(csrfField);

                    // Submit form untuk update status
                    document.body.appendChild(form);
                    form.submit();
                });
            }
        });
    }


      
        
    </script>

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