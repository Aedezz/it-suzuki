@extends('layout.grup')

@section('title', 'Daftar Grup')

@section('content')
    <div class="mb-4">
        <a href="{{ route('group.create') }}" class="btn btn-add mb-4 px-8 py-3 rounded-md shadow-md bg-green-500 text-white text-lg">
            <i class="fas fa-plus-circle"></i> Tambah Grup
        </a>
    </div>

    <div class="table-container p-4">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Grup</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $group->nama_grup }}</td>
                        <td>
                            <!-- Button untuk Edit -->
                            <a href="{{ route('group.edit', $group->id_grup) }}" class="btn btn-edit px-6 py-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <!-- Form hapus dengan SweetAlert -->
                            <form action="{{ route('group.destroy', $group->id_grup) }}" method="POST" class="delete-form inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete px-6 py-2">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $groups->links() }} <!-- Pagination -->
    </div>
@endsection
