@extends('layouts.master')
@section('title', 'Homepage')
@section('content')
    <div class="my-auto mx-5">

        <!--highlight-->
        <div class="flex items-center w-full overflow-hidden">
            <!-- Highlight -->
            <h1 class="bg-red-500 text-xl text-white px-5 py-1 whitespace-nowrap">
                हाइलाइट
            </h1>

            <!-- Marquee-style scrolling text -->
            <div class="overflow-hidden whitespace-nowrap relative flex-1 bg-gray-100">
                <marquee behavior="" direction="">
                    <p class="animate-marquee inline-block pl-4">
                        यो वेबसाइट परीक्षणको चरणमा छ। कृपया कुनै समस्या भएमा सम्पर्क गर्नुहोस्।
                    </p>
                </marquee>
            </div>
        </div>

        <div class="text-white flex mt-2">
            {{-- w-4/14 --}}
            <div class="w-1/4 bg-amber-200">
                <div class="flex flex-wrap bg-gray-700 justify-center">
                    <button class="flex-grow py-2 bg-[#004b8e] hover:bg-sky-500">
                        <p class="px-4">वार्षिक विकास कार्यक्रम</p>
                    </button>
                    <button class="flex-grow py-2 bg-[#004b8e] hover:bg-sky-500">
                        <p class="px-4">सूचना तथा समाचारहरु</p>
                    </button>
                    <button class="flex-grow py-2 bg-[#004b8e] hover:bg-sky-500">
                        <p class="px-4">परिपत्र/निर्देशन</p>
                    </button>
                </div>
            </div>
            <div class="w-2/4 p-4 bg-amber-700">
            </div>
            <div class="w-1/4 p-4 bg-amber-950">
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
            <h1 class="text-3xl font-bold text-center underline pt-5">फोटो ग्यालेरी</h1>
            <h1>SLIDER WILL BE MADE HERE</h1>

            <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-1">
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
