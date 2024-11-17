<x-guest-layout>
    <x-slot:title>
        {{ config('app.name') }} - Sellers Companion
    </x-slot:title>

    <div class="lg:max-w-[95em] mb-6 lg:mb-14 mx-auto text-slate-800 dark:text-slate-100">
        {{-- hero --}}
        <div class="relative bg-gradient-to-tr from-slate-100/50 via-slate-100 to-amber-100 dark:from-slate-900/50 dark:via-slate-900/70 dark:to-amber-900">
            <div class="px-4 py-10 lg:py-16 grid lg:grid-cols-2 gap-4 items-center">
                <div class="mt-10 md:py-10">
                    <h4 class="text-base lg:text-xl font-medium bg-clip-text bg-gradient-to-l from-emerald-600 to-amber-500 text-transparent dark:from-emerald-400 dark:to-amber-400">
                        {{ __('Karibu Dukatools - Companion wa Shop!') }}
                    </h4>

                    <!-- Title -->
                    <div class="mt-5 max-w-2xl">
                        <h1 class="block font-semibold text-gray-800 text-4xl md:text-5xl lg:text-6xl dark:text-neutral-200">
                            {{ __('Digitize Duka Yako, Make Selling Easy Again!') }}
                        </h1>
                    </div>
                    <!-- End Title -->

                    <div class="mt-5 max-w-3xl">
                        <p class="py-2 lg:pe-4 text-lg lg:text-xl text-gray-600 dark:text-neutral-400">Say goodbye to manual record-keeping and hello to digital, automated Duka records. Dukatools helps you create product catalogues, process & track sales, and manage inventory all in one place. <strong>No more tedious paperwork or stockouts.</strong></p>
                    </div>

                    <!-- Buttons -->
                    <div class="mt-8 gap-x-6 flex items-center">
                        <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-emerald-600 text-white hover:bg-emerald-700 disabled:opacity-50 disabled:pointer-events-none" href="{{ route('register') }}">
                            Start Selling
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                        </a>
                        <x-parts.learn-more-link href="{{ route('login') }}">Login</x-parts.learn-more-link>
                    </div>
                </div>

                <img
                    src="https://cdn.shopify.com/b/shopify-brochure2-assets/a887e144dd7d29e316c4add7f934e236.webp"
                    alt="Dukatools Ad image"
                    class="mt-10 lg:mt-0 rounded-sm shadow-sm shadow-emerald-200/70 dark:shadow-emerald-700/70 hover:scale-[1.01] transition-all ease-in-out duration-500"
                >
            </div>
        </div>

        <!-- slider of dukas supported -->
        <div class="mt-4 lg:mt-10 p-4 py-10 lg:py-20 grid sm:grid-cols-2 lg:grid-cols-3">
            <!-- Shoes -->
            <div class="block border border-gray-200 rounded-sm hover:shadow-sm focus:outline-none dark:border-neutral-700">
                <div class="relative flex items-center overflow-hidden">
                    <img class="w-32 sm:w-48 h-full absolute inset-0 object-cover rounded-s-lg" src="https://madloba.info/media/images/factory-galleria-tbilisi-03.2e16d0ba.fill-720x405.jpg" alt="An Image of Shoes in Shop shelves">

                    <div class="grow p-4 ms-32 sm:ms-48">
                        <div class="min-h-24 flex flex-col justify-center">
                            <h3 class="font-semibold text-sm text-gray-800 dark:text-neutral-300">
                                Duka Ya Viatu
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                                Sell, monitor sales/stocks, track revenues for every shoe in any collection that goes through your shop.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hardware -->
            <div class="block border border-gray-200 rounded-sm hover:shadow-sm focus:outline-none dark:border-neutral-700">
                <div class="relative flex items-center overflow-hidden">
                    <img class="w-32 sm:w-48 h-full absolute inset-0 object-cover rounded-s-lg" src="https://cdn-imddh.nitrocdn.com/BgpVdYdrOyYzGZDHCldtezOehOYupTPa/assets/images/optimized/rev-f05fc79/www.technoserve.org/wp-content/uploads/2023/12/Francis-Kinyanjui-at-his-business-Evergreen-General-Store-1024x683.jpg" alt="Hardware Seller Image">

                    <div class="grow p-4 ms-32 sm:ms-48">
                        <div class="min-h-24 flex flex-col justify-center">
                            <h3 class="font-semibold text-sm text-gray-800 dark:text-neutral-300">
                                Hardware Store
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                                Imagine never losing a sale because of misplaced inventory again!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- furniture -->
            <div class="block border border-gray-200 rounded-sm hover:shadow-sm focus:outline-none dark:border-neutral-700">
                <div class="relative flex items-center overflow-hidden">
                    <img class="w-32 sm:w-48 h-full absolute inset-0 object-cover rounded-s-lg" src="https://cdn11.bigcommerce.com/s-9nl27vlw/images/stencil/532x532/products/7336/16320/KAJ_DARIO_9S_1__59931.1728039825.jpg?c=2" alt="Hardware Seller Image">

                    <div class="grow p-4 ms-32 sm:ms-48">
                        <div class="min-h-24 flex flex-col justify-center">
                            <h3 class="font-semibold text-sm text-gray-800 dark:text-neutral-300">
                                Furniture Shop
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                                Keep track of what’s in store. Streamline Your Furniture Sales!.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>

        <x-parts.mission-values />

    </div>

    <div class="mt-10 max-w-[95rem] relative p-4 py-10 lg:py-14">
        <div class="max-w-2xl text-center mx-auto mb-4">
            <h1 class="block text-3xl font-bold text-slate-800 sm:text-4xl md:text-5xl dark:text-slate-200">
                Make informed decisions with <span class="text-amber-500">up-to-the-minute sales data</span>
            </h1>
            <p class="mt-3 text-lg text-slate-800 dark:text-slate-200">Track your sales performance in real-time and adjust your strategies on the fly. Dukatools gives you the insights you need to boost your business.</p>
        </div>
        <div class="mt-6 max-w-7xl mx-auto grid items-center justify-center">
            <img
                src="https://github.com/mwanginjuguna/public-image-assets/blob/main/dukatools/dukatools-sales-dashboard-light.png?raw=true"
                class="rounded-sm shadow shadow-emerald-200/70 dark:shadow-emerald-700/70"
                alt="Screenshot Image of Dukatools Sales Dashboard"
            >
        </div>
    </div>

    <div class="mt-10 py-8 lg:py-14">
        <x-parts.how-it-works />
    </div>

    <div class="my-8 md:my-14 p-4 py-10 lg:py-16 lg:max-w-[95em] mx-auto text-slate-800 dark:text-slate-100">
        <x-parts.featured-story />
    </div>

    <!-- Getting help -->
    <div class="max-w-6xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
            <!-- start selling -->
            <a class="group flex flex-col bg-emerald-100 border shadow-sm rounded-xl hover:shadow-md transition dark:bg-emerald-900 dark:border-slate-800" href="{{ route('register')}}">
                <div class="p-4 md:p-5">
                    <div class="flex">
                        <svg class="mt-1 flex-shrink-0 size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>

                        <div class="grow ms-5">
                            <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
                                Join a community of sellers.
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-neutral-500">
                                Level up your shop. Let's go digital.
                            </p>
                        </div>
                    </div>
                </div>
            </a>

            <!-- live-chat -->
            <a class="group flex flex-col bg-emerald-100 border shadow-sm rounded-xl hover:shadow-md transition dark:bg-emerald-900 dark:border-slate-800" href="https://api.whatsapp.com/message/LDZPA35DBGTTI1">
                <div class="p-4 md:p-5">
                    <div class="flex">
                        <svg class="mt-1 flex-shrink-0 size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>

                        <div class="grow ms-5">
                            <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
                                Get help on WhatsApp
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-neutral-500">
                                Click to chat on Whatsapp
                            </p>
                        </div>
                    </div>
                </div>
            </a>

            <!-- email us -->
            <a class="group flex flex-col bg-emerald-100 border shadow-sm rounded-xl hover:shadow-md transition dark:bg-emerald-900 dark:border-neutral-800" href="mailto:francis@gameplanlabs.org">
                <div class="p-4 md:p-5">
                    <div class="flex">
                        <svg class="mt-1 flex-shrink-0 size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"/><path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"/></svg>

                        <div class="grow ms-5">
                            <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
                                Email us
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-neutral-500">
                                Reach out to Francis for custom help <span class="text-blue-600 decoration-2 group-hover:underline font-medium dark:text-blue-500">francis@gameplanlabs.org</span>
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- faqs -->
    <div class="max-w-6xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <x-parts.faqs />
    </div>
</x-guest-layout>
