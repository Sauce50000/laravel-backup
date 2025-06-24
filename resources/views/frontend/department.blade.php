@extends('layouts.master')
@section('title', 'Divison')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <div class="lg:col-span-1 bg-gray-50 p-6 rounded-lg shadow">
            {{-- <h2 class="text-xl font-semibold mb-4 text-gray-700">Offices</h2> --}}
            <ul>
                @foreach ($departments as $d)
                    <li class="">
                        <a class="block px-3 py-3 rounded hover:bg-blue-100 transition font-medium {{ $d->id === $department->id ? 'bg-blue-200 text-blue-800 text-bold' : 'text-gray-800' }}"
                            href="{{ route('department.showdepartment', $d->slug) }}">
                            {{ $d->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="lg:col-span-3 prose max-w-none bg-white p-8 rounded-lg shadow">
            <h1 class="text-3xl font-bold mb-4">{{ $department->title }}</h1>
            <div>
                {!! $department->description !!}
            </div>
            <h2 class="text-xl font-bold mb-4 text-black underline">कर्मचारीहरु</h2>
            <div class="grid grid-cols-1  md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($employees as $employee)
                    <div class="bg-gray-100 p-4 mb-4 rounded-lg shadow flex flex-col items-center">
                        <img src="{{ asset('storage/' . $employee->image_path) }}"
                            alt="{{ $employee->name }}"
                            class="object-cover w-24 h-24 rounded-full mb-3 border-2 border-blue-200 shadow-sm">
                        <h3 class="text-lg font-semibold text-center">{{ $employee->name }}</h3>
                        <p class="text-gray-700 text-center">{{ $employee->post->title }}</p>
                        <p class="text-gray-700 text-center">{{ $employee->department->title }}</p>
                        <p class="text-gray-600 flex items-center justify-center mt-2">
                            <i class="fa-solid fa-envelope"></i> 
                            <span class="ml-2">{{ $employee->email }}</span>
                        </p>
                        <p class="text-gray-600 flex items-center justify-center mt-1">
                            <i class="fa-solid fa-phone"></i>
                            <span class="ml-2">{{ $employee->phone }}</span>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class="prose max-w-none bg-white p-8 rounded-lg shadow mt-8">

    </div>
@endsection
