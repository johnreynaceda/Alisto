<div>
    <section class="bg-main relative">
        <img src="{{ asset('images/background.jpg') }}"
            class="absolute top-0 bottom-0 opacity-80 object-cover w-full h-full" alt="">
        <div class="items-center px-8 py-12 mx-auto max-w-7xl lg:px-16 md:px-12 2xl:py-5 relative">
            <div class="justify-center w-full text-center lg:p-10 max-auto relative">
                <div class="justify-center w-full mx-auto">

                    <p class="mt-8 2xl:text-5xl text-3xl font-bold uppercase tracking-tighter text-white">
                        {{ $location_name }}
                    </p>

                </div>

            </div>


        </div>
    </section>
    <section class="mx-auto max-w-7xl py-10 relative">
        <h1 class="text-2xl text-main font-semibold ">Services Offered</h1>
        <div class="mt-5 grid grid-cols-1 2xl:grid-cols-4 gap-5">
            @forelse ($providers as $item)
                <a href="/client/location/{{ $location_id }}/{{ $item->id }}"
                    class="border bg-white hover:shadow-main shadow-sm hover:shadow-lg rounded-xl h-96">
                    <div class="flex flex-col">
                        <img src="{{ Storage::url($item->banner_path) }}" class="h-56 object-cover rounded-xl m-2"
                            alt="">
                        <div class="p-3">
                            <p class="font-semibold text-main mt-5 text-lg text-center">
                                {{ $item->name }}
                            </p>

                            <div class="price mt-5">
                                <div class="flex space-x-2 justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="h-6 w-6 fill-main">
                                        <path
                                            d="M3.00488 6.99981L11.4502 1.36961C11.7861 1.14568 12.2237 1.14568 12.5596 1.36961L21.0049 6.99981V20.9998C21.0049 21.5521 20.5572 21.9998 20.0049 21.9998H4.00488C3.4526 21.9998 3.00488 21.5521 3.00488 20.9998V6.99981ZM5.00488 8.07018V19.9998H19.0049V8.07018L12.0049 3.40351L5.00488 8.07018ZM8.00488 15.9998H16.0049V17.9998H8.00488V15.9998ZM8.00488 12.9998H16.0049V14.9998H8.00488V12.9998ZM12.0049 10.9998C10.9003 10.9998 10.0049 10.1044 10.0049 8.99981C10.0049 7.89524 10.9003 6.99981 12.0049 6.99981C13.1095 6.99981 14.0049 7.89524 14.0049 8.99981C14.0049 10.1044 13.1095 10.9998 12.0049 10.9998Z">
                                        </path>
                                    </svg>
                                    <span class="text-gray-600 font-medium">Avg. Project:
                                        &#8369;{{ $item->avg_project }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
            @endforelse
        </div>
    </section>




</div>
