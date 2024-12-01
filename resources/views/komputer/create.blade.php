@extends('komputer.layout.index')

@section('body-komputer')
<div class="flex flex-col space-y-4 mx-auto p-6">
    <form action="{{ route('komputer.store') }}" method="POST" class="w-full">
        @csrf
        <div class="flex flex-col space-y-4">
            <!-- Tanggal Field -->
            <div class="flex flex-col">
                <label for="tanggal" class="font-medium text-gray-700">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="mt-2 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Kode Pegawai Field -->
            <div class="flex flex-col">
                <label for="kode_pegawai_display" class="font-medium text-gray-700">Pengguna</label>
                <input type="text" id="kode_pegawai_display" class="mt-2 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off" placeholder="Cari Pengguna..." required>
                <input type="hidden" id="kode_pegawai" name="kode_pegawai"> <!-- Hidden field for storing the ID -->
                <div id="suggestions" class="mt-2 bg-white border border-gray-300 rounded-md max-h-40 overflow-y-auto hidden"></div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-start space-x-4 mt-6">
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('script')
<script>
    document.getElementById('kode_pegawai_display').addEventListener('input', function() {
        let query = this.value;

        if (query.length > 0) {
            // Show the suggestions div
            document.getElementById('suggestions').classList.remove('hidden');

            // Fetch data from the server using AJAX
            fetch(`/search-users?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    let suggestions = document.getElementById('suggestions');
                    suggestions.innerHTML = ''; // Clear previous suggestions

                    if (data.length > 0) {
                        data.forEach(user => {
                            let suggestionItem = document.createElement('div');
                            suggestionItem.classList.add('px-4', 'py-2', 'cursor-pointer', 'hover:bg-gray-200');
                            suggestionItem.textContent = user.nama;
                            suggestionItem.setAttribute('data-id', user.kode_pegawai);
                            suggestionItem.addEventListener('click', function() {
                                document.getElementById('kode_pegawai_display').value = user.nama; // Set visible field to the name
                                document.getElementById('kode_pegawai').value = user.kode_pegawai; // Set hidden field to the ID
                                suggestions.classList.add('hidden'); // Hide suggestions after selection
                            });
                            suggestions.appendChild(suggestionItem);
                        });
                    } else {
                        let noResult = document.createElement('div');
                        noResult.classList.add('px-4', 'py-2', 'text-gray-500');
                        noResult.textContent = 'No users found';
                        suggestions.appendChild(noResult);
                    }
                })
                .catch(error => console.error('Error fetching users:', error));
        } else {
            document.getElementById('suggestions').classList.add('hidden');
        }
    });

    document.addEventListener('click', function(event) {
        if (!event.target.closest('#kode_pegawai_display')) {
            document.getElementById('suggestions').classList.add('hidden');
        }
    });
</script>
@endpush