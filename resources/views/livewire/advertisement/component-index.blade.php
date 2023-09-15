<div class="bg-white dark:bg-gray-900 p-6">
    <div class="flex flex-row-reverse">
        <x-button wire:click="create">
            {{ __('Create') }}
        </x-button>
    </div>

    <x-section-border />

    <div class="md:grid md:grid-cols-3 gap-2 m-3">
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
                                    class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                    <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                    {{ __('Published') }}
                                </span>
                            @endif
                        @endslot

                        @slot('price')
                            @money($advertisement->price)
                        @endslot
                    </x-sale-card>

                    <div class="flex justify-center items-center gap-2 mt-2">
                        @if ($advertisement->is_publicated == false)
                            <x-button wire:click='show({{ $advertisement->id }})'>
                                {{ __('Show') }}
                            </x-button>

                            <x-secondary-button wire:click='edit({{ $advertisement->id }})'>
                                {{ __('Edit') }}
                            </x-secondary-button>

                            <x-danger-button wire:click='destroy({{ $advertisement->id }})'>
                                {{ __('Delete') }}
                            </x-danger-button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-2 col-span-3">
            {{ $advertisements->links() }}
        </div>
    </div>

    <x-dialog-modal wire:model="deleteModal">
        <x-slot name="title">
            <div class="flex col-span-6 sm:col-span-4 items-center">
                <x-feathericon-alert-triangle class="h-10 w-10 text-red-500 mr-2" />
                {{ __('Delete') }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="flex col-span-6 sm:col-span-4 items-center gap-2">
                <x-feathericon-trash class="h-20 w-20 text-red-500 mr-2" />
                <p>
                    {{ __('Once deleted, the record cannot be recovered.') }}
                </p>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('deleteModal', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click='delete' wire:loading.attr="disabled">
                {{ __('Accept') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
