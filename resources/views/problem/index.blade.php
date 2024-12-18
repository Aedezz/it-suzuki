@extends('layout.problem')

@section('content')
<div class="bg-white shadow-lg rounded-lg p-8">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-semibold text-blue-700">Network Problems</h1>
        <div class="flex space-x-4">
            <a href="{{ route('problem.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">Add New Problem</a>
            <button onclick="showSection('listSection')" class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-200">List</button>
            <button onclick="showSection('chartSection')" class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-200">Chart</button>
        </div>
    </div>

    <!-- List Section -->
    <div id="listSection">
        <!-- Search and Entries Per Page -->
        <div class="flex justify-between mb-6">
            <form method="GET" action="{{ route('problem.index') }}" class="flex space-x-4">
                <input type="text" name="search" placeholder="Search..." value="{{ old('search', $search) }}" class="px-4 py-2 border rounded-lg w-1/2 focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Search</button>
            </form>
            <form method="GET" action="{{ route('problem.index') }}" class="flex space-x-4">
                <select name="perPage" onchange="this.form.submit()" class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                </select>
            </form>
        </div>

        <!-- Problem Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto text-left bg-white shadow-md rounded-lg">
                <thead class="bg-blue-100 text-blue-700">
                    <tr>
                        <th class="px-4 py-3 border-b text-sm font-semibold">No</th>
                        <th class="px-4 py-3 border-b text-sm font-semibold">Category</th>
                        <th class="px-4 py-3 border-b text-sm font-semibold">Down</th>
                        <th class="px-4 py-3 border-b text-sm font-semibold">Up</th>
                        <th class="px-4 py-3 border-b text-sm font-semibold">PIC</th>
                        <th class="px-4 py-3 border-b text-sm font-semibold">Information</th>
                        <th class="px-4 py-3 border-b text-sm font-semibold">Cabang</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($problems as $index => $problem)
                    <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-4 py-3 border-b">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 border-b">{{ $problem->kategori }}</td>
                        <td class="px-4 py-3 border-b">{{ \Carbon\Carbon::parse($problem->down)->format('d M Y H:i') }}</td>
                        <td class="px-4 py-3 border-b">{{ \Carbon\Carbon::parse($problem->up)->format('d M Y H:i') }}</td>
                        <td class="px-4 py-3 border-b">{{ $problem->pic }}</td>
                        <td class="px-4 py-3 border-b">{{ $problem->informasi }}</td>
                        <td class="px-4 py-3 border-b">{{ $problem->nama }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center border-b">No data available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $problems->appends(['search' => $search, 'perPage' => $perPage])->links() }}
        </div>
    </div>

    <!-- Chart Section -->
    <div id="chartSection" class="hidden">
        <h2 class="text-2xl font-semibold mb-6">Problem Trends</h2>
        <canvas id="problemChart"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function showSection(sectionId) {
        const sections = ['listSection', 'chartSection'];
        sections.forEach(section => document.getElementById(section).classList.add('hidden'));
        document.getElementById(sectionId).classList.remove('hidden');
    }
    document.addEventListener('DOMContentLoaded', () => showSection('listSection'));

    const ctx = document.getElementById('problemChart').getContext('2d');
new Chart(ctx, {
    type: 'line', // Ubah tipe chart menjadi 'line'
    data: {
        labels: @json($monthLabels),
        datasets: [
            {
                label: 'External',
                data: @json($externalCounts),
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Bisa dihapus karena tidak relevan untuk line
                borderColor: 'rgba(54, 162, 235, 1)', // Warna garis
                borderWidth: 2, // Lebar garis
                fill: false, // Jangan isi area di bawah garis
                tension: 0.3, // Ketegangan garis untuk smoothing
            },
            {
                label: 'Internal',
                data: @json($internalCounts),
                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Bisa dihapus karena tidak relevan untuk line
                borderColor: 'rgba(255, 99, 132, 1)', // Warna garis
                borderWidth: 2, // Lebar garis
                fill: false, // Jangan isi area di bawah garis
                tension: 0.3, // Ketegangan garis untuk smoothing
            }
        ],
    },
    options: {
        scales: {
            y: { beginAtZero: true },
        },
    },
});
</script>
@endsection
