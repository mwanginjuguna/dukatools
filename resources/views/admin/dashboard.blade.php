<?php
//dd($orders->count())
?>
<x-app-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-slate-300 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen max-w-6xl mx-auto bg-slate-100 dark:bg-slate-900 dark:text-slate-200 px-4">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">

            <x-parts.dashboard-stats :$revenue :$usersCount :$customers :$pendingOrders :$ordersCount :$posts :$productsCount :$stocked />

            <div class="max-w-6xl mx-auto">
                <livewire:charts.sales :ordersCount="$ordersCount" :productsCount="$productsCount" :$topProducts :$purchasedProducts />
            </div>

            <div class="grid md:grid-cols-2 gap-6 pb-3 mt-6">
                <!--top-->
                <div class="md:col-span-1 max-w-3xl grid text-slate-600 dark:text-slate-400 gap-6">
                    <!--top-products-->
                    <div class="py-6">
                        <h2 class="py-1 font-semibold text-center text-slate-600 dark:text-slate-400">
                            Top 10 Selling Products (by sales)
                        </h2>
                        @if($topProducts->count() >0)
                            <x-parts.top-products :$topProducts />
                        @else
                            <p class="py-1 flex flex-row items-center gap-x-1 text-xs text-slate-600 dark:text-slate-500">
                                <svg class="w-6 h-6 pe-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                No sales data to show, yet.</p>
                        @endif
                    </div>
                </div>

                <div class="md:col-span-1 grid text-slate-900 dark:text-slate-100 gap-6">
                    <!-- Messages Card -->
                    {{--<x-cards.simple-stats-card title="Messages" class="max-w-sm">
                        <x-slot:svg>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.891 15.107 15.11 8.89m-5.183-.52h.01m3.089 7.254h.01M14.08 3.902a2.849 2.849 0 0 0 2.176.902 2.845 2.845 0 0 1 2.94 2.94 2.849 2.849 0 0 0 .901 2.176 2.847 2.847 0 0 1 0 4.16 2.848 2.848 0 0 0-.901 2.175 2.843 2.843 0 0 1-2.94 2.94 2.848 2.848 0 0 0-2.176.902 2.847 2.847 0 0 1-4.16 0 2.85 2.85 0 0 0-2.176-.902 2.845 2.845 0 0 1-2.94-2.94 2.848 2.848 0 0 0-.901-2.176 2.848 2.848 0 0 1 0-4.16 2.849 2.849 0 0 0 .901-2.176 2.845 2.845 0 0 1 2.941-2.94 2.849 2.849 0 0 0 2.176-.901 2.847 2.847 0 0 1 4.159 0Z"/>
                            </svg>
                        </x-slot:svg>

                        <h3 class="text-xl font-medium text-green-600 dark:text-green-500">
                            {{ number_format($messages->count(), 0) }}
                        </h3>
                    </x-cards.simple-stats-card>--}}
                    <!-- End Card -->

                    <div>
                        <!--new-users -->
                        <h4 class="py-2 font-semibold text-center text-slate-600 dark:text-slate-400">Latest Customers</h4>

                        <div class="mt-1">
                            <x-cards.users-list :$users />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @pushonce('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpushonce
</x-app-layout>
