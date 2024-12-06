<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logbook</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 16px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        .table th, .table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .btn {
            padding: 8px 16px;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn-blue {
            background-color: #3498db;
        }

        .btn-red {
            background-color: #e74c3c;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Confirmation for delete action
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function (e) {
                if (!confirm('Apakah Anda yakin ingin menghapus catatan ini?')) {
                    e.preventDefault();
                }
            });
        });

        // Popup management
        const popup = document.getElementById('popupForm');

        window.openPopup = function () {
            popup.classList.remove('hidden');
        };

        window.closePopup = function () {
            popup.classList.add('hidden');
        };
    });
</script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <!-- Navbar -->
    @include('layout.menu-navbar')

    <!-- Main Content -->
    <main class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

</body>
</html>
