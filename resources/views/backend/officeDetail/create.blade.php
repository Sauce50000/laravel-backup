@extends('layouts.admin')
@section('title', isset($officeDetail) ? 'Edit Office Detail' : 'Create Office Detail')
@section('content')

    @push('head')
        <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    @endpush

    <div class="container mx-auto py-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">{{ isset($edit) ? 'Edit ' : 'Create ' }} Office Detail</h2>
        </div>

        <form action="{{ isset($edit) ? route('office-details.update', $officeDetail->id) : route('office-details.store') }}"
            method="POST" class="space-y-4">
            @csrf
            @if (isset($edit))
                @method('PUT')
            @endif
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                        value="{{ old('title', $officeDetail->title ?? '') }}">

                </div>
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700">Title English</label>
                    <input type="text" name="title_en" id="title_en"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                        value="{{ old('title_en', $officeDetail->title_en ?? '') }}">
                </div>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <div id="description"></div>
                <input type="hidden" name="description" id="description-hidden">
            </div>
            <div>
                <label for="description_en" class="block text-sm font-medium text-gray-700">Description English</label>
                <div id="description_en"></div>
                <input type="hidden" name="description_en" id="description_en-hidden">
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
            // Initialize first Quill editor (description)
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
                placeholder: 'Enter description...'
            });

            // Initialize second Quill editor (description_en)
            var quill_en = new Quill('#description_en', {
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
                placeholder: 'Enter English description...'
            });

            // Sync Quill content to hidden inputs for form submission
            document.querySelector('form').onsubmit = function() {
                document.querySelector('#description-hidden').value = quill.root.innerHTML;
                document.querySelector('#description_en-hidden').value = quill_en.root.innerHTML;
            };

            @if (isset($edit))
                quill.root.innerHTML = {!! json_encode($officeDetail->description) !!};
                quill_en.root.innerHTML = {!! json_encode($officeDetail->description_en) !!};
            @endif
        </script>
    @endpush

@endsection
