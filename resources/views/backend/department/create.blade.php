@extends('layouts.admin')
@section('title', 'Create Department')
@section('content')

{{-- <div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-700">Create Department</h2>
    </div>
    <form action="{{ route('departments.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Department Title</label>
                <input type="text" name="title" id="title" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>
            <div>
                <label for="title_en" class="block text-sm font-medium text-gray-700">Title English</label>
                <input type="text" name="title_en" id="title_en"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                Save
            </button>
        </div>
    </form>
</div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/43.1.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            ClassicEditor
                .create(document.querySelector('#description'), {
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                        'insertTable', 'mediaEmbed', 'undo', 'redo'
                    ],
                    placeholder: 'Enter department description...'
                })
                .then(editor => {
                    console.log('Editor initialized', editor);
                })
                .catch(error => {
                    console.error('Error initializing editor', error);
                });
        });
    </script>
@endpush --}}
@endsection