@extends('../dalam/main2')

    @section('style')
      <!--Regular Datatables CSS-->
      <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
      <!--Responsive Extension Datatables CSS-->
      <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
      <!--Regular Datatables CSS-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
        <style>
            /*Overrides for Tailwind CSS */

            /*Form fields*/
            .dataTables_wrapper select,
            .dataTables_wrapper .dataTables_filter input {
                color: #4a5568;
                /*text-gray-700*/
                padding-left: 1rem;
                /*pl-4*/
                padding-right: 1rem;
                /*pl-4*/
                padding-top: 2px;
                /*pl-2*/
                padding-bottom: 2px;
                /*pl-2*/
                line-height: 1.25;
                /*leading-tight*/
                border-width: 2px;
                /*border-2*/
                border-radius: .25rem;
                border-color: #ececec;
                /*border-gray-200*/
                background-color: rgb(255, 255, 255);
                /*bg-gray-200*/
            }

            /*Row Hover*/
            table.dataTable.hover tbody tr:hover,
            table.dataTable.display tbody tr:hover {
                background-color: #ebf4ff;
                /*bg-indigo-100*/
            }

            /*Pagination Buttons*/
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Current selected */
            .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                color: #fff !important;
                /*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                background: #667eea !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Hover */
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                color: #fff !important;
                /*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                background: #667eea !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Add padding to bottom border */
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;
                /*border-b-1 border-gray-300*/
                margin-top: 0.75em;
                margin-bottom: 0.75em;
            }

            /*Change colour of responsive icon*/
            table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
            table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
                background-color: #667eea !important;
                /*bg-indigo-500*/
            }

            /*  Make sure the table takes up the full available width */
            #example {
                width: 100% !important;
                table-layout: auto;
                /* Allow column widths to adjust based on content */
            }
        </style>
    @endsection

<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    
    @section('content')
    <!--Container-->
    <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2" sty>
        <!--Card-->
        <div id='recipients' class="p-3 mt-6 lg:mt-0 rounded shadow bg-white" style="width:165%; margin-left: -265px; margin-top: 22px;">
            <!--Title-->
            <h2 class="flex items-center font-sans font-bold break-normal px-2 py-8 text-lg md:text-2xl" style="margin-top: -25px; font-size: 20px;">
                FORM PERBAIKAN PERANGKAT
            </h2>
            <hr style="margin-top: -15px"><br>
            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">No Reg</th>
                        <th data-priority="2">Tanggal</th>
                        <th data-priority="3">NIK</th>
                        <th data-priority="4">Nama</th>
                        <th data-priority="5">Divisi</th>
                        <th data-priority="6">Kode Asset</th>
                        <th data-priority="7">Nama Barang</th>
                        <th data-priority="8">Status</th>
                        <th data-priority="9">Aksi</th>
                    </tr>
                </thead>
				<tbody>
					@foreach ($modul as $data)
						<tr>
							<td>{{ $data->nomor }}</td>
							<td>{{ $data->tanggal }}</td>
							<td>{{ $data->nik }}</td>
							<td>{{ $data->nama_lengkap }}</td>
							<td>{{ $data->divisi_cabang }}</td>
							<td>{{ $data->kode_asset }}</td>
							<td>{{ $data->nama_barang }}</td>
							<td>
								@if ($data->cek == 1)
									<div class="w-max">
										<div class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-green-500/20 text-green-600 py-1 px-2 text-xs rounded-md">
											Sudah
										</div>
									</div>
								@else
									<div class="w-max">
										<div class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-red-500/20 text-red-600 py-1 px-2 text-xs rounded-md">
											Belum
										</div>
									</div>
								@endif
							</td>
							<td class="p-4 border-b border-blue-gray-50">
								<div class="flex space-x-2">
									<!-- Tombol Centang (Check) hanya tampil jika status "Belum" -->
									@if ($data->cek == 0)
										<form action="{{ route('modul.updateStatus', $data->id) }}" method="POST">
											@csrf
											@method('POST')
											<button
												type="submit"
												class="relative w-10 h-10 rounded-lg bg-green-500 text-white flex justify-center items-center hover:bg-green-600">
												<i class="fa-solid fa-check-to-slot"></i>
											</button>
										</form>
									@endif
				
									<!-- Tombol Hapus (Delete) -->
									<form onsubmit="return confirm('Yakin hapus data?');" method="POST" action="{{ route('modul.destroy', $data->id) }}" class="flex-fill ml-1">
										@csrf
										@method('DELETE')
										<button
											class="relative w-10 h-10 rounded-lg bg-red-500 text-white flex justify-center items-center hover:bg-red-600">
											<i class="fa-regular fa-trash-can"></i>
										</button>
									</form>
				
									<!-- Tombol Print -->
									<button
										class="relative w-10 h-10 rounded-lg bg-blue-500 text-white flex justify-center items-center hover:bg-blue-600">
										<i class="fa-solid fa-print"></i>
									</button>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
				
            </table>
        </div>
    </div>
    @endsection

    @push('script')
        <!--DataTables JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    "responsive": true
                });
            });
        </script>
    @endpush
</body>
