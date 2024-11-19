@extends('layout.tabel-pembuatan')

@section('title', 'Dashboard')

@section('content')
<div class="tabs">
    <button class="tab active" data-tab="1">Data</button>
    <button class="tab" data-tab="2">Laporan</button>
    <button class="tab" data-tab="3">Ceklist</button>
</div>

<!-- Tab Content 1: Data -->
<div class="tab-content" id="tab-1">
    <div class="table-wrapper">
        <table class="datatable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIK</th>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>Divisi Cabang</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formUser as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->nomor }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->nama_lengkap }}</td>
                    <td>{{ $data->jabatan }}</td>
                    <td>{{ $data->divisi_cabang }}</td>
                    <td>{{ $data->keterangan }}</td>
                    <td>{{ $data->cek == 0 ? 'Belum Selesai' : 'Selesai' }}</td>
                    <td class="flex gap-2">
                        <!-- Tombol Status (Update) -->
                        @if ($data->cek == 0)
                        <form action="{{ route('form-pembuatan.updateStatus', $data->id) }}" method="POST" class="form-update-status">
                            @csrf
                            @method('PUT')
                            <button type="button" class="btn-icon btn-complete" title="Ubah Status" onclick="confirmUpdateStatus(this)">
                                <i class="bi bi-check-circle"></i>
                            </button>
                        </form>
                        @endif
                    
                        <!-- Tombol Hapus -->
                        <form action="{{ route('form-pembuatan.destroy', $data->id) }}" method="POST" class="form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn-icon btn-delete" title="Hapus Data" onclick="confirmDelete(this)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    
                        <!-- Tombol Print -->
                        <a href="#" class="btn-icon btn-print" title="Cetak">
                            <i class="bi bi-printer"></i>
                        </a>
                    </td>                                                                            
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="tab-content" id="tab-2" style="display: none;">
    <div class="form-container">
        <!-- Form untuk mengubah status berdasarkan tahun dan status -->
        <form action="{{ route('form-pembuatan.updateStatusBatch') }}" method="POST">
            @csrf

            <!-- Pilihan Tahun -->
            <div class="mb-3">
                <label for="year" class="form-label">Pilih Tahun</label>
                <select name="year" id="year" class="form-select">
                    @php
                        $currentYear = date('Y');
                    @endphp
                    @for ($i = 0; $i <= 8; $i++)
                        <option value="{{ $currentYear + $i }}">{{ $currentYear + $i }}</option>
                    @endfor
                </select>
            </div>

            <!-- Pilihan Status -->
            <div class="mb-3">
                <label for="status" class="form-label">Pilih Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="selesai">Selesai</option>
                    <option value="belum">Belum</option>
                </select>
            </div>

            <!-- Tombol Pending dan Print -->
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning mt-4">Pending</button>
                <button type="button" class="btn btn-success mt-4" onclick="window.open('#', '_blank')">Print</button>
            </div>
        </form>
    </div>
</div>

<!-- Tab Content 3: Ceklist -->
<div class="tab-content" id="tab-3" style="display: none;">
    <div class="table-wrapper">
        <table class="datatable">
            <thead>
                <tr>
                    <th>Checkbox</th>
                    <th>No Reg</th>
                    <th>Tanggal</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Divisi/Cabang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ceklistData as $data)
                <tr id="data-{{ $data->id }}">
                    <td>
                        <input type="checkbox" class="checkbox-hide" data-id="{{ $data->id }}">
                    </td>
                    <td>{{ $data->nomor }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->nama_lengkap }}</td>
                    <td>{{ $data->divisi_cabang }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
