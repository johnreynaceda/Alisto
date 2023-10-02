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
        <div class="w-full bg-gray-200 relative">
            <div class="relative  items-center w-full px-5 py-24 mx-auto md:px-12 lg:px-16 max-w-7xl">
                <div class="w-full mx-auto text-left">
                    <div class="relative flex-col items-center m-auto align-middle">
                        <div class="items-center gap-12 text-left lg:gap-24 lg:inline-flex">
                            <div class="order-first block w-full mt-12 aspect-square lg:mt-0">
                                <img class="object-cover object-center w-full mx-auto bg-gray-300 border lg:ml-auto"
                                    alt="hero" src="{{ asset('images/everyday.png') }}">
                            </div>
                            <div class="flex flex-col mt-6 lg:mt-0">
                                <div class="max-w-xl">
                                    <div>
                                        <p class="text-2xl font-medium tracking-tight text-black sm:text-4xl">
                                            Day-to-day living made simpler
                                        </p>
                                    </div>
                                </div>
                                <div class="mx-auto mt-6 lg:max-w-7xl">
                                    <ul role="list" class="grid grid-cols-2 gap-4 list-none lg:grid-cols-1 lg:gap-3">
                                        <li>

                                            <div class="mt-2 text-bold text-gray-900">
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
                                            <div class=" text-base text-gray-700">
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
                                            <div class=" text-base text-gray-700">
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
                                            <div class=" text-base text-gray-700">
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

    <section class="bg-white">
        <div class="px-8 py-24 mx-auto max-w-7xl lg:px-16 md:px-12 xl:px-36">
            <div class="grid grid-cols-1 gap-3 lg:grid-cols-3">
                @foreach (\App\Models\Feedback::all() as $item)
                    <div class="p-8 bg-gray-100 rounded-3xl group lg:items-start sm:flex">
                        <div>
                            <p class="text-sm text-gray-600">
                                {{ $item->feedback }}
                            </p>
                            <div class="inline-flex items-center w-full h-full mt-2">
                                <div class="mt-6">
                                    <div class="flex-shrink-0 block">
                                        <div class="flex items-center">
                                            <div>
                                                <img alt=""
                                                    class="inline-block object-cover rounded-full h-9 w-9"
                                                    src="{{ asset('images/alisto-logo.png') }}">
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-black group-hover:text-blue-600">
                                                    {{ \App\Models\User::where('id', $item->user_id)->first()->name }}
                                                </p>
                                                <p class=" text-xs font-medium text-blue-500 group-hover:text-black">
                                                    {{ \App\Models\ServiceProvider::where('id', $item->service_provider_id)->first()->user->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
    </section>


    <section>
        <div class="relative items-center w-full px-5 py-24 mx-auto md:px-12 lg:px-16 max-w-7xl">
            <div class="w-full mx-auto text-left">
                <div class="relative flex-col items-center m-auto align-middle">
                    <div class="items-center gap-12 text-left lg:gap-24 lg:inline-flex">
                        <div class="flex flex-col m-auto md:order-first">
                            <div class="max-w-xl">
                                <div>
                                    <p class="text-2xl font-medium tracking-tight text-black sm:text-4xl">
                                        A go-to team service provider in just one click
                                    </p>
                                </div>
                            </div>
                            <div class="mx-auto mt-6 lg:max-w-7xl">
                                <ul role="list" class="grid grid-cols-2 gap-4 list-none lg:grid-cols-1 lg:gap-3">
                                    <li>

                                        <div class="mt-2 text-bold text-gray-900">
                                            Build your team, background-checked Service Providers to help with — and
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
                                        <div class=" text-base text-gray-700">
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
                                        <div class=" text-base text-gray-700">
                                            Choose and connect with the best service provider for the job
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
                                        <div class=" text-base text-gray-700">
                                            Save your favorites to book again and again
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="order-first block w-full mt-12 aspect-square lg:mt-0">
                            <img class="object-cover object-center w-full mx-auto bg-gray-300 border lg:ml-auto"
                                alt="hero" src="{{ asset('images/goateam.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-client-layout>
