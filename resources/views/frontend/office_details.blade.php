@extends('layouts.master')
@section('title', 'Introduction')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <div class="lg:col-span-1 bg-gray-50 p-6 rounded-lg shadow">
            {{-- <h2 class="text-xl font-semibold mb-4 text-gray-700">Offices</h2> --}}
            <ul>
                @foreach ($officeDetails as $od)
                    <li class="">
                        <a 
                            class="block px-3 py-3 rounded hover:bg-blue-100 transition font-medium {{ $od->id === $officeDetail->id ? 'bg-blue-200 text-blue-800 text-bold' : 'text-gray-800' }}" 
                            href="{{route('office-details.showOfficeDetails', $od) }}">
                            {{ $od->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="lg:col-span-3 prose max-w-none bg-white p-8 rounded-lg shadow">
            <h1 class="text-3xl font-bold mb-4">{{ $officeDetail->title }}</h1>
            {!! $officeDetail->description !!}
        </div>
    </div>
@endsection
