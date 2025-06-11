<div class="text-slate-900 dark:text-slate-100">
    {{-- Header with Business Info and Quick Actions --}}
    <div class="mb-6 lg:mb-10">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="size-16 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                    @if($business->logo)
                        <img src="{{ str_contains($business->logo, 'placehold')
                                    ? str_replace('via.placeholder.com', 'placehold.co', $business->logo)
                                    : Illuminate\Support\Facades\Storage::disk('public')->url($business->logo) }}"
                                    alt="{{ $business->name }}" class="size-12 rounded-lg object-cover">
                    @else
                        <svg class="size-8 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                        </svg>
                    @endif
                </div>
                <div>
                    <h2 class="text-2xl font-bold">{{ $business->name }}</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ $business->category ?? 'Business' }}</p>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('orders.index') }}" wire:navigate class="inline-flex items-center gap-x-2 px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    Orders
                </a>
                <a href="{{ route('products.index') }}" wire:navigate class="inline-flex items-center gap-x-2 px-4 py-2 text-sm font-medium text-white bg-emerald-600 rounded-lg hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                    Products
                </a>
                <button
                    wire:click="editBusiness({{$business->id}})"
                    @click="$dispatch('open-modal','show-business-edit-form')"
                    class="inline-flex items-center gap-x-2 px-4 py-2 text-sm font-medium text-white bg-slate-600 rounded-lg hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500"
                >
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    Edit Business
                </button>
            </div>
        </div>
    </div>

    {{-- Main Content and Sidebar Layout --}}
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        {{-- Main Content --}}
        <div class="lg:col-span-3 space-y-6">
            {{-- Stats Overview --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white dark:bg-slate-800 rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-4">
                        <div class="size-12 rounded-lg bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center">
                            <svg class="size-6 text-indigo-600 dark:text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Revenue</p>
                            <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ config('app.currency_symbol') . ' ' . number_format($business->orders->sum('total'), 2) }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-4">
                        <div class="size-12 rounded-lg bg-emerald-100 dark:bg-emerald-900/50 flex items-center justify-center">
                            <svg class="size-6 text-emerald-600 dark:text-emerald-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Customers</p>
                            <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $vendor->customers_count }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-4">
                        <div class="size-12 rounded-lg bg-amber-100 dark:bg-amber-900/50 flex items-center justify-center">
                            <svg class="size-6 text-amber-600 dark:text-amber-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Products</p>
                            <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $business->products->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-4">
                        <div class="size-12 rounded-lg bg-rose-100 dark:bg-rose-900/50 flex items-center justify-center">
                            <svg class="size-6 text-rose-600 dark:text-rose-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Pending Orders</p>
                            <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $business->orders->where('status', 'pending')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Latest Orders --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm">
                <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                    <h3 class="text-lg font-semibold">Latest Orders</h3>
                </div>
                <div class="p-6">
                    <livewire:orders.list-table listTitle="Latest" :orders="$latestOrders" />
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="lg:col-span-1 space-y-6">
            {{-- Business Details Card --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm">
                <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                    <h3 class="text-lg font-semibold">Business Details</h3>
                </div>
                <div class="p-6">
                    <dl class="space-y-4">
                        <div>
                            <dt class="text-sm font-medium text-slate-500 dark:text-slate-400">Business Name</dt>
                            <dd class="mt-1 text-sm text-slate-900 dark:text-white">{{ $business->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-slate-500 dark:text-slate-400">Category</dt>
                            <dd class="mt-1 text-sm text-slate-900 dark:text-white">{{ $business->category ?? 'Not set' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-slate-500 dark:text-slate-400">Email</dt>
                            <dd class="mt-1 text-sm text-slate-900 dark:text-white">{{ $business->email ?? 'Not set' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-slate-500 dark:text-slate-400">Phone</dt>
                            <dd class="mt-1 text-sm text-slate-900 dark:text-white">{{ $business->phone_number ?? 'Not set' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-slate-500 dark:text-slate-400">Location</dt>
                            <dd class="mt-1 text-sm text-slate-900 dark:text-white">{{ $business->location->name ?? 'Not set' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-slate-500 dark:text-slate-400">Website</dt>
                            <dd class="mt-1 text-sm text-slate-900 dark:text-white">{{ $business->website ?? 'Not set' }}</dd>
                        </div>
                        @if($business->description)
                            <div>
                                <dt class="text-sm font-medium text-slate-500 dark:text-slate-400">Description</dt>
                                <dd class="mt-1 text-sm text-slate-900 dark:text-white">{{ $business->description }}</dd>
                            </div>
                        @endif
                    </dl>
                </div>
            </div>

            {{-- Branches Card --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm">
                <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                    <h3 class="text-lg font-semibold">Branches</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($business->branches as $branch)
                            <div class="p-4 bg-slate-50 dark:bg-slate-900 rounded-lg">
                                <h4 class="font-medium text-slate-900 dark:text-white">{{ $branch->name }}</h4>
                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $branch->location->city . ' - ' . $branch->address }}</p>
                                <div class="mt-2 flex items-center gap-4 text-sm">
                                    <span class="text-slate-500 dark:text-slate-400">{{ $branch->products_count }} Products</span>
                                    <span class="text-slate-500 dark:text-slate-400">{{ $branch->orders_count }} Orders</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-slate-500 dark:text-slate-400">No branches found</p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Locations Card --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm">
                <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                    <h3 class="text-lg font-semibold">Locations</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @if($business->location)
                            <div class="p-4 bg-slate-50 dark:bg-slate-900 rounded-lg">
                                <h4 class="font-medium text-slate-900 dark:text-white">{{ $business->location->name }}</h4>
                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                    {{ $business->location->city . ', ' . $business->location->county }}
                                </p>
                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                    {{ $business->location->country }}
                                </p>
                            </div>
                        @else
                            <p class="text-sm text-slate-500 dark:text-slate-400">No location set</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Business Edit Modal --}}
    @if(\Illuminate\Support\Facades\Auth::user()->isVendor())
        <x-modal name="show-business-edit-form">
            <div x-data="{ currentTab: 'basic' }" class="p-4 max-w-4xl mx-auto">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Edit Business</h3>
                    <button @click="$dispatch('close')" type="button">
                        <svg class="w-6 h-6 text-slate-600 dark:text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                        </svg>
                    </button>
                </div>

                {{-- Tabs Navigation --}}
                <div class="border-b border-slate-200 dark:border-slate-700 mb-4">
                    <nav class="flex space-x-4" aria-label="Tabs">
                        <button wire:click="setTab('basic')"
                                @click="currentTab = 'basic'"
                                class="px-3 py-2 text-sm font-medium rounded-md"
                                :class="{ 'bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white': currentTab === 'basic', 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300': currentTab !== 'basic' }">
                            Basic Info
                        </button>
                        <button wire:click="setTab('location')"
                                @click="currentTab = 'location'"
                                class="px-3 py-2 text-sm font-medium rounded-md"
                                :class="{ 'bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white': currentTab === 'location', 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300': currentTab !== 'location' }">
                            Location
                        </button>
                        <button wire:click="setTab('details')"
                                @click="currentTab = 'details'"
                                class="px-3 py-2 text-sm font-medium rounded-md"
                                :class="{ 'bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white': currentTab === 'details', 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300': currentTab !== 'details' }">
                            Business Details
                        </button>
                        <button wire:click="setTab('branches')"
                                @click="currentTab = 'branches'"
                                class="px-3 py-2 text-sm font-medium rounded-md"
                                :class="{ 'bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white': currentTab === 'branches', 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300': currentTab !== 'branches' }">
                            Branches
                        </button>
                    </nav>
                </div>

                {{-- Basic Info Tab --}}
                <div x-show="currentTab === 'basic'" x-cloak class="space-y-4">
                    <div>
                        <label for="business-name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Business Name</label>
                        <input wire:model="editForm.name" type="text" id="business-name"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                    </div>

                    <div>
                        <label for="business-email" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Email</label>
                        <input wire:model="editForm.email" type="email" id="business-email"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                    </div>

                    <div>
                        <label for="business-phone" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Phone Number</label>
                        <input wire:model="editForm.phone_number" type="tel" id="business-phone"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                    </div>

                    <div>
                        <label for="business-category" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Category</label>
                        <input wire:model="editForm.category" type="text" id="business-category"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                    </div>

                    <div>
                        <label for="business-website" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Website</label>
                        <input wire:model="editForm.website" type="url" id="business-website"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                    </div>

                    <div>
                        <label for="business-description" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Description</label>
                        <textarea wire:model="editForm.description" id="business-description" rows="4"
                                  class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="businessLogo">
                            Business Logo
                        </label>
                        <input wire:model="businessLogo" type="file" id="businessLogo"
                               class="mt-1 block w-full text-sm text-slate-900 border border-slate-300 rounded-lg cursor-pointer bg-white dark:text-slate-400 focus:outline-none dark:bg-slate-800 dark:border-slate-700">
                    </div>

                    <div class="mt-4">
                        <button wire:click="saveBasicInfo" type="button"
                                class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Basic Info
                        </button>
                    </div>
                </div>

                {{-- Location Tab --}}
                <div x-show="currentTab === 'location'" x-cloak class="space-y-4">
                    <div>
                        <label for="location-name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Location Name</label>
                        <input wire:model="location.name" type="text" id="location-name"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                    </div>

                    <div>
                        <label for="location-address" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Address</label>
                        <input wire:model="location.address" type="text" id="location-address"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="location-city" class="block text-sm font-medium text-slate-700 dark:text-slate-300">City</label>
                            <input wire:model="location.city" type="text" id="location-city"
                                   class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                        </div>
                        <div>
                            <label for="location-county" class="block text-sm font-medium text-slate-700 dark:text-slate-300">County</label>
                            <input wire:model="location.county" type="text" id="location-county"
                                   class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="location-country" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Country</label>
                        <input wire:model="location.country" type="text" id="location-country"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                    </div>

                    <div class="mt-4">
                        <button wire:click="saveLocation" type="button"
                                class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Location
                        </button>
                    </div>
                </div>

                {{-- Business Details Tab --}}
                <div x-show="currentTab === 'details'" x-cloak class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="legal-name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Legal Business Name</label>
                            <input wire:model="businessDetails.legal_name" type="text" id="legal-name"
                                   class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                        </div>
                        <div>
                            <label for="alternate-name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Alternate Name</label>
                            <input wire:model="businessDetails.alternate_name" type="text" id="alternate-name"
                                   class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="business-type" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Business Type</label>
                            <select wire:model="businessDetails.business_type" id="business-type"
                                    class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                                <option value="">Select Type</option>
                                <option value="sole_proprietorship">Sole Proprietorship</option>
                                <option value="partnership">Partnership</option>
                                <option value="corporation">Corporation</option>
                                <option value="llc">LLC</option>
                            </select>
                        </div>
                        <div>
                            <label for="founding-date" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Founding Date</label>
                            <input wire:model="businessDetails.founding_date" type="date" id="founding-date"
                                   class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="tax-id" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Tax ID</label>
                            <input wire:model="businessDetails.tax_id" type="text" id="tax-id"
                                   class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                        </div>
                        <div>
                            <label for="duns" class="block text-sm font-medium text-slate-700 dark:text-slate-300">DUNS Number</label>
                            <input wire:model="businessDetails.duns" type="text" id="duns"
                                   class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="price-range" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Price Range</label>
                        <select wire:model="businessDetails.price_range" id="price-range"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                            <option value="">Select Price Range</option>
                            <option value="$">$ (Budget)</option>
                            <option value="$$">$$ (Moderate)</option>
                            <option value="$$$">$$$ (Expensive)</option>
                            <option value="$$$$">$$$$ (Luxury)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300">Payment Methods Accepted</label>
                        <div class="mt-2 space-y-2">
                            <div class="flex items-center">
                                <input wire:model="businessDetails.payment_accepted" type="checkbox" value="cash"
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300 rounded">
                                <label class="ml-2 text-sm text-slate-700 dark:text-slate-300">Cash</label>
                            </div>
                            <div class="flex items-center">
                                <input wire:model="businessDetails.payment_accepted" type="checkbox" value="credit_card"
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300 rounded">
                                <label class="ml-2 text-sm text-slate-700 dark:text-slate-300">Credit Card</label>
                            </div>
                            <div class="flex items-center">
                                <input wire:model="businessDetails.payment_accepted" type="checkbox" value="mobile_payment"
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300 rounded">
                                <label class="ml-2 text-sm text-slate-700 dark:text-slate-300">Mobile Payment</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="slogan" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Business Slogan</label>
                        <input wire:model="businessDetails.slogan" type="text" id="slogan"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                    </div>

                    <div>
                        <label for="awards" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Awards & Recognition</label>
                        <textarea wire:model="businessDetails.awards" id="awards" rows="3"
                                  class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm"></textarea>
                    </div>

                    <div class="mt-4">
                        <button wire:click="saveBusinessDetails" type="button"
                                class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Business Details
                        </button>
                    </div>
                </div>

                {{-- Branches Tab --}}
                <div x-show="currentTab === 'branches'" x-cloak class="space-y-4">
                    <div class="space-y-4">
                        @foreach($branches as $index => $branch)
                            <div class="p-4 border rounded-lg space-y-4">
                                <div class="flex justify-between items-center">
                                    <h4 class="text-lg font-medium">Branch {{ $index + 1 }}</h4>
                                    <button wire:click="removeBranch({{ $index }})" type="button"
                                            class="text-red-600 hover:text-red-800">
                                        Remove
                                    </button>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="branch-name-{{ $index }}" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Branch Name</label>
                                        <input wire:model="branches.{{ $index }}.name" type="text" id="branch-name-{{ $index }}"
                                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                                    </div>
                                    <div>
                                        <label for="branch-phone-{{ $index }}" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Phone Number</label>
                                        <input wire:model="branches.{{ $index }}.phone_number" type="tel" id="branch-phone-{{ $index }}"
                                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="branch-address-{{ $index }}" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Address</label>
                                    <input wire:model="branches.{{ $index }}.address" type="text" id="branch-address-{{ $index }}"
                                           class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white sm:text-sm">
                                </div>

                                <div class="mt-2">
                                    <button wire:click="saveBranch({{ $index }})" type="button"
                                            class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save Branch
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button wire:click="addBranch" type="button"
                            class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Add Branch
                    </button>
                </div>
            </div>
        </x-modal>
    @endif
</div>
