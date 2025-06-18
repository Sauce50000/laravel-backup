@extends('layouts.admin')
@section('title', __('Create Photo Gallery'))
@section('content')

    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Create Photo Gallery</h1>

        <form action="{{ route('photos-galleries.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-8 sm:p-6 rounded-xl shadow-lg max-w-3xl mx-auto space-y-6">
            @csrf

            <!-- Title Field -->
            <div>
                <label for="album_title" class="block text-lg font-medium text-gray-700 mb-2">Title</label>
                <input type="text" name="album_title" id="album_title" required value="{{ old('album_title') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                    placeholder="Enter notice title in Nepali">
                @error('album_title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title (English) Field -->
            <div>
                <label for="album_title_en" class="block text-lg font-medium text-gray-700 mb-2">Title (English)</label>
                <input type="text" name="album_title_en" id="album_title_en" value="{{ old('album_title_en') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                    placeholder="Enter notice title in English">
                @error('album_title_en')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Upload -->
            <div class="mb-6">
                <label for="images" class="block text-lg font-semibold text-gray-700 mb-2">Upload Images</label>

                <div
                    class="relative flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition duration-200">

                    <input type="file" name="images[]" id="images"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" multiple required
                        onchange="updateImageNames(this)">

                    {{-- <input type="file" name="images[]" id="images"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" multiple required
                        onchange="previewImages(this)">

                    <div id="preview-container" class="flex flex-wrap gap-4 mt-4"></div>
 --}}

                    <div id="image-icon">
                        <i class="fa-solid fa-image text-4xl text-blue-400 mb-2"></i>
                        <p class="text-gray-500">Drag and drop your images here or <span
                                class="text-blue-600 font-medium hover:underline">click to upload</span></p>
                    </div>
                    <div id="image-names" class="text-left text-sm text-gray-600 mt-2 hidden"></div>
                </div>

                @error('images')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                @error('images.*')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>



            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="w-full sm:w-auto bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-md transform hover:-translate-y-1">
                    Create Album
                </button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            function updateImageNames(input) {
                const namesDiv = document.getElementById('image-names');
                if (input.files && input.files.length > 0) {
                    let names = [];
                    for (let i = 0; i < input.files.length; i++) {
                        names.push(input.files[i].name);
                    }
                    namesDiv.innerHTML = names.join('<br>');
                    namesDiv.classList.remove('hidden');
                } else {
                    namesDiv.innerHTML = '';
                    namesDiv.classList.add('hidden');
                }
            }
        </script>
    
        {{-- <script>
    let previewContainer = document.getElementById('preview-container');
    let selectedFiles = [];

    function previewImages(input) {
        const files = Array.from(input.files);
        previewContainer.innerHTML = ''; // Clear previous previews
        selectedFiles = files;

        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewBox = document.createElement('div');
                previewBox.className = "relative w-24 h-24 rounded overflow-hidden border border-gray-300";

                previewBox.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover" alt="Preview">
                    <button type="button" class="absolute top-0 right-0 bg-red-500 text-white text-xs px-1 rounded-bl"
                            onclick="removeImage(${index})">×</button>
                `;
                previewContainer.appendChild(previewBox);
            };
            reader.readAsDataURL(file);
        });

        // Workaround to make sure input matches selectedFiles
        refreshInputFiles(input);
    }

    function removeImage(index) {
        selectedFiles.splice(index, 1);
        refreshInputFiles(document.getElementById('images'));
        previewImages(document.getElementById('images'));
    }

    function refreshInputFiles(input) {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        input.files = dataTransfer.files;
    }
</script> --}}
        @endpush
@endsection
