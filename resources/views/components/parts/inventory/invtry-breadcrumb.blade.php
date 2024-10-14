@props(['title', 'count'])
<nav class="justify-between px-4 py-3 text-slate-700 border border-slate-200 rounded-lg sm:flex sm:px-5 bg-slate-50 dark:bg-slate-800 dark:border-slate-700">
    <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-2 rtl:space-x-reverse sm:mb-0">
        <li class="hidden lg:block">
            <div class="flex items-center">
                <a href="{{ route('home') }}" wire:navigate class="ms-1 text-sm font-medium text-sky-700 hover:text-sky-600 md:ms-2 dark:text-sky-400 dark:hover:text-white">Home</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 hidden lg:block w-3 h-3 mx-1 text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{ route('vendor.inventory') }}" wire:navigate class="ms-1 text-sm font-medium text-sky-700 hover:text-sky-600 md:ms-2 dark:text-sky-400 dark:hover:text-white">Inventory</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center text-xs font-light text-slate-500 dark:text-slate-400 ">
                <svg class="rtl:rotate-180 w-3 h-3 mx-1 text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="mx-1 md:mx-2">
                    {{ $title }}
                </span>
                <span class="bg-emerald-100 text-emerald-800 text-xs me-2 px-2 py-0.5 rounded dark:bg-emerald-800 dark:text-emerald-200 hidden lg:flex">
                    {{ $count }}
                </span>
            </div>
        </li>
    </ol>

    <x-dropdown align="left" width="max">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 text-xs font-normal text-center text-slate-600 bg-amber-500 rounded-lg hover:bg-amber-400 focus:ring-4 focus:outline-none focus:ring-slate-100 dark:bg-amber-600 dark:hover:bg-amber-700 dark:text-slate-900 dark:focus:ring-slate-700">
                <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm9-10v.4A3.6 3.6 0 0 1 8.4 9H6.61A3.6 3.6 0 0 0 3 12.605M14.458 3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                </svg>
                Update inventory
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <div class="grid divide-y divide-slate-200 dark:divide-slate-800">
                <button @click="$dispatch('open-modal', 'create-new-brand')"
                        class="w-full px-4 py-2 text-sm text-start hover:bg-slate-100 dark:hover:bg-slate-600 hover:underline text-slate-700 dark:text-slate-300">
                    {{ __('Add Brand') }}
                </button>

                <button @click="$dispatch('open-modal', 'create-new-category')"
                        class="w-full px-4 py-2 text-sm text-start hover:bg-slate-100 dark:hover:bg-slate-600 hover:underline text-slate-700 dark:text-slate-300">
                    {{ __('Add Category') }}
                </button>

                <button @click="$dispatch('open-modal', 'create-new-subcategory')"
                        class="w-full px-4 py-2 text-sm text-start hover:bg-slate-100 dark:hover:bg-slate-600 hover:underline text-slate-700 dark:text-slate-300">
                    {{ __('Add Subcategory') }}
                </button>
            </div>
        </x-slot>
    </x-dropdown>

    <!-- Create Brand Modal -->
    <x-modal name="create-new-brand">
        <div class="p-4 md:py-6 bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300">
            <h4 class="mb-6 mt-2 font-semibold text-lg">Add New Brand</h4>

            <!-- Form to create new brand -->
            <form wire:submit="submitBrand" class="max-w-2xl md:p-2">
                <div class="mb-4">
                    <label for="brand-name" class="mb-2 block text-sm font-medium text-slate-600 dark:text-slate-400">Name</label>
                    <input type="text" id="brand-name" wire:model="brandName" name="brand-name" required class="block w-full px-3 py-2 border border-slate-300 bg-slate-100 dark:bg-slate-700 shadow-sm rounded-md focus:ring-emerald-500 focus:border-emerald-500 dark:border-slate-600 dark:focus:ring-emerald-600" placeholder="Brand Name">
                </div>

                <div class="flex flex-row justify-end cursor-pointer gap-x-3 text-xs items-center">
                    <span @click="$dispatch('close')" class="hover:underline text-slate-600 dark:text-slate-500">Close</span>

                    <x-ctas.add-button type="submit">Add Brand</x-ctas.add-button>
                </div>
            </form>
        </div>
    </x-modal>

    <!-- Create Category Modal -->
    <x-modal name="create-new-category">
        <div class="p-4 md:py-6 bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300">
            <h4 class="mb-6 mt-2 font-semibold text-lg">Add New Category</h4>

            <!-- Form to create new category -->
            <form wire:submit="submitCategory" class="max-w-2xl md:p-2">
                <div class="mb-4">
                    <label for="category-name" class="mb-2 block text-sm font-medium text-slate-600 dark:text-slate-400">Name</label>
                    <input type="text" id="category-name" wire:model="categoryName" name="category-name" required class="block w-full px-3 py-2 border border-slate-300 bg-slate-100 dark:bg-slate-700 shadow-sm rounded-md focus:ring-emerald-500 focus:border-emerald-500 dark:border-slate-600 dark:focus:ring-emerald-600" placeholder="Category Name">
                </div>

                <div class="flex flex-row justify-end cursor-pointer gap-x-3 text-xs items-center">
                    <span @click="$dispatch('close')" class="hover:underline text-slate-600 dark:text-slate-500">Close</span>

                    <x-ctas.add-button type="submit">Add Category</x-ctas.add-button>
                </div>
            </form>
        </div>
    </x-modal>

    <!-- Create Subcategory Modal -->
    <x-modal name="create-new-subcategory">
        <div class="p-4 md:py-6 bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300">
            <h4 class="mb-6 mt-2 font-semibold text-lg">Add New Subcategory</h4>

            <!-- Form to create new brand -->
            <form wire:submit="submitSubCategory" x-on:brand-created="$dispatch('close')" class="max-w-2xl md:p-2">
                <div class="mb-4">
                    <label for="subcategory-name" class="mb-2 block text-sm font-medium text-slate-600 dark:text-slate-400">Name</label>
                    <input type="text" id="subcategory-name" wire:model="subCategoryName" name="subcategory-name" required class="block w-full px-3 py-2 border border-slate-300 bg-slate-100 dark:bg-slate-700 shadow-sm rounded-md focus:ring-emerald-500 focus:border-emerald-500 dark:border-slate-600 dark:focus:ring-emerald-600" placeholder="Subcategory Name">
                </div>

                <div class="flex flex-row justify-end cursor-pointer gap-x-3 text-xs items-center">
                    <span @click="$dispatch('close')" class="hover:underline text-slate-600 dark:text-slate-500">Close</span>

                    <x-ctas.add-button type="submit">Add Subcategory</x-ctas.add-button>
                </div>
            </form>
        </div>
    </x-modal>

    <!-- Create Customer Modal -->
    <x-modal name="create-new-customer">
        <div class="p-4 md:py-6 bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300">
            <h4 class="mb-6 mt-2 font-semibold text-lg">Add New Customer</h4>

            <!-- Form to create new brand -->
            <form wire:submit="submitCustomer" class="max-w-2xl md:p-2">
                <div class="mb-4">
                    <label for="customer-name" class="mb-2 block text-sm font-medium text-slate-600 dark:text-slate-400">Name</label>
                    <input type="text" id="customer-name" wire:model="customerName" name="customer-name" required class="block w-full px-3 py-2 border border-slate-300 bg-slate-100 dark:bg-slate-700 shadow-sm rounded-md focus:ring-emerald-500 focus:border-emerald-500 dark:border-slate-600 dark:focus:ring-emerald-600" placeholder="Subcategory Name">
                </div>

                <div class="flex flex-row justify-end cursor-pointer gap-x-3 text-xs items-center">
                    <span @click="$dispatch('close')" class="hover:underline text-slate-600 dark:text-slate-500">Close</span>

                    <x-ctas.add-button type="submit">Add Customer</x-ctas.add-button>
                </div>
            </form>
        </div>
    </x-modal>

    <!-- Scripts -->
    @script
    <script>
        Livewire.on('brand-created', () => {
            Swal.fire({title:'Brand Created!', text:'The brand has been added successfully.', icon:'success'});
        })

        Livewire.on('category-created', () => {
            Swal.fire({title:'Category Created!', text:'The category has been added successfully.', icon:'success'});
        });

        Livewire.on('sub-category-created', () => {
            Swal.fire({title:'Subcategory Created!', text:'The subcategory has been added successfully.', icon:'success'});
        });
    </script>
    @endscript
</nav>
