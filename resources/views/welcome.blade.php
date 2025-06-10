<x-guest-layout>
    <x-slot:title>
        {{ config('app.name') }} - Kenya's Business Directory & Sales Management Platform
    </x-slot:title>

    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-white dark:bg-slate-900">
        <div class="mx-auto max-w-7xl">
            <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:w-full lg:max-w-2xl lg:pb-28 xl:pb-32">
                <main class="mx-auto mt-10 max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-5xl md:text-6xl">
                            <span class="block">Discover & Manage</span>
                            <span class="block text-emerald-600 dark:text-emerald-400">Kenya's Businesses</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 dark:text-gray-300 sm:mx-auto sm:mt-5 sm:max-w-xl sm:text-lg md:mt-5 md:text-xl lg:mx-0">
                            The all-in-one platform for business discovery, sales management, and inventory control. Join thousands of businesses already using Dukatools to grow their operations.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="{{ route('businesses.create') }}" class="flex w-full items-center justify-center rounded-md border border-transparent bg-emerald-600 px-8 py-3 text-base font-medium text-white hover:bg-emerald-700 md:py-4 md:px-10 md:text-lg">
                                    List Your Business
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="{{ route('businesses.index') }}" class="flex w-full items-center justify-center rounded-md border border-transparent bg-emerald-100 px-8 py-3 text-base font-medium text-emerald-700 hover:bg-emerald-200 dark:bg-emerald-900 dark:text-emerald-300 dark:hover:bg-emerald-800 md:py-4 md:px-10 md:text-lg">
                                    Browse Directory
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:h-full lg:w-full"
                 src="https://github.com/mwanginjuguna/public-image-assets/blob/main/dukatools/dukatools-sales-dashboard-light.png?raw=true"
                 alt="Dukatools Dashboard">
        </div>
    </div>

    <x-cards.featured-products />

    <!-- Features Section -->
    <div class="py-12 bg-white dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-emerald-600 dark:text-emerald-400 font-semibold tracking-wide uppercase">Features</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                    Everything you need to grow your business
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-300 lg:mx-auto">
                    From business discovery to sales management, we've got you covered.
                </p>
            </div>

            <div class="mt-10">
                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <!-- Business Directory -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-emerald-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Business Directory</h3>
                            <p class="mt-2 text-base text-gray-500 dark:text-gray-300">
                                Get discovered by potential customers. List your business in Kenya's most comprehensive business directory.
                            </p>
                        </div>
                    </div>

                    <!-- Sales Management -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-emerald-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Sales Management</h3>
                            <p class="mt-2 text-base text-gray-500 dark:text-gray-300">
                                Track sales, manage inventory, and monitor performance in real-time with our powerful dashboard.
                            </p>
                        </div>
                    </div>

                    <!-- Point of Sale -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-emerald-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Point of Sale</h3>
                            <p class="mt-2 text-base text-gray-500 dark:text-gray-300">
                                Process sales quickly and efficiently with our modern POS system. Accept payments and manage transactions seamlessly.
                            </p>
                        </div>
                    </div>

                    <!-- Inventory Control -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-emerald-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Inventory Control</h3>
                            <p class="mt-2 text-base text-gray-500 dark:text-gray-300">
                                Never run out of stock again. Track inventory levels, set reorder points, and manage suppliers all in one place.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-cards.sliding-featured-products />

    <!-- Stats Section -->
    <div class="bg-white dark:bg-slate-900 pt-12 sm:pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                    Trusted by businesses across Kenya
                </h2>
                <p class="mt-3 text-xl text-gray-500 dark:text-gray-300 sm:mt-4">
                    Join thousands of businesses already using Dukatools to grow their operations.
                </p>
            </div>
        </div>
        <div class="mt-10 pb-12 sm:pb-16">
            <div class="relative">
                <div class="absolute inset-0 h-1/2 bg-white dark:bg-slate-900"></div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-4xl mx-auto">
                        <dl class="rounded-lg bg-white dark:bg-slate-800 shadow-lg sm:grid sm:grid-cols-3">
                            <div class="flex flex-col border-b border-gray-100 dark:border-gray-700 p-6 text-center sm:border-0 sm:border-r">
                                <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500 dark:text-gray-300">
                                    Active Businesses
                                </dt>
                                <dd class="order-1 text-5xl font-extrabold text-emerald-600 dark:text-emerald-400">
                                    1,000+
                                </dd>
                            </div>
                            <div class="flex flex-col border-t border-b border-gray-100 dark:border-gray-700 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                                <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500 dark:text-gray-300">
                                    Monthly Transactions
                                </dt>
                                <dd class="order-1 text-5xl font-extrabold text-emerald-600 dark:text-emerald-400">
                                    50K+
                                </dd>
                            </div>
                            <div class="flex flex-col border-t border-gray-100 dark:border-gray-700 p-6 text-center sm:border-0 sm:border-l">
                                <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500 dark:text-gray-300">
                                    Happy Customers
                                </dt>
                                <dd class="order-1 text-5xl font-extrabold text-emerald-600 dark:text-emerald-400">
                                    10K+
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CTA Section -->
    <div class="bg-emerald-50 dark:bg-emerald-900">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                <span class="block">Ready to get started?</span>
                <span class="block text-emerald-600 dark:text-emerald-400">List your business today.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('businesses.create') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700">
                        Get started
                    </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="{{ route('contact-me') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-emerald-600 bg-white hover:bg-emerald-50 dark:bg-slate-800 dark:text-emerald-400 dark:hover:bg-slate-700">
                        Contact us
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
