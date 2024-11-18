<div>
    <!-- Header -->
    <div class="p-3 lg:px-6 py-4 border-b border-slate-200 dark:border-slate-700">
        <h2 class="text-slate-800 dark:text-slate-200">
            {{ $user->email }}
        </h2>
        <p class="text-sm text-gray-600 dark:text-slate-400">
            {{ $user->phone_number ?? 'N/A' }}
        </p>

        <div class="mt-5 flex flex-col space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
            <div class="md:flex sm:items-center md:flex-1 space-4 mb-4 md:mb-0">
                <h5>
                    <span class="text-slate-500 text-sm">Name:</span>
                    <span class="dark:text-white font-medium text-base lg:text-lg">{{ $user->name }}</span>
                </h5>
                {{--<h5 class="md:ms-2">
                    <span class="text-slate-500 text-sm">Total sales:</span>
                    <span class="text-amber-500 dark:text-amber-600 font-semibold text-base lg:text-lg">Ksh {{ number_format($productSales, 2) }}</span>
                </h5>--}}
            </div>

            <!-- actions -->
            <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                <a href="{{route('products.create')}}" wire:navigate class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm text-white font-medium rounded-lg border border-transparent bg-emerald-500 dark:bg-emerald-600 hover:bg-emerald-700 dark:hover:bg-emerald-800 focus:outline-none focus:bg-emerald-700 dark:focus:bg-emerald-800 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    Create a new product
                </a>

                <a href="{{route('vendor.inventory')}}" wire:navigate class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    Update stocks
                </a>
                <button type="button" class="hidden flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    Export
                </button>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <!-- Table -->
    <div class="">
        {{ $user->name }}
    </div>
</div>
