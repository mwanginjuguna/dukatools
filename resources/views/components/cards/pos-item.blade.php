@props([
'item',
'isOrder' => false,
])

<div class="max-w-2xl px-4 py-1.5 rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-slate-800">
    <div class="flex items-center justify-between gap-6 space-y-0">
        <img class="shrink-0 h-10 md:h-16 h-10 md:w-16 rounded-sm" src="/storage/{{ $item->product->image ?? '' }}" alt="{{ $item->product->name }} image" />

        <div class="w-full">
            <div class="mb-2">
                <a href="{{ route('vendor.products.show', $item->product->slug) }}" class="text-sm text-slate-700 dark:text-slate-400 hover:underline">{{ $item->product->name }}</a>
            </div>

            <div class="flex items-center justify-between">
                @if($isOrder)
                    <p class="text-sm font-medium">Quantity: {{ $item->quantity }}</p>
                @else
                    <label for="counter-input" class="sr-only">Quantity:</label>
                    <div class="flex items-center">
                        <button type="button"
                                wire:click="removeItem({{ $item->id }})"
                                class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600"
                                wire:$refresh
                        >
                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                            </svg>
                        </button>
                        <input type="text" class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white" placeholder="" value="{{ $item->quantity }}" required />
                        <button type="button"
                                wire:click="addItem({{$item->id}})"
                                class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600"
                                wire:$refresh
                        >
                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                        </button>
                    </div>
                @endif
                <div class="text-end md:w-32">
                    <p class="text-xs md:text-sm font-medium text-gray-900 dark:text-white">{{ config('app.currency_symbol'). ' ' .number_format($item->subtotal, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
