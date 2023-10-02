<div>
    <div>
        {{ $this->form }}
    </div>
    <div class="flex mt-6 items-center gap-4">
        <x-primary-button wire:click="update">{{ __('Save') }}</x-primary-button>

        @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                {{ __('Saved.') }}</p>
        @endif
    </div>
</div>
