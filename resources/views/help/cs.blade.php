@extends('help.layout.index')

@section('body')
<div class="container mx-auto mt-8">
    <div class="mt-6">
        <!-- Tab CS - CENTER -->
        <div id="cs">
            @if($helps_cs->isEmpty())
                <div class="text-center text-gray-500 mt-12">
                    <h2 class="text-xl font-semibold">Waduh maap banget niiich, datanya kosong bapak/ibu, mohon di isi yaaaa</h2>
                </div>
            @else
                @foreach($helps_cs as $help)
                <div class="tab-content-item bg-white p-4 rounded shadow mb-4 relative">
                    {{-- Content item --}}
                    <h5 class="text-lg font-semibold text-blue-400 mb-1">{{ $help->judul }}</h5>
                    <div class="flex items-center text-sm text-gray-500 space-x-2">
                        <span><i class="bi bi-calendar"></i> {{ $help->create_date }}</span>
                        <span class="separator">|</span>
                        <span>{{ $help->lampiran }}</span>
                        <span class="separator">|</span>
                        <span><i class="bi bi-person"></i> {{ $help->nama }}</span>
                    </div>

                    {{-- Dropdown button --}}
                    <button class="dropdown-button inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                        <i class="bi bi-chevron-down mr-2"></i>
                        Lihat Detail
                    </button>

                    <div class="dropdown-content hidden">
                        <div class="text-gray-700 mt-4">
                            @if(empty($help->isi))
                                <p class="text-gray-500 italic">Maaf, isi content untuk data ini masih kosong.</p>
                            @else
                                {!! $help->isi !!}
                            @endif
                        </div>

                        {{-- Lampiran button --}}
                        @if (!empty($help->lampiran) && file_exists(public_path('help-file/cs/' . $help->lampiran)))
                            @php
                                // Check if the file is a video (e.g., mp4)
                                $fileExtension = pathinfo($help->lampiran, PATHINFO_EXTENSION);
                            @endphp
                        
                            @if (in_array(strtolower($fileExtension), ['mp4', 'avi', 'mov', 'mkv']))
                                <!-- Display video directly -->
                                <div class="video-container mt-4">
                                    <video controls class="w-full max-w-4xl mx-auto">
                                        <source src="{{ asset('help-file/cs/' . $help->lampiran) }}" type="video/{{ $fileExtension }}">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @else
                                <!-- If it's not a video, provide a download link -->
                                <a href="{{ asset('help-file/cs/' . $help->lampiran) }}" class="absolute bottom-4 right-4 inline-flex items-center px-4 py-2 text-sm font-medium text-blue-500 hover:bg-blue-100 rounded border">
                                    <i class="bi bi-paperclip mr-2"></i>Download Lampiran
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Dropdown functionality
        const dropdownButtons = document.querySelectorAll('.dropdown-button');

        dropdownButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.stopPropagation();

                const parent = button.closest('.tab-content-item');
                const dropdownContent = parent.querySelector('.dropdown-content');

                // Toggle visibility of the dropdown content
                const isHidden = dropdownContent.classList.contains('hidden');

                // Close all other dropdowns
                document.querySelectorAll('.dropdown-content').forEach(content => {
                    content.classList.add('hidden');
                    content.closest('.tab-content-item').style.height = '';
                });

                if (isHidden) {
                    dropdownContent.classList.remove('hidden');
                    parent.style.height = `${dropdownContent.scrollHeight + parent.offsetHeight}px`;
                } else {
                    dropdownContent.classList.add('hidden');
                    parent.style.height = '';
                }
            });
        });

        // Close all dropdowns when clicking outside
        document.addEventListener('click', () => {
            document.querySelectorAll('.dropdown-content').forEach(content => {
                content.classList.add('hidden');
                content.closest('.tab-content-item').style.height = '';
            });
        });
    });
</script>

<style>
    .tab-content-item {
        transition: height 0.3s ease;
        overflow: hidden;
    }

    .dropdown-content {
        display: block;
        overflow: hidden;
        transition: max-height 0.3s ease;
        max-height: 0;
    }

    .dropdown-content.hidden {
        max-height: 0;
    }

    .dropdown-content:not(.hidden) {
        max-height: 1000px; /* Adjust to fit large content */
    }

    /* Style for the attachment download button */
    .dropdown-content a {
        position: absolute;
        bottom: 4px;
        right: 4px;
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        font-size: 14px;
        background-color: #f3f4f6;
        border-radius: 6px;
        transition: background-color 0.3s ease;
    }

    .dropdown-content a:hover {
        background-color: #e0e7ff;
    }

    .separator {
        margin: 0 4px;
        color: #9ca3af; /* Gray tone to match text */
    }
</style>
@endpush