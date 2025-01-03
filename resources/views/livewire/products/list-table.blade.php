<div class="bg-white border border-slate-200 rounded-xl shadow-sm dark:bg-slate-900 dark:border-slate-700">
    <!-- Header -->
    <div class="p-3 lg:px-6 py-4 border-b border-slate-200 dark:border-slate-700">
        <h2 class="text-xl font-semibold text-slate-800 dark:text-slate-200">
            Products
        </h2>
        <p class="text-sm text-gray-600 dark:text-slate-400">
            Create products, edit, download and more.
        </p>

        <div class="mt-5 flex flex-col space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
            <div class="md:flex sm:items-center md:flex-1 space-4 mb-4 md:mb-0">
                <h5>
                    <span class="text-slate-500 text-sm">Total products:</span>
                    <span class="dark:text-white font-medium text-base lg:text-lg">{{ number_format($productCount, 0) }}</span>
                </h5>
                {{--<h5 class="md:ms-2">
                    <span class="text-slate-500 text-sm">Total sales:</span>
                    <span class="text-amber-500 dark:text-amber-600 font-semibold text-base lg:text-lg">Ksh {{ number_format($productSales, 2) }}</span>
                </h5>--}}
            </div>

            <!-- actions -->
            <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                <a href="{{route('products.create')}}" wire:navigate class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm text-white font-medium rounded-lg border border-transparent bg-emerald-500 dark:bg-emerald-600 hover:bg-emerald-700 dark:hover:bg-emerald-800 focus:outline-none focus:bg-emerald-700 dark:focus:bg-emerald-800 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    Create a new product
                </a>

                <a href="{{route('vendor.inventory')}}" wire:navigate class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    Update stocks
                </a>
                <button type="button" class="hidden flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    Export
                </button>
            </div>
        </div>
    </div>
    <!-- End Header -->

    @if(isset($products))
        <div class="relative overflow-x-auto min-h-[50vh]">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-2 md:p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="p-2 md:px-6 md:py-3">
                        <div class="flex items-center">
                            Product name
                            <a href="#"><svg class="hidden w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="p-2 md:px-6 md:py-3">
                        Category/Subcategory
                    </th>
                    <th scope="col" class="p-2 md:px-6 md:py-3">
                        <div class="flex items-center">
                            Brand
                        </div>
                    </th>
                    <th scope="col" class="p-2 md:px-6 md:py-3">
                        <button wire:click="sortByStock" class="flex items-center">
                            Stock Quantity
                            <span><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></span>
                        </button>
                    </th>
                    <th scope="col" class="">
                        <button wire:click="sortByPrice" class="p-2 md:px-6 md:py-3 flex items-center">
                            Price (in Ksh)
                            <span><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></span>
                        </button>
                    </th>
                    <th scope="col" class="p-2 md:px-6 md:py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="bg-white items-center border-b dark:bg-slate-800 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-600">
                        <td class="w-4 p-2 md:p-4">
                            <div class="flex items-center">
                                <input id="table-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="table-search" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="p-2 md:px-4">
                            <div class="flex items-center font-light md:font-medium text-slate-800 dark:text-slate-200 ">
                                <img src="/storage/{{ $product->image }}" alt="{{ __($product->name . ' Image') }}" class="w-8 h-8 rounded-sm hidden md:block">

                                <a href="{{ route('admin.products.edit', $product->slug) }}" class="pl-2" wire:navigate>
                                    {{ $product->name }}
                                </a>
                            </div>
                        </th>

                        <td class="p-2 md:px-6 md:py-4">
                            {{ $product->category->name }} / {{ $product->subCategory->name }}
                        </td>
                        <td class="p-2 md:px-6 md:py-4">
                            {{ $product->brand->name}}
                        </td>
                        <td class="p-2 md:px-6 md:py-4">
                            {{ $product->stock_quantity}}
                        </td>
                        <td class="p-2 md:px-6 md:py-4">
                            {{ number_format($product->price, 2) }}
                        </td>
                        <td class="relative px-2 md:px-6 py-4">
                            <!-- actions dropdown btn -->
                            <div class="flex items-center">
                                <x-dropdown align="right" width="40">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-300">
                                            <div class="ms-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('admin.products.edit', $product->slug)" class="hover:underline text-sky-500 dark:text-sky-500" wire:navigate>
                                            {{ __('View') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('admin.products.edit', $product->slug)" class="hover:underline text-green-500 dark:text-green-500" wire:navigate>
                                            {{ __('Edit') }}
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <button wire:click="productDelete({{$product->id}})"
                                                wire:confirm="Do you want to delete this product (You cannot reverse this action)?"
                                                class="w-full text-start">
                                            <x-dropdown-link class="hover:underline text-red-500 dark:text-red-600">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </button>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <!-- empty state -->
    @if($products->isEmpty())
        <div class="max-w-sm w-full min-h-[400px] flex flex-col justify-center mx-auto px-6 py-4">
            <div class="flex justify-center items-center size-[46px] bg-slate-100 rounded-lg dark:bg-slate-800">
                <svg class="shrink-0 size-6 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                    <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </div>

            <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
                No products added in you shop.
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                Add products and get great insights on sales, profits, stock, inventory, suppliers, and more...
            </p>

            <div class="mt-5 flex flex-col sm:flex-row gap-2">
                <a href="{{route('products.create')}}" wire:navigate class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm text-white font-medium rounded-lg border border-transparent bg-emerald-500 dark:bg-emerald-600 hover:bg-emerald-700 dark:hover:bg-emerald-800 focus:outline-none focus:bg-emerald-700 dark:focus:bg-emerald-800 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    Create a new product
                </a>
            </div>
        </div>
    @endif
    <!-- End empty state -->

    <!-- Footer -->
    <div class="px-6 py-4">
        {{ $products->links() }}
    </div>
</div>
