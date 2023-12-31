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

                <div class="col-span-6 sm:col-span-3">
                    <label for="image1"
                        class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            @if ($image1)
                                <img src="{{ $image1->temporaryUrl() }}" class="w-full h-48 object-cover">
                            @else
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click to upload</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG</p>
                            @endif
                        </div>
                        <input id="image1" type="file" class="hidden" wire:model='image1' />
                    </label>
                    <x-input-error for="image1" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="image2"
                        class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            @if ($image2)
                                <img src="{{ $image2->temporaryUrl() }}" class="w-full h-48 object-cover">
                            @else
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click to upload</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG</p>
                            @endif
                        </div>
                        <input id="image2" type="file" class="hidden" wire:model='image2' />
                    </label>
                    <x-input-error for="image2" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="image3"
                        class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            @if ($image3)
                                <img src="{{ $image3->temporaryUrl() }}" class="w-full h-48 object-cover">
                            @else
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click to upload</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG</p>
                            @endif
                        </div>
                        <input id="image3" type="file" class="hidden" wire:model='image3' />
                    </label>
                    <x-input-error for="image3" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="image4"
                        class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            @if ($image4)
                                <img src="{{ $image4->temporaryUrl() }}" class="w-full h-48 object-cover">
                            @else
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click to upload</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG</p>
                            @endif
                        </div>
                        <input id="image4" type="file" class="hidden" wire:model='image4' />
                    </label>
                    <x-input-error for="image4" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-label for="price" value="{{ __('Price') }}" />
                    <x-input id="price" type="number" min="0" step="0.01" class="mt-1 block w-full"
                        wire:model="price" />
                    <x-input-error for="price" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-button wire:loading.attr="disabled" wire:target="store">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </x-form-section>

        <div class="mt-2">
            <x-danger-button wire:click='clear' wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-danger-button>
        </div>

        <x-section-border />
    @endif
</div>
