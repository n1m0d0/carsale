<div class="bg-white dark:bg-gray-900 p-6">
    @if ($validator != 0)
        <x-form-section submit="searchVin">
            <x-slot name="title">
                {{ __('VIN code') }}
            </x-slot>

            <x-slot name="description">
                {{ __('It is an international standard that consists of 17 alphanumeric characters that allow you to identify and know the records of a car.') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="vin" value="{{ __('VIN') }}" />
                    <x-input id="vin" type="text" class="mt-1 block w-full" wire:model="vin" />
                    <x-input-error for="vin" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-button wire:loading.attr="disabled" wire:target="searchVin">
                    {{ __('Search') }}
                </x-button>
            </x-slot>
        </x-form-section>

        <x-section-border />
    @endif

    @if ($validator == 0)
        <x-action-section>
            <x-slot name="title">
                {{ __('Car Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Information obtained based on the VIN code of your car.') }}
            </x-slot>

            <x-slot name="content">
                <div class="md:grid md:grid-cols-2">
                    <div class="md:col-span-1">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Brand') }}
                        </h3>

                        <div class="mt-1 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                            <p>
                                {{ $brand }}
                            </p>
                        </div>
                    </div>

                    <div class="md:col-span-1">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Model') }}
                        </h3>

                        <div class="mt-1 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                            <p>
                                {{ $model }}
                            </p>
                        </div>
                    </div>

                    <div class="md:col-span-1">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Manufactured') }}
                        </h3>

                        <div class="mt-1 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                            <p>
                                {{ $manufactured }}
                            </p>
                        </div>
                    </div>

                    <div class="md:col-span-1">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Year') }}
                        </h3>

                        <div class="mt-1 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                            <p>
                                {{ $year }}
                            </p>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-action-section>

        <x-section-border />

        <x-form-section submit="store">
            <x-slot name="title">
                {{ __('Car status') }}
            </x-slot>

            <x-slot name="description">
                {{ __('State of operation and appearance of the car.') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-3">
                    <x-label for="plate" value="{{ __('Plate') }}" />
                    <x-input id="plate" type="text" class="mt-1 block w-full" wire:model="plate" />
                    <x-input-error for="plate" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-label for="mileage" value="{{ __('Mileage') }}" />
                    <x-input id="mileage" type="number" class="mt-1 block w-full" wire:model="mileage" />
                    <x-input-error for="mileage" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-label for="functioning" value="{{ __('Functioning') }}" />
                    <x-input id="functioning" type="number" min="1" max="10" class="mt-1 block w-full"
                        wire:model="functioning" />
                    <input id="steps-range" type="range" min="1" max="10" step="1"
                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                        wire:model="functioning">
                    <x-input-error for="functioning" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-label for="esthetic" value="{{ __('Esthetic') }}" />
                    <x-input id="esthetic" type="number" min="1" max="10" class="mt-1 block w-full"
                        wire:model="esthetic" />
                    <input id="steps-range" type="range" min="1" max="10" step="1"
                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                        wire:model="esthetic">
                    <x-input-error for="esthetic" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-button wire:loading.attr="disabled" wire:target="store">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </x-form-section>

        <x-danger-button wire:click='clear' wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-danger-button>

        <x-section-border />
    @endif
</div>
