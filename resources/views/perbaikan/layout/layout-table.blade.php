@include('layout.menu-navbar')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

@stack('style')

<div class="flex justify-center items-center mt-10">
    <div
        class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
        <!-- Title in the top left corner -->
        <h2 class="font-sans text-xl sm:text-2xl font-bold absolute top-6 left-7" style="color: rgb(45, 45, 45)">
            Form Perbaikan Perangkat
        </h2>

        <ul
            class="mt-14 flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400 space-x-4 border-b-2 border-gray-300">
            <li>
                <a href="{{ route('form.index') }}"
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
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z" />
                    </svg>Laporan
                </a>
            </li>
            <li>
                <a href="{{ route('checklist.index') }}"
                    class="ceklist-link inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-transparent dark:hover:text-gray-300 group">
                    <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
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
