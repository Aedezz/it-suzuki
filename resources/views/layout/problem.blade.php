<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('style')
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="flex flex-col min-h-screen">
        <!-- Navbar -->
        @include('layout.menu-navbar')

        <!-- Main Content -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div>
                    @yield('content')
                </div>
            </div>
    
    <!-- Include Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')
</body>
</html>