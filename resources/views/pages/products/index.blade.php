<x-app-layout>
    <x-slot:title>
        Product List
    </x-slot:title>

    <!-- Table Section -->
    <div class="container px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="">
                <div class="p-1.5 align-middle">
                    <livewire:products.list-table />
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
