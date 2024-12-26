@extends('problem.layout.problem')

@section('title', 'Problem - Tabel')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <input 
            type="text" 
            id="search" 
            placeholder="Search..." 
            value="{{ $search }}" 
            class="px-4 py-2 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            onkeyup="searchProblems()"
        >
    </div>
    <div class="flex items-center space-x-4">
        <a href="{{ route('problem.create') }}" 
   class="px-3 py-2 border-2 border-gray-600 rounded-lg text-gray-800 hover:border-gray-800 hover:text-gray-600 transition" 
   title="Create">
    <!-- Ikon Plus -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
    </svg>
</a>

        <form method="GET" action="{{ route('problem.index') }}">
            <select name="perPage" onchange="this.form.submit()" 
                    class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
            </select>
        </form>
    </div>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead class="bg-gray-50 text-left text-gray-600 font-medium border-b">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Down</th>
                <th class="px-4 py-2">Up</th>
                <th class="px-4 py-2">PIC</th>
                <th class="px-4 py-2">Information</th>
                <th class="px-4 py-2">Branch</th>
            </tr>
        </thead>
        <tbody id="table-body">
            @include('problem.table')
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $problems->appends(['search' => $search, 'perPage' => $perPage])->links() }}
</div>
@endsection

@section('scripts')
<script>
    function searchProblems() {
        let searchValue = document.getElementById('search').value;
        let perPage = document.querySelector('select[name="perPage"]').value;

        fetch(`{{ route('problem.index') }}?search=${searchValue}&perPage=${perPage}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            document.querySelector('#table-body').innerHTML = data.html;

            // Perbarui pagination untuk mempertahankan search dan perPage
            let paginationLinks = document.querySelectorAll('.pagination a');
            paginationLinks.forEach(link => {
                let url = new URL(link.href);
                url.searchParams.set('search', searchValue);
                url.searchParams.set('perPage', perPage);
                link.href = url.toString();
            });
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endsection
