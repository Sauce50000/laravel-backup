@extends('layouts.admin')
@section('title', 'NoticeCategory List')

@section('content')
    <div class="container mx-auto py-6">
        <div class="flex justify-between items-center mb-6">
            <!-- Styled Button at Top Left -->
            <a href="{{ route('notice-categories.create') }}"
                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out shadow-md">
                + Add New Category
            </a>

            <!-- Checkbox for Show Deleted Categories -->
            <label
                class="flex items-center space-x-2 bg-red-200 text-red-800 font-medium py-2 px-4 rounded-lg hover:bg-red-300 transition duration-300 ease-in-out cursor-pointer">
                <input type="checkbox" id="show-deleted" name="show_deleted" class="form-checkbox h-5 w-5 text-red-600"
                    {{ $showDeleted ? 'checked' : '' }} onchange="this.form.submit()">
                <span>Show Deleted Categories</span>
            </label>
        </div>

        <table class="w-full text-center border-collapse">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border-b">SN</th>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Title (English)</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($noticeCategories as $index => $category)
                    {{-- <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}"> --}}
                    <tr class="{{ $category->deleted_at ? 'bg-red-300' : ($index % 2 == 0 ? 'bg-white' : 'bg-gray-100') }}">
                        <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->title_en }}</td>
                        <td class="py-2 px-4 border-b flex justify-center space-x-2">
                            <!-- Edit Button -->
                            @if (!$category->deleted_at)
                                <div class="group relative inline-block">

                                    <a href="{{ route('notice-categories.edit', $category->id) }}"
                                        class="bg-amber-500 text-white py-1 px-2 rounded hover:bg-blue-600 transition duration-200 flex items-center space-x-1">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <span
                                        class="absolute hidden group-hover:block -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded whitespace-nowrap">
                                        Edit
                                        <span
                                            class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></span>
                                    </span>

                                </div>

                                <!-- Delete Form -->
                                <div class="group relative inline-block">
                                    <form action="{{ route('notice-categories.destroy', $category->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-900 transition duration-200 flex items-center space-x-1">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <!-- Tooltip -->
                                        <span
                                            class="absolute hidden group-hover:block -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded whitespace-nowrap">
                                            Delete
                                            <!-- Optional tooltip arrow -->
                                            <span
                                                class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></span>
                                        </span>
                                    </form>
                                </div>
                            @else
                                <div class="group relative inline-block">
                                    <form action="{{ route('notice-categories.restore', $category->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="bg-green-500 text-white py-1 px-2 rounded hover:bg-green-700 transition duration-200 flex items-center space-x-1">
                                            <i class="fas fa-trash-restore"></i>
                                        </button>
                                        <!-- Tooltip -->
                                        <span
                                            class="absolute hidden group-hover:block -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded whitespace-nowrap">
                                            Restore
                                            <span
                                                class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></span>
                                        </span>
                                    </form>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $noticeCategories->links() }}
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
