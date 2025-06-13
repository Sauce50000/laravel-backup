@extends('layouts.admin')
@section('title', 'Edit Notice Category')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Notice Category</h1>

        <form action="{{ route('notice-categories.update', $noticeCategory->id) }}" method="POST"
            class="bg-white p-8 rounded-xl shadow-lg max-w-3xl mx-auto flex flex-col items-center">
            @csrf
            @method('PUT')

            <!-- Title Field -->
            <div class="mb-6 w-full">
                <label for="title" class="block text-lg font-medium text-gray-700 mb-2">Title</label>
                <input type="text" name="title" id="title" required
                    value="{{ old('title', $noticeCategory->title) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    placeholder="Enter category title" onkeyup="generateSlug()">
            </div>

            <!-- Title (English) Field -->
            <div class="mb-6 w-full">
                <label for="title_en" class="block text-lg font-medium text-gray-700 mb-2">Title (English)</label>
                <input type="text" name="title_en" id="title_en"
                    value="{{ old('title_en', $noticeCategory->title_en) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    placeholder="Enter category title in English">
            </div>

            <!-- Slug Field -->
            <div class="mb-6 w-full">
                <label for="slug" class="block text-lg font-medium text-gray-700 mb-2">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $noticeCategory->slug) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    placeholder="Auto-generated slug" x-data="{ slug: '{{ old('slug', $noticeCategory->slug) }}' }" x-init="generateSlug()"
                    x-on:titlekeyup="generateSlug()">
                @error('slug')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out">
                Update Category
            </button>
        </form>
    </div>
    @push('scripts')
        <script>
            function generateSlug() {
                const title = document.getElementById('title_en').value;
                let slug = title.toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-') // Replace non-alphanumeric with hyphen
                    .replace(/^-+|-+$/g, '') // Trim hyphens from start/end
                    .replace(/--+/g, '-'); // Replace multiple hyphens with single
                document.getElementById('slug').value = slug || '';
                // Update Alpine.js data if using x-data
                if (window.Alpine) {
                    document.querySelector('[x-data] [id="slug"]')._x_data.slug = slug;
                }
            }

            document.addEventListener('DOMContentLoaded', () => {
                if (document.getElementById('title').value) {
                    generateSlug();
                }
            });

            //slug update
            document.getElementById('title_en').addEventListener('keyup', generateSlug);
        </script>
    @endpush
@endsection
