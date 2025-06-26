@extends('layouts.admin')
@section('title', __('Create New Employee'))
@section('content')

    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            {{ isset($employee) ? 'Edit Employee' : __('Create New Employee') }}
            {{-- Create New Employee --}}
        </h1>

        <form action="{{ isset($edit) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST"
            enctype="multipart/form-data" class="bg-white p-8 sm:p-6 rounded-xl shadow-lg max-w-3xl mx-auto space-y-6">
            @csrf
            @method(isset($employee) ? 'PUT' : 'POST')

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:gap-8">
                <!-- Name Field -->
                <div class="space-y-2">
                    <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" id="name" required
                        value="{{ old('name', $employee->name ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                        placeholder="Enter Employee Name in Nepali">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Name (English) Field -->
                <div class="space-y-2">
                    <label for="name_en" class="block text-lg font-medium text-gray-700 mb-2">Name (English)</label>
                    <input type="text" name="name_en" id="name_en"
                        value="{{ old('name_en', $employee->name_en ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                        placeholder="Enter employee name in English">
                    @error('name_en')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:gap-8">

                <div class="space-y-2">
                    <label for="email" class="block text-lg font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $employee->email ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                        placeholder="name@example.com">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="phone" class="block text-lg font-medium text-gray-700 mb-2">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $employee->phone ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                        placeholder="Enter 10-digit phone number" maxlength="10" pattern="\d{10}" required>
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p id="phone-error" class="text-red-500 text-sm mt-1 hidden">Phone number must be exactly 10 digits.</p>
                </div>

            </div>

            <div>
                <label for="post_id" class="block text-sm font-medium text-gray-700">Post</label>
                <select name="post_id" id="post_id" required class="w-full border-gray-300 rounded-md shadow-sm p-2">
                    <option value="">Select Post</option>
                    @foreach ($posts as $post)
                        <option value="{{ $post->id }}"
                            {{ old('post_id', $employee->post_id ?? '') == $post->id ? 'selected' : '' }}>
                            {{ $post->title }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
                <select name="department_id" id="department_id" required
                    class="w-full border-gray-300 rounded-md shadow-sm p-2">
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}"
                            {{ old('department_id', $employee->department_id ?? '') == $department->id ? 'selected' : '' }}>
                            {{ $department->title }}</option>
                    @endforeach
                    <option value="">none</option>
                </select>
            </div>
            <div>
                <label for="branch_id" class="block text-sm font-medium text-gray-700">Branch</label>
                <select name="branch_id" id="branch_id" class="w-full border-gray-300 rounded-md shadow-sm p-2">
                    <option value="">Select Branch</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}"
                            {{ old('branch_id', $employee->branch_id ?? '') == $branch->id ? 'selected' : '' }}>
                            {{ $branch->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label
                    class="w-1/5 flex items-center space-x-2  font-medium py-2 px-4 rounded-lg hover:bg-sky-300 transition duration-300 ease-in-out cursor-pointer">
                    <input type="checkbox" id="is_active" name="is_active" class="form-checkbox h-5 w-5 text-black"
                        {{ isset($employee) && $employee->is_active ? 'checked' : '' }}>
                    <span>Active</span>
                </label>
            </div>

            <!-- Employee Image Upload -->
            <div class="mb-6">

                <label for="image" class="block text-lg font-semibold text-gray-700 mb-2">Employee Photo</label>

                <div
                    class="relative flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition duration-200">

                    <input type="file" name="image" id="image"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*"
                        onchange="previewImage(this)">

                    <div id="image-icon">
                        <i class="fa-solid fa-user-circle text-4xl text-blue-400 mb-2"></i>
                        <p class="text-gray-500">Drag and drop or <span
                                class="text-blue-600 font-medium hover:underline">click to upload</span></p>
                    </div>

                    <div id="image-preview" class="mt-3 hidden">
                        <img src="#" alt="Preview" class="h-24 object-cover rounded shadow mx-auto">
                    </div>
                </div>
                @if (isset($employee) && $employee->image_path)
                    <div class="flex flex-col items-center mb-4">
                        <span class="block text-gray-700 font-medium mb-2">Current Image:</span>
                        <img src="{{ asset('storage/' . $employee->image_path) }}" alt="Photo"
                            class="object-cover rounded-lg shadow border border-gray-200 w-32 h-32"
                            style="max-width: 128px; max-height: 128px;">
                    </div>
                @endif
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="w-full sm:w-auto bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-md transform hover:-translate-y-1">
                    {{ isset($employee) ? 'Update' : __('Create') }}
                </button>
            </div>
        </form>

    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const phoneInput = document.getElementById('phone');
                const phoneError = document.getElementById('phone-error');
                phoneInput.addEventListener('input', function() {
                    // Remove non-digit characters
                    this.value = this.value.replace(/\D/g, '');
                    if (this.value.length === 10) {
                        phoneError.classList.add('hidden');
                    } else {
                        phoneError.classList.remove('hidden');
                    }
                });
            });

            function previewImage(input) {
                const file = input.files[0];
                const preview = document.getElementById('image-preview');
                const img = preview.querySelector('img');

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        img.src = e.target.result;
                        preview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.classList.add('hidden');
                }
            }
        </script>
    @endpush



@endsection
