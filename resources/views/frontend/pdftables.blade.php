@extends('layouts.master')
@section('title', $category->title)
@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar: Categories -->
        <aside class="lg:col-span-1 bg-gray-50 p-6 rounded-lg shadow">
            <ul>
                {{-- navlegalDocumentsCategories for legal documents --}}
                @forelse ($sidebarCategories as $cat)
                    <li>
                        <a href="
                        @if ($type === 'notice') {{ route('notice.showpdfList', $cat->slug) }}
                        @elseif ($type === 'legal')
                            {{ route('document.showpdfList', ['slug' => $cat->slug, 'id' => $cat->record_type_id]) }} @endif
                        "
                            class="block px-4 py-2 text-md hover:bg-gray-200 transition-colors rounded
                            {{ $cat->id === $category->id ? 'bg-blue-200 text-blue-800 text-bold' : 'text-gray-800' }}">
                            {{ $cat->title }}
                        </a>
                    </li>
                @empty
                    <li>
                        <span class="block px-4 py-2 text-gray-500">No categories found.</span>
                    </li>
                @endforelse
            </ul>
        </aside>
        <!-- Main Content: Table -->
        <section class="lg:col-span-3 prose max-w-none bg-white p-8 rounded-lg shadow">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">#</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">शिर्षक</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">प्रकाशक</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">प्रकाशित मिति</th>
                            <th class="px-4 py-3 text-right font-semibold text-gray-700">कार्यहरू</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($items as $item)
                            <tr class="{{ $item->deleted_at ? 'bg-red-100' : 'bg-white' }}">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $item->title }}</td>
                                <td class="px-4 py-2">{{ $item->publisher }}</td>
                                <td class="px-4 py-2">{{ $item->created_at->format('Y-m-d') }}</td>
                                <td class="px-4 py-2 text-right">
                                    <a href="{{ route('pdf.view', ['category' => $category->slug, 'slug' => $item->slug]) }}"
                                        class="inline-flex items-center bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition-colors duration-150 text-sm">
                                        View
                                        <i class="fa-solid fa-arrow-up-right-from-square ml-1"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">No notices found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
