@extends('form-instalasi.layout.form')

@section('body')
<div class="flex flex-col space-y-4 mx-auto p-6">
    <div class="flex space-x-4 w-full">
        <!-- Tahun Label and Dropdown -->
        <div class="flex flex-col flex-grow basis-0">
            <label for="tahun" class="font-medium text-gray-700 w-32">Tahun</label> <!-- Adjusted width here -->
            <select id="tahun" name="tahun" class="mt-2 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Select Year</option>
                @foreach ($years as $year)
                    <option value="{{ $year->year }}">{{ $year->year }}</option>
                @endforeach
            </select>
        </div>
    
        <!-- IT Label and Dropdown -->
        <div class="flex flex-col flex-grow basis-0">
            <label for="it" class="font-medium text-gray-700 w-100">IT</label> <!-- Adjusted width here -->
            <select id="it" name="it" class="mt-2 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <!-- Empty data, no options here yet -->
                <option value="">Select IT</option>
            </select>
        </div>
    </div>
    

    <!-- Action Buttons -->
    <div class="flex justify-start space-x-4 mt-6">
        <button type="button" class="px-4 py-2 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" style="background-color: #6A1E55;">Print</button>
        <button type="button" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">Pending</button>
    </div>
</div>
@endsection
