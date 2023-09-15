<div class="p-6">
    <div class="flex flex-row-reverse">
        <form class="w-full">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" wire:model.live="search"
                    class="block w-full p-4 pl-10 text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">

                @if ($search)
                    <button wire:click='resetSearch'
                        class="text-white absolute right-2.5 bottom-2.5 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">X</button>
                @endif
            </div>
        </form>
    </div>

    <x-section-border />


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Image') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Brand') }} / {{ __('Model') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Year') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Price') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Publicated') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($advertisements as $advertisement)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ Storage::url($advertisement->image1) }}"
                                class="w-16 h-16 rounded-full object-cover" alt="{{ $advertisement->model }}">
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="pl-3">
                                <div class="text-base font-semibold">{{ $advertisement->brand }}</div>
                                <div class="font-normal text-gray-500">{{ $advertisement->model }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            {{ $advertisement->year }}
                        </td>
                        <td class="px-6 py-4 text-green-400 dark:text-green-600">
                            @money($advertisement->price)
                        </td>
                        <td class="px-6 py-4">
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
                        </td>
                        <td class="px-6 py-4">
                            <x-button wire:click='show({{ $advertisement->id }})'>
                                {{ __('Show') }}
                            </x-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white dark:bg-gray-900 mt-2 p-6 rounded-lg">
        {{ $advertisements->links() }}
    </div>

    <x-section-border />
</div>
