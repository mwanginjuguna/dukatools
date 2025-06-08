<div>
    <div class="rounded-lg border border-gray-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-800 md:p-8">
        <h3 class="mb-4 text-xl font-semibold text-slate-900 dark:text-white">{{ $listTitle ?? 'My' }} Orders</h3>
        @if($orders->count() < 1)
            <x-parts.data-empty-state>
                No Orders Found
            </x-parts.data-empty-state>
        @else
            @foreach($orders as $order)
                <div class="flex flex-wrap items-center gap-y-4 border-b border-slate-200 pb-4 dark:border-slate-700 md:pb-5">
                    <dl class="w-1/2 sm:w-48">
                        <dt class="text-base font-medium text-slate-500 dark:text-slate-400">Order ID:</dt>
                        <dd class="mt-1.5 text-base font-semibold text-slate-900 dark:text-white">
                            <a href="#" class="hover:underline">#{{ $order->reference }}</a>
                        </dd>
                    </dl>

                    <dl class="w-1/2 sm:w-1/4 md:flex-1 lg:w-auto">
                        <dt class="text-base font-medium text-slate-500 dark:text-slate-400">Date:</dt>
                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{ $order->created_at->format('d-m-Y') }}</dd>
                    </dl>

                    <dl class="w-1/2 sm:w-1/5 md:flex-1 lg:w-auto">
                        <dt class="text-base font-medium text-slate-500 dark:text-slate-400">Price:</dt>
                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{ config('app.currency_symbol') . ' ' . number_format($order->total, 2) }}</dd>
                    </dl>

                    <dl class="w-1/2 sm:w-1/4 sm:flex-1 lg:w-auto">
                        <dt class="text-base font-medium text-slate-500 dark:text-slate-400">Status:</dt>
                        <dd class="me-2 mt-1.5 inline-flex shrink-0 items-center rounded bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                            <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"></path>
                            </svg>
                            {{ $order->status }}
                        </dd>
                    </dl>

                    <div class="w-full sm:flex sm:w-32 sm:items-center sm:justify-end sm:gap-4">
                        <x-dropdown>
                            <x-slot:trigger>
                                <button
                                    type="button"
                                    class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto"
                                >
                                    Actions
                                    <svg class="-me-0.5 ms-1.5 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"></path>
                                    </svg>
                                </button>
                            </x-slot:trigger>

                            <x-slot:content>
                                <div class="z-10 divide-y divide-gray-100">
                                    <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        <li>
                                            <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4"></path>
                                                </svg>
                                                <span>Order again</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"></path>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                </svg>
                                                Order details
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <svg class="me-1.5 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"></path>
                                                </svg>
                                                Cancel order
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </x-slot:content>
                        </x-dropdown>

                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
