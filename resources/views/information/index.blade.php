@extends('layout.information')

@section('title', 'Batch Information')

{{-- <style>
    /* Tentukan elemen tersembunyi dengan transisi smooth */
    .hidden {
        max-height: 0;
        /* Mulai dengan tinggi 0 */
        opacity: 0;
        /* Mulai dengan opacity 0 */
        overflow: hidden;
        /* Menyembunyikan konten yang melampaui batas */
        transform: translateY(-10px);
        /* Menggeser elemen ke atas sedikit */
        transition: max-height 0.5s ease, opacity 0.5s ease, transform 0.5s ease;
        /* Transisi smooth */
    }

    /* Kelas show untuk elemen yang ditampilkan */
    .hidden.show {
        max-height: 500px;
        /* Atur tinggi maksimal yang diperlukan */
        opacity: 1;
        /* Menampilkan elemen dengan opacity penuh */
        transform: translateY(0);
        /* Mengembalikan elemen ke posisi normal */
    }

    /* Warna default hover */
    .toggle {
        color: #333;
        /* Warna teks default */
    }

    /* Gaya menu yang sedang aktif */
    .toggle.active {
        color: #0056b3;
        /* Warna biru lebih gelap saat menu dipilih */
        font-weight: bold;
        /* Membuat teks lebih tebal saat dipilih */
    }

    /* Gaya hover */
    .toggle:hover {
        color: #007BFF;
        /* Warna biru saat hover */
        text-decoration: underline;
        /* Menambahkan garis bawah untuk efek lebih menonjol */
    }


    /* Warna default hover */
    .toggle.default-hover:hover {
        color: #333;
        /* Warna teks default */
        text-decoration: none;
        /* Menghapus garis bawah */
    }
</style> --}}

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="border border-white rounded-lg p-4" style="margin-top: -25px; background-color:rgb(255, 255, 255)">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Branch Information </h2>
            <hr>
            <!-- Accordion Item 1 -->
            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(1)" class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Head Office</span>
                    <span id="icon-1" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-1" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        SERVER
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        SDMS IP Local : 117.102.163.242, IP Public : 212.212.0.212
                    </div>
                </div>
            </div>

            <!-- Accordion Item 2 -->
            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(2)" class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Banjarmasin</span>
                    <span id="icon-2" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-2" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        IP PUBLIK : 117.102.163.242
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        ISP : MIT
                    </div>
                </div>
            </div>

            <!-- Accordion Item 3 -->
            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(3)" class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Banjarmasin II</span>
                    <span id="icon-3" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-3" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        IP PUBLIK : 117.102.161.170
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        ISP : MIT
                    </div>

                </div>
            </div>

            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(4)" class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Pelaihari</span>
                    <span id="icon-4" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-4" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        IP PUBLIK : 114.6.51.50
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        ISP : INDOSAT
                    </div>

                </div>
            </div>

            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(5)" class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Batulicin</span>
                    <span id="icon-5" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-5" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        IP PUBLIK : 114.5.12.242
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        ISP : INDOSAT
                    </div>

                </div>
            </div>

            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(6)" class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Banjarbaru</span>
                    <span id="icon-6" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-6" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        IP PUBLIK : 103.57.9.26
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        ISP : MIT
                    </div>

                </div>
            </div>

            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(7)" class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Barabai</span>
                    <span id="icon-7" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-7" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        IP PUBLIK : 2f2c02e49521.sn.mynetname.net
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        ISP : TELKOM SPEEDY
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        INDOSAT : 114.5.12.145
                    </div>
                </div>
            </div>

            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(8)" class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Tanjung</span>
                    <span id="icon-8" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-8" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        IP PUBLIK : 114.6.51.18
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        ISP : INDOSAT
                    </div>

                </div>
            </div>

            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(9)" class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Ampah</span>
                    <span id="icon-9" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-9" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        IP PUBLIK : muarateweh.freeddns.com
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        ISP : TELKOM INDIHOME
                    </div>

                </div>
            </div>

            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(10)" class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Kapuas</span>
                    <span id="icon-10" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-10" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        IP PUBLIK : 114.5.12.230
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        ISP : INDOSAT
                    </div>

                </div>
            </div>

            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(11)"
                    class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Palangkaraya</span>
                    <span id="icon-11" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-11" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        IP PUBLIK : 114.5.11.162
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        ISP : INDOSAT
                    </div>

                </div>
            </div>

            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(12)"
                    class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Sampit</span>
                    <span id="icon-12" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-12" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        IP PUBLIK : 114.5.11.178
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        ISP : INDOSAT
                    </div>

                </div>
            </div>

            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(13)"
                    class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Pangkalan Bun</span>
                    <span id="icon-13" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-13" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                        IP PUBLIK : 114.6.51.130
                    </div>
                    <div class="pb-5 text-sm text-slate-500">
                        ISP : INDOSAT
                    </div>

                </div>
            </div>

            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(14)"
                    class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>Part Depo</span>
                    <span id="icon-14" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-14" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    <div class="pb-5 text-sm text-slate-500">
                    </div>
                    <div class="pb-5 text-sm text-slate-500">

                    </div>

                </div>
            </div>


            <script>
                function toggleAccordion(index) {
                    const content = document.getElementById(`content-${index}`);
                    const icon = document.getElementById(`icon-${index}`);

                    // SVG for Down icon
                    const downSVG = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
          <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
        </svg>
      `;

                    // SVG for Up icon
                    const upSVG = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
          <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
        </svg>
      `;

                    // Toggle the content's max-height for smooth opening and closing
                    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
                        content.style.maxHeight = '0';
                        icon.innerHTML = upSVG;
                    } else {
                        content.style.maxHeight = content.scrollHeight + 'px';
                        icon.innerHTML = downSVG;
                    }
                }
            </script>
        </div>

        <script>
            document.querySelectorAll('.toggle').forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelectorAll('.toggle').forEach(otherItem => {
                        otherItem.classList.remove('active'); // Menghapus kelas aktif dari menu lain
                    });
                    item.classList.add('active'); // Menambahkan kelas aktif pada menu yang dipilih
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                const toggles = document.querySelectorAll('.toggle');
                toggles.forEach(toggle => {
                    toggle.addEventListener('click', function() {
                        const target = document.querySelector(`#${this.dataset.target}`);
                        if (target) {
                            target.classList.toggle('show'); // Menambahkan atau menghapus kelas 'show'
                            target.classList.toggle(
                            'hidden'); // Menambahkan atau menghapus kelas 'hidden'

                            // Atur kelas 'active' hanya saat menu terbuka
                            if (target.classList.contains('show')) {
                                this.classList.add('active');
                            } else {
                                this.classList.remove('active');
                            }
                        }
                    });
                });
            });
        </script>


    @endsection
