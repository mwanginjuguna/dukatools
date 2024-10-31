<?php
//dd($orders->count())
?>
<x-app-layout>
    <x-slot:title>
        Admin Dashboard
    </x-slot:title>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-slate-300 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen max-w-6xl mx-auto bg-slate-100 dark:bg-slate-900 dark:text-slate-200 px-4">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">

            <x-parts.dashboard-stats :$usersCount :$customers :$pendingOrders :$ordersCount :$posts :$productsCount :$stocked />

            <div class="max-w-6xl mx-auto">
                <livewire:charts.sales :ordersCount="$ordersCount" :productsCount="$productsCount" :$topProducts :$purchasedProducts />
            </div>

            <div class="grid md:grid-cols-2 gap-6 pb-3 mt-6">
                <!--top-->
                <div class="md:col-span-1 max-w-3xl grid text-slate-900 dark:text-slate-100 gap-6">
                    <!--top-products-->
                    <div class="py-6 px-4 shadow-sm shadow-slate-200 dark:shadow-slate-700 rounded-lg">
                        <h2 class="py-2 font-bold text-xl">
                            Top 10 Selling Products (by sales)
                        </h2>
                        <x-parts.top-products :$topProducts />
                    </div>
                </div>

                <div class="md:col-span-1 grid text-slate-900 dark:text-slate-100 gap-6">
                    <!-- Messages Card -->
                    <x-cards.simple-stats-card title="Messages" class="max-w-sm">
                        <x-slot:svg>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.891 15.107 15.11 8.89m-5.183-.52h.01m3.089 7.254h.01M14.08 3.902a2.849 2.849 0 0 0 2.176.902 2.845 2.845 0 0 1 2.94 2.94 2.849 2.849 0 0 0 .901 2.176 2.847 2.847 0 0 1 0 4.16 2.848 2.848 0 0 0-.901 2.175 2.843 2.843 0 0 1-2.94 2.94 2.848 2.848 0 0 0-2.176.902 2.847 2.847 0 0 1-4.16 0 2.85 2.85 0 0 0-2.176-.902 2.845 2.845 0 0 1-2.94-2.94 2.848 2.848 0 0 0-.901-2.176 2.848 2.848 0 0 1 0-4.16 2.849 2.849 0 0 0 .901-2.176 2.845 2.845 0 0 1 2.941-2.94 2.849 2.849 0 0 0 2.176-.901 2.847 2.847 0 0 1 4.159 0Z"/>
                            </svg>
                        </x-slot:svg>

                        <h3 class="text-xl font-medium text-green-600 dark:text-green-500">
                            {{ number_format($messages->count(), 0) }}
                        </h3>
                    </x-cards.simple-stats-card>
                    <!-- End Card -->

                    <div>
                        <!--new-users -->
                        <h4 class="py-2 font-semibold xl:text-xl">New Users</h4>

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
