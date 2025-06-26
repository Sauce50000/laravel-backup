@extends('layouts.master')
@section('title', 'Contact Us')
@section('content')

<div class="container mx-auto px-4 py-6">
    {{-- Employee Table --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">#</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">फोटो</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">नाम</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">शाखा</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">पद</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">सम्पर्क</th>
                    
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($employees as $employee)
                    <tr class="bg-white hover:bg-gray-50 transition duration-150 ease-in-out border-b-2 border-gray-200">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">
                            <img src="{{ asset('storage/' . $employee->image_path) }}"
                                 alt="image of {{ $employee->name }}"
                                 class="object-cover rounded shadow"
                                 style="width: 64px; height: 64px;">
                        </td>
                        <td class="px-4 py-2 font-medium text-gray-800">{{ $employee->name }}</td>
                        <td class="px-4 py-2">{{ $employee->branch->title ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $employee->post->title ?? 'N/A' }}</td>
                        <td class="px-4 py-2 flex items-center gap-2">
                            <i class="fa-solid fa-envelope"></i>
                            <span>{{ $employee->email ?? 'N/A' }}</span>
                        </td>
                        <td class="px-4 py-2 flex items-center gap-2">
                            <i class="fa-solid fa-phone"></i>
                            <span>{{ $employee->phone ?? 'N/A' }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">No Employees found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-10">
        {{ $employees->links() }}
    </div>
</div>
@endsection
