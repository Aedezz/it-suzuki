Ini halaman dashboard 
<br /> 
Selamat datang {{ Auth::user()->name }} 
<br /> 
<a href="{{ route('logout') }}">Logout</a> 

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Success Alert -->
@if(session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endif

<!-- Logout Alert -->
@if(session('logout'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil Logout',
        text: '{{ session('logout') }}',
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endif

<!-- Error Alert -->
@if(session('errors'))
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Ada yang error!',
        text: '{{ session('errors')->first() }}',  <!-- Show the first error message -->
        position: 'center',
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endif

