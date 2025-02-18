
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <!--Responsive Extension Datatables CSS-->
     <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
     <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
     <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
     <!--Replace with your tailwind.css once created-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

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

<body class="bg-gray-100">
    
    <main class="mt-10">
        @yield('content')
    </main>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                showConfirmButton: true
            });
        @endif
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

</body>
</html>
