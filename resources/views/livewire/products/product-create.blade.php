<section class="">
    <!-- Breadcrumb -->
    <nav class="justify-between px-4 py-3 text-gray-700 border border-gray-200 rounded-lg sm:flex sm:px-5 dark:border-slate-800">
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
                    <a href="{{ route('products.index') }}" wire:navigate class="ms-1 text-sm font-medium text-sky-700 hover:text-sky-600 md:ms-2 dark:text-sky-400 dark:hover:text-white">Products</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center text-xs font-light text-gray-500 dark:text-gray-400 ">
                    <svg class="rtl:rotate-180 w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="mx-1 md:mx-2">
                        Product Create
                    </span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold me-2 px-2 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 hidden lg:flex">
                        {{ 'form'  }}
                    </span>
                </div>
            </li>
        </ol>

        <x-dropdown align="left" width="max">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 text-xs font-normal text-center text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-300 dark:focus:ring-gray-700">
                    <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm9-10v.4A3.6 3.6 0 0 1 8.4 9H6.61A3.6 3.6 0 0 0 3 12.605M14.458 3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                    </svg>Update product<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <button wire:click="showProduct"
                        class="w-full px-4 py-2 text-xs lg:text-base text-start hover:bg-gray-100 dark:hover:bg-gray-600 hover:underline text-sky-500 dark:text-sky-600">
                    {{ __('Create Category') }}
                </button>

                <button wire:click="showEditForm"
                        class="w-full px-4 py-2 text-xs lg:text-base text-start hover:bg-gray-100 dark:hover:bg-gray-600 hover:underline text-green-500 dark:text-green-600">
                    {{ __('Create Brand') }}
                </button>


                <button @click="$dispatch('open-modal', 'upload-product-images')"
                        class="w-full px-4 py-2 text-xs lg:text-base text-start hover:bg-gray-100 dark:hover:bg-gray-600 hover:underline text-slate-700 dark:text-slate-300">
                    {{ __('Create Subcategory') }}
                </button>

                <button @click="$dispatch('open-modal', 'product-feature')"
                        class="w-full px-4 py-2 text-xs lg:text-base text-start hover:bg-gray-100 dark:hover:bg-gray-600 hover:underline text-sky-700 dark:text-sky-300">
                    {{ __('Add Product Feature') }}
                </button>

                <!-- Authentication -->
                <button wire:click="productDelete()"
                        wire:confirm="Do you want to delete this product (You cannot reverse this action)?"
                        class="w-full text-xs lg:text-base text-start">
                    <x-dropdown-link class="hover:underline text-red-500 dark:text-red-600">
                        {{ __('Delete') }}
                    </x-dropdown-link>
                </button>
            </x-slot>
        </x-dropdown>
    </nav>

    <div class="py-8 px-4 mx-auto max-w-3xl lg:py-16 text-xs">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
        <form wire:submit="productSave" enctype="multipart/form-data">
            @csrf
            <!-- main details -->
            <div class="mt-4 mb-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4 sm:gap-6">
                <div class="sm:col-span-2 lg:col-span-4">
                    <div class="mb-4 w-full py-3 border-b border-slate-200 dark:border-slate-900">
                        <h4 class="mb-1 font-semibold text-lg">Product Details</h4>
                        <p class="mb-1 text-xs text-slate-500 dark:text-slate-600">Name, Brand, Category, Subcategory, tags/labels, price, etc.</p>
                    </div>
                </div>
                <!-- product name -->
                <div class="sm:col-span-2 lg:col-span-4">
                    <label for="name" class="block mb-2 font-medium">Product Name <span class="text-xs text-red-600">*</span></label>
                    <input type="text"
                           name="name"
                           id="name"
                           wire:model="form.name"
                           class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Type product name"
                           required>
                    @error('form.name')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <!-- product description -->
                <div class="sm:col-span-2 lg:col-span-4">
                    <label for="description" class="block mb-2 font-medium">Description <span class="text-xs text-red-500">*</span> </label>
                    <textarea id="description"
                              rows="8"
                              wire:model="form.description"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Your description here"></textarea>
                    @error('form.description')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror

                    <!-- product main image -->
                    <div class="mt-4 lg:mt-6">
                        <label class="block mb-2 text-sm font-medium" for="file_input">Upload 1 Main product Image <span class="text-xs text-gray-600">Optional</span></label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                               wire:model="productImage"
                               id="file_input" type="file">
                        <p class="text-xs text-slate-500">(You will upload more after the product is added.)</p>
                        @error('productImage')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                    </div>

                </div>

                <!-- product brand -->
                <div class="w-full">
                    <div>
                        <label for="brand" class="block mb-2">Brand</label>
                        <select name="brand"
                                wire:model="form.brandId"
                                id="brand" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Choose a brand</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="hidden">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                        <input type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="Product brand">
                    </div>

                    @error('form.brand')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <!-- product category -->
                <div>
                    <label for="category" class="block mb-2">Category</label>
                    <select name="category"
                            wire:model="form.categoryId"
                            id="category" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Choose a category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('form.categoryId')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <!-- product sub-category -->
                <div>
                    <label for="sub-category" class="block mb-2">Sub-Category</label>
                    <select name="sub-category"
                            wire:model="form.subCategoryId"
                            id="sub-category" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Choose a sub-category</option>
                        @foreach($SubCategories as $subCategory)
                            <option value="{{$subCategory->id}}">{{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('form.subCategoryId')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <!-- product return policy -->
                <div class="w-full">
                    <label for="return-policy" class="block mb-2">Return Policy</label>
                    <input type="text"
                           name="return-policy"
                           id="return-policy"
                           wire:model="form.returnPolicy"
                           class="hidden bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="E.g. 30 Days, 14 Days">
                    <select name="return-policy"
                            wire:model="form.returnPolicyId"
                            id="return-policy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Choose a return policy</option>
                        @foreach($returnPolicies as $returnPolicy)
                            <option value="{{$returnPolicy->id}}">{{ $returnPolicy->name }}</option>
                        @endforeach
                    </select>
                    @error('form.returnPolicyId')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>
            </div>

            <!-- Inventory -->
            <div class="mt-5 lg:mt-16 mb-6 grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="mb-2 sm:col-span-2">
                    <div class="py-3 border-b border-slate-200 dark:border-slate-900">
                        <h4 class="mb-1 font-medium text-lg">Inventory</h4>
                        <p class="mb-1 text-xs text-slate-500 dark:text-slate-600">sku, code, supplier etc.</p>
                    </div>
                </div>

                <!-- product sku -->
                <div class="w-full">
                    <label for="sku" class="block mb-2">SKU <span class="text-slate-500 dark:text-slate-600">(store keeping unit)</span></label>
                    <input type="text"
                           name="sku"
                           id="sku"
                           wire:model="form.sku"
                           class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Product sku"
                    >
                    @error('form.sku')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <!-- supplier sku -->
                <div class="w-full">
                    <label for="supplierSku" class="block mb-2">Supplier SKU</label>
                    <input type="text"
                           name="supplierSku"
                           id="supplierSku"
                           wire:model="form.supplierSku"
                           class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="sku value used by supplier."
                    >
                    @error('form.supplierSku')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <!-- supplier -->
                <div>
                    <label for="supplier" class="block mb-2">Supplier</label>
                    <select name="supplier"
                            wire:model="form.supplierId"
                            id="supplier" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Select supplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{ $supplier->fullName}}</option>
                        @endforeach
                    </select>
                    @error('form.supplierId')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <!-- manufacturer -->
                <div>
                    <label for="manufacturer" class="block mb-2">Manufacturer</label>
                    <select name="manufacturer"
                            wire:model="form.manufacturerId"
                            id="manufacturer" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Select manufacturer</option>
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{$manufacturer->id}}">{{ $manufacturer->fullName}}</option>
                        @endforeach
                    </select>
                    @error('form.manufacturerId')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <!-- product stock quantity -->
                <div>
                    <label for="stock-quantity" class="block mb-2">
                        Stock Quantity
                    </label>
                    <input type="number"
                           name="stock-quantity"
                           id="stock-quantity"
                           wire:model="form.stockQuantity"
                           class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Products in stock e.g. 12, 10">
                    @error('form.stockQuantity')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <!-- product shipped from -->
                <div>
                    <label for="shipped-from" class="block mb-2">
                        Ships From - <span class="text-xs text-gray-600 italic">(Optional)</span>
                    </label>
                    <input type="text"
                           name="shipped-from"
                           id="shipped-from"
                           wire:model="form.shippedFrom"
                           class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Shipping location e.g. Nairobi, Abroad, China">
                    @error('form.shippedFrom')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <!-- Colors -->
                <div class="">
                    <label for="product-color" class="block mb-2">
                        Color
                    </label>
                    <select
                        id="product-color"
                        class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <option selected>Set Color</option>
                        <option value="black">black</option>
                        <option value="white">white</option>
                        <option value="red">red</option>
                        <option value="green">green</option>
                        <option value="blue">blue</option>
                        <option value="orange">orange</option>
                        <option value="yellow">yellow</option>
                        <option value="purple">purple</option>
                        <option value="pink">pink</option>
                        <option value="gray">gray</option>
                        <option value="brown">brown</option>
                        <option value="silver">silver</option>
                        <option value="pearl">pearl</option>
                        <option value="sky">sky</option>
                        <option value="metallic">metallic</option>
                        <option value="grey">grey</option>
                        <option value="other">other</option>
                    </select>
                </div>

                <!-- Sizes -->
                <div class="">
                    <label for="size" class="block font-medium mb-2">Size</label>
                    <input type="text" id="size"
                           class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                           placeholder="38, 40, Small, etc" aria-describedby="size-helper-text"
                    >
                    @error('form.size')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                    <p class="mt-2 text-xs text-slate-600 dark:text-slate-500" id="size-helper-text">Enter the size of the product.</p>
                </div>

                <!-- product gender -->
                <div>
                    <p class="mb-2 font-medium">Gender</p>
                    <div class="flex gap-x-6">

                        <div class="flex">
                            <input type="radio"
                                   name="gender"
                                   class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                   id="male">
                            <label for="male" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Male</label>
                        </div>

                        <div class="flex">
                            <input type="radio"
                                   name="gender"
                                   class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                   id="female">
                            <label for="female" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Female</label>
                        </div>

                        <div class="flex">
                            <input type="radio"
                                   name="gender"
                                   checked
                                   class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                   id="none">
                            <label for="none" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">None</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- pricing -->
            <div class="mt-2 lg:mt-5 mb-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 sm:gap-6">
                <div class="mb-2 sm:col-span-2 lg:col-span-3 xl:col-span-4">
                    <div class="py-3 border-b border-slate-200 dark:border-slate-900">
                        <h4 class="mb-1 font-medium">Pricing</h4>
                        <p class="mb-1 text-xs text-slate-500 dark:text-slate-600">Price, Shipping, etc.</p>
                    </div>
                </div>

                <!-- product price -->
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price <span class="text-xs text-red-500">*</span></label>
                    <input type="text"
                           name="price"
                           id="price"
                           wire:model="form.price"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="E.g. 10, 200, 122.50"
                           required>
                    @error('form.price')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <!-- product tax -->
                <div class="w-full">
                    <label for="tax" class="block mb-2">Tax percent <span class="text-xs">(%)</span></label>
                    <input type="number"
                           name="tax"
                           id="tax"
                           wire:model="form.tax"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="E.g. 10, 25"
                    >
                    @error('form.tax')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <!-- product shipping fee -->
                <div class="w-full">
                    <label for="shippingFee" class="block mb-2">Shipping Fee <span class="text-xs">(Ksh)</span></label>
                    <input type="text"
                           name="shippingFee"
                           id="shippingFee"
                           wire:model="form.shippingFee"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="E.g. 10, 25"
                    >
                    @error('form.shippingFee')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>
            </div>

            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white hover:text-slate-800 dark:text-slate-800 dark:hover:text-slate-200 bg-emerald-600 dark:bg-emerald-500 rounded-lg hover:bg-emerald-500 dark:hover:bg-emerald-600 transition-all ease-in-out duration-300">
                Add product
            </button>
        </form>
    </div>
</section>
