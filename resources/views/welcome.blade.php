<x-guest-layout>
    <x-slot:title>
        {{ config('app.name') }} - Kenya's Business Directory & Sales Management Platform
    </x-slot:title>

    <!-- Hero Section -->
    <x-parts.sliding-hero />

    <x-cards.featured-products />

    <!-- Animated Features Showcase -->
    <section class="py-16 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-slate-900 dark:to-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16" x-data="{ animated: false }" x-intersect="animated = true">
                <span class="inline-block px-4 py-2 mb-4 text-sm font-semibold tracking-widest text-emerald-600 dark:text-emerald-400 uppercase rounded-full bg-emerald-100 dark:bg-emerald-900/30 transition-all duration-500 transform"
                      :class="animated ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                    Features
                </span>
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl transition-all duration-500 delay-100"
                    :class="animated ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                    Everything you need to grow your business
                </h2>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-300 transition-all duration-500 delay-200"
                   :class="animated ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                    From business discovery to sales management, we've got you covered.
                </p>
            </div>

            <!-- Flip Cards Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- Business Directory Card -->
                <div x-data="{ isFlipped: false }"
                     @mouseenter="isFlipped = true"
                     @mouseleave="isFlipped = false"
                     x-intersect="$el.style.opacity = 1; $el.style.transform = 'translateY(0)'"
                     class="opacity-0 transform translate-y-8 transition-all duration-500"
                     style="transition-delay: 100ms">
                    <div class="relative h-64 perspective-1000">
                        <!-- Front Side -->
                        <div class="absolute inset-0 transition-all duration-700 transform preserve-3d"
                             :class="isFlipped ? 'rotate-y-180 opacity-0' : 'opacity-100'">
                            <div class="flex flex-col h-full p-6 bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-gray-100 dark:border-slate-700">
                                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-lg bg-emerald-500 text-white">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Business Directory</h3>
                                <p class="mt-2 text-gray-500 dark:text-gray-300">
                                    Get discovered by potential customers...
                                </p>
                                <div class="mt-auto pt-4 text-sm text-emerald-600 dark:text-emerald-400 font-medium">
                                    Hover to learn more →
                                </div>
                            </div>
                        </div>

                        <!-- Back Side -->
                        <div class="absolute inset-0 transition-all duration-700 transform preserve-3d rotate-y-180 backface-hidden"
                             :class="isFlipped ? 'rotate-y-0 opacity-100' : 'opacity-0'">
                            <div class="h-full p-6 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl shadow-lg text-white">
                                <h3 class="text-lg font-bold">Business Directory</h3>
                                <ul class="mt-4 space-y-2 text-sm">
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 w-4 h-4 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span>List in Kenya's top directory</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 w-4 h-4 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Enhanced business profile</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 w-4 h-4 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Customer reviews & ratings</span>
                                    </li>
                                </ul>
                                <button class="mt-6 px-4 py-2 text-sm font-medium bg-white text-emerald-600 rounded-lg hover:bg-gray-100 transition">
                                    Learn More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sales Management Card -->
                <div x-data="{ isFlipped: false }"
                     @mouseenter="isFlipped = true"
                     @mouseleave="isFlipped = false"
                     x-intersect="$el.style.opacity = 1; $el.style.transform = 'translateY(0)'"
                     class="opacity-0 transform translate-y-8 transition-all duration-500"
                     style="transition-delay: 200ms">
                    <div class="relative h-64 perspective-1000">
                        <!-- Front Side -->
                        <div class="absolute inset-0 transition-all duration-700 transform preserve-3d"
                             :class="isFlipped ? 'rotate-y-180 opacity-0' : 'opacity-100'">
                            <div class="flex flex-col h-full p-6 bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-gray-100 dark:border-slate-700">
                                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-lg bg-emerald-500 text-white">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Sales Management</h3>
                                <p class="mt-2 text-gray-500 dark:text-gray-300">
                                    Track sales, manage inventory, and monitor performance...
                                </p>
                                <div class="mt-auto pt-4 text-sm text-emerald-600 dark:text-emerald-400 font-medium">
                                    Hover to learn more →
                                </div>
                            </div>
                        </div>

                        <!-- Back Side -->
                        <div class="absolute inset-0 transition-all duration-700 transform preserve-3d rotate-y-180 backface-hidden"
                             :class="isFlipped ? 'rotate-y-0 opacity-100' : 'opacity-0'">
                            <div class="h-full p-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg text-white">
                                <h3 class="text-lg font-bold">Sales Management</h3>
                                <ul class="mt-4 space-y-2 text-sm">
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 w-4 h-4 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Real-time sales analytics</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 w-4 h-4 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Performance dashboards</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 w-4 h-4 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Customer insights</span>
                                    </li>
                                </ul>
                                <button class="mt-6 px-4 py-2 text-sm font-medium bg-white text-blue-600 rounded-lg hover:bg-gray-100 transition">
                                    Learn More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Point of Sale Card -->
                <div x-data="{ isFlipped: false }"
                     @mouseenter="isFlipped = true"
                     @mouseleave="isFlipped = false"
                     x-intersect="$el.style.opacity = 1; $el.style.transform = 'translateY(0)'"
                     class="opacity-0 transform translate-y-8 transition-all duration-500"
                     style="transition-delay: 300ms">
                    <div class="relative h-64 perspective-1000">
                        <!-- Front Side -->
                        <div class="absolute inset-0 transition-all duration-700 transform preserve-3d"
                             :class="isFlipped ? 'rotate-y-180 opacity-0' : 'opacity-100'">
                            <div class="flex flex-col h-full p-6 bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-gray-100 dark:border-slate-700">
                                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-lg bg-emerald-500 text-white">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Point of Sale</h3>
                                <p class="mt-2 text-gray-500 dark:text-gray-300">
                                    Process sales quickly and efficiently with our modern POS system...
                                </p>
                                <div class="mt-auto pt-4 text-sm text-emerald-600 dark:text-emerald-400 font-medium">
                                    Hover to learn more →
                                </div>
                            </div>
                        </div>

                        <!-- Back Side -->
                        <div class="absolute inset-0 transition-all duration-700 transform preserve-3d rotate-y-180 backface-hidden"
                             :class="isFlipped ? 'rotate-y-0 opacity-100' : 'opacity-0'">
                            <div class="h-full p-6 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg text-white">
                                <h3 class="text-lg font-bold">Point of Sale</h3>
                                <ul class="mt-4 space-y-2 text-sm">
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 w-4 h-4 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Fast checkout processing</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 w-4 h-4 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Multiple payment options</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 w-4 h-4 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Receipt printing & email</span>
                                    </li>
                                </ul>
                                <button class="mt-6 px-4 py-2 text-sm font-medium bg-white text-purple-600 rounded-lg hover:bg-gray-100 transition">
                                    Learn More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inventory Control Card -->
                <div x-data="{ isFlipped: false }"
                     @mouseenter="isFlipped = true"
                     @mouseleave="isFlipped = false"
                     x-intersect="$el.style.opacity = 1; $el.style.transform = 'translateY(0)'"
                     class="opacity-0 transform translate-y-8 transition-all duration-500"
                     style="transition-delay: 400ms">
                    <div class="relative h-64 perspective-1000">
                        <!-- Front Side -->
                        <div class="absolute inset-0 transition-all duration-700 transform preserve-3d"
                             :class="isFlipped ? 'rotate-y-180 opacity-0' : 'opacity-100'">
                            <div class="flex flex-col h-full p-6 bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-gray-100 dark:border-slate-700">
                                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-lg bg-emerald-500 text-white">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Inventory Control</h3>
                                <p class="mt-2 text-gray-500 dark:text-gray-300">
                                    Never run out of stock again. Track inventory levels...
                                </p>
                                <div class="mt-auto pt-4 text-sm text-emerald-600 dark:text-emerald-400 font-medium">
                                    Hover to learn more →
                                </div>
                            </div>
                        </div>

                        <!-- Back Side -->
                        <div class="absolute inset-0 transition-all duration-700 transform preserve-3d rotate-y-180 backface-hidden"
                             :class="isFlipped ? 'rotate-y-0 opacity-100' : 'opacity-0'">
                            <div class="h-full p-6 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl shadow-lg text-white">
                                <h3 class="text-lg font-bold">Inventory Control</h3>
                                <ul class="mt-4 space-y-2 text-sm">
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 w-4 h-4 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Real-time stock tracking</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 w-4 h-4 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Low stock alerts</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 w-4 h-4 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Supplier management</span>
                                    </li>
                                </ul>
                                <button class="mt-6 px-4 py-2 text-sm font-medium bg-white text-amber-600 rounded-lg hover:bg-gray-100 transition">
                                    Learn More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
