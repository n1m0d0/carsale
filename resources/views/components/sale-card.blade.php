<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-700 dark:border-gray-600">
    <div class="flex items-center justify-center gap-2">
        {{ $image }}
    </div>
    <div class="p-4">        
        <h5 class="mb-2 text-center text-xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $text }}
        </h5>

        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            <p class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $description }}
            </p>
        </p>

        <div class="flex items-center mt-2.5">
            <h5 class="text-lg font-normal tracking-tight text-gray-700 dark:text-gray-400">
                {{ __('Functioning') }}
            </h5>
            <span
                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">
                {{ $functioning }}
            </span>
        </div>

        <div class="flex items-center mb-5">
            <h5 class="text-lg font-normal tracking-tight text-gray-700 dark:text-gray-400">
                {{ __('Esthetic') }}
            </h5>
            <span
                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">
                {{ $esthetic }}
            </span>
        </div>

        <h5 class="text-center text-2xl font-bold tracking-tight text-green-400 dark:text-green-600">
            {{ $price }}
        </h5>
    </div>

    <div class="flex items-center justify-center mb-3">
        {{ $published }}
    </div>
</div>
