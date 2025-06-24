@extends('layouts.master')
@section('title', 'Homepage')
@section('styles')
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> --}}

@endsection
@section('content')
    <div class="my-auto mx-5">

        <!--highlight-->
        <div class="flex flex-col md:flex-row items-center w-full overflow-hidden">
            <!-- Highlight -->
            <h1 class="bg-red-500 text-xl text-white px-5 py-1 whitespace-nowrap w-full md:w-auto text-center md:text-left">
                हाइलाइट
            </h1>

            <!-- Marquee-style scrolling text -->
            <div class="overflow-hidden whitespace-nowrap relative flex-1 bg-gray-100 w-full md:w-auto">
                <marquee behavior="" direction="">
                    <p class="animate-marquee inline-block pl-4">
                        यो वेबसाइट परीक्षणको चरणमा छ। कृपया कुनै समस्या भएमा सम्पर्क गर्नुहोस्।
                    </p>
                </marquee>
            </div>
        </div>

        <div class="text-white flex flex-wrap mt-2">

            <div class="w-full md:w-1/3 lg:w-1/4 ">
                <div class="shadow-md">
                    <!-- Tab Navigation (Custom Styling) -->
                    <div class="flex flex-wrap justify-center" data-tabs-toggle="#quick-tab-content"
                        data-tabs-active-classes="text-white bg-red-500 dark:bg-red-800"
                        data-tabs-inactive-classes="text-white bg-[#004b8e] hover:bg-sky-500 dark:text-white dark:bg-[#004b8e] dark:hover:bg-sky-600 border border-transparent hover:border-white"
                        role="tablist">
                        <button id="annual-plan-tab" type="button" role="tab" aria-controls="annual-plan-content"
                            aria-selected="true" data-tabs-target="#annual-plan-content"
                            class="flex-grow py-2 px-4 transition-colors">
                            वार्षिक विकास कार्यक्रम
                        </button>

                        <button id="news-updates-tab" type="button" role="tab" aria-controls="news-updates-content"
                            aria-selected="false" data-tabs-target="#news-updates-content"
                            class="flex-grow py-2 px-4 transition-colors">
                            सूचना तथा समाचारहरु
                        </button>

                        <button id="circulars-tab" type="button" role="tab" aria-controls="circulars-content"
                            aria-selected="false" data-tabs-target="#circulars-content"
                            class="flex-grow py-2 px-4 transition-colors">
                            परिपत्र/निर्देशन
                        </button>
                    </div>

                    <!-- Tab Contents -->
                    <div id="quick-tab-content">
                        <!-- वार्षिक विकास कार्यक्रम -->
                        <div id="annual-plan-content" class="p-4 border border-gray-300 rounded-b-lg text-black "
                            role="tabpanel" aria-labelledby="annual-plan-tab">
                            <p class="text-sm">
                                This is some placeholder content for the
                                <strong class="font-medium">
                                    वार्षिक विकास कार्यक्रम
                                </strong>
                                section.
                            </p>
                        </div>

                        <!-- सूचना तथा समाचारहरु -->
                        <div id="news-updates-content" class="hidden p-4 border border-gray-300 rounded-b-lg text-black "
                            role="tabpanel" aria-labelledby="news-updates-tab">
                            <p class="text-sm">
                                This is some placeholder content for the
                                <strong class="font-medium">
                                    सूचना तथा समाचारहरु
                                </strong>
                                section.
                            </p>
                        </div>

                        <!-- परिपत्र/निर्देशन -->
                        <div id="circulars-content" class="hidden p-4 border border-gray-300 rounded-b-lg text-black "
                            role="tabpanel" aria-labelledby="circulars-tab">
                            <p class="text-sm">
                                This is some placeholder content for the
                                <strong class="font-medium">
                                    परिपत्र/निर्देशन
                                </strong>
                                section.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-2/3 lg:w-2/4 px-4 ">

                <!--Slider-->
                {{-- <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/socials/11.webp') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/socials/12.webp') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/socials/13.webp') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                            data-carousel-slide-to="2"></button>

                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div> --}}

                <div id="default-carousel" class="relative w-full shadow-mg" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        @foreach ($photos as $index => $photo)
                            <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out"
                                data-carousel-item>
                                <img src="{{ asset('storage/' . $photo->image_path) }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="Gallery Photo">
                            </div>
                        @endforeach
                    </div>

                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        @foreach ($photos as $index => $photo)
                            <button type="button" class="w-3 h-3 rounded-full"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                                data-carousel-slide-to="{{ $index }}"></button>
                        @endforeach
                    </div>

                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>


            </div>
            <div class="w-full lg:w-1/4">
                <div
                    class="space-y-6 bg-gradient-to-br from-blue-50 to-white shadow-md rounded-2xl p-6 border border-gray-100">
                    <!-- Card 1 -->
                    <div class="flex items-center gap-4">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/employee/विनोदकुमार शाह.webp') }}" alt="विनोदकुमार शाह"
                                class="w-20 h-20 object-cover rounded-full border-4 border-blue-200 shadow-md">
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-gray-900">विनोदकुमार शाह</p>
                            <p class="text-blue-600 font-medium">माननीय मन्त्री</p>
                            {{-- <a href="#" class="text-blue-500 hover:text-red-500 text-sm mt-1 inline-block">थप जानकारी</a> --}}
                        </div>
                    </div>

                    <div class="border-t border-dashed border-gray-300"></div>

                    <!-- Card 2 -->
                    <div class="flex items-center gap-4">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/employee/परशुराम रावत.webp') }}" alt="परशुराम रावत"
                                class="w-20 h-20 object-cover rounded-full border-4 border-blue-200 shadow-md">
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-gray-900">परशुराम रावत</p>
                            <p class="text-blue-600 font-medium">का.मु. सचिव</p>
                            {{-- <a href="#" class="text-blue-500 hover:text-red-500 text-sm mt-1 inline-block">थप जानकारी</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row w-full my-5 gap-4">
            <div class="w-full lg:w-2/3 text-white flex flex-col gap-4">

                <!-- Notices Section -->
                <div class="border  border-gray-400 rounded px-4 py-2 shadow-md">
                    <h3 class="text-black m-1 font-bold">सूचना पाटि</h3>
                    <!-- Tab Navigation -->
                    @php
                        $categories = \App\Helpers\NoticeHelper::getNoticeCategories();
                    @endphp

                    <div class="flex flex-wrap justify-center" data-tabs-toggle="#notice-tab"
                        data-tabs-active-classes="text-white bg-red-500 dark:bg-red-800 border border-white"
                        data-tabs-inactive-classes="text-white bg-[#004b8e] hover:bg-sky-500 dark:bg-[#004b8e] dark:hover:bg-sky-600 border border-transparent hover:border-white"
                        role="tablist">
                        @foreach ($categories as $i => $category)
                            <button id="notice-tab-{{ $category->id }}" type="button" role="tab"
                                aria-controls="notice-category-{{ $category->id }}"
                                aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                                data-tabs-target="#notice-category-{{ $category->id }}"
                                class="flex-grow py-2 px-4 transition-colors">
                                {{ $category->title }}
                            </button>
                        @endforeach
                    </div>

                    <!-- Tab Content -->
                    <div id="notice-tab">
                        @foreach ($categories as $i => $category)
                            <div id="notice-category-{{ $category->id }}"
                                class="{{ $i !== 0 ? 'hidden' : '' }} px-4 border border-gray-300 rounded-b-lg text-black dark:text-white dark:border-gray-700"
                                role="tabpanel" aria-labelledby="notice-tab-{{ $category->id }}">
                                <ul class="list-disc list-inside mt-4 space-y-2">
                                    @foreach ($category->notices()->latest()->take(3)->get() as $notice)
                                        <li class="border-b border-gray-300 p-2 mb-2 w-full list-none">
                                            <a href="{{ route('pdf.view', ['category' => $category->slug, 'slug' => $notice->slug]) }}" target="_blank"
                                                class="flex items-center justify-between text-blue-600 hover:text-red-500 hover:bg-gray-50 rounded">
                                                <span class="flex items-center">
                                                    <i class="fas fa-link text-blue-600 mr-2"></i> <!-- Link icon -->
                                                    {{ $notice->title }}
                                                </span>
                                                <i class="fas fa-eye text-blue-600 ml-2"></i> <!-- Eye icon -->
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="flex justify-end my-2">
                                    <a href="{{ route('notice.showpdfList', $category->slug) }}"
                                        class="bg-blue-600 text-white text-xs px-4 py-2 rounded hover:bg-red-500 transition-colors">
                                        थप सामग्री
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Records Section -->
                <div class="border border-gray-400 rounded px-4 py-2 shadow-md">
                    <h3 class="text-black m-1 font-bold">ऐन, नियम, निर्देशिका</h3>
                    <!-- Tab Navigation -->
                    @php
                        $recordCategories = \App\Helpers\NoticeHelper::getRecordCategoriesForLegalDocuments();
                    @endphp

                    <div class="flex flex-wrap justify-center" data-tabs-toggle="#record-tab"
                        data-tabs-active-classes="text-white bg-red-500 dark:bg-red-800 border border-white"
                        data-tabs-inactive-classes="text-white bg-[#004b8e] hover:bg-sky-500 dark:bg-[#004b8e] dark:hover:bg-sky-600 border border-transparent hover:border-white"
                        role="tablist">
                        @foreach ($recordCategories as $i => $recordCategory)
                            <button id="record-tab-{{ $recordCategory->id }}" type="button" role="tab"
                                aria-controls="record-category-{{ $recordCategory->id }}"
                                aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                                data-tabs-target="#record-category-{{ $recordCategory->id }}"
                                class="flex-grow py-2 px-4 transition-colors">
                                {{ $recordCategory->title }}
                            </button>
                        @endforeach
                    </div>

                    <!-- Tab Content -->
                    <div id="record-tab">
                        @foreach ($recordCategories as $i => $recordCategory)
                            <div id="record-category-{{ $recordCategory->id }}"
                                class="{{ $i !== 0 ? 'hidden' : '' }} px-4 border border-gray-300 rounded-b-lg text-black dark:text-white dark:border-gray-700"
                                role="tabpanel" aria-labelledby="record-tab-{{ $recordCategory->id }}">
                                <ul class="list-disc list-inside mt-4 space-y-2">
                                    @foreach ($recordCategory->records()->latest()->take(3)->get() as $record)
                                        <li class="border-b border-gray-300 p-2 mb-2 w-full list-none">
                                            <a href="{{ route('pdf.view', ['category' => $recordCategory->slug, 'slug' => $record->slug]) }}" target="_blank"
                                                class="flex items-center justify-between text-blue-600 hover:text-red-500 hover:bg-gray-50 rounded">
                                                <span class="flex items-center">
                                                    <i class="fas fa-link text-blue-600 mr-2"></i> <!-- Link icon -->
                                                    {{ $record->title }}
                                                </span>
                                                <i class="fas fa-eye text-blue-600 ml-2"></i> <!-- Eye icon -->
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="flex justify-end my-2">
                                    <a href="{{ route('document.showpdfList', ['slug' => $recordCategory->slug, 'id' => $recordCategory->record_type_id]) }}"
                                        class="bg-blue-600 text-white text-xs px-4 py-2 rounded hover:bg-red-500 transition-colors">
                                        थप सामग्री
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="w-full lg:w-1/3 ">
                <div class="max-w-xl mx-auto border border-gray-400 rounded px-4 shadow-md">
                    <h3 class="text-black my-1 font-bold">परिचय</h3>
                    <div id="collapseText" class="overflow-hidden transition-all duration-300 max-h-18">
                        <p class="text-gray-800">
                            वि.स. २०६२/६३ को जन आन्दोलनले संबैधानिक राजतन्त्रलाई विस्थापित गरी मुलुक लोकतान्त्रिक
                            गणतन्त्रात्मक शासन व्यवस्थामा रूपान्तरण भएको संविधान सभाबाट निर्मित संविधानले कानुनी रूपमा
                            मुलुकलाई सङ्घीय संरचनामा लगेकोले सात वटा प्रदेशहरू कायम रहन गएको सन्दर्भमा प्रत्येक प्रदेशमा
                            सातै वटा मन्त्रालयहरू कायम रहने व्यवस्था अनुसार यो मन्त्रालयको स्थापना मिति २०७४/१०/२२ गते भएको
                            हो।

                            प्रदेशको आर्थिक, सामाजिक तथा कृषि क्षेत्रको विकासमा सहकारी क्षेत्रलाई परिचालन गरी भूमिको
                            प्रकृतिको आधारमा उपयोग गरी गर्ने नीति लिई कृषि एवं पशुपन्छीजन्य उत्पादन एवं व्यापारमा
                            यान्त्रिकीकरण, व्यावसयिकीकरण, बजारीकरण र आधुनिकीकरणका माध्यमबाट प्रतिस्पर्धात्मक अवस्थाको सृजना
                            गरी यस क्षेत्रको रुपान्तरण गर्दै रोजगारीको अवसर सृजना गर्ने लक्ष्यका साथ भूमि व्यवस्था, कृषि तथा
                            सहकारी मन्त्रालयको स्थापना भएको हो ।

                            संविधानको अनुसूचीमा व्यवस्था भएका सङ्घ र प्रदेशको साझा अधिकार¸ सङ्घ¸ प्रदेश र स्थानीय तहको साझा
                            अधिकार र प्रदेशको एकल अधिकार क्षेत्रका कृषि, पशुपन्छी तथा सहकारी संग सम्बन्धित विषयमा नीति
                            निर्माण गर्ने केन्द्र सरकार र स्थानिय तह बिच समन्वय र सहकार्य गर्दै प्रदेश सम्बृद्धिका लागि
                            व्यवसायीकिकरण र आधुनिकिकरण मा जोड दिने कृषि क्षेत्रको विकास र विस्तार गरी नयाँ रोजगारीको अवसर
                            सृजना गर्ने¸ कृषि तथा पशुपन्छीको दिगो व्यवस्थापन गरि आत्मनिर्भर कृषिमा जोड दिनु आयात प्रतिस्थापन
                            तथा निर्यात प्रवर्द्धन गर्नु समेत यस मन्त्रालयको कार्यक्षेत्र भित्र पर्दछन ।
                        </p>
                    </div>
                    <div class="text-right">
                        <button id="toggleBtn" class="mt-2 text-blue-600 hover:underline focus:outline-none">
                            थप पढ्नुहोस्
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!--विद्य‍ुतीय सेवाहरु-->
        <div class="bg-blue-50 my-5">
            <h1 class="text-3xl font-bold text-center underline pt-5">विद्य‍ुतीय सेवाहरु</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4  p-4">

                <div class="bg-white text-black p-6 rounded-lg shadow hover:shadow-2xl transition-shadow duration-600">
                    <a href="#" class="flex flex-col items-center">
                        <div class="bg-blue-200 rounded-full h-19 w-19 flex items-center justify-center">
                            <i class="fa-solid fa-clipboard-list text-3xl text-blue-500"></i>
                        </div>
                        <h2 class="text-xl hover:text-red-500 my-2">अनलाइन अपोइन्टमेन्ट</h2>
                        <p class="text-center font-normal">
                            माननीय मन्त्री ज्यु र सचिव ज्युसँग भेटघाटको लागि अनलाइन अपोइन्टमेन्ट प्रणाली ।
                        </p>
                    </a>
                </div>
                <div class="bg-white text-black p-6 rounded-lg shadow hover:shadow-2xl transition-shadow duration-600">
                    <a href="#" class="flex flex-col items-center">
                        <div class="bg-blue-200 rounded-full h-20 w-20 flex items-center justify-center">
                            <i class="fa-solid fa-comment text-3xl text-blue-500"></i>
                        </div>
                        <h2 class="text-xl hover:text-red-500 my-2">गुनासो व्यवस्थापन</h2>
                        <p class="text-center font-normal">मन्त्रालयका गुनासो र समस्याहरू समाधान गर्न द्रुत र
                            प्रभावकारी
                            समाधान
                            ।</p>
                    </a>
                </div>
                <div class="bg-white text-black p-6 rounded-lg shadow hover:shadow-2xl transition-shadow duration-600">
                    <a href="#" class="flex flex-col items-center">
                        <div class="bg-blue-200 rounded-full h-20 w-20 flex items-center justify-center">
                            <i class="fa-solid fa-globe text-3xl text-blue-500"></i>
                        </div>
                        <h2 class="text-xl hover:text-red-500 my-2">मातहतका वेवसाईटहरु</h2>
                        <p class="text-center font-normal">सबै मातहतका निकायहरुको वेवसाइटका लागि एकीकृत वेवसाईट
                            व्यवस्थापन
                            प्रणाली ।</p>
                    </a>
                </div>
                <div class="bg-white text-black p-6 rounded-lg shadow hover:shadow-2xl transition-shadow duration-600">
                    <a href="#" class="flex flex-col items-center">
                        <div class="bg-blue-200 rounded-full h-20 w-20 flex items-center justify-center">
                            <i class="fa-solid fa-cart-shopping text-3xl text-blue-500"></i>
                        </div>
                        <h2 class="text-xl hover:text-red-500 my-2">कर्णाली अर्गानिक बजार</h2>
                        <p class="text-center font-normal">कर्णाली प्रदेशका सम्पूर्ण किसानहरुक लागि ई-कमर्स पोर्टल ।
                        </p>
                    </a>
                </div>
                <div class="bg-white text-black p-6 rounded-lg shadow hover:shadow-2xl transition-shadow duration-600">
                    <a href="#" class="flex flex-col items-center">
                        <div class="bg-blue-200 rounded-full h-20 w-20 flex items-center justify-center">
                            <i class="fa-solid fa-chalkboard-user text-3xl text-blue-500"></i>
                        </div>
                        <h2 class="text-xl hover:text-red-500 my-2">ROASTER MIS प्रणाली</h2>
                        <p class="text-center font-normal">सम्पूर्ण प्रशिक्षण संचालन तथा व्यवस्थापन प्रणाली ।</p>
                    </a>
                </div>

            </div>
        </div>

        <!--Photo Gallery-->
        <div class="my-5">
            {{-- 
            <h1 class="text-3xl font-bold text-center underline pt-5">फोटो ग्यालेरी</h1>
            <h1>SLIDER WILL BE MADE HERE</h1>
             --}}

            <div class="grid sm:grid-cols-3 lg:grid-cols-6 gap-1">
                <div class="bg-[#008cba] hover:bg-red-600 text-white py-6 shadow">
                    <a href="#" class="flex flex-col items-center">
                        <h2 class="text-4xl font-bold"><i class="fa-solid fa-newspaper"></i></h2>
                        <p class="my-2">सूचना तथा समाचार</p>
                    </a>
                </div>
                <div class="bg-[#008cba] hover:bg-red-600 text-white py-6 shadow">
                    <a href="#" class="flex flex-col items-center">
                        <h2 class="text-4xl font-bold"><i class="fa-solid fa-users"></i></h2>
                        <p class="my-2">कर्मचारी विवरण</p>
                    </a>
                </div>
                <div class="bg-[#008cba] hover:bg-red-600 text-white py-6 shadow">
                    <a href="#" class="flex flex-col items-center">
                        <h2 class="text-4xl font-bold"><i class="fa-solid fa-link"></i></h2>
                        <p class="my-2">महत्त्वपूर्ण लिङ्क</p>
                    </a>
                </div>
                <div class="bg-[#008cba] hover:bg-red-600 text-white py-6 shadow">
                    <a href="#" class="flex flex-col items-center">
                        <h2 class="text-4xl font-bold"><i class="fa-solid fa-map"></i></h2>
                        <p class="my-2">सम्पर्क</p>
                    </a>
                </div>
                <div class="bg-[#008cba] hover:bg-red-600 text-white py-6 shadow">
                    <a href="#" class="flex flex-col items-center">
                        <h2 class="text-4xl font-bold"><i class="fa-solid fa-network-wired"></i></h2>
                        <p class="my-2">साईट म्याप</p>
                    </a>
                </div>
                <div class="bg-[#008cba] hover:bg-red-600 text-white py-6 shadow">
                    <a href="#" class="flex flex-col items-center">
                        <h2 class="text-4xl font-bold"><i class="fa-solid fa-play"></i></h2>
                        <p class="my-2">अडियो ग्यालरी</p>
                    </a>
                </div>
                <div class="bg-[#008cba] hover:bg-red-600 text-white py-6 shadow">
                    <a href="#" class="flex flex-col items-center">
                        <h2 class="text-4xl font-bold"><i class="fa-solid fa-layer-group"></i></h2>
                        <p class="my-2">फोटो ग्यालरी</p>
                    </a>
                </div>
                <div class="bg-[#008cba] hover:bg-red-600 text-white py-6 shadow">
                    <a href="#" class="flex flex-col items-center">
                        <h2 class="text-4xl font-bold"><i class="fa-solid fa-video"></i></h2>
                        <p class="my-2">भिडियो ग्यालरी</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <script>
        const collapseText = document.getElementById('collapseText');
        const toggleBtn = document.getElementById('toggleBtn');
        let expanded = false;

        toggleBtn.addEventListener('click', () => {
            expanded = !expanded;
            // collapseText.classList.toggle('max-h-20');
            collapseText.classList.toggle('max-h-[1000px]');
            toggleBtn.textContent = expanded ? 'संक्षिप्त रुपमा हेर्नुहोस्' : 'थप पढ्नुहोस्';
        });
    </script>
@endsection
