@extends('layouts.admin') 
@section('title', 'Notice and News List')
@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-700">सूचना सूची (Notice List)</h2>
        <a href="{{ route('notices.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + नयाँ सूचना थप्नुहोस्
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">#</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Title (नेपाली)</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Title (English)</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Category</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Date</th>
                    <th class="px-4 py-3 text-right font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($notices as $notice)
                    <tr>
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $notice->title }}</td>
                        <td class="px-4 py-2">{{ $notice->title_en }}</td>
                        <td class="px-4 py-2">{{ $notice->noticeCategory->title ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $notice->created_at->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 text-right space-x-2">
                            <a href="{{ asset('storage/' . $notice->file_path) }}" target="_blank" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('notices.edit', $notice->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('notices.destroy', $notice->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">No notices found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $notices->links() }} {{-- Pagination links if using paginate() --}}
    </div>
</div>
@endsection
