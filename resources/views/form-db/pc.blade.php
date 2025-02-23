@include('layout.navbar')

<div style="display: flex; justify-content: center; padding: 20px;">
    <div style="width: 100%; max-width: 1200px; background: #fff; border-radius: 10px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); padding: 30px;">
        <h2 style="font-size: 28px; font-weight: 600; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 10px; color: #333;">
            Form Install Komputer & Laptop
        </h2>

        <!-- Flex Container untuk Form dan Panduan -->
        <div style="display: flex; gap: 20px;">
            <!-- Form Section -->
            <form action="{{ route('pc.store') }}" method="POST" style="flex: 3;">
                @csrf
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                    <div>
                        <label for="nik" style="display: block; font-weight: 500; margin-bottom: 5px; color: #555;">Nomor Induk Karyawan</label>
                        <input type="text" id="nik" name="nik" required placeholder="Masukkan NIK Anda" autofocus
                            style="width: 100%; padding: 10px 15px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div>
                        <label for="nama_lengkap" style="display: block; font-weight: 500; margin-bottom: 5px; color: #555;">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" required placeholder="Masukkan Nama Lengkap Anda" 
                            style="width: 100%; padding: 10px 15px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div>
                        <label for="jabatan" style="display: block; font-weight: 500; margin-bottom: 5px; color: #555;">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan Anda" 
                            style="width: 100%; padding: 10px 15px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div>
                        <label for="divisi_cabang" style="display: block; font-weight: 500; margin-bottom: 5px; color: #555;">Divisi/Cabang</label>
                        <input type="text" id="divisi_cabang" name="divisi_cabang" placeholder="Masukkan Divisi/Cabang" 
                            style="width: 100%; padding: 10px 15px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div>
                        <label for="kode_asset" style="display: block; font-weight: 500; margin-bottom: 5px; color: #555;">Kode Asset</label>
                        <input type="text" id="kode_asset" name="kode_asset" placeholder="Masukkan Kode Asset" required 
                            style="width: 100%; padding: 10px 15px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
                    </div>              
                </div>

                <button type="submit" 
                style="display: block; width: 100%; max-width: 150px; margin: 30px 0 0 0; padding: 10px 10px; 
                background: #0095ff; color: #fff; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; 
                transition: background 0.3s ease; text-align: center;"
                onmouseover="this.style.background='#1695ef';" 
                onmouseout="this.style.background='#0095ff';">
                Simpan
            </button>
            
            
            
            </form>

            <style>
                .dropdown-content {
                    overflow: hidden;
                    max-height: 0;
                    transition: max-height 0.4s ease;
                }
            
                .dropdown-toggle {
                    cursor: pointer;
                    margin-left: 5px;
                    transition: transform 0.3s ease;
                }
            
                .dropdown-toggle.active {
                    transform: rotate(180deg);
                }
            </style>
            
            <!-- Panduan Section -->
            <div style="flex: 1.3; background: #f9f9f9; padding: 20px; border-radius: 10px; border: 1px solid #ddd; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05); max-width: 450px;">

                <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 15px; color: #333;">Tata Cara Pengajuan:</h3>
                <ul style="list-style: decimal; padding-left: 20px; color: #555; line-height: 1.6;">
                    <li>
                        Lengkapi <b>Form</b> dan klik tombol <b>Save</b>
                        <i class="fa-solid fa-angle-down dropdown-toggle" onclick="toggleDropdown(0)"></i>
                        <div class="dropdown-content">
                            <img src="../images/installasi/form_install.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">
                        </div>
                    </li>
                    <li style="margin-top: 5px">
                        Setelah berhasil, klik tombol <b>Print </b> dan <b>cetak Dokumen.</b>
                        <i class="fa-solid fa-angle-down dropdown-toggle" onclick="toggleDropdown(1)"></i>
                        <div class="dropdown-content">
                            <img src="../images/installasi/detail_install.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">
                        </div>
                    </li>
                     <li style="margin-top: 5px">
                        Tanda tangan <b>emohon (materai 6.0000) dan Atasan</b>
                        <i class="fa-solid fa-angle-down dropdown-toggle" onclick="toggleDropdown(2)"></i>
                        <div class="dropdown-content">
                            <img src="../images/installasi/cetak_install.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">
                        </div>
                    </li>
                    <li style="margin-top: 5px">Serahkan <b>Form ke IT</b></li>
                </ul>
            </div>
            
            <script>
                function toggleDropdown(index) {
                    const dropdowns = document.querySelectorAll('.dropdown-content');
                    const toggles = document.querySelectorAll('.dropdown-toggle');
                    
                    // Tutup semua dropdown kecuali yang di-klik
                    dropdowns.forEach((dropdown, i) => {
                        if (i === index) {
                            // Toggle max-height untuk efek slide
                            if (dropdown.style.maxHeight) {
                                dropdown.style.maxHeight = null;
                            } else {
                                dropdown.style.maxHeight = dropdown.scrollHeight + "px";
                            }
                        } else {
                            dropdown.style.maxHeight = null;
                        }
                    });
            
                    // Toggle arah panah
                    toggles.forEach((toggle, i) => {
                        if (i === index) {
                            toggle.classList.toggle('active');
                        } else {
                            toggle.classList.remove('active');
                        }
                    });
                }
            </script>
            
        </div>
    </div>
</div>