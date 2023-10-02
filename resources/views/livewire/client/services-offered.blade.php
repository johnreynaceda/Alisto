<div>
    <section class="relative
    my-20 mx-auto 2xl:max-w-7xl px-5">
        <header class="flex flex-col space-y-2">
            <h1 class="2xl:text-3xl font-bold text-gray-700">Popular Projects in your Area</h1>
            <div class="w-20 h-1 bg-main rounded-full"></div>
        </header>
        <div class="mt-5 grid grid-cols-1 2xl:grid-cols-4 gap-5">
            @foreach ($categories as $item)
                <a href="{{ route('client.services', ['id' => $item->id]) }}"
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
            @endforeach
        </div>
    </section>
    <x-modal.card title="Client Details" blur wire:model.defer="complete_details" align=center>
        <div x-data="{
            bannerVisible: false,
            bannerVisibleAfter: 300,
        }" x-show="bannerVisible" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="-translate-y-10" x-transition:enter-end="translate-y-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-y-0"
            x-transition:leave-end="-translate-y-10" x-init="setTimeout(() => { bannerVisible = true }, bannerVisibleAfter);"
            class="fixed top-0 left-0 w-full h-auto py-2 duration-300 ease-out bg-red-100 shadow-sm sm:py-0 sm:h-10"
            x-cloak>
            <div class="flex items-center justify-between w-full h-full px-3 mx-auto max-w-7xl ">
                <a href="#"
                    class="flex flex-col w-full h-full text-xs leading-6 text-black duration-150 ease-out sm:flex-row sm:items-center opacity-80 hover:opacity-100">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" stroke="none">
                                <path
                                    d="M10.1893 8.12241C9.48048 8.50807 9.66948 9.5633 10.4691 9.68456L13.5119 10.0862C13.7557 10.1231 13.7595 10.6536 13.7968 10.8949L14.2545 13.5486C14.377 14.3395 15.4432 14.5267 15.8333 13.8259L17.1207 11.3647C17.309 11.0046 17.702 10.7956 18.1018 10.8845C18.8753 11.1023 19.6663 11.3643 20.3456 11.4084C21.0894 11.4567 21.529 10.5994 21.0501 10.0342C20.6005 9.50359 20.0352 8.75764 19.4669 8.06623C19.2213 7.76746 19.1292 7.3633 19.2863 7.00567L20.1779 4.92643C20.4794 4.23099 19.7551 3.52167 19.0523 3.82031L17.1037 4.83372C16.7404 4.99461 16.3154 4.92545 16.0217 4.65969C15.3919 4.08975 14.6059 3.39451 14.0737 2.95304C13.5028 2.47955 12.6367 2.91341 12.6845 3.64886C12.7276 4.31093 13.0055 5.20996 13.1773 5.98734C13.2677 6.3964 13.041 6.79542 12.658 6.97364L10.1893 8.12241Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M12.1575 9.90759L3.19359 18.8714C2.63313 19.3991 2.61799 20.2851 3.16011 20.8317C3.70733 21.3834 4.60355 21.3694 5.13325 20.8008L13.9787 11.9552"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M5 6.25V3.75M3.75 5H6.25" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M18 20.25V17.75M16.75 19H19.25" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                        <strong class="font-semibold text-red-600">Complete your details</strong><span
                            class="hidden w-px h-4 mx-3 rounded-full sm:block bg-neutral-200"></span>
                    </span>
                    <span class="block pt-1 pb-2 leading-none sm:inline sm:pt-0 sm:pb-0">
                        Please complete your details to continue your home service request.
                    </span>
                </a>
                <button @click="bannerVisible=false; setTimeout(()=>{ bannerVisible = true }, 1000);"
                    class="flex items-center flex-shrink-0 translate-x-1 ease-out duration-150 justify-center w-6 h-6 p-1.5 text-black rounded-full hover:bg-neutral-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-full h-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div>
            {{ $this->form }}
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">


                <div class="flex">
                    <x-button positive label="Submit" rounded wire:click="saveDetails" />
                    <x-button flat label="Cancel" rounded x-on:click="close" />

                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>
