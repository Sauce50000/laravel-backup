@extends('layouts.master')
@section('title', 'Contact Us')
@section('content')

<div class="container mx-auto px-4 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-xl shadow border p-8 flex flex-col gap-6">
            <div>
                <h2 class="text-primary text-2xl font-bold mb-1 text-blue-900">सम्पर्क जानकारी</h2>
                <p class="text-gray-500 text-sm">यी मध्ये कुनै पनि माध्यमबाट हामीलाई सम्पर्क गर्नुहोस्</p>
            </div>
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <svg class="text-primary mt-1 h-6 w-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect width="16" height="20" x="4" y="2" rx="2" ry="2"></rect>
                        <path d="M9 22v-4h6v4"></path>
                        <path d="M8 6h.01"></path>
                        <path d="M16 6h.01"></path>
                        <path d="M12 6h.01"></path>
                        <path d="M12 10h.01"></path>
                        <path d="M12 14h.01"></path>
                        <path d="M16 10h.01"></path>
                        <path d="M16 14h.01"></path>
                        <path d="M8 10h.01"></path>
                        <path d="M8 14h.01"></path>
                    </svg>
                    <div>
                        <h3 class="font-medium">कार्यालय</h3>
                        <p class="text-gray-500">भूमि व्यवस्था, कृषि तथा सहकारी मन्त्रालय</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <svg class="text-primary mt-1 h-6 w-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <div>
                        <h3 class="font-medium">ठेगाना</h3>
                        <p class="text-gray-500">वीरेन्द्रनगर,सुर्खेत, नेपाल</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <svg class="text-primary mt-1 h-6 w-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <div>
                        <h3 class="font-medium">फोन नं.</h3>
                        <p class="text-gray-500">०८३-५२००८२</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <svg class="text-primary mt-1 h-6 w-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                    <div>
                        <h3 class="font-medium">इमेल</h3>
                        <p class="text-gray-500 break-words">info.molmac@karnali.gov.np, molmacp६@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-xl overflow-hidden shadow border h-[400px]">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3256.675256007025!2d81.625772!3d28.600424!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39a285c0914a316f%3A0x9032bc3df7192c52!2sMinistry%20of%20Land%20Management%2C%20Agriculture%20and%20Co-operatives%2C%20Karnali%20Province!5e1!3m2!1sen!2sus!4v1750872178977!5m2!1sen!2sus"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
@endsection
