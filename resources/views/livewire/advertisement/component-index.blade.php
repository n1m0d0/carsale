<div class="bg-white dark:bg-gray-900 p-6">
    <div class="flex flex-row-reverse">
        <x-button wire:click="create">
            {{ __('Create') }}
        </x-button>
    </div>

    <x-section-border />

    <div class="md:flex items-center justify-center gap-2 m-3">
        @foreach ($advertisements as $advertisement)
            <div
                class="mt-2 relative mx-auto border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] w-[300px]">
                <div class="h-[32px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -left-[17px] top-[72px] rounded-l-lg">
                </div>
                <div
                    class="h-[46px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -left-[17px] top-[124px] rounded-l-lg">
                </div>
                <div
                    class="h-[46px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -left-[17px] top-[178px] rounded-l-lg">
                </div>
                <div
                    class="h-[64px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -right-[17px] top-[142px] rounded-r-lg">
                </div>
                <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-white dark:bg-gray-800">
                    <x-sale-card>
                        @slot('image')
                            <img src="{{ Storage::url($advertisement->image1) }}"
                                class="rounded-t-lg w-full h-40 object-contain">
                        @endslot

                        @slot('text')
                            {{ $advertisement->brand }} <span class="text-sm font-normal text-gray-700 dark:text-gray-400">
                                {{ $advertisement->model }} </span>
                        @endslot

                        @slot('description')
                            {{ __('Manufactured') }}: <span class="text-base font-normal text-gray-700 dark:text-gray-400">
                                {{ $advertisement->manufactured }} </span>
                            <br>
                            {{ __('VIN code') }}: <span class="text-base font-normal text-gray-700 dark:text-gray-400">
                                {{ $advertisement->vin }} </span>
                            <br>
                            {{ __('Year') }}: <span class="text-base font-normal text-gray-700 dark:text-gray-400">
                                {{ $advertisement->year }} </span>
                        @endslot

                        @slot('functioning')
                            {{ $advertisement->functioning }}
                        @endslot

                        @slot('esthetic')
                            {{ $advertisement->esthetic }}
                        @endslot

                        @slot('published')
                            @if ($advertisement->is_publicated == false)
                                <span
                                    class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                    <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                                    {{ __('Pending') }}
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-red-300">
                                    <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                    {{ __('Published') }}
                                </span>
                            @endif
                        @endslot
                    </x-sale-card>

                    <div class="flex justify-center items-center mt-2">
                        @if ($advertisement->is_publicated == false)
                            <x-danger-button wire:click='modelDelete'>
                                {{ __('Delete') }}
                            </x-danger-button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
