<div class="">
    <div class="relative">

        <section class="bg-slate-50 p-2 md:p-6 antialiased dark:bg-slate-900">
            <!--search products-->
            <form class="sticky top-16 z-10">
                <div class="p-3 bg-slate-50 dark:bg-slate-900">
                    @if($success)
                        <h4 class="w-max px-2 py-1 bg-slate-200 dark:bg-slate-700 border dark:border-slate-600 rounded-lg text-sm font-medium text-amber-600 dark:text-amber-400">
                            Asante sana, na Karibu Tena!</h4>@endif
                    <h1 class="py-2 text-xl font-extrabold text-slate-800 dark:text-slate-300">Checkout</h1>
                    <div class="p-1.5 flex flex-col sm:flex-row items-center gap-2 border border-slate-100 rounded-lg dark:border-slate-800">
                        <div class="relative w-full">
                            <label for="product-search" class="sr-only">Search Product</label>
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3">
                                <svg class="shrink-0 size-5 text-slate-400 dark:text-slate-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g> <path d="M11 6C13.7614 6 16 8.23858 16 11M16.6588 16.6549L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            </div>
                            <input
                                type="text" id="product-search"
                                name="product-search"
                                wire:model.live.throttle.300ms="searchTerm"
                                placeholder="Search for products..."
                                class="py-2 ps-9 pe-3 block w-full border-transparent rounded-lg text-sm focus:border-transparent focus:ring-transparent disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:text-slate-400 dark:placeholder-slate-500"
                            >
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-slate-500 dark:text-slate-500">
                        Start typing product name to search.
                    </p>
                </div>
            </form>

            <div class=" mt-6 mt-6 sm:mt-8 grid grid-cols-1 lg:grid-cols-5 lg:gap-12 xl:gap-16">
                <!--product list-->
                <div class="lg:col-span-2 order-last lg:order-1">
                    <h3 class="mb-3 text-xl font-semibold text-gray-900 dark:text-white">Available Products.</h3>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                        @forelse($products as $product)
                            <x-cards.vertical-image-text :product="$product"/>
                        @empty
                            <p class="text-center">No products found.</p>
                        @endforelse
                    </div>
                </div>

                <!-- summary -->
                <div class="w-full space-y-6 lg:order-2 lg:col-span-3 mt-6 lg:mt-0">
                    <!--products or order items-->
                    <div class="min-w-0 flex-1 space-y-8">
                        <div class="space-y-4">
                            @forelse($cart as $item)
                                <x-cards.cart-item :product="$item" />
                            @empty
                                <x-parts.data-empty-state>
                                    <x-slot:icon>
                                        <svg class="size-10 text-gray-800 dark:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g> <path d="M21 5L19 12H7.37671M20 16H8L6 3H3M11 3L13.5 5.5M13.5 5.5L16 8M13.5 5.5L16 3M13.5 5.5L11 8M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                    </x-slot:icon>
                                    <p class="text-center">The cart is empty.</p>
                                </x-parts.data-empty-state>
                            @endforelse
                        </div>
                    </div>

                    <div class="max-w-3xl mt-6 place-self-end">
                        <!--Payment methods-->
                        <div class="space-y-4 mb-3">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment Methods</h3>

                            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                <button
                                    wire:click="processCashPayment()"
                                    class="flex flex-col gap-3 rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">

                                        <span
                                               class="font-medium leading-none text-gray-900 dark:text-white">Process Cash</span>
                                        <span
                                           class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Paid with cash money.</span>
                                </button>

                                <div
                                    class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                    <div class="flex items-start">
                                        <div class="flex h-5 items-center">
                                            <input id="fedex" aria-describedby="fedex-text" type="radio"
                                                   name="delivery-method" value=""
                                                   class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"/>
                                        </div>

                                        <div class="ms-4 text-sm">
                                            <label for="fedex"
                                                   class="font-medium leading-none text-gray-900 dark:text-white">Mpesa</label>
                                            <p id="fedex-text"
                                               class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Til number or Paybill</p>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                    <div class="flex items-start">
                                        <div class="flex h-5 items-center">
                                            <input id="express" type="radio"
                                                   name="delivery-method" value=""
                                                   class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"/>
                                        </div>

                                        <div class="ms-4 text-sm">
                                            <label for="express" class="font-medium leading-none text-gray-900 dark:text-white">
                                                Card
                                            </label>

                                            <p id="express-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">
                                                Bank or Card
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- promo code -->
                        <div id="apply-discount">
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
                        <div class="mt-4 py-2">
                            <div class="divide-y divide-gray-200 dark:divide-gray-800 text-sm text-gray-500 dark:text-gray-400">
                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="">Subtotal</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">
                                        {{ config('app.currency_symbol'). ' '. number_format($cartTotal, 2) }}
                                    </dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="">Savings</dt>
                                    <dd class="text-base font-medium text-green-500">
                                        {{ config('app.currency_symbol'). ' '. number_format($discountAmount,2) }}
                                    </dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="">Store Pickup</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">
                                        {{ config('app.currency_symbol'). ' '. number_format($cartShippingFee, 2) ?? '0.00' }}
                                    </dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="">Tax</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">{{ number_format($cartTax, 2) ?? '0.00' }}</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 mt-3 py-3">
                                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                    <dd class="text-base font-bold text-gray-900 dark:text-white">
                                        {{ config('app.currency_symbol'). ' '. number_format($payable = $cartTotal + $cartTax + $cartShippingFee - $discountAmount, 2) }}
                                    </dd>
                                </dl>
                            </div>
                        </div>

                        <!--pay buttons -->
                        <div class="space-y-3 mt-6 sm:mt-16 flex justify-end">
                            <button type="submit"
                                    @click="$dispatch('open-modal', 'create-new-brand')"
                                    class="inline-flex items-center gap-x-3 px-5 py-3.5 text-lg font-bold uppercase text-center text-white hover:text-slate-800 dark:text-slate-800 dark:hover:text-slate-200 bg-emerald-600 dark:bg-emerald-500 rounded-lg hover:bg-emerald-500 dark:hover:bg-emerald-600 transition-all ease-in-out duration-300"
                            >
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>


                                <span>Paid</span>
                            </button>
                        </div>
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
    </div>
</div>
