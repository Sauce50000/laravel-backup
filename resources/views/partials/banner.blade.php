<div class="flex flex-col mx-5">
    <div class="hidden md:block border-b border-gray-400">
        <div class="flex justify-between items-center px-4 py-2 text-sm">
            <div class="flex gap-6">
                <a href="#" class="text-blue-800 hover:text-red-600 border-r border-gray-400 pr-4"><i
                        class="fa-solid fa-network-wired"></i> साइट म्याप</a>
                <a href="#" class="text-blue-800 hover:text-red-600 border-r border-gray-400 pr-4"><i
                        class="fa-solid fa-address-book"></i> टेलिफोन निर्देशिका:</a>
                <a href="tel:023-420022" class="text-blue-800 hover:text-red-600"><i class="fa-solid fa-phone"></i>
                    023-420022</a>
            </div>
            <div class="flex items-center gap-6">
                <a href="#" class="text-blue-800 hover:text-red-600 border-r border-gray-400 pr-4"><i
                        class="fa-solid fa-user"></i> लग इन</a>
                <a href="#"
                    class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700 border-r border-gray-400 pr-4">English</a>
                <div class="flex items-center gap-6">
                    <a href="#" class="text-blue-800 hover:text-red-600 border-r border-gray-400 pr-4">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                    <a href="#" class="text-blue-800 hover:text-red-600 border-r border-gray-400 pr-4">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a href="#" class="text-blue-800 hover:text-red-600 border-r border-gray-400 pr-4">
                        <i class="fas fa-map-marker-alt text-lg"></i>
                    </a>
                    <a href="#" class="text-blue-800 hover:text-red-600">
                        <i class="fas fa-envelope text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col md:flex-row"
        style="background-image: url('{{ asset('images/background/banner_background.jpg') }}');">
        <div class="w-full md:w-1/6 flex justify-center items-center">
            <img src="{{ asset('images/logo/Emblem_of_Nepal.svg') }}" alt="Nepal Emblem" class="w-28">
        </div>
        <div class="w-full md:w-4/6 flex justify-center items-center">
            <div class="text-center">
                <h1 class="text-black font-bold text-base">कर्णाली प्रदेश सरकार</h1>
                <h1 class="text-red-600 text-2xl font-bold">भूमि व्यवस्था, कृषि तथा सहकारी मन्त्रालय</h1>
                <p class="font-bold text-base">वीरेन्द्रनगर,सुर्खेत, नेपाल</p>
                <p class="font-bold text-base">" अर्गानिक कृषिका आधारहरु तयार गरौ, विशिष्टीकृत कृषि, पशुपन्छी तथा सहकारी
                    विकासबाट समृद्ध कर्णाली प्रदेश निर्मार्ण गरौ "</p>
            </div>
        </div>
        <div class="hidden md:flex w-full md:w-1/6">
            <div class="flex flex-col justify-center items-center">
                <img src="{{ asset('images/logo/flag_nepal.gif') }}" alt="Nepal Flag" class="w-21">
                <div id="date"
                    class="inline-block text-gray-800 px-4 py-2 text-center text-sm font-semibold">
                </div>

            </div>
        </div>
    </div>

</div>
@include('partials.nav')
