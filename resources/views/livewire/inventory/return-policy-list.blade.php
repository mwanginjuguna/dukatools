<div class="max-w-5xl mx-auto p-4 md:py-10">
    <!-- Breadcrumb -->
    <nav class="justify-between px-4 py-3 text-gray-700 border border-gray-200 rounded-lg sm:flex sm:px-5 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-2 rtl:space-x-reverse sm:mb-0">
            <li class="hidden lg:block">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" wire:navigate class="ms-1 text-sm font-medium text-sky-700 hover:text-sky-600 md:ms-2 dark:text-sky-400 dark:hover:text-white">Home</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 hidden lg:block w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="{{ route('vendor.inventory') }}" wire:navigate class="ms-1 text-sm font-medium text-sky-700 hover:text-sky-600 md:ms-2 dark:text-sky-400 dark:hover:text-white">Inventory</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center text-xs font-light text-gray-500 dark:text-gray-400 ">
                    <svg class="rtl:rotate-180 w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="mx-1 md:mx-2">
                        Categories
                    </span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold me-2 px-2 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 hidden lg:flex">
                        &cap;
                    </span>
                </div>
            </li>
        </ol>

        <x-dropdown align="left" width="max">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 text-xs font-normal text-center text-gray-600 bg-yellow-200 rounded-lg hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:text-gray-300 dark:focus:ring-gray-700">
                    <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm9-10v.4A3.6 3.6 0 0 1 8.4 9H6.61A3.6 3.6 0 0 0 3 12.605M14.458 3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                    </svg>Update category<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <div class="grid divide-y"


                <button @click="$dispatch('open-modal', 'upload-product-images')"
                        class="w-full px-4 py-2 text-sm text-start hover:bg-gray-100 dark:hover:bg-gray-600 hover:underline text-slate-700 dark:text-slate-300">
                    {{ __('Upload Images') }}
                </button>

                <button @click="$dispatch('open-modal', 'product-feature')"
                        class="w-full px-4 py-2 text-sm text-start hover:bg-gray-100 dark:hover:bg-gray-600 hover:underline text-slate-700 dark:text-slate-300">
                    {{ __('Add Feature') }}
                </button>

                <!-- Authentication -->
                <button wire:click=""
                        wire:confirm="Are you sure; (You cannot reverse this action)?"
                        class="w-full text-xs lg:text-base text-start">
                    <x-dropdown-link class="hover:underline text-red-500 dark:text-red-600">
                        {{ __('Delete') }}
                    </x-dropdown-link>
                </button>
            </x-slot>
        </x-dropdown>
    </nav>

    <div>
        <h1 class="mt-3 mb-4 font-bold text-lg">Return Policy settings.</h1>
    </div>
</div>

