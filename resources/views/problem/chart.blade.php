@extends('problem.layout.problem')

@section('title', 'Problem - Chart')

@section('content')
<div class="container mx-auto p-8">
    <div class="bg-white shadow-lg rounded-lg p-8">
        <div>
            <h1 class="text-3xl font-semibold text-black-700 mb-4">Network Problem - Chart</h1>
        </div>

        <!-- Chart Section -->
        <div>
            <canvas id="problemChart"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('problemChart').getContext('2d');
    new Chart(ctx, {
        type: 'line', // Jenis chart
        data: {
            labels: @json($monthLabels), // Labels bulan dan tahun
            datasets: [
                {
                    label: 'External',
                    data: @json($externalCounts), // Data jumlah untuk kategori External
                    borderColor: 'rgba(54, 162, 235, 1)', // Warna garis untuk External
                    borderWidth: 2,
                    fill: false, // Tidak mengisi area di bawah garis
                    tension: 0.3, // Kelengkungan garis
                },
                {
                    label: 'Internal',
                    data: @json($internalCounts), // Data jumlah untuk kategori Internal
                    borderColor: 'rgba(255, 99, 132, 1)', // Warna garis untuk Internal
                    borderWidth: 2,
                    fill: false, // Tidak mengisi area di bawah garis
                    tension: 0.3, // Kelengkungan garis
                }
            ],
        },
        options: {
            responsive: true, // Agar chart responsif di berbagai perangkat
            scales: {
                y: {
                    beginAtZero: true, // Mulai sumbu Y dari 0
                    ticks: {
                        stepSize: 1, // Menentukan ukuran langkah pada sumbu Y
                    },
                },
            },
        },
    });
</script>
@endsection
