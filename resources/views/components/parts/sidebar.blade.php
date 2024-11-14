<div id="cta-button-sidebar"
     class="h-screen"
     {{ $attributes }}
     aria-label="Sidebar">
    <div class="h-full p-1 py-2 xl:px-3 xl:py-4 overflow-y-auto bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100">
        <div class="">
            <a href="/" class="flex items-center ps-2.5" wire:navigate>
                <x-application-logo />
                <span class="pl-1 xl:pl-3 self-center font-semibold text-amber-500 dark:text-amber-500">{{ config('app.name') }}</span>
            </a>
        </div>

        <!-- main pages -->
        <div class="xl:mt-3 p-2 space-y-1">
            <x-side-link
                :href="route('admin.dashboard')"
                :active="request()->routeIs('admin.dashboard')"
                wire:navigate
            >
                <svg class="w-5 h-5 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg>

                <span class="ms-3 text-xs xl:text-sm">{{ __('Dashboard') }}</span>
            </x-side-link>


            <x-side-link :href="route('vendor.pos')" :active="request()->routeIs('vendor.pos')" wire:navigate>
                <svg class="w-5 h-5" fill="currentColor" height="24px" width="24px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 128 128" xml:space="preserve"><g> <g> <polygon points="22,31.6 22,35.3 115.9,35.3 115.9,82.7 119.5,82.7 119.5,31.6 "></polygon> <polygon points="15.3,42 109.2,42 109.2,89.4 112.8,89.4 112.8,38.4 15.3,38.4 "></polygon> <path d="M23.9,45.4H8.5v15.4V81v15.4h15.4h66.7H106V81V60.8V45.4H90.6H23.9z M102,60.2v21.2c-5.3,1.4-9.4,5.6-10.9,11H23.3 c-1.4-5.4-5.6-9.5-10.9-11V60.2c5.3-1.4,9.4-5.6,10.9-11h67.8C92.4,54.6,96.6,58.8,102,60.2z"></path> <circle cx="57.2" cy="70.9" r="18"></circle> </g> </g></svg>

                <span class="ms-3 text-xs xl:text-sm">{{ __('POS') }}</span>
            </x-side-link>

        </div>

        <!-- vendor shop -->
        <div class="py-1.5 space-y-1 text-xs xl:text-sm">
            <div class="py-1 flex items-center text-xs text-slate-400 before:flex-1 before:border-t before:border-slate-200 before:me-3 after:flex-1 after:border-t after:border-slate-200 after:ms-3 dark:text-slate-600 dark:before:border-slate-600 dark:after:border-slate-600">My Shop</div>

            <div class="w-full flex flex-col gap-3 mt-1">
                <x-side-link :href="route('vendor.home')" :active="request()->routeIs('vendor.home')" wire:navigate>
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
                    </svg>

                    <span class="ms-3">{{ __('Home') }}</span>
                </x-side-link>
            </div>

            <!-- shop products -->
            <div
                x-data="{expanded: false}"
                class="text-xs xl:text-sm hover:shadow-sm border-slate-100 dark:border-slate-900 hover:shadow-emerald-100 hover:dark:shadow-emerald-800 rounded-lg group"
            >
                <button
                    x-on:click="expanded = ! expanded"
                    :class="expanded ? 'text-emerald-500 dark:text-emerald-600 bg-slate-100 dark:bg-slate-900 ' : 'text-slate-600 dark:text-slate-400 '"
                    class="w-full inline-flex items-center justify-between px-3 py-2 group-hover:text-emerald-500 dark:group-hover:text-emerald-600 transition-all ease-in-out duration-300"
                >
                    <span class="inline-flex items-center"><svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z"/></svg> {{__('Products')}}</span>

                    <svg x-show="expanded" class="w-4 h-4 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <svg x-show="!expanded" class="w-4 h-4 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>

                <div x-show="expanded" class="w-full flex flex-col gap-1 p-2 ps-4 bg-slate-100 dark:bg-slate-900 rounded-b transition-all ease-in-out duration-300">

                    <x-side-link :href="route('products.index')" :active="request()->routeIs('products.index')" wire:navigate>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/><path d="M2 7h20"/><path d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"/></svg>

                        <span class="ms-3">{{ __('All Products') }}</span>
                    </x-side-link>

                    <x-side-link :href="route('products.create')" :active="request()->routeIs('products.create')" wire:navigate>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>

                        <span class="ms-3">{{ __('Create Product') }}</span>
                    </x-side-link>
                </div>
            </div>

            <!-- shop settings -->
            <div
                x-data="{expanded: false}"
                class="tet-xs xl:text-sm hover:shadow-sm border-slate-100 dark:border-slate-700 hover:shadow-emerald-100 hover:dark:shadow-emerald-800 rounded-lg group"
            >
                <button
                    x-on:click="expanded = ! expanded"
                    :class="expanded ? 'text-emerald-500 dark:text-emerald-600 bg-slate-100 dark:bg-slate-900 ' : 'text-slate-600 dark:text-slate-400 '"
                    class="w-full inline-flex items-center justify-between px-3 py-2 group-hover:text-emerald-500 dark:group-hover:text-emerald-600 transition-all ease-in-out duration-300"
                >
                    <span class="inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 me-2.5"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg> {{__('Shop Settings')}}</span>

                    <svg x-show="expanded" class="w-4 h-4 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <svg x-show="!expanded" class="w-4 h-4 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>

                <div x-show="expanded" class="w-full flex flex-col gap-1 p-2 ps-4 bg-slate-100 dark:bg-slate-900 rounded-b transition-all ease-in-out duration-300">
                    <x-side-link :href="route('vendor.home')" :active="request()->routeIs('vendor.home')" wire:navigate>
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
                        </svg>

                        <span class="ms-3">{{ __('Shop Details') }}</span>
                    </x-side-link>

                    <x-side-link :href="route('vendor.categories')" :active="request()->routeIs('vendor.categories')" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 me-2.5"><path d="m16.02 12 5.48 3.13a1 1 0 0 1 0 1.74L13 21.74a2 2 0 0 1-2 0l-8.5-4.87a1 1 0 0 1 0-1.74L7.98 12"/><path d="M13 13.74a2 2 0 0 1-2 0L2.5 8.87a1 1 0 0 1 0-1.74L11 2.26a2 2 0 0 1 2 0l8.5 4.87a1 1 0 0 1 0 1.74Z"/></svg>
                        {{ __('Categories') }}
                    </x-side-link>

                    <x-side-link :href="route('vendor.brands')" :active="request()->routeIs('vendor.brands')" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 me-2.5"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg> {{ __('Brands') }}
                    </x-side-link>
                </div>
            </div>
        </div>

        <!-- vendor sales -->
        <div class="py-1.5 space-y-1 text-sm">
            <div class="py-2 flex items-center text-xs xl:text-sm text-slate-400 before:flex-1 before:border-t before:border-slate-200 before:me-3 after:flex-1 after:border-t after:border-slate-200 after:ms-3 dark:text-slate-600 dark:before:border-slate-600 dark:after:border-slate-600">Sales Overview</div>

            <div class="w-full flex flex-col gap-3 mt-2">
                <x-side-link :href="route('vendor.sales')" :active="request()->routeIs('vendor.sales')" wire:navigate>
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="m15 9-6 6"/><path d="M9 9h.01"/><path d="M15 15h.01"/></svg>

                    <span class="ms-3">{{ __('Sales Dashboard') }}</span>
                </x-side-link>
            </div>

            <!-- top sales -->
            <div
                x-data="{expanded: false}"
                class="text-xs xl:text-sm hover:shadow-sm border-slate-100 dark:border-slate-700 hover:shadow-emerald-100 hover:dark:shadow-emerald-800 rounded-lg group transition-all ease-in-out duration-500"
            >
                <button
                    x-on:click="expanded = ! expanded"
                    :class="expanded ? 'text-emerald-500 dark:text-emerald-600 bg-slate-100 dark:bg-slate-900 ' : 'text-slate-600 dark:text-slate-400 '"
                    class="w-full inline-flex items-center justify-between px-3 py-2 group-hover:text-emerald-500 dark:group-hover:text-emerald-600 transition-all ease-in-out duration-500"
                >
                    <span class="inline-flex items-center">
                        <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4.5V19a1 1 0 0 0 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.207M20 9v3.207"/></svg>
                        {{__('Top Sales')}}</span>

                    <svg x-show="expanded" class="w-4 h-4 ms-2.5 transition-all ease-in-out duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <svg x-show="!expanded" class="w-4 h-4 ms-2.5 transition-all ease-in-out duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>

                <div x-show="expanded" class="w-full flex flex-col gap-1 p-2 ps-4 bg-slate-100 dark:bg-slate-900 rounded-b transition-all ease-in-out duration-500">
                    <x-side-link :href="route('vendor.today')" :active="request()->routeIs('vendor.today')" wire:navigate>
                        <svg class="w-4 h-4 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h5"/><path d="M17.5 17.5 16 16.3V14"/><circle cx="16" cy="16" r="6"/></svg>
                        {{ __('Today') }}
                    </x-side-link>

                    <x-side-link :href="route('vendor.today')" :active="request()->routeIs('vendor.today')" wire:navigate>
                        <svg class="w-4 h-4 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg> {{ __('This week') }}
                    </x-side-link>

                    <x-side-link :href="route('vendor.today')" :active="request()->routeIs('vendor.today')" wire:navigate>
                        <svg class="w-4 h-4 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg> {{ __('All Time') }}
                    </x-side-link>
                </div>
            </div>

            <!-- sales channels -->
            <div
                x-data="{expanded: false}"
                class="text-xs xl:text-sm hover:shadow-sm border-slate-100 dark:border-slate-700 hover:shadow-emerald-100 hover:dark:shadow-emerald-800 rounded-lg group transition-all ease-in-out duration-500"
            >
                <button
                    x-on:click="expanded = ! expanded"
                    :class="expanded ? 'text-emerald-500 dark:text-emerald-600 bg-slate-100 dark:bg-slate-900 ' : 'text-slate-600 dark:text-slate-400'"
                    class="w-full inline-flex items-center justify-between px-3 py-2 group-hover:text-emerald-500 dark:group-hover:text-emerald-600 transition-all ease-in-out duration-500"
                >
                    <span class="inline-flex items-center"><svg class="w-4 h-4 me-2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><g><path d="M21.007 8.222A3.738 3.738 0 0 0 15.045 5.2a3.737 3.737 0 0 0 1.156 6.583 2.988 2.988 0 0 1-2.668 1.67h-2.99a4.456 4.456 0 0 0-2.989 1.165V7.4a3.737 3.737 0 1 0-1.494 0v9.117a3.776 3.776 0 1 0 1.816.099 2.99 2.99 0 0 1 2.668-1.667h2.99a4.484 4.484 0 0 0 4.223-3.039 3.736 3.736 0 0 0 3.25-3.687zM4.565 3.738a2.242 2.242 0 1 1 4.484 0 2.242 2.242 0 0 1-4.484 0zm4.484 16.441a2.242 2.242 0 1 1-4.484 0 2.242 2.242 0 0 1 4.484 0zm8.221-9.715a2.242 2.242 0 1 1 0-4.485 2.242 2.242 0 0 1 0 4.485z"></path></g></svg> {{__('Sale Channels')}}</span>

                    <svg x-show="expanded" class="w-4 h-4 ms-2.5 transition-all ease-in-out duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <svg x-show="!expanded" class="w-4 h-4 ms-2.5 transition-all ease-in-out duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>

                <div x-show="expanded" class="w-full flex flex-col gap-1 p-2 ps-4 bg-slate-100 dark:bg-slate-900 rounded-b transition-all ease-in-out duration-500">
                    <x-side-link :href="route('vendor.today')" :active="request()->routeIs('vendor.today')" wire:navigate>
                        <svg class="w-4 h-4 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h5"/><path d="M17.5 17.5 16 16.3V14"/><circle cx="16" cy="16" r="6"/></svg>
                        {{ __('Direct Sales') }}
                    </x-side-link>

                    <x-side-link :href="route('vendor.today')" :active="request()->routeIs('vendor.today')" wire:navigate>
                        <svg class="w-4 h-4 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg> {{ __('Facebook') }}
                    </x-side-link>

                    <x-side-link :href="route('vendor.today')" :active="request()->routeIs('vendor.today')" wire:navigate>
                        <svg class="w-4 h-4 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg> {{ __('Instagram') }}
                    </x-side-link>

                    <x-side-link :href="route('vendor.today')" :active="request()->routeIs('vendor.today')" wire:navigate>
                        <svg class="w-4 h-4 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg> {{ __('Whatsapp') }}
                    </x-side-link>
                </div>
            </div>
        </div>

        <!-- vendor inventory -->
        <div class="py-1.5 space-y-1 text-xs xl:text-sm">
            <div class="py-2 flex items-center text-slate-400 before:flex-1 before:border-t before:border-slate-200 before:me-3 after:flex-1 after:border-t after:border-slate-200 after:ms-3 dark:text-slate-600 dark:before:border-slate-600 dark:after:border-slate-600">Inventory</div>

            <div class="w-full flex flex-col gap-3 mt-2">
                <x-side-link :href="route('vendor.inventory')" :active="request()->routeIs('vendor.inventory')" wire:navigate>
                    <svg class="w-4 h-4" fill="currentColor" height="24px" width="24px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 230" xml:space="preserve"><g> <path d="M61.2,106h37.4v31.2H61.2V106z M61.2,178.7h37.4v-31.2H61.2V178.7z M61.2,220.1h37.4v-31.2H61.2V220.1z M109.7,178.7H147 v-31.2h-37.4V178.7z M109.7,220.1H147v-31.2h-37.4V220.1z M158.2,188.9v31.2h37.4v-31.2H158.2z M255,67.2L128.3,7.6L1.7,67.4 l7.9,16.5l16.1-7.7v144h18.2V75.6h169v144.8h18.2v-144l16.1,7.5L255,67.2z"></path> </g></svg>

                    <span class="ms-3">{{ __('Stock') }}</span>
                </x-side-link>


                <x-side-link :href="route('vendor.customers')" :active="request()->routeIs('vendor.customers')" wire:navigate>
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></svg>
                    <span class="ms-3">{{ __('Customers') }}</span>
                </x-side-link>
            </div>

            <!-- users -->
            <div
                x-data="{expanded: false}"
                class="text-sm hover:shadow-sm border-slate-100 dark:border-slate-700 hover:shadow-emerald-100 hover:dark:shadow-emerald-800 rounded-lg group transition-all ease-in-out duration-500"
            >
                <button
                    x-on:click="expanded = ! expanded"
                    :class="expanded ? 'text-emerald-500 dark:text-emerald-600 bg-slate-100 dark:bg-slate-900' : 'text-slate-600 dark:text-slate-400'"
                    class="w-full inline-flex items-center justify-between px-3 py-2 group-hover:text-emerald-500 dark:group-hover:text-emerald-600 transition-all ease-in-out duration-500"
                >
                    <span class="inline-flex items-center">
                        <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/></svg>{{__('Partners')}}</span>

                    <svg x-show="expanded" class="w-4 h-4 ms-2.5 transition-all ease-in-out duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <svg x-show="!expanded" class="w-4 h-4 ms-2.5 transition-all ease-in-out duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>

                <div x-show="expanded" class="w-full flex flex-col gap-1 p-2 ps-4 bg-slate-100 dark:bg-slate-900 rounded-b transition-all ease-in-out duration-500">
                    <x-side-link :href="route('vendor.suppliers')" :active="request()->routeIs('vendor.suppliers')" wire:navigate>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2"/><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 4h8"/></svg>
                        <span class="ms-3">{{ __('Suppliers') }}</span>
                    </x-side-link>

                    <x-side-link :href="route('vendor.manufacturers')" :active="request()->routeIs('vendor.manufacturers')" wire:navigate>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M17 18h1"/><path d="M12 18h1"/><path d="M7 18h1"/></svg>
                        <span class="ms-3">{{ __('Manufacturers') }}</span>
                    </x-side-link>
                </div>
            </div>
        </div>

        <!-- old -->
        <div
            x-data="{expanded: false}"
            class="hidden mt-6 space-y-1 font-medium text-sm xl:text-base shadow-sm shadow-emerald-900 dark:shadow-emerald-700 rounded-lg"
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
