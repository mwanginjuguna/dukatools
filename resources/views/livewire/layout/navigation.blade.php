<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    public mixed $vendor;

    public function mount()
    {
        $this->vendor = (new \App\Services\VendorService())->getVendor();
    }
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-slate-100 dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-[92em] mx-auto">
        <div class="flex justify-between items-center px-4 sm:px-6 lg:px-8 py-2">
            <div class="flex">
                <!-- business -->
                <a href="{{route('vendor.home')}}" wire:navigate class="p-2 text-xs xl:text-sm shadow-sm rounded-md shadow-amber-500 dark:shadow-amber-500 shrink-0 flex items-center text-slate-600 dark:text-slate-400 font-medium">
                    {{  isset($vendor) ? $vendor->businesses->first()->name : auth()->user()->name . "'s Shop" }}.
                </a>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('products.create')" :active="request()->routeIs('products.create')" wire:navigate>
                        {{ __('Add Product') }}
                    </x-nav-link>
                    <x-nav-link :href="route('vendor.pos')" :active="request()->routeIs('vendor.pos')" wire:navigate>
                        {{ __('Sell') }}
                    </x-nav-link>
                    <x-nav-link :href="route('vendor.inventory')" :active="request()->routeIs('vendor.inventory')" wire:navigate>
                        {{ __('Restock') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex flex-row items-center gap-x-1">
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-1">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Dark Mode Toggle -->
                            <x-utils.dark-mode-toggle />

                            <!-- Settings -->
                            <x-dropdown-link
                                wire:navigate
                                :href="route('vendor.home')" :active="request()->routeIs('vendor.home')"
                                class="inline-flex items-center text-sm text-gray-500 dark:text-gray-400 hover:bg-white dark:hover:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150"
                            >
                                <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z"/>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                </svg> {{ __('Settings') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!-- Dark Mode Toggle -->
        <x-utils.dark-mode-toggle />

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('vendor.pos')" :active="request()->routeIs('vendor.pos')" wire:navigate>
                {{ __('POS') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('vendor.home')" :active="request()->routeIs('vendor.home')" wire:navigate>
                {{ __('My Shop') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('vendor.sales')" :active="request()->routeIs('vendor.sales')" wire:navigate>
                {{ __('Sales') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('vendor.inventory')" :active="request()->routeIs('vendor.inventory')" wire:navigate>
                {{ __('Inventory') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('vendor.index')" :active="request()->routeIs('vendor.index')" wire:navigate>
                {{ __('Products') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
