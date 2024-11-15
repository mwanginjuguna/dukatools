<div>
    <!-- accordion for filtering inventory tabs -->
    <section
        x-data="{tabItem1:true,
        tabItem2:false,
        tabItem3:false,
        toggleTab1(){this.tabItem1=true;this.tabItem2=false;this.tabItem3=false;},
        toggleTab2(){this.tabItem1=false;this.tabItem2=true;this.tabItem3=false;},
        toggleTab3(){this.tabItem1=false;this.tabItem2=false;this.tabItem3=true;}
        }"
        class="relative mt-6 py-3"
    >
        <nav class="relative z-0 flex border rounded-t-md overflow-hidden dark:border-neutral-700">
            <button
                @click="toggleTab1()"
                :class="tabItem1 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-gray-500 hover:text-gray-700 dark:text-slate-400 `"
                class="relative min-w-0 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-sm font-medium text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400" id="tabItem1">
                All Products
            </button>
            <button
                @click="toggleTab2()"
                :class="tabItem2 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-gray-500 hover:text-gray-700 dark:text-slate-400 `"
                class="relative min-w-0 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-sm font-medium text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400"
                id="tabItem2">
                Out of Stock
            </button>
            <button
                @click="toggleTab3()"
                :class="tabItem3 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-gray-500 hover:text-gray-700 dark:text-slate-400 `"
                class="relative min-w-0 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-sm font-medium text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400"
                id="tabItem3">
                Low Stock <span class="text-xs">(less than {{ 10 }})</span>
            </button>
        </nav>

        <div class="border border-t-0 border-slate-200 dark:border-slate-800 shadow-sm rounded-b-md">
            <div x-show="tabItem1">
                <div class="align-middle">
                    <livewire:inventory.stock-list @stock-updated="$refresh" />
                </div>
            </div>
            <div x-show="tabItem2">
                <div class="align-middle">
                    <livewire:inventory.stock-out-list @stock-updated="$refresh" />
                </div>
            </div>
            <div x-show="tabItem3">
                <div class="align-middle">
                    <livewire:inventory.stock-low-list @stock-updated="$refresh" />
                </div>
            </div>
        </div>
    </section>
{{--
    <div class="mx-auto mt-10 py-10 grid grid-cols-1 lg:grid-cols-2 gap-x-5 gap-y-10 border-t border-slate-200">
        @foreach($products as $product)
            <x-cards.product-horizontal-card :product="$product" />
        @endforeach
    </div> --}}

    <x-modal name="restock-modal">
        <div class="p-4 bg-slate-100 dark:bg-slate-900 text-slate-800 dark:text-slate-200">
            <h3 class="text-lg font-semibold">Restock Product</h3>

            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">Current stock quantity: {{ $currentStockQuantity }}</p>

            <form wire:submit="restock()">
                <div class="mt-4">
                    <label for="restock-quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Restock Quantity <span class="text-xs text-slate-500 dark:bg-slate-500">(New units to add)</span>
                    </label>
                    <input wire:model="newStockQuantity" type="number" id="restock-quantity" name="restock_quantity" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 rounded-md focus:outline-none focus:ring-emerald-500 dark:focus:ring-emerald-600" required>
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="submit" class="inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium text-white bg-emerald-500 dark:bg-emerald-600 rounded-md hover:bg-emerald-700 dark:hover:bg-emerald-800 focus:outline-none focus:bg-emerald-700">
                        Restock
                    </button>
                </div>
            </form>
        </div>
    </x-modal>


    <!-- Scripts -->
    @script
    <script>
        Livewire.on('stock-updated', () => {
            Swal.fire({title:'Stock Updated!', text:'The stock quantity has been updated successfully.', icon:'success'});
        });

        Livewire.on('product-deleted', () => {
            Swal.fire({icon: 'warning', title: 'Deleted!', text:'Product Deleted Permanently!'});
        });
    </script>
    @endscript
</div>
