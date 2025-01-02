
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../images/perbaikan/logo-tab.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IT Suzuki</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    /* Animasi Slide Up untuk Mobile Menu */
    .slide-up {
        max-height: 0;
        /* Menutup menu dengan mengatur max-height ke 0 */
        opacity: 0;
        /* Menyembunyikan menu */
        transform: translateY(-20px);
        /* Efek pergeseran ke atas */
        transition: max-height 0.5s ease-in-out, opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        overflow: hidden;
        /* Mencegah konten menu keluar dari batas */
    }

    /* Animasi Slide Down untuk Mobile Menu */
    .slide-down {
        max-height: 500px;
        /* Tentukan tinggi maksimum menu saat terbuka */
        opacity: 1;
        /* Membuat menu terlihat */
        transform: translateY(0);
        /* Mengembalikan posisi ke normal saat membuka */
        transition: max-height 0.5s ease-in-out, opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        overflow: hidden;
        /* Pastikan konten tidak melampaui batas */
    }

    /* Menampilkan menu jika memiliki class 'show' */
    #menu {
        position: fixed;
        top: 75px;
        left: 0;
        right: 0;
        z-index: 9999;
        background-color: #ffffff;
        display: block;
        padding-top: -20px;
        max-height: 0;
        /* Saat ditutup, max-height diatur ke 0 */
        opacity: 0;
        /* Menu tersembunyi */
        transform: translateY(-20px);
        /* Efek meluncur ke atas saat ditutup */
        overflow: hidden;
        transition: max-height 0.5s ease-in-out, opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    /* Menampilkan menu jika memiliki class 'show' */
    #menu.show {
        display: block;
        max-height: 500px;
        /* Tentukan tinggi menu saat terbuka */
        opacity: 1;
        /* Menu terlihat */
        transform: translateY(0);
        /* Menu kembali ke posisi semula saat terbuka */
    }



    @media (min-width: 768px) {
        #menu {
            display: none;
        }

        .md\:block {
            display: block !important;
        }
    }

    @media (max-width: 767px) {
        .md\:block {
            display: none;
        }

        .login-mobile {
            display: block;
        }

        /* Navbar Sticky */
        nav {
            position: sticky;
            top: 0;
            /* Agar navbar tetap di atas saat scroll */
            z-index: 9999;
            /* Pastikan navbar berada di atas konten lainnya */
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Memberikan sedikit bayangan pada navbar */
            align-items: center;
            padding-top: 20px;
            padding-bottom: 20px;
            height: 75px;
            display: flex;
        }


        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .logo {
            margin-left: 25px;
            margin-right: 15px;
            width: auto;
        }

        #menu-toggle {
            display: flex;
            justify-content: center;
            align-items: center;
            background: none;
            border: none;
            padding: 10px;
        }

        #menu-toggle {
            margin-top: 10px;
        }
    }
</style>

<body>
    <!-- component -->
    <nav class="bg-white shadow shadow-gray-300 w-100 px-8 md:px-auto">
        <div class="md:h-20 h-28 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">
            <!-- Logo -->
            <div class="logo text-blue-500 md:order-1">
                <img src="{{ asset('images/logo.PNG') }}"
                    style="margin-left: -65px; width: 270px; height: auto; object-fit: contain;" alt="Logo">
            </div>

            <!-- Menu Links (Desktop) -->
            <div class="text-gray-500 order-3 w-full md:w-auto md:order-2 md:block hidden">
                <ul class="flex font-semibold justify-between" style="margin-right: 100px">
                    <li><a href="{{ route('dashboard') }}" class="md:px-4 md:py-2 hover:text-blue-500">Beranda</a></li>
                    <li><a href="{{ route('pc.create') }}" class="md:px-4 md:py-2 hover:text-blue-500">Install Komputer</a></li>
                    <li><a href="{{ route('pembuatan.create') }}" class="md:px-4 md:py-2 hover:text-blue-500">Pembuatan User</a></li>
                    <li><a href="{{ route('perbaikan') }}" class="md:px-4 md:py-2 hover:text-blue-500">Perbaikan Perangkat</a></li>
                    <li><a href="#" class="md:px-4 md:py-2 hover:text-blue-500">Download Berita Acara</a></li>
                </ul>
            </div>

            <!-- Login Button (Desktop) -->
            <div class="order-2 md:order-3 hidden md:block" style="margin-right: -55px">
                <button
                    class="flex items-center rounded-md border border-blue-300 py-2 px-4 text-center text-sm transition-all shadow-sm hover:shadow-lg text-blue-600 hover:text-white hover:bg-blue-800 hover:border-blue-800 focus:text-white focus:bg-blue-800 focus:border-blue-800 active:border-blue-800 active:text-white active:bg-blue-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button" onclick="window.location.href='{{ route('login') }}'"> LOGIN IT </button>
            </div>

            <!-- Mobile Menu Button -->
            <div class="block md:hidden">
                <button id="menu-toggle" class="focus:outline-none">
                    <svg id="menu-icon" class="h-8 w-8 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Sidebar -->
            <div id="menu" class="hidden w-full md:hidden bg-gray-50 shadow-md p-4">
                <ul class="space-y-4 text-gray-700 font-semibold">
                    <li><a href="{{ route('dashboard') }}" class="block hover:text-blue-500">Beranda</a></li>
                    <li><a href="{{ route('pc.create') }}" class="block hover:text-blue-500">Install Komputer</a></li>
                    <li><a href="{{ route('pembuatan.create') }}" class="block hover:text-blue-500">Pembuatan User</a></li>
                    <li><a href="{{ route('perbaikan') }}" class="block hover:text-blue-500">Perbaikan Perangkat</a></li>
                    <li><a href="#" class="block hover:text-blue-500">Download Berita Acara</a></li>
                </ul>
                <!-- LOGIN IT button in mobile menu -->
                <button class="w-28 mt-4 bg-blue-500 hover:bg-blue-600 text-white rounded-lg py-2 text-sm text-center" onclick="window.location.href='{{ route('login') }}'">
                    LOGIN IT
                </button>
            </div>
        </div>
    </nav>

    <script>
        document.getElementById("menu-toggle").onclick = function() {
            let menu = document.getElementById("menu");
            let icon = document.getElementById("menu-icon");

            // Toggle class untuk menampilkan atau menyembunyikan menu
            if (menu.classList.contains("show")) {
                menu.classList.remove("show");
                menu.classList.add("slide-up"); // Tambahkan kelas slide-up saat menutup
            } else {
                menu.classList.add("show");
                menu.classList.remove("slide-up"); // Hapus kelas slide-up jika menu dibuka
                menu.classList.add("slide-down"); // Tambahkan kelas slide-down saat membuka
            }

            // Mengubah ikon menu menjadi silang atau hamburger
            if (menu.classList.contains("show")) {
                icon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
            } else {
                icon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
            }
        };
    </script>

</body>
</html>
