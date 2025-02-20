@include('layout.menu-navbar')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Display validation errors -->
 
  @if(session('success'))
  <script>
      Swal.fire({
          title: "Do you want to save the changes?",
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: "Save",
          denyButtonText: `Don't save`
      }).then((result) => {
          if (result.isConfirmed) {
              Swal.fire("Saved!", "", "success");
              // Proceed to submit the form after confirmation
              document.getElementById('submitForm').submit();
          } else if (result.isDenied) {
              Swal.fire("Changes are not saved", "", "info");
          }
      });
  </script>
  @endif
  
<body class="bg-gray-50 text-gray-900 tracking-wider leading-normal">

    @section('content')
        <div class="flex justify-center items-center mt-10">
            <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
                <!-- Title in the top left corner -->
                <h2 class="font-sans text-xl sm:text-2xl font-bold" style="color: rgb(45, 45, 45); margin-bottom: 20px;">
                    Buat Activity
                </h2>
            <hr><hr>
                <!-- Form Section -->
                <div class="container mt-2">            
                    <div class="form-row flex flex-wrap -mx-2">
                <!-- Pastikan form menggunakan metode POST dan memiliki CSRF token -->
                <form action="{{ route('activity.store') }}" method="POST" class="w-full">
                    @csrf
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="id_cabang" class="text-sm text-gray-700 font-medium mb-2">Cabang</label>
                            <!-- Tampilkan nama cabang sebagai teks -->
                            <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                {{ $selectedCabang ? $selectedCabang : 'Pilih Cabang' }}
                            </p>
                            <!-- Input hidden untuk mengirimkan nilai ke server -->
                            <input type="hidden" name="id_cabang" value="{{ $selectedCabang ? $cabang->where('nama_cabang', $selectedCabang)->first()->id_cabang : '' }}">
                        </div>
                        

                        <div class="flex flex-col">
                            <label for="id_grup" class="text-sm text-gray-700 font-medium mb-2">Grup</label>
                            <select name="id_grup" id="id_grup" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Pilih Grup</option>
                    @foreach($grup as $g)
                        <option value="{{ $g->id_grup }}" {{ old('id_grup') == $g->id_grup ? 'selected' : '' }}>
                            {{ $g->nama_grup }}
                        </option>
                    @endforeach
                            </select>
                        </div>
                
                        <!-- Nama Deskripsi -->
                        <div class="flex flex-col">
                            <label for="nama_kegiatan" class="text-sm text-gray-700 font-medium mb-2">Nama Aktifitas</label>
                            <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="Masukan Nama Deskripsi" value="{{ old('nama_kegiatan') }}" />
                        </div>
                
                        <!-- Username -->
                        <div class="flex flex-col">
                            <label for="username" class="text-sm text-gray-700 font-medium mb-2">Username</label>
                            <select name="username" id="username" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Pilih User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->username }}" {{ old('username') == $user->username ? 'selected' : '' }}>
                                        {{ $user->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                
                    <div class="space-x-4 mt-8 flex justify-end" id="submitBtn">
                        <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50" id="submitBtn">
                            Simpan
                        </button>
                        <a href="{{ route('home-activity') }}" class="py-2 px-4 bg-gray-200 text-gray-600 rounded hover:bg-gray-300 active:bg-gray-400">Kembali</a>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('filter_cabang').addEventListener('change', function () {
        const selectedCabang = this.value;
        if (selectedCabang) {
            // Redirect ke halaman tambah dengan parameter URL
            window.location.href = `/tambah?cabang=${selectedCabang}`;
        }
    });
</script>