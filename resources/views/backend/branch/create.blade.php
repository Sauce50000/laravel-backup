@extends('layouts.admin')
@section('title', 'Create Branch')
@section('content')


    <div class="container mx-auto py-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">{{ isset($edit) ? 'Edit' : 'Create' }} Positon </h2>
        </div>

        <form action="{{ isset($edit) ? route('branches.update', $branch->id) : route('branches.store') }}" method="POST"
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
                        value="{{ old('title', $branch->title ?? '') }}">

                </div>
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700">Title English</label>
                    <input type="text" name="title_en" id="title_en"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                        value="{{ old('title_en', $branch->title_en ?? '') }}">
                </div>
            </div>
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
