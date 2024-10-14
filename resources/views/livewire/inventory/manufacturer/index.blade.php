<div class="max-w-5xl mx-auto">
    <!-- Breadcrumb -->
    <x-parts.inventory.invtry-breadcrumb title="Manufacturers" count="{{ $manufacturerCount }}" />

    <!-- accordion for filtering brands -->
    <section
        x-data="{tabItem1:true,
        toggleTab1(){this.tabItem1=true;}
        }"
        class="relative mt-6 py-3"
    >
        <nav class="relative z-0 flex border rounded-t-md overflow-hidden text-xs lg:text-sm font-medium dark:border-slate-700">
            <button
                @click="toggleTab1()"
                :class="tabItem1 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-slate-500 hover:text-slate-700 dark:text-slate-400 `"
                class="relative min-w-0 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400" id="tabItem1">
                Manufacturers <span class="bg-emerald-100 text-emerald-800 text-xs px-1 py-0.5 rounded dark:bg-emerald-800 dark:text-emerald-200 inline-flex">
                        {{ $manufacturerCount }}
                    </span>
            </button>
        </nav>

        <div class="p-4 border border-t-0 border-slate-200 dark:border-slate-800 shadow-sm rounded-b-md">

            <!-- Tab Item 1: Manufacturers -->
            <div x-show="tabItem1" class="grid space-y-3">
                <div class="mb-4 py-3 w-full flex flex-col md:flex-row gap-3 md:gap-0 md:justify-between md:items-center border-b border-slate-200 dark:border-slate-900">
                    <div>
                        <h4 class="mb-1 font-semibold text-lg">Manufacturers</h4>
                        <p class="mb-1 text-xs text-slate-500 dark:text-slate-600"><em class="uppercase">Partners in production.</em></p>
                    </div>

                    <button @click="$dispatch('open-modal', 'create-new-manufacturer')"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white hover:text-slate-800 dark:text-slate-800 dark:hover:text-slate-200 bg-emerald-600 dark:bg-emerald-500 rounded-lg hover:bg-emerald-500 dark:hover:bg-emerald-600 transition-all ease-in-out duration-300"
                    >
                        <svg class="me-1.5 inline-block size-5 opacity-75" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>

                        <span>Add manufacturer</span>
                    </button>
                </div>

                <div class="mt-6 flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border rounded-lg divide-y divide-slate-200 dark:border-slate-800 dark:divide-slate-800">
                                @if($manufacturerCount > 0)
                                    <!--search-->
                                    <div class="py-3 px-4">
                                        <div class="relative max-w-xs">
                                            <label class="sr-only">Search</label>
                                            <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="py-2 px-3 ps-9 block w-full border-slate-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-emerald-500 focus:ring-emerald-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-400 dark:placeholder-slate-500 dark:focus:ring-slate-600" placeholder="Search for items">
                                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <path d="m21 21-4.3-4.3"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <!--table-->
                                    <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                                            <thead class="bg-slate-50 dark:bg-slate-700 text-slate-500 uppercase dark:text-slate-500 text-xs ">
                                            <tr>
                                                <th scope="col" class="px-2 py-2 md:px-6 md:py-4 pe-0">
                                                    <div class="flex items-center h-3 md:h-5">
                                                        <input id="hs-table-pagination-checkbox-all" type="checkbox" class="border-slate-200 rounded text-emerald-600 focus:ring-emerald-500 dark:bg-slate-700 dark:border-slate-500 dark:checked:bg-emerald-500 dark:checked:border-emerald-500 dark:focus:ring-offset-slate-800">
                                                        <label for="hs-table-pagination-checkbox-all" class="sr-only">Checkbox</label>
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-start">Name</th>
                                                <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-start">Email</th>
                                                <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-start">Phone No.</th>
                                                <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-end">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                                            @foreach($manufacturers as $manufacturer)
                                                <tr>
                                                    <td class="px-2 ps-2 md:px-6 md:ps-4">
                                                        <div class="flex items-center h-3 md:h-5">
                                                            <input id="hs-table-pagination-checkbox-1" type="checkbox" class="border-slate-200 rounded text-emerald-600 focus:ring-emerald-500 dark:bg-slate-800 dark:border-slate-700 dark:checked:bg-emerald-500 dark:checked:border-emerald-500 dark:focus:ring-offset-slate-800">
                                                            <label for="hs-table-pagination-checkbox-1" class="sr-only">Checkbox</label>
                                                        </div>
                                                    </td>
                                                    <td class="px-2 py-2 md:px-6 md:py-4">
                                                        {{ $manufacturer->fullName }}
                                                    </td>

                                                    <td class="px-2 py-2 md:px-6 md:py-4">
                                                        {{ $manufacturer->user->email }}
                                                    </td>
                                                    <td class="px-2 py-2 md:px-6 md:py-4">
                                                        {{ $manufacturer->user->phone_number }}
                                                    </td>
                                                    <td class="px-2 py-2 md:px-6 md:py-4 whitespace-nowrap text-end font-medium">
                                                        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-emerald-600 hover:text-emerald-800 focus:outline-none focus:text-emerald-800 disabled:opacity-50 disabled:pointer-events-none dark:text-emerald-500 dark:hover:text-emerald-400 dark:focus:text-emerald-400">View</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- footer pagination -->
                                    <div class="pt-3 py-1 px-4 text-xs">
                                        {{ $manufacturers->onEachSide(1)->links() }}
                                    </div>
                                @else
                                    <!-- empty state -->
                                    <x-parts.inventory.table-empty-state />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
