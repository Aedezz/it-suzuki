@extends('layout.grup')

@section('title', 'Edit Grup')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Edit Grup</h2>

    <form action="{{ route('group.update', $group->id_grup) }}" method="POST" class="update-form">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama_grup" class="block text-lg">Nama Grup</label>
            <input type="text" id="nama_grup" name="nama_grup" value="{{ old('nama_grup', $group->nama_grup) }}" class="w-full px-4 py-2 border rounded-md focus:outline-none" required>
        </div>

        <button type="submit" class="btn btn-add">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
    </form>
@endsection
