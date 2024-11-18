<div class="max-w-5xl mx-auto">
    <!-- Breadcrumb -->
    <x-parts.inventory.invtry-breadcrumb title="Brands" count="{{ $brandCount }}" />

    <!-- accordion for filtering brands -->
    <section
        class="relative mt-3"
    >

        <div class="shadow-sm shadow-slate-200 dark:shadow-slate-800">
            <!-- Tab Item 1: Brands -->
            <div>
                <div class="mb-4 p-4 w-full flex flex-col md:flex-row gap-3 md:gap-0 md:justify-between md:items-center">
                    <div>
                        <h4 class="mb-1 font-semibold text-lg">Brands</h4>
                        <p class="mb-1 text-xs text-slate-500 dark:text-slate-600">Product Brands e.g Nike, Gucci, Huawei.</p>
                    </div>

                    <button type="submit"
                            @click="$dispatch('open-modal', 'create-new-brand')"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white hover:text-slate-800 dark:text-slate-800 dark:hover:text-slate-200 bg-emerald-600 dark:bg-emerald-500 rounded-lg hover:bg-emerald-500 dark:hover:bg-emerald-600 transition-all ease-in-out duration-300"
                    >
                        <svg class="me-1.5 inline-block size-5 opacity-75" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>

                        <span>Add Brand</span>
                    </button>
                </div>

                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="min-w-full inline-block align-middle">
                            <div class="border dark:border-slate-800">
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
                                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-start">Products</th>
                                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-end">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                                        @foreach($brands as $brand)
                                            <tr>
                                                <td class="px-2 ps-2 md:px-6 md:ps-4">
                                                    <div class="flex items-center h-3 md:h-5">
                                                        <input id="hs-table-pagination-checkbox-1" type="checkbox" class="border-slate-200 rounded text-emerald-600 focus:ring-emerald-500 dark:bg-slate-800 dark:border-slate-700 dark:checked:bg-emerald-500 dark:checked:border-emerald-500 dark:focus:ring-offset-slate-800">
                                                        <label for="hs-table-pagination-checkbox-1" class="sr-only">Checkbox</label>
                                                    </div>
                                                </td>
                                                <td class="px-2 py-2 md:px-6 md:py-4">
                                                    {{ $brand->name }}
                                                </td>

                                                <td class="px-2 py-2 md:px-6 md:py-4">
                                                    {{ $brand->products_count }}
                                                </td>
                                                <td class="px-2 py-2 md:px-6 md:py-4 whitespace-nowrap text-end font-medium">
                                                    <button wire:click="showBrand({{$brand->id}})" type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-emerald-600 hover:text-emerald-800 focus:outline-none focus:text-emerald-800 disabled:opacity-50 disabled:pointer-events-none dark:text-emerald-500 dark:hover:text-emerald-400 dark:focus:text-emerald-400">View</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- footer pagination -->
                                <div class="pt-3 py-1 px-4 text-xs">
                                    {{ $brands->onEachSide(1)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <x-modal name="brand-show-modal">
        <div class="p-4 bg-slate-100 dark:bg-slate-800">
            @if(isset($selectedBrand))
                <div class="flex justify-between items-center">
                    <h3 class="mb-2 text-lg py-2 font-bold">
                        {{$selectedBrand->name}} brand products
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

                @if($selectedBrand->products->count() > 0)
                    <div class="grid gap-4">
                        @foreach($selectedBrand->products as $product)
                            <div class="flex items-center gap-3 pb-3 font-light md:font-medium border-b border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-300 ">
                                <img src="/storage/{{ $product->image }}" alt="{{ __($product->name . ' Image') }}" class="w-8 h-8 rounded-sm hidden md:block">

                                <a href="{{ route('admin.products.edit', $product->slug) }}" class="" wire:navigate>
                                    {{ $product->name }} <span class="inline-flex text-xs text-gray-600 dark:text-gray-400">({{ $product->stock_quantity }} remaining)</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
        </div>
    </x-modal>
</div>
