<div class="bg-white dark:bg-gray-900 p-6">
    <x-form-section submit="searchVin">
        <x-slot name="title">
            {{ __('VIN code') }}
        </x-slot>

        <x-slot name="description">
            {{ __('It is an international standard that consists of 17 alphanumeric characters that allow you to identify and know the records of a car.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('VIN') }}
                </h3>
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-400">
                    {{ $advertisement->vin }}
                </h5>
            </div>
        </x-slot>
    </x-form-section>

    <x-section-border />

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
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-400">
                            {{ $advertisement->brand }}
                        </h5>
                    </div>
                </div>

                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Model') }}
                    </h3>

                    <div class="mt-1 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-400">
                            {{ $advertisement->model }}
                        </h5>
                    </div>
                </div>

                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Manufactured') }}
                    </h3>

                    <div class="mt-1 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-400">
                            {{ $advertisement->manufactured }}
                        </h5>
                    </div>
                </div>

                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Year') }}
                    </h3>

                    <div class="mt-1 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-400">
                            {{ $advertisement->year }}
                        </h5>
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
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Plate') }}
                </h3>
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-400">
                    {{ $advertisement->plate }}
                </h5>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Mileage') }}
                </h3>
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-400">
                    {{ $advertisement->mileage }}
                </h5>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Functioning') }}
                </h3>
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-400">
                    {{ $advertisement->functioning }}
                </h5>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Esthetic') }}
                </h3>
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-400">
                    {{ $advertisement->esthetic }}
                </h5>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="image1"
                    class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">                        
                        <img src="{{ Storage::url($advertisement->image1) }}" class="w-full h-48 object-cover">                        
                    </div>
                </label>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="image2"
                    class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <img src="{{ Storage::url($advertisement->image2) }}" class="w-full h-48 object-cover">   
                    </div>
                </label>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="image3"
                    class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <img src="{{ Storage::url($advertisement->image3) }}" class="w-full h-48 object-cover">   
                    </div>
                </label>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="image4"
                    class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <img src="{{ Storage::url($advertisement->image4) }}" class="w-full h-48 object-cover">   
                    </div>
                </label>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Price') }}
                </h3>
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-400">
                    @money($advertisement->price)
                </h5>
            </div>
        </x-slot>

        <x-slot name="actions">
            
        </x-slot>
    </x-form-section>

    <x-section-border />
</div>
