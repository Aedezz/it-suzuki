@include('layout.menu-navbar')

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto mt-6">
        <h1 class="text-2xl font-bold mb-5">Help</h1>
        <a href="{{ route('help.create') }}" class="btn-add-data bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 float-right mb-4">
            Tambah Data
        </a>

        {{-- Kategori Section --}}
        <ul class="flex border-b">
            <li class="mr-1">
                <a href="{{ route('help') }}" class="sdms inline-block py-2 px-4  font-semibold">
                    SDMS
                </a>
            </li>
            <li class="mr-1">
                <a href="{{ route('eoffice') }}" class="eoffice inline-block py-2 px-4 font-semibold">
                    E-OFFICE
                </a>
            </li>
            <li class="mr-1">
                <a href="{{ route('jaringan') }}" class="jaringan inline-block py-2 px-4 font-semibold">
                    JARINGAN
                </a>
            </li>
            <li class="mr-1">
                <a href="{{ route('cctv') }}" class="cctv inline-block py-2 px-4 font-semibold">
                    CCTV
                </a>
            </li>
            <li class="mr-1">
                <a href="{{ route('its') }}" class="its inline-block py-2 px-4 font-semibold">
                    ITS
                </a>
            </li>
            <li class="mr-1">
                <a href="{{ route('cs') }}" class="cs inline-block py-2 px-4 font-semibold">
                    CS - APPLY
                </a>
            </li>
            <li class="mr-1">
                <a href="{{ route('angket') }}" class="angket inline-block py-2 px-4 font-semibold">
                    ANGKET
                </a>
            </li>
            <li class="mr-1">
                <a href="{{ route('email') }}" class="email inline-block py-2 px-4 font-semibold">
                    EMAIL
                </a>
            </li>
        </ul>

        <!-- The bottom line that will move based on active link -->
        <div class="link-bottom-line absolute h-1 bg-blue-500" style="width: 0;"></div>

        @yield('body')
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