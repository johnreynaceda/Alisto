<div>
    <div>
        {{ $this->table }}
    </div>

    <x-modal wire:model.defer="view_details" max-width="4xl" align="center">
        <x-card title="Service Provider Information">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h1 class="text-sm">Client Name</h1>
                    <h1 class="text-lg font-bold uppercase">
                        {{ ($client_details->firstname ?? '') . ' ' . ($client_details->lastname ?? '') }}</h1>
                </div>
                <div>
                    <h1 class="text-sm">Address</h1>
                    <h1 class="text-lg font-bold uppercase">{{ $client_details->address ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm">Zipcode</h1>
                    <h1 class="text-lg font-bold uppercase">{{ $client_details->zipcode ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm">Phone Number</h1>
                    <h1 class="text-lg font-bold uppercase">{{ $client_details->contact_number ?? '' }}</h1>
                </div>
                <div class="col-span-2">
                    <h1 class="text-sm">Client Identification Card</h1>
                    @if ($client_details->identification_card_path ?? '')
                        <img src="{{ Storage::url($client_details->identification_card_path) }}" alt=""
                            class="h-40 w-64 object-cover rounded-xl mt-2">
                    @else
                        <img src="{{ asset('images/sample.png') }}" alt=""
                            class="h-40 w-64 object-cover rounded-xl mt-2">
                    @endif
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
