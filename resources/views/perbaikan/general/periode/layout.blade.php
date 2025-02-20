@include('layout.menu-navbar')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

@stack('style')
<body class="bg-gray-50">
<div class="flex justify-center items-center mt-10">
    <div
        class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
        <!-- Title in the top left corner -->
        <h2 class="font-sans text-xl sm:text-2xl font-bold absolute top-6 left-7" style="color: rgb(45, 45, 45)">
            Periode
        </h2>

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


{{-- Stack berguna buat javascript --}}
@stack('script')
