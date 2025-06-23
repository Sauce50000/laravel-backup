@extends('layouts.admin')
@section('title', isset($aboutUs) ? 'Edit About Us' : 'Create About Us')
@section('content')

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
@endpush

<div class="container mx-auto py-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">
        {{ isset($aboutUs) ? 'Edit About Us Content' : 'Create New About Us Content' }}
    </h2>

    <form action="{{ isset($aboutUs) ? route('about-us.update', $aboutUs->id) : route('admin.about-us.store') }}" 
          method="POST" 
          class="bg-white p-6 rounded-lg shadow">
        @csrf
        @isset($aboutUs)
            @method('PUT')
        @endisset
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                <input type="text" name="title" id="title" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('title', $aboutUs->title ?? '') }}">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="title_en" class="block text-sm font-medium text-gray-700 mb-1">English Title *</label>
                <input type="text" name="title_en" id="title_en" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('title_en', $aboutUs->title_en ?? '') }}">
                @error('title_en')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <div id="editor-description" style="height: 200px;">{!! old('description', $aboutUs->description ?? '') !!}</div>
            <input type="hidden" name="description" id="description">
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="description_en" class="block text-sm font-medium text-gray-700 mb-1">English Description</label>
            <div id="editor-description_en" style="height: 200px;">{!! old('description_en', $aboutUs->description_en ?? '') !!}</div>
            <input type="hidden" name="description_en" id="description_en">
            @error('description_en')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.about-us.index') }}" 
               class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                Cancel
            </a>
            <button type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                {{ isset($aboutUs) ? 'Update' : 'Save' }} Content
            </button>
        </div>
    </form>
</div>

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>
    <script>
        // Initialize editors
        const descriptionEditor = new Quill('#editor-description', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'header': [1, 2, 3, false] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });
        
        const descriptionEnEditor = new Quill('#editor-description_en', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'header': [1, 2, 3, false] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });
        
        // Update hidden inputs before form submission
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('description').value = descriptionEditor.root.innerHTML;
            document.getElementById('description_en').value = descriptionEnEditor.root.innerHTML;
        });
    </script>
@endpush

@endsection