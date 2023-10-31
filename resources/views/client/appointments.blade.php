<x-client-layout>
    <section class="bg-main relative">
        <img src="{{ asset('images/background.jpg') }}"
            class="absolute top-0 bottom-0 opacity-80 object-cover w-full h-full" alt="">
        <div class="items-center px-8 py-12 mx-auto max-w-7xl lg:px-16 md:px-12 2xl:py-5 relative">
            <div class="justify-center w-full text-center lg:p-10 max-auto relative">
                <div class="justify-center w-full mx-auto">



                </div>

            </div>


        </div>
    </section>
    <div class="mx-auto bg-white max-w-7xl  -mt-20 2xl:mb-56 shadow rounded-2xl relative">
        <div class="2xl:p-10 p-5 ">
            <header class="text-2xl font-bold text-gray-700">
                APPOINTMENTS
            </header>
            <div class="mt-5">
                <livewire:client.client-appointment />
            </div>
        </div>
    </div>
</x-client-layout>
