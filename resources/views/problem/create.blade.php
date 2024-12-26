
@extends('problem.layout.problem')

@section('content')
<div class="bg-white shadow-lg rounded-xl p-10 max-w-4xl mx-auto my-8">
    <!-- Title Section -->
    <h2 class="text-3xl font-semibold text-blue-700 mb-6 text-center">Add New Network Problem</h2>

    <!-- Create Form -->
    <form action="{{ route('problem.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Category -->
        <div>
            <label for="kategori" class="block text-lg font-medium text-gray-700 mb-2">Category</label>
            <select id="kategori" name="kategori" class="w-full px-6 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500" required>
                <option value="External" {{ old('kategori') == 'External' ? 'selected' : '' }}>External</option>
                <option value="Internal" {{ old('kategori') == 'Internal' ? 'selected' : '' }}>Internal</option>
            </select>
            @error('kategori')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Start Date & Time -->
        <div>
            <label for="down" class="block text-lg font-medium text-gray-700 mb-2">Down Date & Time</label>
            <input type="datetime-local" id="down" name="down" value="{{ old('down') }}" class="w-full px-6 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500" required>
            @error('down')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- End Date & Time -->
        <div>
            <label for="up" class="block text-lg font-medium text-gray-700 mb-2">Up Date & Time</label>
            <input type="datetime-local" id="up" name="up" value="{{ old('up') }}" class="w-full px-6 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500" required>
            @error('up')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- PIC -->
        <div>
            <label for="pic" class="block text-lg font-medium text-gray-700 mb-2">PIC</label>
            <input type="text" id="pic" name="pic" value="{{ old('pic') }}" class="w-full px-6 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500" required>
            @error('pic')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Information -->
        <div>
            <label for="informasi" class="block text-lg font-medium text-gray-700 mb-2">Information</label>
            <textarea id="informasi" name="informasi" rows="5" class="w-full px-6 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500" required>{{ old('informasi') }}</textarea>
            @error('informasi')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Branch -->
        <div>
            <label for="id_cabang" class="block text-lg font-medium text-gray-700 mb-2">Branch</label>
            <select id="id_cabang" name="id_cabang" class="w-full px-6 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500" required>
                @foreach($cabang as $branch)
                    <option value="{{ $branch->kode }}" {{ old('id_cabang') == $branch->kode ? 'selected' : '' }}>{{ $branch->nama }}</option>
                @endforeach
            </select>
            @error('id_cabang')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Button Section -->
        <div class="flex justify-between items-center space-x-4">
            <!-- Back Button -->
            <a href="{{ route('problem.index') }}" class="w-1/2 px-6 py-3 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition duration-200 flex items-center justify-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                <span>Back</span>
            </a>

            <!-- Submit Button -->
            <button type="submit" class="w-1/2 px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 transition duration-200">
                Save Problem
            </button>
        </div>
    </form>
</div>
@endsection
