<div x-data="{ fullscreenModal: false }" x-init="$watch('fullscreenModal', function(value) {
    if (value === true) {
        document.body.classList.add('overflow-hidden');
    } else {
        document.body.classList.remove('overflow-hidden');
    }
})">
    <div class="mt-6 2xl:w-[40rem]">
        <p class="text-gray-600">See how much you can make
            tasking on Alisto!</p>
        <div class="mt-5">
            <div>
                <label for="" class="text-gray-700">Select your Area</label>
                <select name="" id="" class="w-full 2xl:h-14 rounded-lg focus:ring-main" wire:model="area">
                    <option value="">Select an Option</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->location }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-5">
                <label for="" class="text-gray-700">Choose a Category</label>
                <select name="" id="" class="w-full 2xl:h-14 rounded-lg focus:ring-main"
                    wire:model="category_id">
                    <option value="">Select an Option</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mt-5 flex space-x-1 items-end">
            <span class="text-3xl font-black text-main font-dm">&#8369;{{ $avg_project ?? 0 }}</span>
            <span class="text-gray-500 text-sm">Avg. Project</span>
        </div>

        <button @click="fullscreenModal=true" {{ $category_id == null && $area == null ? 'disabled' : '' }}
            class="text-xl font-semibold hover:bg-transparent hover:border-2 hover:border-main hover:text-main  mt-10 bg-main p-3 w-full text-white rounded-full">
            <span>Get Started</span>
        </button>
        <center class="mt-5">
            <p>Already have an account? <a href="" class="text-main">Sign In</a>
            </p>
        </center>
    </div>
    <div x-show="fullscreenModal" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="flex fixed inset-0 z-[99] w-screen h-screen bg-white">
        <button @click="fullscreenModal=false"
            class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-3 mr-3 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span>Close</span>
        </button>
        <div class="relative top-0 bottom-0 right-0 flex-shrink-0 hidden w-1/3 overflow-hidden bg-cover lg:block">
            <a href="#_"
                class="absolute bottom-0 left-0 z-30 inline-flex items-end mb-4 ml-3 font-sans text-2xl font-extrabold text-left text-white no-underline bg-transparent cursor-pointer group focus:no-underline">
                <img src="{{ asset('images/alisto-logo.png') }}" class="h-32 " alt="">
            </a>
            <div class="absolute inset-0 z-20 w-full h-full opacity-70 bg-gradient-to-t from-main"></div>
            <img src="https://plus.unsplash.com/premium_photo-1679775634064-93628bf1d0cd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Y2xlYW5pbmclMjBzZXJ2aWNlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60"
                class="z-10 object-cover w-full h-full" />
        </div>
        <div class="relative flex flex-wrap items-center w-full h-full px-8">

            <div class="relative w-full max-w-sm mx-auto lg:mb-0">
                <div class="relative text-center">

                    <div class="flex flex-col mb-6 space-y-2">
                        <h1 class="text-3xl font-semibold text-main tracking-tight">Create an account</h1>
                        <p class="text-sm text-neutral-500">Enter your email below to create your account
                        </p>
                    </div>
                    <div class="space-y-2">
                        <div class="text-left">
                            <input type="text" placeholder="Service Provider Name" wire:model.defer="provider_name"
                                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-main focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main disabled:cursor-not-allowed disabled:opacity-50">
                            @error('provider_name')
                                <span class="error text-xs text-red-600 ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="text-left">
                            <input type="text" placeholder="juandelacruz@gmail.com" wire:model.defer="email"
                                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-main focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main disabled:cursor-not-allowed disabled:opacity-50">
                            @error('email')
                                <span class="error text-xs text-red-600 ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="text-left">
                            <input type="password" placeholder="Password" wire:model.defer="password"
                                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-main focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main disabled:cursor-not-allowed disabled:opacity-50">
                            @error('password')
                                <span class="error text-xs text-red-600 ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="text-left">
                            <input type="password" placeholder="Confirm Password" wire:model.defer="confirm_password"
                                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-main focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main disabled:cursor-not-allowed disabled:opacity-50">
                            @error('confirm_password')
                                <span class="error text-xs text-red-600 ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <button wire:click="createAccount"
                            class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-main hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">
                            Submit
                        </button>
                    </div>
                </div>
                <p class="mt-6 text-sm text-center text-neutral-500">Already have an account? <a href="#_"
                        class="relative font-medium text-blue-600 group"><span>Login
                            here</span><span
                            class="absolute bottom-0 left-0 w-0 group-hover:w-full ease-out duration-300 h-0.5 bg-blue-600"></span></a>
                </p>
                <p class="px-8 mt-1 text-sm text-center text-neutral-500">By continuing, you agree to our
                    <a class="underline underline-offset-4 hover:text-primary" href="/terms">Terms</a>
                    and
                    <a class="underline underline-offset-4 hover:text-primary" href="/privacy">Policy</a>.
                </p>
            </div>
        </div>
    </div>
</div>
