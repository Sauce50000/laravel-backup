<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<div class="bg-[#004b8e] my-1.5 flex justify-left items-center text-white">
    <nav class="flex gap-6 px-10">
        <a href="/" class=" hover:text-[#99f9d7] px-3 py-2 rounded">गृहपृष्ठ</a>

        <div x-data="{ open: false }" class="relative" 
            @mouseenter="open = true" 
            @mouseleave="open = false">
            <button @click="open = !open" @click.away="open = false"
                class="hover:text-[#99f9d7] px-3 py-2 rounded inline-flex items-center">
                हाम्रो बारेमा
                {{-- <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg> --}}
            </button>

            <!-- Dropdown items -->
            <div x-show="open" x-transition
                class="absolute mt-0 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40">
                <a href="{{ route('introduction') }}" class="block px-4 py-2 text-md hover:bg-gray-200 ">परिचय</a>
                <a href="{{ route('work-area') }}" class="block px-4 py-2 text-md hover:bg-gray-200">कार्य क्षेत्र</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">नागरिक वडापत्र</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">कर्मचारी विवरण</a>
            </div>
        </div>

        <div x-data="{ open: false }" class="relative" 
            @mouseenter="open = true" 
            @mouseleave="open = false">
            <button @click="open = !open" @click.away="open = false"
                class="hover:text-[#99f9d7] px-3 py-2 rounded inline-flex items-center">
                सूचना/समाचारहरु
            </button>

            <!-- Dropdown items -->
            <div x-show="open" x-transition
                class="absolute mt-0 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40">
                <a href="{{----}}" class="block px-4 py-2 text-md hover:bg-gray-200 ">परिपत्र/निर्देशन</a>
                <a href="{{----}}" class="block px-4 py-2 text-md hover:bg-gray-200">सूचना तथा समाचारहरु</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">प्रेस बिज्ञप्ति</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">बोलपत्र</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">अन्य</a>
            </div>
        </div>

        <a href="#" class=" hover:text-[#99f9d7] px-3 py-2 rounded"></a>
        <a href="#" class=" hover:text-[#99f9d7] px-3 py-2 rounded">Projects</a>
        <a href="#" class=" hover:text-[#99f9d7] px-3 py-2 rounded">News</a>
        <a href="#" class=" hover:text-[#99f9d7] px-3 py-2 rounded">Events</a>
        <a href="#" class=" hover:text-[#99f9d7] px-3 py-2 rounded">Resources</a>
        <a href="#" class=" hover:text-[#99f9d7] px-3 py-2 rounded">Gallery</a>
        <a href="#" class=" hover:text-[#99f9d7] px-3 py-2 rounded">Contact</a>
    </nav>
</div>
