@extends('layouts.master')
@section('title', $photoGallery->album_title)

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-900">{{ $photoGallery->album_title }}</h2>
        <a href="{{ route('photo-gallery') }}"
           class="text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
            ← Back to Galleries
        </a>
    </div>

    <!-- Photo Grid -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-6 bg-gray-50">
            @forelse ($photos as $photo)
                <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden transform transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <a href="{{ asset('storage/' . $photo->image_path) }}"
                       class="block group"
                       data-lightbox="gallery"
                       data-title="{{ $photo->title ?? $photoGallery->album_title }}">
                        <!-- Image -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $photo->image_path) }}"
                                 alt="{{ $photo->title ?? $photoGallery->album_title }}"
                                 class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105"
                                 loading="lazy">
                            <!-- Overlay on Hover -->
                            <div class="absolute inset-0group-hover:bg-opacity-30 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    View Image
                                </span>
                            </div>
                        </div>
                        <!-- Caption -->
                        <div class="p-4">
                            <p class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{ $photo->title ?? 'Untitled' }}
                            </p>
                            <span class="text-xs text-gray-400">{{ $photo->created_at->format('Y-m-d') }}</span>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="flex flex-col items-center">
                        <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-lg font-medium text-gray-600">No Photos Found in this Gallery</span>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($photos->hasPages())
            <div class="p-6 bg-gray-50 border-t border-gray-100">
                {{ $photos->links('vendor.pagination.tailwind') }}
            </div>
        @endif
    </div>
</div>

<!-- Lightbox CSS and JS (Optional) -->
@push('scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'disableScrolling': true
        });
    </script>
@endpush
@endsection