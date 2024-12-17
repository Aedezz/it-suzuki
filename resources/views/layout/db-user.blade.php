<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pembuatan User')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <!-- Navbar -->
    @include('layout.navbar')

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-white rounded-lg shadow-lg">
        @yield('content')
    </div>

</body>
</html>
