<div
    x-data="{
    isOpen: false
    }"
    class=""
>
    <div class="w-full mt-3 p-3 flex items-center justify-between cursor-pointer rounded-t-lg border border-slate-200 dark:border-slate-900 bg-slate-100 dark:bg-slate-800"
        @click="isOpen = !isOpen">
        <div class="md:w-4/5 flex flex-row items-center justify-between gap-4">
            <div>
                <span class="block mb-1 text-xs uppercase text-slate-500 dark:text-slate-500">ID:</span>
                <span class="block text-xs md:text-sm font-medium text-slate-800 dark:text-slate-200">{{ $order->reference }}</span>
            </div>

            <div>
                <span class="block mb-1 text-xs uppercase text-slate-500 dark:text-slate-500">Amount paid:</span>
                <span class="block text-xs md:text-sm font-medium text-slate-800 dark:text-slate-200">{{ config('app.currency_symbol') . ' ' . number_format($order->total, 2) }}</span>
            </div>

            <div class="hidden md:block">
                <span class="block mb-1 text-xs uppercase text-slate-500 dark:text-slate-500">Status:</span>
                <span class="block text-xs md:text-sm font-medium text-slate-800 dark:text-slate-200">{{ $order->status }}</span>
            </div>

            <div class="hidden md:block">
                <span class="block mb-1 text-xs uppercase text-slate-500 dark:text-slate-500">Date paid:</span>
                <span class="block text-xs md:text-sm font-medium text-slate-800 dark:text-slate-200">{{ $order->created_at->format('F j, Y H:i') }}</span>
            </div>
        </div>

        <button
        >
            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-8 text-slate-400 dark:text-slate-600"><path d="m6 9 6 6 6-6"/></svg>
            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-8 text-slate-400 dark:text-slate-600"><path d="m18 15-6-6-6 6"/></svg>
        </button>
    </div>
    <div x-show="isOpen" class="p-3 px-5 py-4 border border-t-0 border-slate-200 dark:border-slate-900 rounded-b-lg shadow-md bg-white dark:bg-slate-800">
        <h3 class="mb-2 px-3 text-sm font-medium">Sale details</h3>
        <div class="grid gap-4">
            <div
                class="mt-5 grid md:grid-cols-2 gap-x-1.5"
            >
                <div class="col-span-1 text-sm px-3 flex flex-col gap-y-2 text-slate-500 dark:text-slate-500">
                    <div class="flex md:flex-row gap-x-4 border-b dark:border-slate-600">
                        <p class="font-medium text-amber-500 dark:text-amber-600">Order Number: <span class="pr-1">{{ $order->reference }}</span></p>
                    </div>

                    <div class="flex flex-row gap-x-1.5 border-b dark:border-slate-600">
                        <p class="font-medium">Status: </p>
                        <p class="text-slate-700 dark:text-slate-300">{{ $order->status }}</p>
                    </div>

                    <div class="flex flex-row gap-x-1.5 border-b dark:border-slate-600">
                        <p class="font-medium">Total: </p>
                        <p class="font-bold text-sm md:text-base">{{ config('app.currency_symbol') . ' ' . number_format($order->total, 2) }}</p>
                    </div>

                    <div class="flex flex-row gap-x-1.5">
                        <p class="font-medium">Date: </p>
                        <p>{{ $order->created_at->format('F j, Y') }}</p>
                    </div>
                </div>

                <div class="md:col-span-1 px-3 md:ps-5 md:border-l">
                    <div class="space-y-1 text-sm">
                        <p class="text-slate-500 dark:text-slate-500">
                            Payment Details:
                            @if($order->is_paid)
                                <span class="text-green-600 dark:text-green-500 uppercase">
                                Paid {{ isset($order->payment_gateway) ? ' via '. $order->payment_gateway : '' }}
                            </span>
                            @else
                                <span class="text-red-600 dark:text-red-500 uppercase">
                                Not Paid
                            </span>
                            @endif
                        </p>
                        <p class="mt-2">
                            Payment Id:
                            <span class="text-xs font-medium text-slate-600 dark:text-slate-400">
                            {{ $order->payment_id ?? 'N/A'}}
                        </span>
                        </p>
                    </div>

                    <div class="mt-1 text-xs space-y-2">
                        <p class="pt-2 font-semibold text-sm text-amber-800 dark:text-amber-500">Customer Details </p>
                        <p class="leading-tight italic">{{ $order->customer_name }}</p>
                        <p class="leading-tight italic">{{ $order->customer_email }}</p>
                        <p class="leading-tight italic">{{ $order->customer_phone }}</p>
                    </div>
                </div>

                <a href="{{ route('orders.show', $order->id) }}" class="hidden md:col-span-3 mt-1 px-5 text-right text-sm underline underline-offset-4 decoration-dotted text-blue-500 hover:text-blue-600 dark:hover:text-blue-400">
                    View Sale Details
                </a>
            </div>
        </div>
    </div>
</div>
