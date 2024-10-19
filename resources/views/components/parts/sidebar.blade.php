<div id="cta-button-sidebar"
     {{ $attributes }}
     aria-label="Sidebar">
    <div class="min-h-screen px-3 py-10 overflow-y-auto bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100">
        <div class="mt-4 mb-6 md:py-4 lg:py-8">
            <a href="/" class="flex items-center ps-2.5 mb-6" wire:navigate>
                <x-application-logo />
                <span class="pl-3 self-center font-semibold text-amber-500 dark:text-amber-500">{{ config('app.name') }}</span>
            </a>
        </div>

        <!-- main pages -->
        <div class="mt-6 lg:mt-8 mb-4 p-2 space-y-3 font-medium">
            <x-side-link
                :href="auth()->user()->role === 'A' ? route('admin.dashboard') : route('dashboard')"
                :active="request()->routeIs('admin.dashboard') ?? request()->routeIs('dashboard')"
                wire:navigate
            >
                <svg class="w-7 h-7 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg>

                <span class="ms-3 md:text-base">{{ __('Dashboard') }}</span>
            </x-side-link>


            <x-side-link :href="route('vendor.pos')" :active="request()->routeIs('vendor.pos')" wire:navigate>
                <svg class="w-8 h-8" fill="currentColor" height="24px" width="24px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 128 128" xml:space="preserve"><g> <g> <polygon points="22,31.6 22,35.3 115.9,35.3 115.9,82.7 119.5,82.7 119.5,31.6 "></polygon> <polygon points="15.3,42 109.2,42 109.2,89.4 112.8,89.4 112.8,38.4 15.3,38.4 "></polygon> <path d="M23.9,45.4H8.5v15.4V81v15.4h15.4h66.7H106V81V60.8V45.4H90.6H23.9z M102,60.2v21.2c-5.3,1.4-9.4,5.6-10.9,11H23.3 c-1.4-5.4-5.6-9.5-10.9-11V60.2c5.3-1.4,9.4-5.6,10.9-11h67.8C92.4,54.6,96.6,58.8,102,60.2z"></path> <circle cx="57.2" cy="70.9" r="18"></circle> </g> </g></svg>

                <span class="ms-3 md:text-base">{{ __('Checkout') }}</span>
            </x-side-link>

            <x-side-link :href="route('products.create')" :active="request()->routeIs('products.create')" wire:navigate>
                <svg class="w-7 h-7 text-amber-500 dark:text-amber-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="M19 16v6"/><path d="M22 19h-6"/></svg>

                <span class="ms-3 md:text-base">{{ __('New Customer') }}</span>
            </x-side-link>

        </div>

        <!-- vendor tools -->
        <div
            x-data="{expanded: false}"
            class="mt-6 space-y-1 font-medium text-sm xl:text-base shadow-sm shadow-emerald-900 dark:shadow-emerald-700 rounded-lg group"
        >
            <button
                x-on:click="expanded = ! expanded"
                class="w-full inline-flex items-center justify-between px-3 py-2 text-slate-600 dark:text-slate-400 group-hover:text-emerald-500 dark:group-hover:text-emerald-600"
            >
                <span class="inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 me-2.5"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg> {{__('Duka Tools')}}</span>

                <svg x-show="expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                <svg x-show="!expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </button>

            <div x-show="expanded" class="w-full flex flex-col gap-3 lg:gap-6 p-2 lg:px-4 bg-slate-100 dark:bg-slate-900 rounded-b">
                <x-side-link :href="route('products.index')" :active="request()->routeIs('products.index')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/><path d="M2 7h20"/><path d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"/></svg>

                    <span class="ms-3">{{ __('My Shop') }}</span>
                </x-side-link>

                <x-side-link :href="route('products.create')" :active="request()->routeIs('products.create')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>

                    <span class="ms-3">{{ __('Add Product') }}</span>
                </x-side-link>

                <x-side-link :href="route('vendor.categories')" :active="request()->routeIs('vendor.categories')" wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 me-2.5"><path d="m16.02 12 5.48 3.13a1 1 0 0 1 0 1.74L13 21.74a2 2 0 0 1-2 0l-8.5-4.87a1 1 0 0 1 0-1.74L7.98 12"/><path d="M13 13.74a2 2 0 0 1-2 0L2.5 8.87a1 1 0 0 1 0-1.74L11 2.26a2 2 0 0 1 2 0l8.5 4.87a1 1 0 0 1 0 1.74Z"/></svg>
                    {{ __('Categories') }}
                </x-side-link>

                <x-side-link :href="route('vendor.brands')" :active="request()->routeIs('vendor.brands')" wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 me-2.5"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg> {{ __('Brands') }}
                </x-side-link>
            </div>

        </div>

        <!-- sales -->
        <div
            x-data="{expanded: false}"
            class="mt-6 space-y-1 font-medium text-sm xl:text-base shadow-sm shadow-emerald-900 dark:shadow-emerald-700 rounded-lg group"
        >
            <button
                x-on:click="expanded = ! expanded"
                class="w-full inline-flex items-center justify-between px-3 py-2 text-slate-600 dark:text-slate-400 group-hover:text-emerald-500 dark:group-hover:text-emerald-600"
            >
                <span><svg class="inline-flex items-center" fill="currentColor" width="24" height="24" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><g><path d="M136.948 908.811c5.657 0 10.24-4.583 10.24-10.24V610.755c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v287.816c0 5.657 4.583 10.24 10.24 10.24h81.92zm0 40.96h-81.92c-28.278 0-51.2-22.922-51.2-51.2V610.755c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v287.816c0 28.278-22.922 51.2-51.2 51.2zm278.414-40.96c5.657 0 10.24-4.583 10.24-10.24V551.322c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v347.249c0 5.657 4.583 10.24 10.24 10.24h81.92zm0 40.96h-81.92c-28.278 0-51.2-22.922-51.2-51.2V551.322c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v347.249c0 28.278-22.922 51.2-51.2 51.2zm278.414-40.342c5.657 0 10.24-4.583 10.24-10.24V492.497c0-5.651-4.588-10.24-10.24-10.24h-81.92c-5.652 0-10.24 4.589-10.24 10.24v406.692c0 5.657 4.583 10.24 10.24 10.24h81.92zm0 40.96h-81.92c-28.278 0-51.2-22.922-51.2-51.2V492.497c0-28.271 22.924-51.2 51.2-51.2h81.92c28.276 0 51.2 22.929 51.2 51.2v406.692c0 28.278-22.922 51.2-51.2 51.2zm278.414-40.958c5.657 0 10.24-4.583 10.24-10.24V441.299c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v457.892c0 5.657 4.583 10.24 10.24 10.24h81.92zm0 40.96h-81.92c-28.278 0-51.2-22.922-51.2-51.2V441.299c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v457.892c0 28.278-22.922 51.2-51.2 51.2zm-6.205-841.902C677.379 271.088 355.268 367.011 19.245 387.336c-11.29.683-19.889 10.389-19.206 21.679s10.389 19.889 21.679 19.206c342.256-20.702 670.39-118.419 964.372-284.046 9.854-5.552 13.342-18.041 7.79-27.896s-18.041-13.342-27.896-7.79z"></path><path d="M901.21 112.64l102.39.154c11.311.017 20.494-9.138 20.511-20.449s-9.138-20.494-20.449-20.511l-102.39-.154c-11.311-.017-20.494 9.138-20.511 20.449s9.138 20.494 20.449 20.511z"></path><path d="M983.151 92.251l-.307 101.827c-.034 11.311 9.107 20.508 20.418 20.542s20.508-9.107 20.542-20.418l.307-101.827c.034-11.311-9.107-20.508-20.418-20.542s-20.508 9.107-20.542 20.418z"></path></g></svg> {{__('Duka sales')}}</span>

                <svg x-show="expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                <svg x-show="!expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </button>

            <div x-show="expanded" class="w-full flex flex-col gap-3 lg:gap-6 p-2 lg:px-4 bg-slate-100 dark:bg-slate-900 rounded-b">
                <x-side-link :href="route('vendor.sales')" :active="request()->routeIs('vendor.sales')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="m15 9-6 6"/><path d="M9 9h.01"/><path d="M15 15h.01"/></svg>

                    <span class="ms-3">{{ __('My sales') }}</span>
                </x-side-link>

                <x-side-link :href="route('vendor.pos')" :active="request()->routeIs('vendor.pos')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="8" r="6"/><path d="M18.09 10.37A6 6 0 1 1 10.34 18"/><path d="M7 6h1v4"/><path d="m16.71 13.88.7.71-2.82 2.82"/></svg>

                    <span class="ms-3">{{ __('POS') }}</span>
                </x-side-link>

                <x-side-link :href="route('vendor.today')" :active="request()->routeIs('vendor.today')" wire:navigate>
                    <svg class="w-5 h-5 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h5"/><path d="M17.5 17.5 16 16.3V14"/><circle cx="16" cy="16" r="6"/></svg>
                    {{ __('Today') }}
                </x-side-link>

                <x-side-link :href="route('vendor.today')" :active="request()->routeIs('vendor.today')" wire:navigate>
                    <svg class="w-5 h-5 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg> {{ __('Top sales') }}
                </x-side-link>
            </div>

        </div>

        <!-- inventory -->
        <div
            x-data="{expanded: false}"
            class="mt-6 space-y-1 font-medium text-sm xl:text-base shadow-sm shadow-emerald-900 dark:shadow-emerald-700 rounded-lg group"
        >
            <button
                x-on:click="expanded = ! expanded"
                class="w-full inline-flex items-center justify-between px-3 py-2 text-slate-600 dark:text-slate-400 group-hover:text-emerald-500 dark:group-hover:text-emerald-600"
            >
                <span class="inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 me-2.5"><path d="M22 8.35V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8.35A2 2 0 0 1 3.26 6.5l8-3.2a2 2 0 0 1 1.48 0l8 3.2A2 2 0 0 1 22 8.35Z"/><path d="M6 18h12"/><path d="M6 14h12"/><rect width="12" height="12" x="6" y="10"/></svg> {{__('Inventory')}}</span>

                <svg x-show="expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                <svg x-show="!expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </button>

            <div x-show="expanded" class="w-full flex flex-col gap-3 lg:gap-6 p-2 lg:px-4 bg-slate-100 dark:bg-slate-900 rounded-b">
                <x-side-link :href="route('vendor.inventory')" :active="request()->routeIs('vendor.inventory')" wire:navigate>
                    <svg class="w-6 h-6" fill="currentColor" height="24px" width="24px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 230" xml:space="preserve"><g> <path d="M61.2,106h37.4v31.2H61.2V106z M61.2,178.7h37.4v-31.2H61.2V178.7z M61.2,220.1h37.4v-31.2H61.2V220.1z M109.7,178.7H147 v-31.2h-37.4V178.7z M109.7,220.1H147v-31.2h-37.4V220.1z M158.2,188.9v31.2h37.4v-31.2H158.2z M255,67.2L128.3,7.6L1.7,67.4 l7.9,16.5l16.1-7.7v144h18.2V75.6h169v144.8h18.2v-144l16.1,7.5L255,67.2z"></path> </g></svg>

                    <span class="ms-3">{{ __('Stock') }}</span>
                </x-side-link>

                <x-side-link :href="route('vendor.customers')" :active="request()->routeIs('vendor.customers')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></svg>
                    <span class="ms-3">{{ __('Customers') }}</span>
                </x-side-link>

                <x-side-link :href="route('vendor.suppliers')" :active="request()->routeIs('vendor.suppliers')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2"/><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 4h8"/></svg>
                    <span class="ms-3">{{ __('Suppliers') }}</span>
                </x-side-link>

                <x-side-link :href="route('vendor.manufacturers')" :active="request()->routeIs('vendor.manufacturers')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M17 18h1"/><path d="M12 18h1"/><path d="M7 18h1"/></svg>
                    <span class="ms-3">{{ __('Manufacturers') }}</span>
                </x-side-link>
            </div>

        </div>

        <!-- sales -->
        <div
            x-data="{expanded: false}"
            class="mt-6 space-y-1 font-medium text-sm xl:text-base shadow-sm shadow-emerald-900 dark:shadow-emerald-700 rounded-lg"
        >
            <button
                x-on:click="expanded = ! expanded"
                class="w-full inline-flex items-center justify-between px-3 py-2"
            >
                <span>{{__('Sales')}}</span>

                <svg x-show="expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                <svg x-show="!expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </button>

            <div x-show="expanded" class="w-full flex flex-col gap-3 lg:gap-6 p-2 lg:px-4 bg-slate-200 dark:bg-slate-900 shadow-sm rounded-b">
                <x-side-link :href="route('admin.orders')" :active="request()->routeIs('admin.orders')" wire:navigate>
                    {{ __('All') }}
                </x-side-link>

                <x-side-link :href="route('admin.orders')" :active="request()->routeIs('admin.orders')" wire:navigate>
                    {{ __('Sold') }}
                </x-side-link>

                <x-side-link :href="route('orders.index')" :active="request()->routeIs('orders.index')" wire:navigate>
                    {{ __('Customer Orders') }}
                </x-side-link>
            </div>

        </div>

    </div>
</div>
