

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
  
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">

    @section('content')x`
        <div class="flex justify-center items-center mt-10">
            <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
                <!-- Title in the top left corner -->
                <h2 class="font-sans text-xl sm:text-2xl font-bold" style="color: rgb(45, 45, 45); margin-bottom: 20px;">
                    Buat Group
                </h2>
            <hr><hr>
                <!-- Form Section -->
                <div class="container mt-2">            
                    <div class="form-row flex flex-wrap -mx-2">
                <!-- Pastikan form menggunakan metode POST dan memiliki CSRF token -->
                <form action="{{ route('group.store') }}" method="POST" class="w-full">
                    @csrf
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">        
                      
                        <div class="flex flex-col">
                            <label for="nama_grup" class="text-sm text-gray-700 font-medium mb-2">Nama Group</label>
                            <input type="text" name="nama_grup" id="nama_grup" class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="Masukan Nama Deskripsi" value="{{ old('nama_grup') }}" />
                        </div>   
                    </div>
                    <div class="space-x-4 mt-7 flex justify-start" id="submitBtn">
                        <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50" id="submitBtn">
                            Simpan
                        </button>
                        <a href="{{ route('group.index') }}" class="py-2 px-4 bg-gray-200 text-gray-600 rounded hover:bg-gray-300 active:bg-gray-400">Kembali</a>
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