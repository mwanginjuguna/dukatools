<div>
    <div class="">
        <h4 class="w-max px-2 py-1 bg-slate-200 dark:bg-slate-700 border dark:border-slate-600 rounded-lg text-sm font-medium text-amber-600 dark:text-amber-400">
            Thank You! It's ready to ship.</h4>
        <h1 class="my-3 py-2 text-xl text-2xl font-extrabold text-slate-800 dark:text-slate-300">Checkout</h1>

        <section class="relative bg-white p-2 md:p-6 py-8 antialiased dark:bg-gray-900 md:py-16">
            <form class="">
                <ol class="items-center hidden md:flex w-full max-w-2xl text-center text-xs md:text-sm text-slate-500 dark:text-slate-600">
                    <li class="after:border-1 flex items-center text-blue-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-blue-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                        <span
                            class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                            <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                 viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Selling
                        </span>
                    </li>

                    <li class="flex shrink-0 items-center">
                        <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        Sold
                    </li>
                </ol>

                <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
                    <div class="min-w-0 flex-1 space-y-8">

                        <!--delivery / customer details-->
                        <div class="space-y-4 hidden">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details</h2>

                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label for="name"
                                           class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your
                                        name </label>
                                    <input type="text" id="name"
                                           wire:model="form.name"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                           placeholder="Connie Jambo" required/>
                                </div>

                                <div>
                                    <label for="your_email"
                                           class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your
                                        email* </label>
                                    <input type="email" id="your_email"
                                           wire:model="form.email"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           placeholder="name@gmail.com" required/>
                                </div>

                                <div>
                                    <div class="mb-2 flex items-center gap-2">
                                        <label for="select-country-input-3"
                                               class="block text-sm font-medium text-gray-900 dark:text-white">
                                            Country* </label>
                                    </div>
                                    <select id="select-country-input-3"
                                            wire:model="form.country"
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                        <option value="KE" selected>Kenya</option>
                                        <option value="US">United States</option>
                                        <option value="AS">Australia</option>
                                        <option value="FR">France</option>
                                        <option value="ES">Spain</option>
                                        <option value="UK">United Kingdom</option>
                                    </select>
                                </div>

                                <div>
                                    <div class="mb-2 flex items-center gap-2">
                                        <label for="city"
                                               class="block text-sm font-medium text-gray-900 dark:text-white">
                                            City* </label>
                                    </div>
                                    <input type="text" id="city"
                                           wire:model="form.city"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           placeholder="Nairobi" required/>
                                </div>

                                <div>
                                    <div class="mb-2 flex items-center gap-2">
                                        <label for="apartment-suite"
                                               class="block text-sm font-medium text-gray-900 dark:text-white"> Street /
                                            Apartment Suite </label>
                                    </div>
                                    <input type="text" id="apartment-suite"
                                           wire:model="form.apartmentSuite"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           placeholder="Palace Apartments, Soweto, Kahawa West"/>
                                </div>

                                <div>
                                    <label for="phone-number"
                                           class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Phone
                                        Number* </label>
                                    <input type="text" id="phone-number"
                                           wire:model="form.phoneNumber"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           placeholder="+254 712 000 000" required/>
                                </div>

                                <div>
                                    <label for="address"
                                           class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                        Address* </label>
                                    <input type="text" id="address"
                                           wire:model="form.streetAddress"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           placeholder="PO Box 2456 Kahawa West, Nairobi" required/>
                                </div>

                                <div>
                                    <label for="zip-code"
                                           class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Zip
                                        Code* </label>
                                    <input type="text" id="zip-code"
                                           wire:model="form.zipCode"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           placeholder="00100" required/>
                                </div>

                                <div>
                                    <label for="company_name"
                                           class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Company
                                        name </label>
                                    <input type="text" id="company_name"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           placeholder="Fitbit LTD"/>
                                </div>
                            </div>
                        </div>

                        <!--products or order items-->
                        <div class="space-y-4">
                            @foreach($order->orderItems as $item)
                                <x-cards.pos-item :item="$item"/>
                            @endforeach
                        </div>

                        <!--Payment methods-->
                        <div class="space-y-4">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment Methods</h3>

                            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                <div
                                    class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                    <div class="flex items-start">
                                        <div class="flex h-5 items-center">
                                            <input id="dhl" aria-describedby="dhl-text" type="radio"
                                                   name="delivery-method" value=""
                                                   class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                                   checked/>
                                        </div>

                                        <div class="ms-4 text-sm">
                                            <label for="dhl"
                                                   class="font-medium leading-none text-gray-900 dark:text-white">Cash</label>
                                            <p id="dhl-text"
                                               class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Paid with cash money.</p>
                                        </div>
                                    </div>
                                </div>

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
                    </div>

                    <!-- cash summary -->
                    <div class="md:sticky md:top-10 mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                        <div class="mb-6 md:mb-10">
                            <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">
                                        {{ config('app.currency_symbol'). ' '. number_format($order->subtotal, 2) }}
                                    </dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                    <dd class="text-base font-medium text-green-500">
                                        {{ config('app.currency_symbol'). ' '. number_format($order->subtotal - $order->total,2) }}
                                    </dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Store Pickup</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">
                                        {{ config('app.currency_symbol'). ' '. isset($order->shipping_fee) ? number_format($sh = $order->shipping_fee, 2) : '0.00' }}
                                    </dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">{{ isset($order->total) ? number_format($tx = $order->tax, 2) : '0.00' }}</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                    <dd class="text-base font-bold text-gray-900 dark:text-white">
                                        {{ config('app.currency_symbol'). ' '. number_format($payable = $order->total + $tx + $sh, 2) }}
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
            </form>
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
