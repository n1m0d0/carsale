<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-2">
            <a href="{{ route('advertisement.index') }}"
                class="font-semibold text-xl text-gray-600 dark:text-gray-400 leading-tight hover:text-gray-800 dark:hover:text-gray-200 cursor-pointer">
                {{ __('Advertisement') }}
            </a>

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                /
            </h2>

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('advertisement.component-edit', ['advertisement' => $advertisement])
            </div>
        </div>
    </div>
</x-app-layout>