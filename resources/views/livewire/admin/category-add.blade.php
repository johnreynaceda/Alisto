<div>
    <div class="bg-white rounded-xl p-8"> {{ $this->form }}</div>
    <div class="mt-5 flex space-x-3 items-center">
        <x-button label="Submit" positive right-icon="save" spinner="submitRecord" wire:click="submitRecord"
            class="font-semibold" />
        <x-button label="Cancel" dark icon="x" class="font-semibold" href="{{ route('admin.category') }}" />
    </div>
</div>
