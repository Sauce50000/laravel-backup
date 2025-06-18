@extends('layouts.admin')
@section('title', 'Edit Photo Gallery')
@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">Edit Photo Gallery</h2>
            <a href="{{ route('photos-galleries.index') }}" class="text-blue-500 hover:underline">Back to List</a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg p-6">
            <form action="{{ route('photos-galleries.update', $photos_gallery) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Album Title (Nepali) -->
                    <div>
                        <label for="album_title" class="block text-sm font-medium text-gray-700 mb-1">Album Title
                            (नेपाली)</label>
                        <input type="text" name="album_title" id="album_title"
                            value="{{ old('album_title', $photos_gallery->album_title) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('album_title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Album Title (English) -->
                    <div>
                        <label for="album_title_en" class="block text-sm font-medium text-gray-700 mb-1">Album Title
                            (English)</label>
                        <input type="text" name="album_title_en" id="album_title_en"
                            value="{{ old('album_title_en', $photos_gallery->album_title_en) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('album_title_en')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Add New Photos -->
                <div class="mb-6">
                    <label for="images" class="block text-lg font-semibold text-gray-700 mb-2">Upload Images</label>

                    <div
                        class="relative flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition duration-200">

                        <input type="file" name="images[]" id="images"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" multiple
                            onchange="updateImageNames(this)">


                        <div id="image-icon" class="flex justify-center">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                        </div>
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



                <div class="mt-6 flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Gallery
                    </button>
                </div>
            </form>
            <!-- Existing Photos -->
            <div class="mt-10">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Existing Photos</h3>

                @if ($photos_gallery->photos->isEmpty())
                    <p class="text-sm text-gray-500">No photos in this gallery yet.</p>
                @else
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($photos_gallery->photos as $photo)
                            <div class="relative group rounded-lg overflow-hidden shadow">
                                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="Gallery Photo"
                                    class="w-full h-40 object-cover rounded-lg">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-70 transition-opacity">
                                    <form
                                        action="{{ route('photos-galleries.photos.destroy', [$photos_gallery->id, $photo->id]) }}"
                                        method="POST" onsubmit="return confirm('Delete this photo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-700 p-2 rounded-full">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>

    @push('scripts')
        {{-- <script>
            function confirmDeletePhoto(photoId) {
                if (confirm('Are you sure you want to delete this photo?')) {
                    const form = document.getElementById('delete-photo-form');
                    form.action = `/photos/${photoId}`;
                    form.submit();
                }
            }
        </script> --}}
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
    @endpush
@endsection
