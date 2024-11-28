<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Batch Information')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    @include('layout.menu-navbar')

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        @yield('content')
    </main>

</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggles = document.querySelectorAll('.toggle');
        toggles.forEach(toggle => {
            toggle.addEventListener('click', function () {
                const target = document.querySelector(`#${this.dataset.target}`);
                if (target) {
                    target.classList.toggle('hidden');
                }
            });
        });
    });
</script>