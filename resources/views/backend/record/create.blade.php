@extends('layouts.admin')
@section('title', 'Create Record')
@section('content')

    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Create Record</h1>

        <form action="{{ route('records.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-8 sm:p-6 rounded-xl shadow-lg max-w-3xl mx-auto space-y-6">
            @csrf

            <!-- Title Field -->
            <div>
                <label for="title" class="block text-lg font-medium text-gray-700 mb-2">Title</label>
                <input type="text" name="title" id="title" required value="{{ old('title') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                    placeholder="Enter record title in Nepali">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title (English) Field -->
            <div>
                <label for="title_en" class="block text-lg font-medium text-gray-700 mb-2">Title (English)</label>
                <input type="text" name="title_en" id="title_en" value="{{ old('title_en') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                    placeholder="Enter record title in English" onkeyup="generateSlug()">
                @error('title_en')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>



            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <label for="publisher" class="block text-lg font-medium text-gray-700 mb-2">Publisher</label>
                        <input type="text" name="publisher" id="publisher" value="{{ old('publisher') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                            placeholder="Enter publisher name" onkeyup="generateSlug()">
                        @error('publisher')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Slug Field -->
                    <div>
                        <label for="slug" class="block text-lg font-medium text-gray-700 mb-2">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                            placeholder="Auto-generated slug" x-data="{ slug: '{{ old('slug') }}' }" x-init="generateSlug()"
                            x-on:titlekeyup="generateSlug()">
                        @error('slug')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Category Dropdown -->
                {{-- <div>
                    <label for="notice_category_id" class="block text-lg font-medium text-gray-700 mb-2">Category</label>
                    <select name="notice_category_id" id="notice_category_id"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-white"
                        required>
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }} ({{ $category->title_en }})</option>
                        @endforeach
                    </select>
                    @error('notice_category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}

                <div x-data="recordForm()" x-init="init()">
                    <!-- Record Type Dropdown -->
                    <div class="mb-4">
                        <label for="record_type_id" class="block text-lg font-medium text-gray-700 mb-2">Type</label>
                        <select x-model="selectedTypeId" id="record_type_id" name="record_type_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-white"
                            required>
                            <option value="">-- Select Type --</option>
                            <template x-for="type in types" :key="type.id">
                                <option :value="type.id" x-text="type.title_en"></option>
                            </template>
                        </select>
                        @error('record_type_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Record Category Dropdown -->
                    <div>
                        <label for="record_category_id"
                            class="block text-lg font-medium text-gray-700 mb-2">Category</label>
                        <select id="record_category_id" name="record_category_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-white"
                            required>
                            <option value="">-- Select Category --</option>
                            <template x-for="category in filteredCategories" :key="category.id">
                                <option :value="category.id" x-text="category.title + ' (' + category.title_en + ')'">
                                </option>
                            </template>
                        </select>
                        @error('record_category_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>



            </div>

            <!-- File Upload -->
            <div class="mb-6">
                <label for="file_path" class="block text-lg font-semibold text-gray-700 mb-2">Upload PDF</label>

                <div
                    class="relative flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition duration-200">

                    <input type="file" name="file_path" id="file_path"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="application/pdf"
                        onchange="updateFileName(this)" required>

                    <div id="file-icon">
                        <i class="fa-solid fa-file-lines text-4xl text-blue-400 mb-2"></i>
                        <p class="text-gray-500">Drag and drop your PDF here or <span
                                class="text-blue-600 font-medium hover:underline">click to upload</span></p>
                    </div>
                    <p id="file-name" class="text-sm text-gray-600 mt-2 hidden">
                        <span id="file-name-text"></span>
                        <i class="fa-solid fa-pen-to-square text-blue-600 font-medium"></i>
                    </p>
                </div>

                @error('file_path')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="w-full sm:w-auto bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-md transform hover:-translate-y-1">
                    Create Record
                </button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            function recordForm() {
                return {
                    selectedTypeId: '',
                    types: @json($types),
                    get filteredCategories() {
                        const type = this.types.find(t => t.id == this.selectedTypeId);
                        return type ? type.categories : [];
                    },
                    init() {
                        // Optionally prefill selectedTypeId based on old value
                        this.selectedTypeId = "{{ old('record_type_id') }}";
                    }
                };
            }
        </script>
    @endpush
@endsection
