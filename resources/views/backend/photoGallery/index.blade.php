@extends('layouts.admin')
@section('title', 'Photo Gallery List')
@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">फोटो ग्यालरी सूची (Photo Gallery List)</h2>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-2">
            <!-- Styled Button at Top Left -->
            <a href="{{ route('photos-galleries.create') }}"
                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out shadow-md">
                + Add New Photo Gallery
            </a>


        </div>
        <!-- Checkbox for Show Deleted Categories -->
        <div class="flex items-center justify-end mb-2">
            <label class="flex items-center space-x-2 text-red-800 font-medium">
                <input type="checkbox" id="show-deleted" name="show_deleted" class="form-checkbox h-5 w-5 text-red-600"
                    {{ $showDeleted ? 'checked' : '' }}>
                <span class="text-xs">Show Deleted Photo Galleries</span>
            </label>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            {{-- 
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">SN</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Title (नेपाली)</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Title (English)</th>
                        
                        <th class="px-4 py-3 text-right font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($notices as $notice)
                        <tr class="{{ $notice->deleted_at ? 'bg-red-100' : 'bg-white' }}">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $notice->title }}</td>
                            <td class="px-4 py-2">{{ $notice->title_en }}</td>
                            <td class="px-4 py-2">{{ $notice->noticeCategory->title ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $notice->created_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-2 text-right ">
                                <div class="px-2 space-x-2">
                                    @if (!$notice->deleted_at)
                                        <div class="group relative inline-block">
                                            <a href="{{ asset('storage/' . $notice->file_path) }}" target="_blank"
                                                class="text-blue-400 hover:underline hover:text-blue-600">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <span
                                                class="absolute hidden group-hover:block -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded whitespace-nowrap">
                                                View
                                                <span
                                                    class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></span>
                                            </span>
                                        </div>
                                        <div class="group relative inline-block">
                                            <a href="{{ route('notices.edit', $notice->id) }}"
                                                class="text-yellow-400 hover:underline hover:text-yellow-700"><i
                                                    class="fas fa-edit"></i></a>
                                            <span
                                                class="absolute hidden group-hover:block -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded whitespace-nowrap">
                                                Edit
                                                <span
                                                    class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></span>
                                            </span>
                                        </div>
                                        <div class="group relative inline-block">
                                            <form action="{{ route('notices.destroy', $notice->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-400 hover:text-red-700 hover:underline flex items-center space-x-1"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <span
                                                    class="absolute hidden group-hover:block -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded whitespace-nowrap">
                                                    Delete
                                                    <span
                                                        class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></span>
                                                </span>
                                            </form>
                                        </div>
                                    @else
                                        <div class="group relative inline-block">
                                            <form action="{{ route('notices.restore', $notice->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="text-green-400 hover:underline hover:text-green-600">
                                                    <i class="fas fa-trash-restore"></i>
                                                </button>
                                                <span
                                                    class="absolute hidden group-hover:block -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded whitespace-nowrap">
                                                    Restore
                                                    <span
                                                        class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></span>
                                                </span>
                                            </form>
                                        </div>
                                        <div class="group relative inline-block">
                                            <form action="{{ route('notices.forceDelete', $notice->id) }}" method="POST"
                                                class="inline" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-400 hover:underline hover:text-red-600">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <span
                                                    class="absolute hidden group-hover:block -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded whitespace-nowrap">
                                                    Permanently Delete
                                                    <span
                                                        class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></span>
                                                </span>
                                            </form>

                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">No notices found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table> --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4 bg-gray-50">
                @forelse ($photoGalleries as $photoGallery)
                    <div
                        class="bg-white rounded-lg shadow border transform transition-all duration-300 hover:scale-[1.02] hover:border-blue-400 flex flex-col overflow-hidden">
                        <a href="{{ route('photos-galleries.edit', $photoGallery) }}"
                            class="flex flex-col h-full">
                            {{-- Thumbnail --}}
                            <div class="h-48 bg-gray-200 flex items-center justify-center overflow-hidden">
                                @if ($photoGallery->latestPhoto)
                                    <img src="{{ asset('storage/' . $photoGallery->latestPhoto->image_path) }}"
                                        alt="Gallery Thumbnail" class="object-cover w-full h-full">
                                @else
                                    <span class="text-gray-400 text-4xl"><i class="fas fa-image"></i></span>
                                @endif
                            </div>
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2 truncate">
                                        {{ $photoGallery->album_title }}
                                    </h3>
                                    {{-- <p class="text-sm text-gray-500">{{ Str::limit($photoGallery->description, 60) }}</p> --}}
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <span
                                        class="text-xs text-gray-400">{{ $photoGallery->created_at->format('Y-m-d') }}</span>
                                    <span
                                        class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded">
                                        {{ $photoGallery->photos_count ?? 0 }} Photos
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <span class="text-sm text-gray-600">No Photo Galleries found</span>
                    </div>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $photoGalleries->links() }}
            </div>
        </div>

        @push('scripts')
            <script>
                document.getElementById('show-deleted').addEventListener('change', function() {
                    let url = new URL(window.location.href);
                    if (this.checked) {
                        url.searchParams.set('show_deleted', 1);
                    } else {
                        url.searchParams.delete('show_deleted');
                    }
                    window.location.href = url.toString();
                });
            </script>
        @endpush
    @endsection
