@extends('layouts.admin')
@section('title', 'Create Postion')
@section('content')
    @push('head')
        <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    @endpush

    <div class="container mx-auto py-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">{{ isset($edit) ? 'Edit' : 'Create' }} Positon </h2>
        </div>

        <form action="{{ isset($edit) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST"
            class="space-y-4">
            @csrf
            @if (isset($edit))
                @method('PUT')
            @endif
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                        value="{{ old('title', $post->title ?? '') }}">

                </div>
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700">Title English</label>
                    <input type="text" name="title_en" id="title_en"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                        value="{{ old('title_en', $post->title_en ?? '') }}">
                </div>
            </div>
            <div>
                <label
                    class="w-1/5 flex items-center space-x-2  font-medium py-2 px-4 rounded-lg hover:bg-sky-300 transition duration-300 ease-in-out cursor-pointer">
                    <input type="checkbox" id="is_unique" name="is_unique" class="form-checkbox h-5 w-5 text-black"
                        {{ isset($post) && $post->is_unique ? 'checked' : '' }} {{-- onchange="this.form.submit()" --}}>
                    <span>Make unique post</span>
                </label>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                    Save
                </button>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @push('scripts')
        {{-- <script>
            document.getElementById('is_unique').addEventListener('change', function() {
                let url = new URL(window.location.href);
                if (this.checked) {
                    url.searchParams.set('is_unique', 1);
                } else {
                    url.searchParams.delete('is_unique');
                }
                window.location.href = url.toString();
            });
        </script> --}}
    @endpush
@endsection
