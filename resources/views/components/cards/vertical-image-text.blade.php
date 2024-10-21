@props([
'product',
])
<!-- Card -->
<div class="group shadow-sm rounded-xl dark:shadow-slate-700 border border-slate-50 hover:border-emerald-200 dark:border-slate-900 dark:hover:border-emerald-800 transition-all ease-in-out duration-300">
    <div class="relative pt-[50%] sm:pt-[70%] overflow-hidden rounded-t-xl">
        <img
            class="size-full absolute top-0 start-0 object-cover rounded-t-xl group-hover:rounded-t-xl group-hover:scale-105 transition-transform duration-500 ease-in-out"
            src="/storage/{{ $product->image ?? '' }}" alt="{{ $product->name }} image">
        <span class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-neutral-900">
          {{ config('app.currency_symbol'). ' ' .number_format($product->price, 2) }}
        </span>
    </div>

    <div class="p-2">
        <h3 class="font-semibold text-sm text-slate-700 dark:text-slate-400 hover:underline">
            <a href="{{ route('vendor.products.show', $product->slug) }}" class="">{{ $product->name }}</a>
        </h3>
        <div class="flex flex-col gap-3">
            <p class="text-xs">
                @if($product->stock_quantity === 0)
                    <span class="text-xs text-red-500">Out of Stock</span>
                @else
                    <span class="text-sm font-medium">{{ $product->stock_quantity }}</span> items remaining
                @endif
            </p>
            @if($product->stock_quantity !== 0)
                <button
                    wire:click="addToCart({{$product->id}})"
                    class="p-1.5 rounded-md bg-emerald-500 dark:bg-emerald-500 text-white text-sm font-medium" wire:$refresh>
                    Add to Cart
                </button>
            @endif
        </div>
    </div>
</div>
<!-- End Card -->
