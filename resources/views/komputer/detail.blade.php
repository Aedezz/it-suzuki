@include('layout.menu-navbar')

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex justify-center items-center mt-10">
    <div class="form-it-container w-70 sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
        <h2 id="headerLabel" class="font-sans text-xl sm:text-2xl font-bold absolute top-6 left-7" style="color: rgb(45, 45, 45)">
            Detail Spesifikasi Komputer
        </h2>

        <div class="flex justify-between items-center mt-10 px-2">
            <div class="text-sm text-gray-600">
                <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($komputer->tanggal)->format('d M Y') }}
            </div>
            <div class="text-sm text-gray-600">
                <strong>Pengguna:</strong> {{ $komputer->nama }} / {{ $komputer->divisi }} / {{ $komputer->cabang }}
            </div>
        </div>

        <div class="mt-6">
            <div id="attachmentsContainer" class="flex flex-wrap gap-2 mt-2 mb-4 bg-gray-100 p-3 rounded-lg">
                <!-- Image boxes will be added here -->
            </div>

            <div id="paginationControls" class="flex flex-col items-center mt-4">
                <!-- Pagination template will be dynamically inserted here -->
            </div>

            <div class="flex items-center gap-3 mt-2">
                <input type="text" id="keterangan" name="keterangan" placeholder="Silahkan isi keterangan" class="p-2 border border-gray-300 rounded w-1/15">
                <input id="image" name="images[]" type="file" class="block w-15 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" accept="image/*" multiple>
                <button class="bg-yellow-700 text-white px-4 py-2 rounded" onclick="uploadImage()">Upload</button>
                <a href="javascript:history.back()" class="bg-green-500 text-white px-4 py-2 rounded">Back</a>
            </div>
        </div>
    </div>
</div>

<!-- Pagination and Delete Buttons in the Modal -->
<div id="imagePreviewModal" class="fixed inset-0 bg-gray-700 bg-opacity-50 flex justify-center items-center hidden z-50" onclick="closeImagePreview(event)">
    <div class="bg-white p-6 rounded-lg shadow-lg relative max-w-[50%] max-h-[50%]" onclick="event.stopPropagation()">
        <strong id="zoomKeterangan" class="text-lg font-semibold mb-2 block text-center text-gray-800"></strong>
        <div class="flex items-center gap-2">
            <button onclick="showPreviousImage()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-full">❮</button>
            <img id="previewImage" class="w-96 h-96 object-cover rounded-md border cursor-pointer transition-transform duration-300 hover:scale-80" />
            <button onclick="showNextImage()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-full">❯</button>
        </div>
        <!-- Delete Button -->
        <button onclick="deleteCurrentImage()" class="absolute bottom-2 right-2 bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">Delete</button>
    </div>
</div>

