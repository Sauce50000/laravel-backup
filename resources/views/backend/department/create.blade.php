@extends('layouts.admin')
@section('title', 'Create Department')
@section('content')
    @push('head')
        <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    @endpush

    <div class="container mx-auto py-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">Create Department</h2>
        </div>

        <form action="{{ isset($edit) ? route('departments.update', $department->id) : route('departments.store') }}"
            method="POST" class="space-y-4">
            @csrf
            @if (isset($edit))
                @method('PUT')
            @endif
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Department Title</label>
                    <input type="text" name="title" id="title" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                        value="{{ old('title', $department->title ?? '') }}">

                </div>
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700">Title English</label>
                    <input type="text" name="title_en" id="title_en"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                        value="{{ old('title_en', $department->title_en ?? '') }}">
                </div>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <div id="description"></div>
                <input type="hidden" name="description" id="description-hidden">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                    Save
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>
        <script>
            var quill = new Quill('#description', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, 3, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        ['link', 'blockquote'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'align': []
                        }],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'font': []
                        }]
                    ]
                },
                placeholder: 'Enter department description...'
            });
            // Sync Quill content to textarea for form submission
            document.querySelector('form').onsubmit = function() {
                document.querySelector('#description-hidden').value = quill.root.innerHTML;
            };
            @if (isset($edit))
                quill.root.innerHTML = {!! json_encode($department->description) !!};
            @endif
        </script>
    @endpush
@endsection
