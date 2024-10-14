<div class="max-w-5xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="sm:flex justify-between px-4 py-3 sm:px-5 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-2 rtl:space-x-reverse sm:mb-0">
            <li class="hidden lg:block">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" wire:navigate class="ms-1 text-sm font-medium text-sky-700 hover:text-sky-600 md:ms-2 dark:text-sky-400 dark:hover:text-white">Home</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 hidden lg:block w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="{{ route('vendor.inventory') }}" wire:navigate class="ms-1 text-sm font-medium text-sky-700 hover:text-sky-600 md:ms-2 dark:text-sky-400 dark:hover:text-white">Inventory</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center text-xs font-light text-gray-500 dark:text-gray-400 ">
                    <svg class="rtl:rotate-180 w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="mx-1 md:mx-2">
                        Categories
                    </span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold me-2 px-2 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 hidden lg:flex">
                        &cap;
                    </span>
                </div>
            </li>
        </ol>

        <x-dropdown align="left" width="max">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 text-xs font-normal text-center text-gray-600 bg-yellow-200 rounded-lg hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:text-gray-300 dark:focus:ring-gray-700">
                    <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm9-10v.4A3.6 3.6 0 0 1 8.4 9H6.61A3.6 3.6 0 0 0 3 12.605M14.458 3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                    </svg>Update category<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <div class="grid divide-y">
                    <button @click="$dispatch('open-modal', 'upload-product-images')"
                            class="w-full px-4 py-2 text-sm text-start hover:bg-gray-100 dark:hover:bg-gray-600 hover:underline text-slate-700 dark:text-slate-300">
                        {{ __('Upload Images') }}
                    </button>

                    <button @click="$dispatch('open-modal', 'product-feature')"
                            class="w-full px-4 py-2 text-sm text-start hover:bg-gray-100 dark:hover:bg-gray-600 hover:underline text-slate-700 dark:text-slate-300">
                        {{ __('Add Feature') }}
                    </button>

                    <!-- Authentication -->
                    <button wire:click=""
                            wire:confirm="Are you sure; (You cannot reverse this action)?"
                            class="w-full text-xs lg:text-base text-start">
                        <x-dropdown-link class="hover:underline text-red-500 dark:text-red-600">
                            {{ __('Delete') }}
                        </x-dropdown-link>
                    </button>
                </div>
            </x-slot>
        </x-dropdown>
    </nav>

    <div>
        <h1 class="mt-3 mb-4 font-bold text-lg">Inventory categories & subcategories.</h1>

        <!-- accordion for filtering inventory tabs -->
        <section
            x-data="{tabItem1:true,
        tabItem2:false,
        toggleTab1(){this.tabItem1=true;this.tabItem2=false;},
        toggleTab2(){this.tabItem1=false;this.tabItem2=true;},
        }"
            class="relative mt-6 py-3"
        >
            <nav class="relative z-0 flex border rounded-t-md overflow-hidden text-xs lg:text-sm font-medium dark:border-slate-700">
                <button
                    @click="toggleTab1()"
                    :class="tabItem1 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-gray-500 hover:text-gray-700 dark:text-slate-400 `"
                    class="relative min-w-0 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400" id="tabItem1">
                    Categories
                </button>
                <button
                    @click="toggleTab2()"
                    :class="tabItem2 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-gray-500 hover:text-gray-700 dark:text-slate-400 `"
                    class="relative min-w-0 py-4 px-4 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400"
                    id="tabItem2">
                    Subcategories
                </button>
            </nav>

            <div class="p-4 border border-t-0 border-slate-200 dark:border-slate-800 shadow-sm rounded-b-md">
                <div x-show="tabItem1">
                    <div class="mb-4 py-3 w-full flex flex-col md:flex-row gap-3 md:gap-0 md:justify-between md:items-center border-b border-slate-200 dark:border-slate-900">
                        <div>
                            <h4 class="mb-1 font-semibold text-lg">Categories</h4>
                            <p class="mb-1 text-xs text-slate-500 dark:text-slate-600">Main categories, types such as electronics, Kitchen, fashion.</p>
                        </div>

                        <x-ctas.add-button class="ms-2">Add Category</x-ctas.add-button>
                    </div>

                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border rounded-lg divide-y divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
                                    <div class="py-3 px-4">
                                        <div class="relative max-w-xs">
                                            <label class="sr-only">Search</label>
                                            <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Search for items">
                                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                                <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <path d="m21 21-4.3-4.3"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                            <thead class="bg-gray-50 dark:bg-neutral-700">
                                            <tr>
                                                <th scope="col" class="py-3 px-4 pe-0">
                                                    <div class="flex items-center h-5">
                                                        <input id="hs-table-pagination-checkbox-all" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-700 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                        <label for="hs-table-pagination-checkbox-all" class="sr-only">Checkbox</label>
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Products</th>
                                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td class="py-3 ps-4">
                                                        <div class="flex items-center h-5">
                                                            <input id="hs-table-pagination-checkbox-1" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                            <label for="hs-table-pagination-checkbox-1" class="sr-only">Checkbox</label>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                        {{ $category->name }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                        {{ $category->products_count }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">View</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- footer pagination -->
                                    <div class="py-1 px-4">
                                        {{ $categories->onEachSide(1)->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Item 2: Subcategories -->
                <div x-show="tabItem2">
                    <div class="mb-4 py-3 w-full flex flex-col md:flex-row gap-3 md:gap-0 md:justify-between md:items-center border-b border-slate-200 dark:border-slate-900">
                        <div>
                            <h4 class="mb-1 font-semibold text-lg">Subcategories</h4>
                            <p class="mb-1 text-xs text-slate-500 dark:text-slate-600">Minor categories, types, etc. Ex. Shoes, clothing, Headphones, TV, etc.</p>
                        </div>

                        <x-ctas.add-button class="ms-2">Add Subcategory</x-ctas.add-button>
                    </div>

                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border rounded-lg divide-y divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
                                    <div class="py-3 px-4">
                                        <div class="relative max-w-xs">
                                            <label class="sr-only">Search</label>
                                            <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Search for items">
                                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                                <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <path d="m21 21-4.3-4.3"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                            <thead class="bg-gray-50 dark:bg-neutral-700">
                                            <tr>
                                                <th scope="col" class="py-3 px-4 pe-0">
                                                    <div class="flex items-center h-5">
                                                        <input id="hs-table-pagination-checkbox-all" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-700 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                        <label for="hs-table-pagination-checkbox-all" class="sr-only">Checkbox</label>
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Products</th>
                                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                            @foreach($subCategories as $category)
                                                <tr>
                                                    <td class="py-3 ps-4">
                                                        <div class="flex items-center h-5">
                                                            <input id="hs-table-pagination-checkbox-1" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                            <label for="hs-table-pagination-checkbox-1" class="sr-only">Checkbox</label>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                        {{ $category->name }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                        {{ $category->products_count }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">View</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- footer pagination -->
                                    <div class="py-1 px-4">
                                        {{ $subCategories->onEachSide(2)->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
