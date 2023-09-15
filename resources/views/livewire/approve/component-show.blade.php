<div class="bg-white dark:bg-gray-900 p-6">
    <x-action-section>
        <x-slot name="title">
            {{ __('Validate Car') }}
        </x-slot>

        <x-slot name="description">
            {{ __('You should check that the images and price are appropriate.') }}
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-row-reverse gap-2">
                <x-button wire:click='approve' wire:loading.attr="disabled">
                    {{ __('Approve') }}
                </x-button>

                <x-danger-button wire:click='destroy' wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </x-slot>
    </x-action-section>
</div>
