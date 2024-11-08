<div class="flex flex-col lg:flex-row gap-6 mt-6 py-3">
    <div class="w-full lg:max-w-sm">
        <div class="hidden lg:block">
            <livewire:charts.sales-by-brand-doughnut />
        </div>
        <div class="p-3">
            <p class="mt-4 py-2 font-medium md:text-lg">Top Products/Sales</p>
            @if($topProducts->count() >0)
                <x-parts.top-products :$topProducts />
            @else
                <p class="py-1 flex flex-row items-center gap-x-1 text-xs text-slate-600 dark:text-slate-500">
                    <svg class="w-6 h-6 pe-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    No sales data to show, Yet.</p>
            @endif
        </div>
    </div>

    <!-- accordion for filtering product tabs -->
    <section
        x-data="{tabItem1:true,
        tabItem2:false,
        tabItem3:false,
        toggleTab1(){this.tabItem1=true;this.tabItem2=false;this.tabItem3=false;},
        toggleTab2(){this.tabItem1=false;this.tabItem2=true;this.tabItem3=false;},
        toggleTab3(){this.tabItem1=false;this.tabItem2=false;this.tabItem3=true;}
        }"
        class="relative w-full"
    >
        <nav class="relative z-0 flex border rounded-t-md overflow-hidden dark:border-slate-800">
            <button
                @click="toggleTab1()"
                :class="tabItem1 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-gray-500 hover:text-gray-700 dark:text-slate-400 `"
                class="relative min-w-0 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-sm font-medium text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400" id="tabItem1">
                All
            </button>
            <button
                @click="toggleTab2()"
                :class="tabItem2 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-gray-500 hover:text-gray-700 dark:text-slate-400 `"
                class="relative min-w-0 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-sm font-medium text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400"
                id="tabItem2">
                Pending
            </button>
            <button
                @click="toggleTab3()"
                :class="tabItem3 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-gray-500 hover:text-gray-700 dark:text-slate-400 `"
                class="relative min-w-0 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-sm font-medium text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400"
                id="tabItem3">
                Completed
            </button>
        </nav>

        <div class="p-2 md:p-4 justify-center border border-t-0 border-slate-200 dark:border-slate-800 shadow-sm rounded-b-md">
            <div x-show="tabItem1">
                <div class="p-1.5 content-center space-y-5 overflow-x-auto">
                    @forelse($orders as $order)
                            <x-parts.sales.sale-card :order="$order" />
                    @empty
                        <div class="py-2">
                            <x-parts.inventory.table-empty-state />
                        </div>
                    @endforelse
                    <div>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
            <div x-show="tabItem2">
                <div class="p-1.5 align-middle space-y-5 overflow-x-auto">
                    @forelse($pendingOrders as $order)
                        <x-parts.sales.sale-card :order="$order" />
                    @empty
                        <div class="py-2">
                            <x-parts.inventory.table-empty-state />
                        </div>
                    @endforelse
                    <div>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
            <div x-show="tabItem3">
                <div class="p-1.5 align-middle space-y-5 overflow-x-auto">
                    @forelse($completedOrders as $order)
                        <x-parts.sales.sale-card :order="$order" />
                    @empty
                        <div class="py-2">
                            <x-parts.inventory.table-empty-state />
                        </div>
                    @endforelse
                    <div>
                        {{ $orders->links() }}
                    </div>
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

     @script
    <script>
        Livewire.on('product-deleted', () => {
            Swal.fire({icon: 'warning', title: 'Deleted!', text:'Product Deleted Permanently!'});
        });
    </script>
    @endscript
</div>



