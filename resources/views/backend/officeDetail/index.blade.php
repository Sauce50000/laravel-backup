@extends('layouts.admin')
@section('title', 'Office Details')
@section('content')

<div class="container mx-auto py-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">Office Details</h2>

        </div>
        <div class="flex justify-between items-center mb-6">

            <a href="{{ route('office-details.create') }}"
                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out shadow-md">
                + Add New
            </a>

            {{-- <label
                class="flex items-center space-x-2 bg-red-200 text-red-800 font-medium py-2 px-4 rounded-lg hover:bg-red-300 transition duration-300 ease-in-out cursor-pointer">
                <input type="checkbox" id="show-deleted" name="show_deleted" class="form-checkbox h-5 w-5 text-red-600"
                    {{ $showDeleted ? 'checked' : '' }} onchange="this.form.submit()">
                <span>Show Deleted Departments</span>
            </label> --}}
        </div>

        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">SN</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Title</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Title (English)</th>
                    <th class="px-4 py-3 text-right font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($officeDetails as $officeDetail)
                    <tr class="bg-white">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $officeDetail->title }}</td>
                        <td class="px-4 py-2">{{ $officeDetail->title_en }}</td>
                        <td class="px-4 py-2 text-right space-x-2">

                            {{-- @if (!$department->deleted_at) --}}
                                <!-- Edit Button -->
                                <div class="group relative inline-block">
                                    <a href="{{ route('office-details.edit', $officeDetail) }}" {{--try: $officeDetail->id --}}
                                        class="text-yellow-600 hover:underline flex items-center space-x-1">
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
                                    <form action="{{ route('office-details.destroy', $officeDetail) }}" method="POST" {{--try: $officeDetail->id --}}
                                        onsubmit="return confirm('Are you sure you want to delete this Office Details?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:underline flex items-center space-x-1">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <!-- Tooltip -->
                                        <span
                                            class="absolute hidden group-hover:block -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded whitespace-nowrap">
                                            Delete
                                            <span
                                                class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></span>
                                        </span>
                                    </form>
                                </div>
                            {{-- @else
                                <div class="group relative inline-block">
                                    <form action="{{ route('office-details.restore', $officeDetail->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="text-green-600 hover:underline flex items-center space-x-1">
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
                            @endif --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $officeDetails->links() }}
        </div>
    </div>

    {{-- @push('scripts')
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
    @endpush --}}

@endsection