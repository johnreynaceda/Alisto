<div>
    <section
        class="mx-auto max-w-4xl bg-white 2xl:shadow-md 2xl:shadow-main 2xl:rounded-xl 2xl:-mt-20 relative 2xl:p-10 p-5">
        <center>
            <h1 class="text-2xl font-bold text-gray-700 font-sans">NEED HELP? Just Click</h1>

            <div class="mt-3 ">
                <p class="text-gray-500 hidden 2xl:block">ALISTO is what you need.</p>
                <div class="w-20 bg-main h-0.5 mt-5 rounded-full"></div>
            </div>
            <div class="mt-5">
                <div class="grid 2xl:grid-cols-3 col-span-1 gap-2" x-data="{ open: @entangle('services_modal') }">
                    <div class="flex 2xl:col-span-2 h-14  px-3 items-center border rounded-xl relative">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="2xl:h-9 2xl:w-9 h-6 w-6 fill-main">
                            <path
                                d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
                            </path>
                        </svg>
                        <input type="text" wire:model="search"
                            class="w-full px-5
                        2xl:text-lg py-3 rounded-xl border-0 focus:ring-0 focus:outline-none"
                            placeholder="What do you need help with?">

                        <div x-show="open" x-on:click.away="open=false" x-cloak
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute -bottom-[31.9rem] z-10 right-0  left-0 bg-white rounded ">
                            <div class="h-[32rem]">
                                <div class="flex p-4">
                                    <p class="text-gray-500"> Describe your task in a few words</p>
                                </div>
                                <div class="mt-2 flex justify-between items-center p-4">
                                    <span>Popular Projects</span>
                                    <span>Project (&#8369;)</span>
                                </div>
                                <div class="s mt-3 flex flex-col   py-2">
                                    @forelse ($services as $service)
                                        <a href="{{ route('client.services-provider', ['id' => $service->id]) }}"
                                            class=" px-4 group flex flex-col border-b">
                                            <div class="flex justify-between group  items-center">
                                                <span
                                                    class="font-medium group-hover:font-bold group-hover:text-main uppercase  text-gray-700">{{ $service->name }}</span>
                                                <div
                                                    class="flex space-x-3 text-gray-500 group-hover:font-bold group-hover:text-main text-sm">
                                                    <span>Avg. Project:</span>
                                                    <span>&#8369;{{ number_format($service->price, 2) }}</span>
                                                </div>
                                            </div>
                                            <h1 class="flex text-xs text-main">
                                                {{ $service->service_provider->user->name }}</h1>

                                        </a>
                                    @empty
                                        <div class="text-center">
                                            <span>No Service found...</span>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="bg-main text-white px-5 text-lg py-3 rounded-xl" x-on:click="open=!open">Get
                        Help Today</button>
                </div>
            </div>


        </center>
    </section>
</div>
