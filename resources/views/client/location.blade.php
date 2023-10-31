<x-client-layout>
    <section class="mx-auto max-w-7xl py-20 relative">
        <a href="/" class="flex space-x-1 items-center mb-5 fill-main text-main">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-7 w-7">
                <path
                    d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z">
                </path>
            </svg>
            <span class="font-bold text-xl">BACK</span>
        </a>
        <h1 class="2xl:text-3xl text-xl  font-bold text-main">LOCATIONS</h1>
        <div class="grid grid-cols-3 mt-10 gap-8">
            @foreach (\App\Models\Location::get() as $item)
                <a href="{{ route('client.locations', ['id' => $item->id]) }}"
                    class="inline-flex items-start p-3 border hover:shadow hover:shadow-main group -m-3 transition duration-150 ease-in-out rounded-xl hover:bg-gray-100">
                    <div class="ml-4 flex w-full justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-red-500" viewBox="0 0 24 24">
                                <pathser
                                    d="M2 5L9 2L15 5L21.303 2.2987C21.5569 2.18992 21.8508 2.30749 21.9596 2.56131C21.9862 2.62355 22 2.69056 22 2.75827V19L15 22L9 19L2.69696 21.7013C2.44314 21.8101 2.14921 21.6925 2.04043 21.4387C2.01375 21.3765 2 21.3094 2 21.2417V5ZM15 19.7639V7.17594L14.9352 7.20369L9 4.23607V16.8241L9.06476 16.7963L15 19.7639Z">
                                </pathser>
                            </svg>
                            <p class="text-base font-medium text-gray-700">
                                {{ $item->location }}
                            </p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="h-5 w-5 fill-transparent group-hover:fill-main">
                            <path
                                d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z">
                            </path>
                        </svg>
                    </div>
                </a>
            @endforeach

        </div>
    </section>
</x-client-layout>
