@extends('layout.tabel-pembuatan')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Form Pembuatan</h1>

    <!-- Tabs and Content Section -->
    <div class="tabs">
        <div class="tab active-tab cursor-pointer py-2 px-4" onclick="switchTab(1)">Data</div>
        <div class="tab cursor-pointer py-2 px-4" onclick="switchTab(2)">Laporan</div>
        <div class="tab cursor-pointer py-2 px-4" onclick="switchTab(3)">Ceklist</div>
    </div>

    <!-- Tab 1: Data -->
    <div class="tab-content" id="tab-1">
        <!-- Pagination and Items Per Page above Table -->
        <div class="flex items-center gap-4 mb-4">
            <label for="perPageData" class="text-gray-600">Items per page:</label>
            <select id="perPageData" onchange="changePerPageData()">
                <option value="10" {{ request()->get('per_page') == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request()->get('per_page') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request()->get('per_page') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request()->get('per_page') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>

        <div class="table-wrapper">
            <table>
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
                            <td>
                                <button class="btn btn-icon btn-green" onclick="updateStatus(event, {{ $data->id }})">
                                    <i class="bi bi-check-circle"></i>
                                </button>
                                <button class="btn btn-icon btn-red" onclick="deleteRecord(event, {{ $data->id }})">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <a href="#" class="btn btn-icon btn-teal">
                                    <i class="bi bi-printer"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination for Data -->
        <div class="pagination">{{ $formUser->appends(request()->input())->links() }}</div>
    </div>

    <!-- Tab 2: Laporan -->
    <div class="tab-content hidden" id="tab-2">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Laporan</h2>
        <form action="{{ route('update.status.by.year') }}" method="POST" id="update-status-form" class="mb-8">
            @csrf
            <div class="flex items-center gap-4 mb-6">
                <label for="year" class="text-gray-600">Pilih Tahun:</label>
                <input type="number" name="year" id="year" class="px-4 py-2 border border-gray-300 rounded"
                    value="{{ now()->year }}" min="{{ now()->year }}" max="{{ now()->year + 10 }}" required>
                <button type="submit" class="btn btn-teal">
                    Pending
                </button>
                <a href="#" class="btn btn-teal mt-4">
                    <i class="bi bi-printer"></i> Print
                </a>
            </div>
        </form>
    </div>

    <!-- Tab 3: Ceklist -->
    <div class="tab-content hidden" id="tab-3">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Ceklist</h2>
        <p class="text-gray-600 mb-4">Form Pembuatan User Baru/Reset Password</p>

        <!-- Dropdown for items per page -->
        <div class="flex items-center gap-4 mb-4">
            <label for="perPageCeklist" class="text-gray-600">Items per page:</label>
            <select id="perPageCeklist" onchange="changePerPageCeklist()">
                <option value="10" {{ request()->get('per_page') == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request()->get('per_page') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request()->get('per_page') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request()->get('per_page') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th><input type="checkbox" class="check-all"></th>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ceklist as $data)
                        <tr>
                            <td><input type="checkbox" class="ceklist-checkbox"></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_lengkap }}</td>
                            <td>{{ $data->cek == 0 ? 'Belum Selesai' : 'Selesai' }}</td>
                            <td>
                                <button class="btn btn-icon btn-green" onclick="updateStatus(event, {{ $data->id }})">
                                    <i class="bi bi-check-circle"></i>
                                </button>
                                <button class="btn btn-icon btn-red" onclick="deleteRecord(event, {{ $data->id }})">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination for Ceklist -->
        <div class="pagination">{{ $ceklist->appends(request()->input())->links() }}</div>
    </div>

@endsection

@section('script')
    <script>
        // Add your JS functions here for handling tab switching, pagination, and other interactions
        function switchTab(tabIndex) {
            const tabs = document.querySelectorAll('.tab');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach((tab, index) => {
                if (index === tabIndex - 1) {
                    tab.classList.add('active-tab');
                    contents[index].classList.remove('hidden');
                } else {
                    tab.classList.remove('active-tab');
                    contents[index].classList.add('hidden');
                }
            });
        }

        function changePerPageData() {
            // Handle change in items per page for data table
        }

        function changePerPageCeklist() {
            // Handle change in items per page for ceklist table
        }

        function updateStatus(event, id) {
            event.preventDefault();
            alert(`Update status for record ID: ${id}`);
        }

        function deleteRecord(event, id) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this record?')) {
                alert(`Record ID: ${id} deleted.`);
            }
        }
    </script>
@endsection
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
