@extends('layouts.master')
@section('title', $record->title)

@section('content')
    <div class="max-w-9xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- PDF Viewer (Left) -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-md border border-gray-200 p-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-3">{{ $record->title }}</h1>
                <p class="text-gray-600 text-sm mb-4">
                    <span class="font-medium">{{ $categoryModel->title }}</span>
                </p>
                <p class="text-gray-600 text-sm mb-4">
                    <i class="fa-regular fa-calendar-days mr-1"></i>
                    <span class="font-medium">{{ \Carbon\Carbon::parse($record->published_date)->format('Y-m-d') }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $record->publisher }}</span>
                </p>
                <div class="relative w-full h-[800px] mb-4">
                    <iframe src="{{ asset('storage/' . $record->file_path) }}"
                        class="w-full h-full rounded-md border border-gray-300" frameborder="0">
                        This browser does not support PDFs. Please download the PDF to view it:
                        <a href="{{ asset('storage/' . $record->file_path) }}"
                            class="text-blue-600 hover:underline">Download PDF</a>
                    </iframe>
                </div>
                <a href="{{ asset('storage/' . $record->file_path) }}"
                    class="inline-block px-4 py-2 bg-sky-700 text-white text-sm font-medium rounded-md hover:bg-rose-500 transition-colors"
                    download>
                    Download PDF
                </a>
            </div>

            <!-- Related Documents (Right) -->
            <div class="lg:col-span-1">
                @if ($related_docs->count())
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 sticky top-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">सम्बन्धित कागजातहरू</h2>
                        <ul class="space-y-2">
                            @foreach ($related_docs as $doc)
                                <li>
                                    <a href="{{ route('pdf.view', ['category' => $categoryModel->slug, 'slug' => $doc->slug]) }}"
                                        class="block px-3 py-2 text-md text-blue-700 hover:bg-blue-50 hover:text-red-600 rounded-md transition-colors">
                                        {{ $doc->title }}
                                        <p class="text-gray-600 text-sm mb-4">
                                            <i class="fa-regular fa-calendar-days mr-1"></i>
                                            <span
                                                class="font-medium">{{ \Carbon\Carbon::parse($doc->published_date)->format('Y-m-d') }}</span>
                                            <span class="mx-2">|</span>
                                            <span>{{ $doc->publisher }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 sticky top-6">
                        <p class="text-gray-500 text-sm">No related documents found.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
