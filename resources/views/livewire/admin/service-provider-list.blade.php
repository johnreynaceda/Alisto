<div>
    <div>
        {{ $this->table }}
    </div>

    <x-modal wire:model.defer="view_details" max-width="4xl" align="center">
        <x-card title="Service Provider Information">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h1 class="text-sm">Service Provider Name</h1>
                    <h1 class="text-lg font-bold uppercase">{{ $provider_details->user->name ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm">Location</h1>
                    <h1 class="text-lg font-bold uppercase">{{ $provider_details->location->location ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm">Service Category</h1>
                    <h1 class="text-lg font-bold uppercase">{{ $provider_details->service_category->name ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm">Phone Number</h1>
                    <h1 class="text-lg font-bold uppercase">{{ $provider_details->phone_number ?? '' }}</h1>
                </div>
                <div class="col-span-2">
                    <h1 class="text-sm">Profile</h1>
                    @if ($provider_details->user->user_profile->user_profile_path ?? '')
                        <img src="{{ Storage::url($provider_details->user->user_profile->user_profile_path) }}"
                            alt="" class="h-40 w-40 rounded-xl mt-2">
                    @else
                        <img src="{{ asset('images/sample.png') }}" alt="" class="h-40 w-40 rounded-xl mt-2">
                    @endif
                </div>
                <div class="col-span-2">
                    <h1 class="text-sm">Credentials</h1>
                    <div class="mt-2 flex space-x-2 items-center">
                        @forelse ($provider_details->user->provider_credentials ?? [] as $item)
                            <a href="{{ Storage::url($item->credentials_path) }}" target="_blank"
                                class="text-sm text-green-600 hover:text-gray-600">View</a>
                        @empty
                            <span class="text-sm animate animate-pulse text-red-400">No Credentials Available!</span>
                        @endforelse
                    </div>
                </div>

            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