<script>
    let currentImageIndex = 0;
    // Update the storedData structure to store images by `komputer.id`
    let storedData = JSON.parse(localStorage.getItem('uploadedImages')) || {};
    let currentPage = 1;
    const boxesPerPage = 6; // Number of boxes per page
    let modalImages = [];
    let modalImageIndex = 0;

    function loadStoredImages(komputerId) {
    const container = document.getElementById('attachmentsContainer');
    container.innerHTML = ''; // Clear container

    if (!storedData[komputerId] || storedData[komputerId].length === 0) {
        const noDataMessage = document.createElement('p');
        noDataMessage.textContent = 'No images to display.';
        noDataMessage.className = 'text-gray-500 text-center';
        container.appendChild(noDataMessage);
        return;
    }

    // Pagination logic
    const startIndex = (currentPage - 1) * boxesPerPage;
    const endIndex = startIndex + boxesPerPage;
    const paginatedData = storedData[komputerId].slice(startIndex, endIndex);

    paginatedData.forEach((item, index) => {
        const box = createImageBox(item.keterangan, item.images, index + startIndex);
        container.appendChild(box);
    });

    displayPaginationControls();
}

    function displayPaginationControls() {
        const paginationContainer = document.getElementById('paginationControls');
        paginationContainer.innerHTML = ''; // Clear existing controls

        const totalPages = Math.ceil(storedData.length / boxesPerPage);
        if (totalPages <= 1) return; // Hide pagination if only one page

        // Jangan dihapus buat uji coba kedepannya
        /*
        const paginationNav = document.createElement('div');
        paginationNav.className = 'flex justify-center gap-2';

        for (let i = 0; i < totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.className = `px-4 py-2 rounded ${i === currentPage - 1 ? 'bg-blue-500 text-white' : 'bg-gray-300'}`;
            pageButton.textContent = i + 1;
            pageButton.onclick = () => {
                currentPage = i + 1;
                loadStoredImages();
            };

            paginationNav.appendChild(pageButton);
        }

        paginationContainer.appendChild(paginationNav);
        */
    }

    function uploadImage() {
    const keterangan = document.getElementById('keterangan').value;
    const files = document.getElementById('image').files;
    const komputerId = {{ $komputer->id }}; // Replace with your dynamic data

    if (!files.length || !keterangan) {
        Swal.fire({
            icon: 'warning',
            title: 'Missing Information',
            text: 'Please select an image and enter a description.'
        });
        return;
    }

    const imageSrcs = [];
    for (let i = 0; i < files.length; i++) {
        const reader = new FileReader();
        reader.onload = function(e) {
            imageSrcs.push(e.target.result);

            if (imageSrcs.length === files.length) {
                if (!storedData[komputerId]) {
                    storedData[komputerId] = []; // Initialize the entry if not exists
                }

                storedData[komputerId].push({ keterangan, images: imageSrcs });
                localStorage.setItem('uploadedImages', JSON.stringify(storedData));

                loadStoredImages(komputerId);

                Swal.fire({
                    icon: 'success',
                    title: 'Images Uploaded',
                    text: 'The images and description have been added successfully.'
                });

                document.getElementById('image').value = "";
                document.getElementById('keterangan').value = "";
            }
        };
        reader.readAsDataURL(files[i]);
    }
}

    function createImageBox(keterangan, images, index) {
    const box = document.createElement('div');
    box.className = 'bg-white border rounded p-2 w-60 shadow-sm text-sm text-gray-700 cursor-pointer';

    const title = document.createElement('p');
    title.className = 'font-semibold text-gray-800 mb-2';
    title.textContent = keterangan;
    box.appendChild(title);

    const thumbnail = document.createElement('img');
    thumbnail.src = images[0]; // Show the first image as a thumbnail
    thumbnail.className = 'w-full h-40 object-cover rounded';
    box.appendChild(thumbnail);

    if (images.length > 1) {
        const indicator = document.createElement('span');
        indicator.className = 'text-xs text-gray-500';
        indicator.textContent = `+${images.length - 1} more`;
        box.appendChild(indicator);
    }

    // When clicking on the box, open the modal and set the image index properly
    box.onclick = () => openImagePreview(index); // Pass the index of the clicked box
    return box;
}

function openImagePreview(index) {
    currentImageIndex = index;
    const imageModal = document.getElementById('imagePreviewModal');
    const previewImage = document.getElementById('previewImage');
    const zoomKeterangan = document.getElementById('zoomKeterangan');

    // Get the selected item's images and description
    const { keterangan, images } = storedData[komputerId][index];
    modalImages = images; // Set the modal images to the selected item's images
    modalImageIndex = 0; // Reset to the first image in the selected item

    previewImage.src = modalImages[modalImageIndex]; // Show the first image in the modal
    zoomKeterangan.textContent = keterangan; // Set the description in the modal

    imageModal.style.display = 'flex'; // Show the modal
}


    function closeImagePreview(event) {
        if (event.target.id === 'imagePreviewModal') {
            document.getElementById('imagePreviewModal').style.display = 'none';
        }
    }

    function showPreviousImage() {
        if (modalImageIndex > 0) {
            modalImageIndex--;
            document.getElementById('previewImage').src = modalImages[modalImageIndex];
        }
    }

    function showNextImage() {
        if (modalImageIndex < modalImages.length - 1) {
            modalImageIndex++;
            document.getElementById('previewImage').src = modalImages[modalImageIndex];
        }
    }

    function deleteCurrentImage() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with deletion
                const imageToDelete = storedData[komputerId][currentImageIndex];
                storedData[komputerId].splice(currentImageIndex, 1);
                localStorage.setItem('uploadedImages', JSON.stringify(storedData));

                loadStoredImages(komputerId); // Refresh the image list
                document.getElementById('imagePreviewModal').style.display = 'none'; // Close the modal

                Swal.fire(
                    'Deleted!',
                    'Your image has been deleted.',
                    'success'
                );
            }
        });
    }

    loadStoredImages(); // Initial load
</script>

<script>
    const komputerId = {{ $komputer->id }}; // Blade directive to get the current komputer id
    loadStoredImages(komputerId); // Load images for the specific komputer
</script>
