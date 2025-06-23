@extends('layouts.admin')
@section('title', 'About Us Content')
@section('content')

<div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">About Us Content</h2>
        <a href="{{ route('about-us.create') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            + Add New
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold text-gray-500 uppercase">#</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-500 uppercase">Title (EN)</th>
                    <th class="px-6 py-3 text-right font-semibold text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse($aboutUs as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $item->title }}</td>
                        <td class="px-6 py-4">{{ $item->title_en }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('about-us.edit', $item->id) }}" 
                               class="text-indigo-600 hover:text-indigo-900" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('about-us.destroy', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-900"
                                        onclick="return confirm('Are you sure you want to delete this item?')"
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No About Us content found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($aboutUs->hasPages())
        <div class="mt-4">
            {{ $aboutUs->links() }}
        </div>
    @endif
</div>

@endsection
