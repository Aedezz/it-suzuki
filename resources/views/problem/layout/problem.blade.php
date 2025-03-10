<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('style')
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <div class="flex flex-col min-h-screen">
        <!-- Navbar -->
        @include('layout.menu-navbar')

        <div class="bg-white shadow-md rounded-lg p-6 mx-4 my-6">
            
            <div class="container mx-auto px-4">
                <!-- Title Section -->
                <h1 class="text-2xl font-bold text-gray-800 mb-6 ml-6"> <!-- Menambahkan ml-6 untuk bergeser ke kanan -->
                    @yield('title', 'Problem')
                </h1>

                <ul
                class=" flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400 space-x-4 border-b-2 border-gray-300">
                <li>
                    <a href="{{ route('problem.index') }}"
                        class="laporan-link inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-transparent dark:hover:text-gray-300 group">
                        <svg class="w-4 h-4 mr-2 text-gray-400 dark:text-blue-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>Table
                    </a>
                </li>
                <li>
                    <a href="{{ route('problem.chart') }}"
                        class="laporan-link inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-transparent dark:hover:text-gray-300 group">
                        <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z" />
                        </svg>Chart
                    </a>
                </li>
            </ul>
                
                <!-- Content -->
                    @yield('content')
            </div>
        </div>        
     </div> 
     


    <!-- Include Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')

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
    
</body>
</html>
