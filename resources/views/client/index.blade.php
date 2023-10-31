<x-client-layout>
    <section class="bg-main relative">
        <img src="{{ asset('images/background.jpg') }}"
            class="absolute top-0 bottom-0 opacity-80 object-cover w-full h-full" alt="">
        <div class="items-center px-8 py-12 mx-auto max-w-7xl lg:px-16 md:px-12 lg:py-24 relative">
            <div class="justify-center w-full text-center lg:p-10 max-auto relative">
                <div class="justify-center w-full mx-auto">

                    <p class="mt-8 2xl:text-7xl text-3xl font-bold tracking-tighter text-white">
                        Welcome to ALISTO !
                    </p>
                    <p class="max-w-xl mx-auto mt-4 2xl:text-xl text-sm tracking-tight text-gray-300">
                        Your Path to Convenience: Explore, Book, Enjoy - Home Services at Your Fingertips!
                    </p>
                </div>

            </div>


        </div>
    </section>
    <livewire:client.advance-search />

    <livewire:client.services-offered />

    <section>
        <div class="w-full relative">
            <div class="relative  items-center w-full px-5 py-20 2xl:py-40   mx-auto md:px-12 lg:px-16 max-w-7xl">
                <div class="w-full mx-auto text-left">
                    <div class="relative flex-col items-center m-auto align-middle">
                        <div class="items-start gap-12 text-left lg:gap-24 lg:inline-flex">
                            <div class="order-first block w-full mt-12 aspect-square lg:mt-0">
                                <img class="object-cover object-center w-full h-full mx-auto  border lg:ml-auto"
                                    alt="hero" src="{{ asset('images/everyday.png') }}">
                            </div>
                            <div class="flex flex-col mt-6">
                                <div class="max-w-xl">
                                    <div>
                                        <p class="text-2xl font-medium tracking-tight text-black sm:text-4xl">
                                            Day-to-day living made simpler
                                        </p>
                                    </div>
                                </div>
                                <div class="mx-auto mt-6 lg:max-w-7xl">
                                    <ul role="list"
                                        class="grid grid-cols-2 gap-4 text-lg list-none lg:grid-cols-1 lg:gap-3">
                                        <li>

                                            <div class="mt-2 text-bold text-gray-900 text-xl">
                                                You don't have to handle life's busiest times alone. Reclaim your
                                                free time for your passions without breaking the bank.
                                            </div>
                                        </li>
                                        <li class="flex space-x-2 items-start">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    class="h-6 w-6 fill-green-600">
                                                    <path
                                                        d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class=" text-xl text-gray-700">
                                                Choose your Service Provider by reviews, skills, and price
                                            </div>
                                        </li>
                                        <li class="flex space-x-2 items-start">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    class="h-6 w-6 fill-green-600">
                                                    <path
                                                        d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class=" text-xl text-gray-700">
                                                Set a time slot that works for you, starting right now
                                            </div>
                                        </li>
                                        <li class="flex space-x-2 items-start">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    class="h-6 w-6 fill-green-600">
                                                    <path
                                                        d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class=" text-xl text-gray-700">
                                                Message, call, pay, tip, and review all through one platform
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="">
            <section class="bg-gray-800 relative py-24">
                <img src="{{ asset('images/bg1.jpg') }}"
                    class="absolute top-0 bottom-0 opacity-30 object-cover w-full h-full" alt="">
                <div class="p-10 relative">
                    <div class="max-w-7xl items-end justify-between sm:flex sm:pe-6 lg:pe-8">
                        <h2 class="max-w-xl text-4xl font-bold tracking-tight text-white sm:text-5xl">
                            Read trusted reviews from our customers
                        </h2>

                        <div class="mt-8 flex gap-4 lg:mt-0">
                            <button aria-label="Previous slide" id="keen-slider-previous"
                                class="rounded-full border border-white p-3 text-white transition hover:bg-white hover:text-main">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-5 w-5 rtl:rotate-180">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>
                            </button>

                            <button aria-label="Next slide" id="keen-slider-next"
                                class="rounded-full border border-white p-3 text-white transition hover:bg-white hover:text-main">
                                <svg class="h-5 w-5 rtl:rotate-180" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="2xl:-mx-6 -mx-10 mt-8 lg:col-span-2 lg:mx-0">
                        <div id="keen-slider" class="keen-slider">
                            @foreach (\App\Models\Feedback::all() as $item)
                                <div class="keen-slider__slide">
                                    <blockquote
                                        class="flex h-full flex-col justify-between bg-white rounded-xl bg-opacity-80 p-6 shadow-sm sm:p-8 lg:p-12">
                                        <div>
                                            {{-- <div class="flex gap-0.5 text-green-500">
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>

                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>

                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>

                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>

                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </div> --}}
                                            <div x-data="{ rating: {{ $item->rating }} }">

                                                <div class="flex items-center ">
                                                    <template x-for="i in 5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 cursor-pointer"
                                                            :class="{
                                                                'fill-yellow-400': i <= rating,
                                                                'fill-gray-600': i >
                                                                    rating
                                                            }"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path
                                                                d="M12.0008 17L6.12295 20.5902L7.72105 13.8906L2.49023 9.40983L9.35577 8.85942L12.0008 2.5L14.6458 8.85942L21.5114 9.40983L16.2806 13.8906L17.8787 20.5902L12.0008 17Z">
                                                            </path>
                                                        </svg>
                                                    </template>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <p class="text-2xl font-bold text-main sm:text-3xl">
                                                    <span class="uppercase">
                                                        {{ \App\Models\ServiceProvider::where('id', $item->service_provider_id)->first()->user->name }}</span>
                                                </p>

                                                <p class="mt-4 leading-relaxed text-gray-700">
                                                    {{ $item->feedback }}
                                                </p>
                                            </div>
                                        </div>

                                        <footer class="mt-4 text-sm font-medium text-gray-700 sm:mt-6">
                                            &mdash;
                                            {{ \App\Models\User::where('id', $item->user_id)->first()->name }}
                                        </footer>
                                    </blockquote>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>



    <section>
        <div class="w-full  relative">
            <div class="relative  items-center w-full px-5 py-20 2xl:py-40 mx-auto md:px-12 lg:px-16 max-w-7xl">
                <div class="w-full mx-auto text-left">
                    <div class="relative flex-col items-center m-auto align-middle">
                        <div class="items-start gap-12 text-left lg:gap-24 lg:inline-flex">
                            <div class="flex flex-col mt-6">
                                <div class="max-w-xl">
                                    <div>
                                        <p class="text-2xl font-medium tracking-tight text-black sm:text-4xl">
                                            Day-to-day living made simpler
                                        </p>
                                    </div>
                                </div>
                                <div class="mx-auto mt-6 lg:max-w-7xl">
                                    <ul role="list"
                                        class="grid grid-cols-2 gap-4 text-lg list-none lg:grid-cols-1 lg:gap-3">
                                        <li>

                                            <div class="mt-2 text-bold text-gray-900 text-xl">
                                                Build your team, background-checked Service Providers to help with —
                                                and
                                                for — life. Whatever you need, they’ve got it covered.
                                            </div>
                                        </li>
                                        <li class="flex space-x-2 items-start">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    class="h-6 w-6 fill-green-600">
                                                    <path
                                                        d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class=" text-xl text-gray-700">
                                                Choose your Service Provider by reviews, skills, and price
                                            </div>
                                        </li>
                                        <li class="flex space-x-2 items-start">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    class="h-6 w-6 fill-green-600">
                                                    <path
                                                        d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class=" text-xl text-gray-700">
                                                Choose and connect with the best service provider for the job
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="order-second block w-full mt-12 aspect-square lg:mt-0">
                                <img class="object-cover object-center h-full w-full mx-auto  border lg:ml-auto"
                                    alt="hero" src="{{ asset('images/goateam.png') }}">
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-client-layout>
