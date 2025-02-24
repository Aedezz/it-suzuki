@include('layout.menu-navbar')

<body class="bg-gray-50 font-sans">
    <div class="container mx-auto mt-6 px-16 max-w-full">
        <div class="flex flex-col space-y-4 mx-auto p-6 bg-white shadow-lg rounded-md">
            <form action="{{ route('help.store') }}" method="POST" enctype="multipart/form-data">
                <h1 class="text-2xl font-bold mb-6">Help</h1>
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <!-- Kategori Field -->
                    <div class="flex flex-col">
                        <label for="id_kategori" class="font-medium text-gray-700">Kategori</label>
                        <select id="id_kategori" name="id_kategori" class="mt-2 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($kategori as $c)
                                <option value="{{ $c->id_kategori }}">{{ $c->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Judul Field -->
                    <div class="flex flex-col">
                        <label for="judul" class="font-medium text-gray-700">Judul</label>
                        <input type="text" id="judul" name="judul" class="mt-2 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Judul" required>
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Isi Field (Spans both columns) -->
                    <div class="flex flex-col col-span-2">
                        <label for="isi" class="font-medium text-gray-700">Isi</label>
                        <textarea id="isi" name="isi" rows="5" class="mt-2 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Isi" required></textarea>
                        @error('isi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Lampiran Field (Flex bawah) -->
                    <div class="flex flex-col col-span-2">
                        <label for="lampiran" class="font-medium text-gray-700">Lampiran</label>
                        <input type="file" id="lampiran" name="lampiran[]" accept=".jpg,.jpeg,.png,.pdf,.mp4" class="mt-2 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="showFileName(event)" multiple>
                        <p id="fileName" class="text-sm text-gray-500 mt-1"></p>
                        <div id="previewContainer" class="mt-4"></div>
                        @error('lampiran')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-start space-x-4 mt-4 col-span-2">
                        <!-- Save Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md transition duration-300 ease-in-out hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Save
                        </button>
                        
                        <!-- Back Button -->
                        <a href="{{ route('help') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md transition duration-300 ease-in-out hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showFileName(event) {
            const files = event.target.files;
            const fileNameContainer = document.getElementById('fileName');
            const previewContainer = document.getElementById('previewContainer');
            
            // Clear previous content
            previewContainer.innerHTML = '';
            fileNameContainer.textContent = files.length > 0 ? `Selected: ${files.length} file(s)` : 'Gada file kepilih';
    
            Array.from(files).forEach(file => {
                const fileExtension = file.name.split('.').pop().toLowerCase();
                const allowedExtensions = ['pdf','docx','mp4','xls','xlsx'];
    
                if (!allowedExtensions.includes(fileExtension)) {
                    fileNameContainer.textContent = 'Waduhh. Hanya bisa dengan file document (PDF,Docx,XLS,XLSX) dan video (mp4) bro/sis, mohon dicoba lagi !!';
                    event.target.value = ''; // Reset file input
                    return;
                }
    
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Preview';
                        img.className = 'mt-2 rounded-md w-32 h-32 object-cover';
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                } else if (fileExtension === 'pdf') {
                    const pdfMessage = document.createElement('p');
                    pdfMessage.textContent = 'PDF file selected.';
                    pdfMessage.className = 'text-gray-500';
                    previewContainer.appendChild(pdfMessage);
                } else if (['docx', 'xls', 'xlsx', 'mp4'].includes(fileExtension)) {
                    const fileMessage = document.createElement('p');
                    fileMessage.textContent = `${file.name} selected.`;
                    fileMessage.className = 'text-gray-500';
                    previewContainer.appendChild(fileMessage);
                }
            });
        }
    </script>    
</body>
