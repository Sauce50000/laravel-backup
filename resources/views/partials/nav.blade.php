<div class="bg-[#004b8e] my-1.5 flex justify-left items-center text-white">
    <nav class="flex gap-6 px-10">
        <a href="/" class=" hover:text-[#99f9d7] px-3 py-2 rounded">गृहपृष्ठ</a>

        <div x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">
            <button @click="open = !open" @click.away="open = false"
                class="hover:text-[#99f9d7] px-3 py-2 rounded inline-flex items-center">
                हाम्रो बारेमा
                {{-- <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg> --}}
            </button>

            <!-- Dropdown items -->
            <div x-show="open" x-cloak x-transition
                class="absolute mt-0 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40">
                {{-- <a href="{{ route('introduction') }}" class="block px-4 py-2 text-md hover:bg-gray-200 ">परिचय</a>
                <a href="{{ route('work-area') }}" class="block px-4 py-2 text-md hover:bg-gray-200">कार्य क्षेत्र</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">नागरिक वडापत्र</a> --}}
                @foreach ($navofficeDetails as $officeDetail)
                    <a href="{{ route('office-details.showOfficeDetails', $officeDetail) }}"
                        class="block px-4 py-2 text-md hover:bg-gray-200">
                        {{ $officeDetail->title }}
                    </a>
                @endforeach
                <a href="{{route('employee')}}" class="block px-4 py-2 text-md hover:bg-gray-200">कर्मचारी विवरण</a>
            </div>
        </div>

        {{-- <div x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">
            <button @click="open = !open" @click.away="open = false"
                class="hover:text-[#99f9d7] px-3 py-2 rounded inline-flex items-center">
                सूचना/समाचारहरु
            </button>

            
            <div x-show="open" x-transition
                class="absolute mt-0 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40">
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200 ">परिपत्र/निर्देशन</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">सूचना तथा समाचारहरु</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">प्रेस बिज्ञप्ति</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">बोलपत्र</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">अन्य</a>
            </div>
        </div> --}}

        <!-- resources/views/layouts/navbar.blade.php -->
        <div x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">
            <button @click="open = !open" @click.away="open = false"
                class="hover:text-[#99f9d7] px-3 py-2 rounded inline-flex items-center">
                सूचना/समाचारहरु
            </button>

            <!-- Dynamic Dropdown Items -->
            <div x-show="open" x-cloak x-transition
                class="absolute mt-0 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40">
                @foreach ($navcategories as $category)
                    <a href="{{ route('notice.showpdfList', $category->slug) }}"
                        class="block px-4 py-2 text-md hover:bg-gray-200">
                        {{ $category->title }}
                    </a>
                @endforeach
            </div>
        </div>



        <div x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">
            <button @click="open = !open" @click.away="open = false"
                class="hover:text-[#99f9d7] px-3 py-2 rounded inline-flex items-center">
                अभिलेखहरु
            </button>

            <!-- Dropdown items -->
            {{-- <div x-show="open" x-transition
                class="absolute mt-0 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40">

                <div x-data="{ open: false }" class="relative group w-full" @mouseenter="open = true"
                    @mouseleave="open = false">
                    <button @click="open = !open" @click.away="open = false"
                        class="w-full px-3 py-2 rounded hover:bg-gray-200 text-left flex justify-between items-center ">
                        कानुनी दस्तावेज
                    </button>

                    <!-- Dropdown items -->
                    <div x-show="open" x-transition
                        class="absolute left-full top-0 ml-1 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40
                            group-hover:left-full group-hover:top-0
                            sm:left-0 sm:top-full sm:ml-0"
                        :class="window.innerWidth - $el.getBoundingClientRect().right > 200 ? 'left-full top-0 ml-1' :
                            'left-0 top-full ml-0'">
                        <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200 ">ऐन</a>
                        <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">नियम/नियमावली</a>
                        <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">निर्देशिका</a>
                        <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">कार्यविधि</a>
                        <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">मापदण्ड</a>
                        <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">दस्तावेज</a>
                    </div>
                </div>

            </div> --}}

            <div x-show="open" x-cloak x-transition
                class="absolute mt-0 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40">

                <div x-data="{ open: false }" class="relative group w-full" @mouseenter="open = true"
                    @mouseleave="open = false">
                    <button @click="open = !open" @click.away="open = false"
                        class="w-full px-3 py-2 rounded hover:bg-gray-200 text-left flex justify-between items-center ">
                        कानुनी दस्तावेज
                    </button>

                    <!-- Dropdown items -->
                    <div x-show="open" x-transition
                        class="absolute left-full top-0 ml-1 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40
                            group-hover:left-full group-hover:top-0
                            sm:left-0 sm:top-full sm:ml-0"
                        :class="window.innerWidth - $el.getBoundingClientRect().right > 200 ? 'left-full top-0 ml-1' :
                            'left-0 top-full ml-0'">
                        @foreach ($navlegalDocumentsCategories as $category)
                            <a href="{{ route('document.showpdfList', ['slug' => $category->slug, 'id' => $category->record_type_id]) }}
                            {{-- {{ route('legal-document.showpdfList',$category->slug,$category->record_type_id)}} --}}
                             "
                                class="block px-4 py-2 text-md hover:bg-gray-200">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>

        <div x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">
            <button @click="open = !open" @click.away="open = false"
                class="hover:text-[#99f9d7] px-3 py-2 rounded inline-flex items-center">
                प्रकाशन
            </button>
            <!-- Dropdown items -->
            {{-- <div x-show="open" x-transition
                class="absolute mt-0 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40">
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200 ">वार्षिक प्रगति
                    विवरण</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">बार्षिक विकास
                    कार्यक्रम</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">मन्त्रिपरिषद्का निर्णयहरु</a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">अभीलेख</a>
            </div> --}}
            <div x-show="open" x-cloak x-transition
                class="absolute left-full top-0 ml-1 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40
                            group-hover:left-full group-hover:top-0
                            sm:left-0 sm:top-full sm:ml-0"
                :class="window.innerWidth - $el.getBoundingClientRect().right > 200 ? 'left-full top-0 ml-1' :
                    'left-0 top-full ml-0'">
                @foreach ($navpubliactionCategories as $category)
                    <a href="
                    {{ route('document.showpdfList', ['slug' => $category->slug, 'id' => $category->record_type_id]) }}
                    "
                        class="block px-4 py-2 text-md hover:bg-gray-200">
                        {{ $category->title }}
                    </a>
                @endforeach
            </div>
        </div>
        <div x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">
            <button @click="open = !open" @click.away="open = false"
                class="hover:text-[#99f9d7] px-3 py-2 rounded inline-flex items-center">
                महाशाखा
            </button>
            <div x-show="open" x-cloak x-transition
                class="absolute left-full top-0 ml-1 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40
                        group-hover:left-full group-hover:top-0
                        sm:left-0 sm:top-full sm:ml-0"
                :class="window.innerWidth - $el.getBoundingClientRect().right > 200 ? 'left-full top-0 ml-1' :
                    'left-0 top-full ml-0'">
                @foreach ($navdepartments as $department)
                    <a href=" {{ route('department.showdepartment', $department->slug) }} "
                        class="block px-4 py-2 text-md hover:bg-gray-200">
                        {{ $department->title }}
                    </a>
                @endforeach
            </div>
        </div>

        <div x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">
            <button @click="open = !open" @click.away="open = false"
                class="hover:text-[#99f9d7] px-3 py-2 rounded inline-flex items-center">
                ग्यालरी
            </button>

            <div x-show="open" x-cloak x-transition
                class="absolute left-full top-0 ml-1 bg-white border border-gray-200 text-black rounded shadow-md z-50 w-40
                            group-hover:left-full group-hover:top-0
                            sm:left-0 sm:top-full sm:ml-0"
                :class="window.innerWidth - $el.getBoundingClientRect().right > 200 ? 'left-full top-0 ml-1' :
                    'left-0 top-full ml-0'">

                <a href="{{ route('photo-gallery')}}" class="block px-4 py-2 text-md hover:bg-gray-200">
                    Photo Gallery
                </a>
                <a href="#" class="block px-4 py-2 text-md hover:bg-gray-200">
                    Video Gallery
                </a>

            </div>

        </div>

        <a href="{{route('contact-us')}}" class=" hover:text-[#99f9d7] px-3 py-2 rounded">सम्पर्क</a>
        {{-- <a href="#" class=" hover:text-[#99f9d7] px-3 py-2 rounded">पोर्टल</a> --}}
    </nav>
</div>
