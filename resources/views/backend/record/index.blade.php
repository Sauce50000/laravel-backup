@extends('layouts.admin')
@section('title', 'Records List')
@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">Records List</h2>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-2">
            <!-- Styled Button at Top Left -->
            <a href="{{ route('records.create') }}"
                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out shadow-md">
                + Add New Record
            </a>
        </div>

        <!-- Checkbox for Show Deleted Records -->
        <div class="flex items-center justify-end mb-2">
            <label class="flex items-center space-x-2 text-red-800 font-medium">
                <input type="checkbox" id="show-deleted" name="show_deleted" class="form-checkbox h-5 w-5 text-red-600"
                    {{ $showDeleted ? 'checked' : '' }}>
                <span class="text-xs">Show Deleted Records</span>
            </label>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">SN</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Title (नेपाली)</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Type</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Category</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Date</th>
                        <th class="px-4 py-3 text-right font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($records as $record)
                        <tr class="{{ $record->deleted_at ? 'bg-red-100' : 'bg-white' }}">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $record->title }}</td>

                            <td class="px-4 py-2">
                                {{ $record->type->title ?? 'N/A' }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $record->category->title ?? 'N/A' }}
                            </td>

                            <td class="px-4 py-2">{{ $record->created_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-2 text-right">
                                <div class="px-2 space-x-2">
                                    @if (!$record->deleted_at)
                                        <div class="group relative inline-block">
                                            <a href="{{ $record->file_url ?? '#' }}" target="_blank"
                                                class="text-blue-400 hover:underline hover:text-blue-600 {{ $record->file_url ? '' : 'pointer-events-none opacity-50' }}">
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
                                            <a href="{{ route('records.edit', $record->id) }}"
                                                class="text-yellow-400 hover:underline hover:text-yellow-700">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <span
                                                class="absolute hidden group-hover:block -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded whitespace-nowrap">
                                                Edit
                                                <span
                                                    class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></span>
                                            </span>
                                        </div>
                                        <div class="group relative inline-block">
                                            <form action="{{ route('records.destroy', $record->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-400 hover:text-red-700 hover:underline flex items-center space-x-1"
                                                    onclick="return confirm('Are you sure you want to delete this record?')">
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
                                            <form action="{{ route('records.restore', $record) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
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
                                            <form action="{{ route('records.forceDelete', $record->id) }}" method="POST"
                                                class="inline"
                                                onsubmit="return confirm('Are you sure you want to permanently delete this record?')">
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
                            <td colspan="6" class="text-center py-4 text-gray-500">No records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $records->links() }}
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('show-deleted').addEventListener('change', function() {
                const url = new URL(window.location.href);
                if (this.checked) {
                    url.searchParams.set('show_deleted', '1');
                } else {
                    url.searchParams.delete('show_deleted');
                }
                window.location.href = url.toString();
            });
        </script>
    @endpush
@endsection
