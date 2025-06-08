<div class="text-slate-900 dark:text-slate-100">
    <div class="mb-6 lg:mb-10 lg:flex lg:items-center lg:justify-between">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl/7 font-bold sm:truncate sm:text-3xl sm:tracking-tight">{{ $business->name }} Overview</h2>
            <!-- Breadcrumb -->
            <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6 text-sm text-gray-500">
                <div class="mt-2 flex items-center">
                    <svg class="mr-1.5 size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 0 1 8.75 1h2.5A2.75 2.75 0 0 1 14 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 0 1 6 4.193V3.75Zm6.5 0v.325a41.622 41.622 0 0 0-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25ZM10 10a1 1 0 0 0-1 1v.01a1 1 0 0 0 1 1h.01a1 1 0 0 0 1-1V11a1 1 0 0 0-1-1H10Z" clip-rule="evenodd" />
                        <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 0 1-9.274 0C3.985 17.585 3 16.402 3 15.055Z" />
                    </svg>
                    {{ $vendor->username }}
                </div>
                <div class="mt-2 flex items-center">
                    <svg class="mr-1.5 size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="m9.69 18.933.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 0 0 .281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 1 0 3 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 0 0 2.273 1.765 11.842 11.842 0 0 0 .976.544l.062.029.018.008.006.003ZM10 11.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" clip-rule="evenodd" />
                    </svg>
                    {{ $business->location->name }}
                </div>
                @if(\Illuminate\Support\Facades\Auth::user()->userable_type !== \App\Models\Customer::class)
                    <div class="mt-2 flex items-center">
                        <svg class="mr-1.5 size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path d="M10.75 10.818v2.614A3.13 3.13 0 0 0 11.888 13c.482-.315.612-.648.612-.875 0-.227-.13-.56-.612-.875a3.13 3.13 0 0 0-1.138-.432ZM8.33 8.62c.053.055.115.11.184.164.208.16.46.284.736.363V6.603a2.45 2.45 0 0 0-.35.13c-.14.065-.27.143-.386.233-.377.292-.514.627-.514.909 0 .184.058.39.202.592.037.051.08.102.128.152Z" />
                            <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-6a.75.75 0 0 1 .75.75v.316a3.78 3.78 0 0 1 1.653.713c.426.33.744.74.925 1.2a.75.75 0 0 1-1.395.55 1.35 1.35 0 0 0-.447-.563 2.187 2.187 0 0 0-.736-.363V9.3c.698.093 1.383.32 1.959.696.787.514 1.29 1.27 1.29 2.13 0 .86-.504 1.616-1.29 2.13-.576.377-1.261.603-1.96.696v.299a.75.75 0 1 1-1.5 0v-.3c-.697-.092-1.382-.318-1.958-.695-.482-.315-.857-.717-1.078-1.188a.75.75 0 1 1 1.359-.636c.08.173.245.376.54.569.313.205.706.353 1.138.432v-2.748a3.782 3.782 0 0 1-1.653-.713C6.9 9.433 6.5 8.681 6.5 7.875c0-.805.4-1.558 1.097-2.096a3.78 3.78 0 0 1 1.653-.713V4.75A.75.75 0 0 1 10 4Z" clip-rule="evenodd" />
                        </svg>
                        {{ config('app.currency_symbol') . ' ' . number_format($business->orders->sum('total')) }}
                    </div>
                @endif
            </div>

            <h2 class="text-base font-medium">{{ $business->description ?? config('business.description') }}</h2>
        </div>

        <!-- Buttons & Dropdown -->
        <div class="mt-5 flex lg:ml-4 lg:mt-0 gap-4">
            <span class="ml-3 inline-block">
                <a href="{{ route('orders.index') }}" wire:navigate class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                    <svg class="-ml-0.5 mr-1.5 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon"><path d="M12.232 4.232a2.5 2.5 0 0 1 3.536 3.536l-1.225 1.224a.75.75 0 0 0 1.061 1.06l1.224-1.224a4 4 0 0 0-5.656-5.656l-3 3a4 4 0 0 0 .225 5.865.75.75 0 0 0 .977-1.138 2.5 2.5 0 0 1-.142-3.667l3-3Z" /><path d="M11.603 7.963a.75.75 0 0 0-.977 1.138 2.5 2.5 0 0 1 .142 3.667l-3 3a2.5 2.5 0 0 1-3.536-3.536l1.225-1.224a.75.75 0 0 0-1.061-1.06l-1.224 1.224a4 4 0 1 0 5.656 5.656l3-3a4 4 0 0 0-.225-5.865Z" /></svg>
                    Orders
                </a>
            </span>

            <span class="sm:ml-3">
                <a href="{{ route('dashboard') }}" wire:navigate class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <svg class="-ml-0.5 mr-1.5 size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                    </svg>
                    Dashboard
                </a>
            </span>
        </div>
    </div>

    {{-- business summary --}}
    <div class="mt-6">
        <div class="grid sm:grid-cols-4 border-y border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-300 first:border-s last:border-e">
            <!-- Name -->
            <div class="p-4 md:p-5 relative before:absolute before:top-0 before:start-0 before:w-full before:h-px sm:before:w-px sm:before:h-full before:bg-slate-200 before:first:bg-transparent dark:before:bg-slate-800">
                <div>
                    <svg class="shrink-0 size-5 text-slate-600 dark:text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>

                    <div class="mt-3">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs uppercase tracking-wide text-slate-600 dark:text-slate-400">
                                Business Name
                            </p>
                        </div>
                        <div class="mt-1 lg:flex lg:justify-between lg:items-center">
                            <h3 class="text-lg font-medium">
                                {{ $business->name }}
                            </h3>
                            <a class="mt-1 lg:mt-0 min-h-[24px] inline-flex items-center gap-x-1 py-0.5 px-2 text-gray-800 bg-gray-200/70 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 rounded-md dark:bg-neutral-700 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 dark:text-neutral-200" href="#">
                                <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="p-4 md:p-5 relative before:absolute before:top-0 before:start-0 before:w-full before:h-px sm:before:w-px sm:before:h-full before:bg-slate-200 before:first:bg-transparent dark:before:bg-slate-800">
                <div>
                    <svg class="shrink-0 size-5 text-slate-600 dark:text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg>

                    <div class="mt-3">
                        <p class="text-xs uppercase tracking-wide text-slate-600 dark:text-slate-400">
                            Email
                        </p>
                        <div class="mt-1 lg:flex lg:justify-between lg:items-center">
                            <h3 class="text-lg font-medium">
                                {{ $business->email }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Location -->
            <div class="p-4 md:p-5 relative before:absolute before:top-0 before:start-0 before:w-full before:h-px sm:before:w-px sm:before:h-full before:bg-slate-200 before:first:bg-transparent dark:before:bg-slate-800">
                <div>
                    <svg class="shrink-0 size-5 text-slate-600 dark:text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"/><path d="m12 12 4 10 1.7-4.3L22 16Z"/></svg>

                    <div class="mt-3">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs uppercase tracking-wide text-slate-600 dark:text-slate-400">
                                Delivers From
                            </p>
                        </div>
                        <div class="mt-1 lg:flex lg:justify-between lg:items-center">
                            <h3 class="text-lg font-medium">
                                {{ $business->location->city . ' - ' . $business->address }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phone number -->
            <div class="p-4 md:p-5 relative before:absolute before:top-0 before:start-0 before:w-full before:h-px sm:before:w-px sm:before:h-full before:bg-slate-200 before:first:bg-transparent dark:before:bg-slate-800">
                <div>
                    <svg class="shrink-0 size-5 text-slate-600 dark:text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z"/><path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/></svg>

                    <div class="mt-3">
                        <p class="text-xs uppercase tracking-wide text-slate-600 dark:text-slate-400">
                            Phone Number
                        </p>
                        <div class="mt-1 lg:flex lg:justify-between lg:items-center">
                            <h3 class="text-lg font-medium">
                                {{ $business->phone_number }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- business stats --}}
    <div class="mt-6 lg:mt-10 px-4 py-10 lg:py-14">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 text-orange-600 dark:text-orange-500">
            <!-- Revenue -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-800 dark:border-slate-700">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-slate-500 dark:text-slate-500">
                            Revenue
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium">
                            {{ config('app.currency_symbol') . ' ' . number_format($business->orders->sum('total'), 2)  }}
                        </h3>
                        <span class="flex items-center gap-x-1 text-green-600">
                            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                            <span class="inline-block text-sm">1.7%</span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Customers -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-800 dark:border-slate-700">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-slate-500 dark:text-slate-500">
                            Customers
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium">
                            {{ $vendor->customers_count }}
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-800 dark:border-slate-700">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-slate-500 dark:text-slate-500">
                            Products
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium">
                            {{ $business->products->count() }}
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Pending orders -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-800 dark:border-slate-700">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-slate-500 dark:text-slate-500">
                            Pending Orders
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium">
                            {{ $business->orders->where('status', 'pending')->count() }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        x-data="{tabItem1:false,tabItem2:true,tabItem3:false,
        toggleTab1(){this.tabItem1=true;this.tabItem2=false;this.tabItem3=false;},
        toggleTab2(){this.tabItem1=false;this.tabItem2=true;this.tabItem3=false;},
        toggleTab3(){this.tabItem1=false;this.tabItem2=false;this.tabItem3=true;}
        }"
    >
        <!-- Business branches & locations -->
        <div class="border-b border-gray-200 dark:border-neutral-700">
            <!-- Nav -->
            <nav class="flex gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <button @click="toggleTab2()"
                        :class="tabItem2 ? 'font-semibold border-orange-300 text-orange-600 dark:border-orange-800 dark:text-orange-500' : 'border-transparent text-gray-500 hover:text-blue-600  '"
                        type="button" class="py-4 px-1 inline-flex items-center gap-x-2 border-b-2 text-sm whitespace-nowrap focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-blue-500" role="tab">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <circle cx="12" cy="10" r="3"></circle>
                        <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"></path>
                    </svg>
                    Latest Orders
                </button>
                <button
                    @click="toggleTab1()"
                    :class="tabItem1 ? 'font-semibold border-orange-300 text-orange-600 dark:border-orange-800 dark:text-orange-500' : 'border-transparent text-gray-500 hover:text-blue-600  '"
                    type="button" class="py-4 px-1 inline-flex items-center gap-x-2 border-b-2 text-sm whitespace-nowrap focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-blue-500" role="tab">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Branches
                </button>
                {{--<button
                    @click="toggleTab3()"
                    :class="tabItem3 ? 'font-semibold border-orange-300 text-orange-600 dark:border-orange-800 dark:text-orange-500' : 'border-transparent text-gray-500 hover:text-blue-600  '"
                    type="button" class="py-4 px-1 inline-flex items-center gap-x-2 border-b-2 text-sm whitespace-nowrap focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-blue-500" role="tab">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    Top Products
                </button>--}}
            </nav>
        </div>

        <!-- content -->
        <div class="mt-6">
            <!-- branches -->
            <div x-show="tabItem1">
                <p class="text-gray-500 dark:text-neutral-400">
                    {{ $business->name }} business has <em class="font-semibold text-gray-800 dark:text-neutral-200">{{ $business->branches->count() }}</em> Branches.
                </p>
                <!-- branches list -->
                <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 items-center gap-6">
                    @forelse($business->branches as $branch)
                        <div class="py-3">
                            <div class="max-w-xs flex flex-col bg-white border border-t-4 border-t-red-600 shadow-sm shadow-red-200/70 rounded-xl dark:bg-slate-950 dark:border-slate-700 dark:border-t-red-600 dark:shadow-red-700/70">
                                <div class="p-4 md:p-5 grid space-y-1 text-sm text-slate-600 dark:text-slate-400">
                                    <p class="flex flex-row items-center gap-x-1 text-xs text-slate-500 dark:text-slate-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $branch->location->county . '/' . $branch->location->country }}
                                    </p>

                                    <h3 class="mt-3 py-2 text-lg font-bold text-gray-800 dark:text-white">
                                        {{ $branch->name }}
                                    </h3>

                                    <dl class="flex items-center flex-row gap-x-4">
                                        <dt class="text-xs text-slate-400 dark:text-slate-600">All Products</dt>
                                        <dd class="">
                                            {{$branch->products_count }}
                                        </dd>
                                    </dl>

                                    <dl class="flex items-center flex-row gap-x-4">
                                        <dt class="text-xs text-slate-400 dark:text-slate-600">Total Orders</dt>
                                        <dd class="">
                                            {{$branch->orders_count }}
                                        </dd>
                                    </dl>
                                    <dl class="flex items-center flex-row gap-x-4">
                                        <dt class="text-xs text-slate-400 dark:text-slate-600">Revenue</dt>
                                        <dd class="">
                                            {{$branch->orders->sum('total') }}
                                        </dd>
                                    </dl>

                                    {{--<p class="mt-2 text-gray-500 dark:text-neutral-400">
                                        {{ \Illuminate\Support\Str::words($myShop->description, 10) }}
                                    </p>--}}
                                    <div class="flex justify-between items-center py-2">
                                        <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-orange-600 decoration-2 hover:text-orange-700 hover:underline focus:underline focus:outline-none focus:text-orange-700 disabled:opacity-50 disabled:pointer-events-none dark:text-orange-500 dark:hover:text-orange-600 dark:focus:text-orange-600" href="{{ route('dashboard') }}" wire:navigate>
                                            Go to Dashboard
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m9 18 6-6-6-6"></path>
                                            </svg>
                                        </a>

                                        <button
                                            class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-slate-600 decoration-2 hover:text-orange-500 hover:underline focus:underline focus:outline-none focus:text-orange-500 disabled:opacity-50 disabled:pointer-events-none dark:text-slate-500 dark:hover:text-orange-500 dark:focus:text-orange-500"
                                            wire:click="editBusiness({{$business->id}})"
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
                    @empty
                        <div class="py-3">
                            <div class="max-w-xs flex flex-col bg-white border border-t-4 border-t-emerald-600 shadow-sm shadow-emerald-200/70 rounded-xl dark:bg-slate-950 dark:border-slate-700 dark:border-t-emerald-600 dark:shadow-emerald-700/70">
                                <div class="p-4 md:p-5 grid space-y-1 text-sm text-slate-600 dark:text-slate-400">
                                    <p class="flex flex-row items-center gap-x-1 text-xs text-slate-500 dark:text-slate-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $myShop->location->county . '/' . $myShop->location->town }}
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
            <!-- orders -->
            <div x-show="tabItem2">
                <div class="mt-3 py-2">
                    <livewire:orders.list-table listTitle="Latest" :orders="$latestOrders" />
                </div>
            </div>
            <!-- products -->
            {{--<div hidden x-show="tabItem3">
                <p class="text-gray-500 dark:text-neutral-400">
                    {{ $business->name }} business has <em class="font-semibold text-gray-800 dark:text-neutral-200">{{ $business->inventories->count() }}</em> Inventories.
                </p>
            </div>--}}
        </div>
    </div>

    @if(\Illuminate\Support\Facades\Auth::user()->isVendor())
        <x-modal name="show-business-edit-form">
            <div class="p-4 max-w-md mx-auto">
                <div class="flex justify-between items-center">
                    <h3 class="mb-2 text-lg py-2 font-bold">
                        Edit business
                    </h3>

                    <button
                        @click="$dispatch('close')"
                        type="button"
                    >
                        <svg class="w-6 h-6 text-slate-600 dark:text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                        </svg>
                    </button>
                </div>

                <div class="">
                    <div class="mb-4 w-full py-3 border-b border-slate-200 dark:border-slate-900">
                        <h4 class="mb-1 font-semibold text-lg">Business Profile</h4>
                        <p class="mb-1 text-xs text-slate-500 dark:text-slate-600">Name, Phone, Category, Location, etc.</p>
                    </div>
                </div>

                <form wire:submit="saveEdit" class="" enctype="multipart/form-data">
                    <div class="relative z-0 w-full mb-5 group">
                        <input
                            wire:model="editForm.name"
                            type="text"
                            name="business-name" id="business-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="business-name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Business Name</label>
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input wire:model="editForm.address" type="text" name="business-address" id="business-address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="business-address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address/PO Box</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input wire:model="editForm.country" type="text" name="country" id="country" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="country" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Country</label>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input wire:model="editForm.town" type="text" name="business-town" id="business-town" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="business-town" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Town/Street</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input wire:model="editForm.county" type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">State/County</label>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input wire:model="editForm.website" type="text" name="website" id="website" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="website" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Website</label>
                        </div>
                    </div>
                    <!-- product description -->
                    <div class="hidden md:col-span-2">
                        <label for="description" class="block mb-2 font-medium">Description <span class="text-xs text-slate-500">optional</span> </label>
                        <textarea id="description"
                                  rows="8"
                                  wire:model="editForm.description"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Give your business a short description."></textarea>
                        @error('form.description')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror

                        <!-- product main image -->
                        <div class="mt-4 lg:mt-6">
                            <label class="block mb-2 text-sm font-medium" for="businessLogo">Business Logo  <span class="text-xs font-light text-gray-600">(optional)</span></label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                   wire:model="businessLogo"
                                   id="businessLogo" type="file">
                            <p class="text-xs text-slate-500">(Logo or Profile Image.)</p>
                            @error('businessLogo')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                        </div>

                    </div>

                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white hover:text-slate-800 dark:text-slate-800 dark:hover:text-slate-200 bg-emerald-600 dark:bg-emerald-500 rounded-lg hover:bg-emerald-500 dark:hover:bg-emerald-600 transition-all ease-in-out duration-300">
                        Save business
                    </button>
                </form>
            </div>
        </x-modal>
    @endif

</div>
