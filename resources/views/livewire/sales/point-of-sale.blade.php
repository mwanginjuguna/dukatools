<div class="">
    <div class="relative">
        <h1 class="p-2 bg-slate-50 dark:bg-slate-900 text-xl font-extrabold text-slate-800 dark:text-slate-300">Checkout</h1>

        <section class="">
            <!--search products-->
            <form class="sticky top-16 z-10">
                @if($success)
                    <h4 class="w-max px-2 py-1 bg-slate-200 dark:bg-slate-700 border dark:border-slate-600 rounded-lg text-sm font-medium text-amber-600 dark:text-amber-400">
                        Asante sana, na Karibu Tena!</h4>@endif
                <div class="px-3 bg-slate-50 dark:bg-slate-900">
                    <div class="p-1.5 flex flex-col sm:flex-row items-center gap-2">
                        <div class="relative w-full">
                            <label for="product-search" class="sr-only">Search Product</label>
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3">
                                <svg class="shrink-0 size-6 text-slate-600 dark:text-slate-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g> <path d="M11 6C13.7614 6 16 8.23858 16 11M16.6588 16.6549L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            </div>
                            <input
                                type="text" id="product-search"
                                name="product-search"
                                wire:model.live.throttle.300ms="searchTerm"
                                placeholder="Search for products..."
                                class="py-2 ps-12 pe-3 block w-full border-transparent rounded-lg text-sm focus:ring-transparent disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:text-slate-400 dark:placeholder-slate-500"
                            >
                        </div>
                    </div>
                    <p class="pb-1 text-xs text-slate-500 dark:text-slate-500">
                        Start typing product name to search.
                    </p>
                </div>
            </form>

            <div class="p-2 mt-6 mt-6 sm:mt-8 grid grid-cols-1 lg:grid-cols-4 lg:gap-12 xl:gap-16">
                <!--product list-->
                <div class="lg:col-span-2 order-last lg:order-1 mt-10 lg:mt-0">
                    <h3 class="mb-3 py-3 text-xl font-semibold text-gray-900 dark:text-white">Available Products.</h3>
                    <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2">
                        @forelse($products as $product)
                            <x-cards.vertical-image-text :product="$product"/>
                        @empty
                            <p class="text-center">No products found.</p>
                        @endforelse
                    </div>
                </div>

                <!-- summary -->
                <div class="w-full space-y-6 lg:order-2 lg:col-span-2 mt-6 lg:mt-0">
                    <!--cart items-->
                    <div class="min-w-0 flex-1 space-y-8">
                        <div class="space-y-4">
                            @forelse($cart as $item)
                                <x-cards.cart-item :product="$item" />
                            @empty
                                <x-parts.data-empty-state>
                                    <x-slot:icon>
                                        <svg class="size-10 text-gray-800 dark:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g> <path d="M21 5L19 12H7.37671M20 16H8L6 3H3M11 3L13.5 5.5M13.5 5.5L16 8M13.5 5.5L16 3M13.5 5.5L11 8M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                    </x-slot:icon>
                                    <p class="text-center">The cart is empty.</p>
                                </x-parts.data-empty-state>
                            @endforelse
                        </div>
                    </div>

                    <div class="lg:sticky md:top-28 max-w-3xl w-full mt-6 place-self-end p-3 bg-slate-50 dark:bg-slate-950 shadow-sm dark:shadow-emerald-900">

                        <!-- promo code -->
                        <div id="apply-discount" hidden>
                            <label for="voucher" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Enter a gift card, voucher or promotional code </label>
                            <div class="flex max-w-md items-center gap-4">
                                <input type="text" id="voucher"
                                       wire:model="discountCode"
                                       class="block w-full rounded-lg border border-orange-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-orange-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400"
                                       placeholder="" required/>
                                <button type="button"
                                        class="flex items-center justify-center rounded-lg bg-amber-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-amber-500 focus:outline-none dark:bg-amber-600 dark:hover:bg-amber-500">
                                    Apply
                                </button>
                            </div>
                        </div>

                        <!-- Total summary -->
                        <div class="py-6 px-3 w-full">
                            <div class="divide-y divide-gray-200 dark:divide-gray-800 text-sm text-gray-500 dark:text-gray-400">
                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="">Subtotal</dt>
                                    <dd class="text-slate-800 dark:text-slate-200">
                                        {{ config('app.currency_symbol'). ' '. number_format($cartTotal, 2) }}
                                    </dd>
                                </dl>

                                @if($discountAmount > 0)
                                <dl hidden class="flex items-center justify-between gap-4 py-3">
                                    <dt class="">Savings</dt>
                                    <dd class="text-green-500 dark:text-green-600">
                                        {{ config('app.currency_symbol'). ' '. number_format($discountAmount,2) }}
                                    </dd>
                                </dl>
                                @endif

                                @if($cartShippingFee > 0)
                                <dl class="hidden flex items-center justify-between gap-4 py-3">
                                    <dt class="">Delivery fee</dt>
                                    <dd class="">
                                        {{ config('app.currency_symbol'). ' '. number_format($cartShippingFee, 2) ?? '0.00' }}
                                    </dd>
                                </dl>
                                @endif

                                @if($cartTax)
                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="">Tax</dt>
                                    <dd class="">{{ number_format($cartTax, 2) ?? '0.00' }}</dd>
                                </dl>
                                @endif

                                <dl class="flex items-center justify-between gap-4 mt-3 py-3">
                                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                    <dd class="text-base font-bold text-gray-900 dark:text-white">
                                        {{ config('app.currency_symbol'). ' '. number_format($payable = $cartTotal + $cartTax + $cartShippingFee - $discountAmount, 2) }}
                                    </dd>
                                </dl>
                            </div>
                        </div>

                        @if($cartTotal > 0)
                        <!--Payment methods-->
                        <div class="space-y-4 mb-3">
                            <h3 class="text-gray-500 dark:text-gray-500">Payment Methods</h3>

                            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                <!--cash-->
                                <button
                                    @click="$dispatch('open-modal', 'process-cash')"
                                    class="flex flex-col gap-3 p-4 ps-4 bg-slate-100 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700">
                                        <span
                                            class="font-medium leading-none text-slate-900 dark:text-white">Process Cash</span>
                                    <span
                                        class="mt-1 text-xs font-normal text-slate-500 dark:text-slate-400">Paid with cash money.</span>
                                </button>

                                <!-- mpesa -->
                                <button
                                    @click="$dispatch('open-modal', 'process-mpesa')"
                                    class="flex flex-col gap-3 p-4 ps-4 bg-emerald-100 dark:bg-emerald-800 bg-opacity-50 rounded-lg border border-slate-200 dark:border-slate-700">
                                        <span
                                            class="font-medium leading-none text-slate-900 dark:text-slate-100">Process Mpesa</span>
                                    <span
                                        class="mt-1 text-xs font-normal text-slate-500 dark:text-slate-400">Lipa na Mpesa TIL/PAYBILL number.</span>
                                </button>

                                <!--card/bank-->
                                <button
                                    @click="$dispatch('open-modal', 'process-card')"
                                    class="flex flex-col gap-3 p-4 ps-4 rounded-lg border border-slate-200 dark:border-slate-700">
                                        <span
                                            class="font-medium leading-none text-slate-900 dark:text-slate-100">Process Card</span>
                                    <span
                                        class="mt-1 text-xs font-normal text-slate-500 dark:text-slate-400">Card-Swipe or Bank Transfer.</span>
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </section>

        <x-modal name="lipa-na-mpesa">
            <div class="px-4 py-10 bg-slate-200 dark:bg-slate-700 text-slate-800 dark:text-slate-200">
                <h3 class="text-lg py-2 font-bold">Lipa Na Mpesa</h3>

                <p class="py-3 text-sm">We will send you STK push notification to your phone. Check, confirm, and
                    Complete Payment by entering your MPESA PIN on your Phone.</p>

                <form class="max-w-sm" wire:submit="lipaNaMpesa">
                    <div class="mb-5">
                        <label for="mpesa-number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            Mpesa Number.</label>

                        <input type="text" id="mpesa-number"
                               name="mpesa-number"
                               wire:model="mpesaNumber"
                               placeholder="0720123456"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               required/>
                        @error('mpesaNumber')<p class="text-red-500 text-xs md:text-sm">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Pay Now!
                    </button>
                </form>

                <div
                    class="mt-3 py-4 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-slate-700 dark:shadow-slate-700/70">
                    <div class="border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:border-slate-700">
                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
                            Option 2: Pay with Paybill.
                        </p>
                    </div>

                    <div
                        class="bg-slate-100 border-b border-slate-200 text-sm text-slate-800 p-4 dark:bg-slate-800 dark:border-slate-700 dark:text-white">
                        <p class="mt-1 py-2 text-sm text-slate-600 dark:text-slate-400">
                            Go to Mpesa. Select Lipa na Mpesa. <span class="font-semibold">Then Paybill</span>
                        </p>

                        Enter Paybill Number: <span class="font-bold">{{ config('mpesa.shortcode') }}</span><br>
                        Account Number: <span class="font-bold">{{ config('mpesa.paybill_account') }}</span><br>
                    </div>
                </div>
            </div>
        </x-modal>
        <x-modal name="process-cash" maxWidth="xl">
            <div class="px-4 py-6 bg-slate-200 dark:bg-slate-700 text-slate-800 dark:text-slate-200">
                <div class="flex justify-between items-center">
                    <h3 class="mb-2 text-lg py-2 font-bold">
                        Lipa Cash
                    </h3>

                    <button
                        @click="$dispatch('close')"
                        type="button"
                    >
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                        </svg>
                    </button>
                </div>

            <dl class="flex items-center justify-between gap-4 mt-3 py-3">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                    <dd class="text-xl font-semibold text-amber-500 dark:text-amber-500">
                        {{ config('app.currency_symbol'). ' '. number_format($payable = $cartTotal + $cartTax + $cartShippingFee - $discountAmount, 2) }}
                    </dd>
                </dl>

                <form class="mt-3" wire:submit="processCashPayment">
                    <div class="mb-5">
                        <label for="cash-amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cash Amount.</label>

                        <input type="text" id="cash-amount"
                               name="cash-amount"
                               wire:model.live.debounce.500ms="cashAmount"
                               placeholder="1000"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               required/>
                        @error('cashAmount')<p class="text-red-500 text-xs md:text-sm">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit"
                            class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                        Complete!
                    </button>
                </form>

                @if($cashAmount > 0)
                    <div
                        class="mt-3 py-4 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-slate-700 dark:shadow-slate-700/70">
                        <div class="border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:border-slate-700">
                            <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
                                Customer Change (cash amount - total) <span class="block py-1 font-medium text-base text-emerald-500">= Ksh {{ $cashAmount - $cartTotal }}</span>
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </x-modal>
        <x-modal name="process-mpesa" maxWidth="xl">
            <div class="px-4 py-6 bg-slate-200 dark:bg-slate-700 text-slate-800 dark:text-slate-200">
                <div class="flex justify-between items-center">
                    <h3 class="mb-2 text-lg py-2 font-bold">
                        Lipa Na Mpesa
                    </h3>

                    <button
                        @click="$dispatch('close')"
                        type="button"
                    >
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                        </svg>
                    </button>
                </div>

            <dl class="flex items-center justify-between gap-4 mt-3 py-3">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                    <dd class="text-xl font-bold text-amber-500 dark:text-amber-500">
                        {{ config('app.currency_symbol'). ' '. number_format($payable = $cartTotal + $cartTax + $cartShippingFee - $discountAmount, 2) }}
                    </dd>
                </dl>

                <form class="mt-3" wire:submit="processMpesaPayment">
                    <div class="mb-3">
                        <label for="mpesa-amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount Paid .</label>

                        <input type="text" id="mpesa-amount"
                               name="mpesa-amount"
                               wire:model="mpesaAmount"
                               placeholder="{{ $cartTotal }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               />
                        @error('mpesaAmount')<p class="text-red-500 text-xs md:text-sm">{{ $message }}</p>@enderror
                    </div>

                    <!--mpesa number-->
                    <div class="mb-5">
                        <label for="mpesaNumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mpesa Number.</label>

                        <input type="text" id="mpesaNumber"
                               name="mpesaNumber"
                               wire:model="mpesaNumber"
                               placeholder="0712 345 678"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               />
                        <p id="helper-text-mpesa-number" class="mt-1 py-1 text-sm text-gray-500 dark:text-gray-400">
                            {{__('Enter Mpesa number used to pay by customer (optional - recommended).')}}</p>
                        @error('mpesaNumber')<p class="text-red-500 text-xs md:text-sm">{{ $message }}</p>@enderror
                    </div>

                    <!--transaction code-->
                    <div class="mb-5">
                        <label for="transaction-code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mpesa Transaction Code.</label>

                        <input type="text" id="transaction-code"
                               name="transaction-code"
                               wire:model="transactionCode"
                               placeholder="RLG6VYMSO7"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               required/>
                        <p id="helper-text-transaction-code" class="mt-1 py-1 text-sm text-gray-500 dark:text-gray-400">Enter the mpesa transaction code (optional).</p>
                        @error('transactionCode')<p class="text-red-500 text-xs md:text-sm">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit"
                            class="w-full sm:w-auto px-5 py-2.5 mt-2 text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                        Complete.
                    </button>
                </form>

                @if($cashAmount > 0)
                    <div
                        class="mt-3 py-4 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-slate-700 dark:shadow-slate-700/70">
                        <div class="border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:border-slate-700">
                            <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
                                Mpesa Due (cash amount - total amount) <span class="block py-1 font-medium text-base text-emerald-500">= Ksh {{ $cashAmount - $cartTotal }}</span>
                            </p>
                        </div>

                        <div
                            class="bg-slate-100 border-b border-slate-200 text-sm text-slate-800 p-4 dark:bg-slate-800 dark:border-slate-700 dark:text-white">
                            <p class="mt-1 py-2 text-sm text-slate-600 dark:text-slate-400">
                                Go to Mpesa. Select Lipa na Mpesa. <span class="font-semibold">Then Paybill</span>
                            </p>

                            Enter Paybill Number: <span class="font-bold">{{ config('mpesa.shortcode') }}</span><br>
                            Account Number: <span class="font-bold">{{ config('mpesa.paybill_account') }}</span><br>
                        </div>
                    </div>
                @endif
            </div>
        </x-modal>
        <x-modal name="process-card">
            <div class="px-4 py-10 bg-slate-200 dark:bg-slate-700 text-slate-800 dark:text-slate-200">
                <div class="flex justify-between items-center">
                    <h3 class="mb-2 text-lg py-2 font-bold">
                        Lipa na Bank/Card
                    </h3>

                    <button
                        @click="$dispatch('close')"
                        type="button"
                    >
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                        </svg>
                    </button>
                </div>

            <dl class="flex items-center justify-between gap-4 mt-3 py-3">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                    <dd class="text-xl font-bold text-amber-500 dark:text-amber-500">
                        {{ config('app.currency_symbol'). ' '. number_format($payable = $cartTotal + $cartTax + $cartShippingFee - $discountAmount, 2) }}
                    </dd>
                </dl>

                <form class="mt-3" wire:submit="processCardPayment">
                    <!--card amount-->
                    <div class="mb-5">
                        <label for="card-amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount Paid.</label>

                        <input type="text" id="card-amount"
                               name="card-amount"
                               wire:model="cardAmount"
                               placeholder="1000"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               required/>
                        @error('cardAmount')<p class="text-red-500 text-xs md:text-sm">{{ $message }}</p>@enderror
                    </div>

                    <!--transaction code-->
                    <div class="mb-3">
                        <label for="transaction-code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction Code.</label>

                        <input type="text" id="transaction-code"
                               name="transaction-code"
                               wire:model="transactionCode"
                               placeholder="Enter bank transaction code"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               required/>
                        @error('transactionCode')<p class="text-red-500 text-xs md:text-sm">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit"
                            class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                        Complete.
                    </button>
                </form>
            </div>
        </x-modal>
    </div>

    <!-- Scripts -->
    @script
    <script>
        Livewire.on('order-saved', () => {
            Swal.fire({title:'Order Saved!', text:'The order has been saved successfully.', icon:'success'});
            emit('close');
        })
    </script>
    @endscript
</div>
