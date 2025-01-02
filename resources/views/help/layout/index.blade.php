@include('layout.menu-navbar')

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto mt-6 shadow-lg border p-6">
        <div class="container mx-auto mt-6">
            <!-- Title and Create Button -->
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold mb-5">Help</h1>
                <a href="{{ route('help.create') }}" 
                   class="btn-add-data bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-600 hover:text-gray-200 flex items-center space-x-2" 
                   title="Create">
                    <!-- Ikon Plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <!-- Teks Tambah Data -->
                    <span class="text-sm font-medium">Tambah Data</span>
                </a>
            </div>

            {{-- Kategori Section --}}
            <ul class="flex border-b">
                <li class="mr-4">
                    <a href="{{ route('help') }}" class="sdms inline-block py-2 px-4 font-semibold flex items-center">
                        <i class="fas fa-folder h-6 w-6 mr-3"></i>
                        SDMS
                    </a>
                </li>
                <li class="mr-4">
                    <a href="{{ route('eoffice') }}" class="eoffice inline-block py-2 px-4 font-semibold flex items-center">
                        <i class="fas fa-tv h-6 w-6 mr-3 text-black"></i> <!-- Solid Monitor Icon with Black Screen -->
                        E-OFFICE
                    </a>
                </li>
                <li class="mr-4">
                    <a href="{{ route('jaringan') }}" class="jaringan inline-block py-2 px-4 font-semibold flex items-center">
                        <i class="fas fa-network-wired h-6 w-6 mr-3 text-black"></i> <!-- Make icon black -->
                        JARINGAN
                    </a>
                </li>
                <li class="mr-4">
                    <a href="{{ route('cctv') }}" class="cctv inline-block py-2 px-4 font-semibold flex items-center">
                        <i class="fas fa-video h-6 w-6 mr-3 text-black"></i> <!-- Make icon black -->
                        CCTV
                    </a>
                </li>
                <li class="mr-4">
                    <a href="{{ route('its') }}" class="its inline-block py-2 px-4 font-semibold flex items-center">
                        <i class="fas fa-laptop-code h-6 w-6 mr-3 text-black"></i> <!-- Make icon black and solid -->
                        ITS
                    </a>
                </li>
                <li class="mr-4">
                    <a href="{{ route('cs') }}" class="cs inline-block py-2 px-4 font-semibold flex items-center">
                        <i class="fas fa-comments h-6 w-6 mr-3 text-black"></i> <!-- Make icon black -->
                        CS - APPLY
                    </a>
                </li>
                <li class="mr-4">
                    <a href="{{ route('angket') }}" class="angket inline-block py-2 px-4 font-semibold flex items-center">
                        <i class="fas fa-pencil-alt h-6 w-6 mr-3 text-black"></i> <!-- Make icon black -->
                        ANGKET
                    </a>
                </li>
                <li class="mr-4">
                    <a href="{{ route('email') }}" class="email inline-block py-2 px-4 font-semibold flex items-center">
                        <i class="fas fa-envelope h-6 w-6 mr-3 text-black"></i> <!-- Make icon black -->
                        EMAIL
                    </a>
                </li>
            </ul>

            <!-- The bottom line that will move based on active link -->
            <div class="link-bottom-line absolute h-1 bg-blue-500" style="width: 0;"></div>

            <!-- Garis Hitam yang lebih halus -->
            <hr class="border-b-2 border-gray-800 my-4">

            @yield('body')
        </div>
    </div>
    
    <script>
        const links = document.querySelectorAll('.sdms, .eoffice, .jaringan, .cctv, .its, .cs, .angket, .email');
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

    @stack('script')
</body>
