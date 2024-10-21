@props(['product'])

<div class="p-2 rounded-lg shadow-sm border border-emerald-200 dark:border-emerald-600">
    <div class="w-full flex gap-x-2 items-center">
        <p class="shrink-0">
            <img class="h-12 w-12" src="/storage/{{ $product['image'] ?? '' }}" alt="{{ $product['product']['name'] }} image" />
        </p>

        <div class="space-y-2 w-full">
            <p class="">{{ $product['product']['name'] }}</p>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <button type="button"
                            id="decrement-button"
                            wire:click="removeFromCart({{$product['product']['id']}})"
                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none dark:border-gray-600 dark:bg-slate-800 dark:hover:bg-gray-900"
                    >
                        <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                        </svg>
                    </button>

                    <input type="text" id="cart-quantity" class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white" placeholder="" value="{{ $product['quantity'] }}" required />

                    <button type="button" id="increment-button"
                            wire:click="addToCart({{$product['product']['id']}})"
                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 dark:border-gray-600 dark:bg-slate-800 dark:hover:bg-gray-900"
                    >
                        <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                    </button>
                </div>

                <div class="">
                    <p class="text-base font-semibold text-end text-gray-900 dark:text-white">{{ config('app.currency_symbol') }} {{ number_format($product['subtotal'], 2) }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
