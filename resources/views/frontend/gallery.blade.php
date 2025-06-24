@extends('layouts.master')
@section('title', 'Photo Gallery')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-900">फोटो ग्यालरी</h2>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-6 bg-gray-50">
                @forelse ($photoGalleries as $photoGallery)
                    <div
                        class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden transform transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                        <a href="{{ route('photo-gallery.show', $photoGallery->id) }}"
                            class="flex flex-col h-full group">
                            <!-- Thumbnail -->
                            <div class="relative h-48 overflow-hidden">
                                @if ($photoGallery->latestPhoto)
                                    <img src="{{ asset('storage/' . $photoGallery->latestPhoto->image_path) }}"
                                        alt="{{ $photoGallery->album_title }}"
                                        class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105"
                                        loading="lazy">
                                    <!-- Overlay on Hover -->
                                    <div
                                        class="absolute inset-0  group-hover:bg-opacity-30 transition-opacity duration-300 flex items-center justify-center">
                                        <span
                                            class="text-white text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            View Gallery
                                        </span>
                                    </div>
                                @else
                                    <div class="h-full bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-400 text-4xl"><i class="fas fa-image"></i></span>
                                    </div>
                                @endif
                            </div>

                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-2">
                                        {{ $photoGallery->album_title }}
                                    </h3>

                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <span
                                        class="text-xs text-gray-400">{{ $photoGallery->created_at->format('Y-m-d') }}</span>
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 bg-blue-600 text-white text-xs font-medium rounded-full">
                                        {{ $photoGallery->photos_count ?? 0 }} Photos
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="flex flex-col items-center">
                            <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-lg font-medium text-gray-600">No Photo Galleries Found</span>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($photoGalleries->hasPages())
                <div class="p-6 bg-gray-50 border-t border-gray-100">
                    {{ $photoGalleries->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
    </div>
@endsection
