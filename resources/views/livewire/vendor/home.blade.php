<div class="p-4 text-slate-800 dark:text-slate-100">
    <p class="py-2 text-slate-600 dark:text-slate-300">
        {{ 'Welcome, ' . \Illuminate\Support\Str::title(auth()->user()->name ?? config('app.name')) }}.
    </p>

    <!-- breadcrumb -->
    @if(is_null($vendor))
        <section
            x-data="{tabItem1:false,tabItem2:true,
            toggleTab1(){this.tabItem1=true;this.tabItem2=false;},
            toggleTab2(){this.tabItem1=false;this.tabItem2=true;}
            }"
            class="relative"
        >
            <x-parts.data-empty-state>
                <div class="mt-3 text-center">
                    <h2 class="py-1 mb-2 text-2xl font-bold tracking-tight text-slate-900 dark:text-slate-100 sm:text-3xl">
                        You have not added your business yet.
                    </h2>
                    <p class="mb-2 py-2 text-sm text-slate-600 dark:text-slate-300">
                        Start a new shop and sell online to infinity.
                    </p>

                    <button
                        type="button"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white hover:text-slate-800 dark:text-slate-800 dark:hover:text-slate-200 bg-red-600 dark:bg-red-500 rounded-lg hover:bg-red-500 dark:hover:bg-red-600 transition-all ease-in-out duration-300">
                        Add My Business
                    </button>
                </div>
            </x-parts.data-empty-state>
        </section>
    @else
        <div class="">
            <div class="mt-6 grid items-center gap-6">
                @forelse($businesses as $business)
                    <livewire:vendor.business-summary />
                @empty
                    <div class="py-3">
                        <div class="max-w-xs flex flex-col bg-white border border-t-4 border-t-emerald-600 shadow-sm shadow-emerald-200/70 rounded-xl dark:bg-slate-950 dark:border-slate-700 dark:border-t-emerald-600 dark:shadow-emerald-700/70">
                            <div class="p-4 md:p-5 grid space-y-1 text-sm text-slate-600 dark:text-slate-400">
                                <p class="flex flex-row items-center gap-x-1 text-xs text-slate-500 dark:text-slate-600">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $myShop->location->county . '/' . $myShop->location->address }}
                                </p>

                                <h3 class="mt-3 py-2 text-lg font-bold text-gray-800 dark:text-white">
                                    {{ $myShop->name }}
                                </h3>

                                <dl class="flex items-center flex-row gap-x-4">
                                    <dt class="text-xs text-slate-400 dark:text-slate-600">All Products</dt>
                                    <dd class="">
                                        {{$vendor->products_count }}
                                    </dd>
                                </dl>

                                <dl class="flex items-center flex-row gap-x-4">
                                    <dt class="text-xs text-slate-400 dark:text-slate-600">Total Customers</dt>
                                    <dd class="">
                                        {{$vendor->customers_count }}
                                    </dd>
                                </dl>
                                <dl class="flex items-center flex-row gap-x-4">
                                    <dt class="text-xs text-slate-400 dark:text-slate-600">My Orders</dt>
                                    <dd class="">
                                        {{$vendor->orders_count }}
                                    </dd>
                                </dl>

                                {{--<p class="mt-2 text-gray-500 dark:text-neutral-400">
                                    {{ \Illuminate\Support\Str::words($myShop->description, 10) }}
                                </p>--}}
                                <div class="flex justify-between items-center py-2">
                                    <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 decoration-2 hover:text-blue-700 hover:underline focus:underline focus:outline-none focus:text-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-600 dark:focus:text-blue-600" href="{{ route('dashboard') }}" wire:navigate>
                                        Go to Dashboard
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m9 18 6-6-6-6"></path>
                                        </svg>
                                    </a>

                                    <button
                                        class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-slate-600 decoration-2 hover:text-emerald-500 hover:underline focus:underline focus:outline-none focus:text-emerald-500 disabled:opacity-50 disabled:pointer-events-none dark:text-slate-500 dark:hover:text-emerald-500 dark:focus:text-emerald-500"
                                        wire:click="editBusiness({{$myShop->id}})"
                                        @click="$dispatch('open-modal','show-business-edit-form')"
                                    >
                                        <span class="sr-only">Settings</span>
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" title="Settings" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z"/>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    @endif
    <x-modal name="add-new-business">
        Add Business
    </x-modal>
</div>
