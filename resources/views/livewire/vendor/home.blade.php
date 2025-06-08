<div class="p-4 md:p-6 lg:py-14 text-slate-800 dark:text-slate-100">
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
                        @click="toggleTab2()"
                        type="button"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white hover:text-slate-800 dark:text-slate-800 dark:hover:text-slate-200 bg-emerald-600 dark:bg-emerald-500 rounded-lg hover:bg-emerald-500 dark:hover:bg-emerald-600 transition-all ease-in-out duration-300">
                        Add My Business
                    </button>
                </div>
            </x-parts.data-empty-state>

            <nav class="relative mt-6 z-0 flex rounded-t-md overflow-hidden text-xs lg:text-sm font-medium border border-slate-200 dark:border-slate-800 shadow-sm dark:shadow-slate-800">
                <button
                    @click="toggleTab2()"
                    :class="tabItem2 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-slate-500 hover:text-slate-700 dark:text-slate-400 `"
                    class="relative min-w-0 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400" id="tabItem1">
                    Add New Business
                </button>
                <button
                    @click="toggleTab1()"
                    :class="tabItem1 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-slate-500 hover:text-slate-700 dark:text-slate-400 `"
                    class="relative min-w-0 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400" id="tabItem1">
                    Why Add My Business on Dukatools?
                </button>
            </nav>

            <div class="p-4 shadow-sm shadow-emerald-200 dark:shadow-emerald-900 rounded-b-md">

                <!-- Tab Item 1: Brands -->
                <div x-show="tabItem1">
                    <!-- Card Section -->
                    <div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                        <!-- Grid -->
                        <div class="grid md:grid-cols-2 gap-3 sm:gap-6 mb-6">
                            <!-- all in one -->
                            <div class="block border border-gray-200 rounded-lg hover:shadow-sm focus:outline-none dark:border-neutral-700" href="#">
                                <div class="grid md:grid-cols-3 items-center h-full">
                                    <img class="col-span-1 h-full object-left object-cover" src="https://github.com/mwanginjuguna/public-image-assets/blob/main/dukatools/dukatools-modules.png?raw=true" alt="Dukatools modules Image">

                                    <div class="grow p-4 md:col-span-2">
                                        <div class="min-h-24 flex flex-col justify-center">
                                            <h3 class="font-semibold text-sm text-gray-800 dark:text-neutral-300">
                                                ALL-IN-ONE: Spend less time Juggling between apps and MORE TIME Growing Your Business
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                                                Every business tool you need. Our app consolidates inventory management, sales tracking, order processing, warehousing, CRM, POS, and supplier orders into one cohesive system.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Inventory -->
                            <div class="border border-gray-200 rounded-lg hover:shadow-sm focus:outline-none dark:border-neutral-700">
                                <div class="grid md:grid-cols-3 items-center h-full">
                                    <img class="col-span-1 h-full object-left object-cover" src="https://github.com/mwanginjuguna/public-image-assets/blob/main/dukatools/dukatools-stock-tracking.png?raw=true" alt="Stock tracking Image">

                                    <div class="grow p-4 md:col-span-2">
                                        <div class="flex flex-col justify-center">
                                            <h3 class="font-semibold text-sm text-gray-800 dark:text-neutral-300">
                                                Prevent stockouts and overstock situations
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                                                Real-Time Inventory Tracking to keep you updated on stock levels across all sales channels. You don’t need to be tech-savvy to manage your inventory effectively.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dashboard -->
                            <div class="block border border-gray-200 rounded-lg hover:shadow-sm focus:outline-none dark:border-neutral-700" href="#">
                                <div class="relative flex items-center overflow-hidden">
                                    <img class="w-32 sm:w-48 h-full absolute inset-0 object-cover rounded-s-lg" src="https://github.com/mwanginjuguna/public-image-assets/blob/main/dukatools/dukatools-sales-dashboard-light.png?raw=true" alt="Blog Image">

                                    <div class="grow p-4 ms-32 sm:ms-48">
                                        <div class="min-h-24 flex flex-col justify-center">
                                            <h3 class="font-semibold text-sm text-gray-800 dark:text-neutral-300">
                                                Business Intelligence: Bird’s-eye view of your business
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                                                Intuitive business dashboard that displays all critical metrics in one place. Monitor sales performance, order status, and inventory levels effortlessly.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Save money -->
                            <div class="block border border-gray-200 rounded-lg hover:shadow-sm focus:outline-none dark:border-neutral-700" href="#">
                                <div class="relative flex items-center overflow-hidden">
                                    <img class="w-32 sm:w-48 h-full absolute inset-0 object-cover rounded-s-lg" src="https://github.com/mwanginjuguna/public-image-assets/blob/main/dukatools/dukatools-inventory-dashboard.png?raw=true" alt="Blog Image">

                                    <div class="grow p-4 ms-32 sm:ms-48">
                                        <div class="min-h-24 flex flex-col justify-center">
                                            <h3 class="font-semibold text-sm text-gray-800 dark:text-neutral-300">
                                                Save money with ONE subscription
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                                                Reduce the need for multiple subscriptions across different platforms. Our all-in-one solution minimizes operational costs while maximizing functionality.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Grid -->
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6 mt-6">
                            <!-- Card -->
                            <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800" href="#">
                                <div class="p-4 md:p-5">
                                    <div class="flex gap-x-5">
                                        <svg class="mt-1 shrink-0 size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>

                                        <div class="grow">
                                            <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
                                                Dedicated Support
                                            </h3>
                                            <p class="text-sm text-gray-500 dark:text-neutral-500">
                                                Our customer support team ready to assist you whenever needed.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-- Card -->
                            <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800" href="#">
                                <div class="p-4 md:p-5">
                                    <div class="flex gap-x-5">
                                        <svg class="mt-1 shrink-0 size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>

                                        <div class="grow">
                                            <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
                                                Live Chat
                                            </h3>
                                            <p class="text-sm text-gray-500 dark:text-neutral-500">
                                                Start a new live chat or reach us via Whatsapp for calls & chat.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-- Contact -->
                            <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800" href="#">
                                <div class="p-4 md:p-5">
                                    <div class="flex gap-x-5">
                                        <svg class="mt-1 shrink-0 size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"/><path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"/></svg>

                                        <div class="grow">
                                            <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
                                                Email us
                                            </h3>
                                            <p class="text-sm text-gray-500 dark:text-neutral-500">
                                                Reach us at <span class="text-blue-600 decoration-2 group-hover:underline font-medium dark:text-blue-500">info@gameplanlabs.org</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Tab Item 2: Brands -->
                <div x-show="tabItem2">
                    <div class="p-4 ">
                        <h2 class="mt-3 py-2 text-center">Add New Business</h2>

                        <div class="max-w-md mx-auto">
                            <div class="mb-4 w-full py-3 border-b border-slate-200 dark:border-slate-900">
                                <h4 class="mb-1 font-semibold text-lg">Business Profile</h4>
                                <p class="mb-1 text-xs text-slate-500 dark:text-slate-600">Name, Phone, Category, Location, etc.</p>
                            </div>
                        </div>

                        <form wire:submit="businessSave" class="max-w-md mx-auto" enctype="multipart/form-data">
                            <div class="relative z-0 w-full mb-5 group">
                                <input
                                    wire:model="form.name"
                                    type="text"
                                       name="business-name" id="business-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="business-name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Business Name</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model="form.email" type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model="form.phone" type="text" name="phone-number" id="phone-number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="phone-number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone Number(0712 345 678)</label>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input wire:model="form.address" type="text" name="business-address" id="business-address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="business-address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address/PO Box</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input wire:model="form.country" type="text" name="country" id="country" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="country" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Country</label>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input wire:model="form.town" type="text" name="business-town" id="business-town" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="business-town" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Town/Street</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input wire:model="form.county" type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">State/County</label>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="website" id="website" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="website" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Website</label>
                                </div>
                            </div>
                            <!-- product description -->
                            <div class="hidden md:col-span-2">
                                <label for="description" class="block mb-2 font-medium">Description <span class="text-xs text-slate-500">optional</span> </label>
                                <textarea id="description"
                                          rows="8"
                                          wire:model="form.description"
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
                                Add business
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="">
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-slate-100 sm:text-3xl">
                Duka Home
            </h2>

            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">
                {{ 'Karibu, ' . auth()->user()->name ?? 'Vendor' }}.
            </p>

            <div class="flex flex-col md:flex-row md:justify-between items-center gap-6">
                @if($businesses->count() > 0)
                    <button
                        type="button"
                        @click="$dispatch('open-modal', 'show-business-edit-form')"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white hover:text-slate-800 dark:text-slate-800 dark:hover:text-slate-200 bg-emerald-600 dark:bg-emerald-500 rounded-lg hover:bg-emerald-500 dark:hover:bg-emerald-600 transition-all ease-in-out duration-300">
                        Add New Shop
                    </button>
                @endif
            </div>

            <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 items-center gap-6">
                @forelse($businesses as $business)
                    <div class="py-3">
                        <div class="max-w-xs flex flex-col bg-white border border-t-4 border-t-emerald-600 shadow-sm shadow-emerald-200/70 rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-emerald-500 dark:shadow-emerald-700/70">
                            <div class="p-4 md:p-5">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                    {{ $business->name }} yoo
                                </h3>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                    {{ \Illuminate\Support\Str::words($business->description, 10) }}
                                </p>

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
    @endif

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
</div>
