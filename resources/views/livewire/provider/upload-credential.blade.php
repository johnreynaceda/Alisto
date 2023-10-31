<div>
    <x-button label="Upload Credentials" wire:click="$set('credentials_modal', true)" teal class="font-semibold" rounded
        icon="upload" md />

    <x-modal wire:model.defer="credentials_modal" align="center" max-width="4xl">
        <x-card title="UPLOAD CREDENTIALS">
            <div class="p-5">
                {{ $this->form }}
            </div>

            <div class="px-10">
                <ul role="list" class="divide-y divide-gray-100">
                    @forelse ($credentials as $item)
                        <li class="flex items-center justify-between bg-gray-100 rounded-xl px-5 gap-x-6 py-2">
                            <div class="flex min-w-0 gap-x-4">
                                <x-button label="Click here to view" href="{{ Storage::url($item->credentials_path) }}"
                                    target="_blank" right-icon="external-link" positive flat />
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <x-button label="Delete" wire:click="delete({{ $item->id }})" icon="trash"
                                    negative xs />
                            </div>
                        </li>
                    @empty
                    @endforelse

                </ul>

            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button rounded teal icon="save" wire:click="saveCredential" spinner="saveCredential"
                        label="Submit" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
