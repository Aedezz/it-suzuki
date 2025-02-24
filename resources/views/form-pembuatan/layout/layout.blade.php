<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<body class="bg-gray-50">
<div class="flex justify-center items-center mt-10">
    <div
        class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
        <!-- Title in the top left corner -->
        <h2 class="font-sans text-xl sm:text-2xl font-bold absolute top-6 left-7" style="color: rgb(45, 45, 45)">
            Form Pembuatan User & Reset Password
        </h2>

        <!-- Links Section -->
        {{-- <div class="mt-16 flex justify-start items-center">
            <a href="{{ route('form-pembuatan.index') }}"
                class="data-link text-sm sm:text-base text-blue-500 relative group mx-2">Data</a>
            <a href="{{ route('perbaikan.laporan') }}"
                class="laporan-link text-sm sm:text-base text-blue-500 relative group mx-2">Laporan</a>
            <a href="{{ route('checklist.index') }}"
                class="ceklist-link text-sm sm:text-base text-blue-500 relative group mx-2">Ceklist</a>
        </div> --}}

        <ul
            class="mt-14 flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400 space-x-4 border-b-2 border-gray-300">
            <li>
                <a href="{{ route('form-pembuatan.index') }}"
                    class="laporan-link inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-transparent dark:hover:text-gray-300 group">
                    <svg class="w-4 h-4 mr-2 text-gray-400 dark:text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>Data
                </a>
            </li>
            <li>
                <a href="{{ route('perbaikan.laporan') }}"
                    class="laporan-link inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-transparent dark:hover:text-gray-300 group">
                    <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z" />
                    </svg>Laporan
                </a>
            </li>
            <li>
                <a href="{{ route('form-pembuatan.checklist') }}"
                    class="ceklist-link inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-transparent dark:hover:text-gray-300 group">
                    <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 18 20">
                        <path
                            d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                    </svg>Checklist
                </a>
            </li>
        </ul>

        <!-- The bottom line that will move based on active link -->
        <div class="link-bottom-line absolute h-1 bg-blue-500" style="width: 0;"></div>


        <!-- Form Content (Inside the form layout) -->
        <div>
            @yield('body') <!-- This is where your table content will be injected -->
        </div>
    </div>
</div>
</body>

<!--DataTables JS-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script>
    // Fungsi untuk konfirmasi Update Status
    function confirmUpdateStatus(url) {
        Swal.fire({
            title: "Apa Anda Yakin?",
            text: "Ini Akan Menandai Status Selesai.",
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




    // Fungsi untuk konfirmasi Delete
    // Konfigurasi SweetAlert dengan Bootstrap Buttons
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success", // Tombol konfirmasi menggunakan gaya Bootstrap sukses
            cancelButton: "btn btn-danger" // Tombol batal menggunakan gaya Bootstrap bahaya
        },
        buttonsStyling: false // Menonaktifkan styling default SweetAlert
    });

    // Fungsi konfirmasi penghapusan dengan SweetAlert
    function confirmDelete(url) {
        Swal.fire({
            title: 'Apa Anda Yakin?',
            text: "Data Tidak Dapat Dikembalikan Setelah Dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus Data!',
            cancelButtonText: 'Jangan Dihapus!',
            reverseButtons: true,
            customClass: {
                confirmButton: 'bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 ml-6', // Jarak antar tombol dengan `mr-4`
                cancelButton: 'bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-500'
            },
            buttonsStyling: false // Nonaktifkan gaya bawaan SweetAlert
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi penghapusan
                Swal.fire({
                    title: 'Dihapus!',
                    text: 'Data berhasil dihapus.',
                    icon: 'success',
                    customClass: {
                        confirmButton: 'bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500',
                    },
                    buttonsStyling: false
                }).then(() => {
                    // Membuat form untuk submit DELETE ke URL
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

                    // Menambahkan Method DELETE
                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';
                    form.appendChild(methodField);

                    // Submit form untuk delete data
                    document.body.appendChild(form);
                    form.submit();
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Jika pengguna membatalkan penghapusan
                Swal.fire({
                    title: 'Dibatalkan',
                    text: 'Data Anda tetap aman.',
                    icon: 'error',
                    customClass: {
                        confirmButton: 'bg-red-600 text-white font-bold py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500',
                    },
                    buttonsStyling: false
                });
            }
        });
    }
</script>

<script>
    const links = document.querySelectorAll('.data-link, .laporan-link, .ceklist-link');
    const bottomLine = document.querySelector('.link-bottom-line');

    function setActiveLink() {
        const currentUrl = window.location.href;
        links.forEach(link => {
            const linkUrl = link.getAttribute('href');
            if (currentUrl.includes(linkUrl)) {
                link.classList.add('active');
                const linkWidth = link.offsetWidth;
                const linkLeft = link.offsetLeft;
                bottomLine.style.width = `${linkWidth}px`;
                bottomLine.style.left = `${linkLeft}px`;
            } else {
                link.classList.remove('active');
            }
        });
    }

    links.forEach(link => {
        link.addEventListener('click', function() {
            links.forEach(link => link.classList.remove('active'));
            this.classList.add('active');
            const linkWidth = this.offsetWidth;
            const linkLeft = this.offsetLeft;
            bottomLine.style.transition = 'none';
            bottomLine.style.width = '0';
            void bottomLine.offsetWidth;
            bottomLine.style.transition = 'all 0.3s ease';
            bottomLine.style.width = `${linkWidth}px`;
            bottomLine.style.left = `${linkLeft}px`;
        });
    });

    window.addEventListener('load', setActiveLink);
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


{{-- Stack berguna buat javascript --}}
@stack('script')
