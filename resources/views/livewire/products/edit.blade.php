<div>
    <!-- Breadcrumb -->
    <nav class="justify-between px-4 py-3 text-gray-700 border border-gray-200 rounded-lg sm:flex sm:px-5 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
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
                        Product ID #{{ $product->reference}}{{ $product->sku ? ' . sku: '. $product->sku : '' }}
                    </span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold me-2 px-2 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 hidden lg:flex">
                        {{ $product->brand->name }}
                    </span>
                </div>
            </li>
        </ol>

        <x-dropdown align="left" width="max">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 text-xs font-normal text-center text-gray-600 bg-yellow-200 rounded-lg hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:text-gray-300 dark:focus:ring-gray-700">
                    <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm9-10v.4A3.6 3.6 0 0 1 8.4 9H6.61A3.6 3.6 0 0 0 3 12.605M14.458 3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                    </svg>Update product<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <div class="grid divide-y"
                @if($showProductEditForm)
                    <button wire:click="showProduct"
                            class="w-full px-4 py-2 text-sm text-start hover:bg-gray-100 dark:hover:bg-gray-600 hover:underline text-sky-500 dark:text-sky-600">
                        {{ __('View Details') }}
                    </button>
                @else
                    <button wire:click="showEditForm"
                            class="w-full px-4 py-2 text-sm text-start hover:bg-gray-100 dark:hover:bg-gray-600 hover:underline text-emerald-500 dark:text-emerald-600">
                        {{ __('Edit Product') }}
                    </button>
                @endif

                <button @click="$dispatch('open-modal', 'upload-product-images')"
                        class="w-full px-4 py-2 text-sm text-start hover:bg-gray-100 dark:hover:bg-gray-600 hover:underline text-slate-700 dark:text-slate-300">
                    {{ __('Upload Images') }}
                </button>

                <button @click="$dispatch('open-modal', 'product-feature')"
                        class="w-full px-4 py-2 text-sm text-start hover:bg-gray-100 dark:hover:bg-gray-600 hover:underline text-slate-700 dark:text-slate-300">
                    {{ __('Add Feature') }}
                </button>

                <!-- Authentication -->
                <button wire:click="productDelete({{$product->id}})"
                        wire:confirm="Do you want to delete this product (You cannot reverse this action)?"
                        class="w-full text-xs lg:text-base text-start">
                    <x-dropdown-link class="hover:underline text-red-500 dark:text-red-600">
                        {{ __('Delete') }}
                    </x-dropdown-link>
                </button>
            </x-slot>
        </x-dropdown>
    </nav>

    <div class="mt-6 md:mt-10 grid gap-y-4 text-slate-800 dark:text-slate-200">
        <div class="mt-3 flex gap-2 lg:gap-4 items-center overflow-x-auto">
            <img class="rounded-sm h-10 lg:h-16 w-10 lg:w-16 object-center object-cover" src="{{ asset($product->image) }}" alt="{{ $product->name }} Image">
            @forelse($product->productImages as $img)
                <div class="">
                    <img class="rounded-sm h-10 lg:h-16 w-10 lg:w-16 object-center object-cover" src="/{{ asset($img->image_location) }}" alt="{{ $product->name }} Image">
                </div>
            @empty
                <div>No Other Images</div>
            @endforelse
        </div>

        @if($showProductEditForm === false)
            <livewire:products.product-show :product="$product"/>
        @endif

        @if($showProductEditForm)
            <div class="mt-4 max-w-4xl mx-auto lg:mt-6 py-1 p-4 md:p-6 border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-xs text-slate-800 dark:text-slate-200 rounded md:rounded-lg shadow-sm">
                <form class="mt-3 mb-4" wire:submit="productUpdate" enctype="multipart/form-data">
                    @csrf
                    <!-- main details -->
                    <div class="mt-4 mb-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4 sm:gap-6">
                        <div class="sm:col-span-2 lg:col-span-4">
                            <div class="mb-4 w-full py-3 border-b border-slate-200 dark:border-slate-900">
                                <h4 class="mb-1 font-semibold text-lg">Editing Product Details</h4>
                                <p class="mb-1 text-xs text-slate-500 dark:text-slate-600">Name, Brand, Category, Subcategory, tags/labels, price, etc.</p>
                            </div>
                        </div>

                        <!-- product name -->
                        <div class="sm:col-span-2 lg:col-span-4">
                            <label for="name" class="block mb-2">Product Name <span class="text-xs text-red-600">*</span></label>
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
                            <label for="description" class="block mb-2">Description <span class="text-xs text-red-500">*</span> </label>
                            <textarea id="description"
                                      rows="8"
                                      wire:model="form.description"
                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                      placeholder="Your description here"></textarea>
                            @error('form.description')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                        </div>

                        <!-- product brand -->
                        <div class="w-full">
                            <div>
                                <label for="brand" class="block mb-2">Product brand</label>
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
                            <label for="category" class="block mb-2">Product Category</label>
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
                            <label for="sub-category" class="block mb-2">Product Sub-Category</label>
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
                    <div class="mt-5 lg:mt-16 mb-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 sm:gap-6">
                        <div class="mb-2 sm:col-span-2 lg:col-span-3 xl:col-span-4">
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
                            <label for="supplier" class="block mb-2">Product Supplier</label>
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
                            <label for="manufacturer" class="block mb-2">Product Manufacturer</label>
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
                        Update product
                    </button>
                </form>
            </div>
        @endif

        <x-modal name="product-feature">
            <div class="p-5 py-10">
                <p class="font-semibold">Add A Product Feature</p>

                <p class="py-1 text-sm">Product Name: <span class="text-slate-700 dark:text-slate-300 text-base">{{ $product->name }}</span> </p>


                <h4 class="py-1 font-semibold">
                    Current Features/Specifications
                </h4>

                <ul class="space-y-1 lg:space-y-4 text-xs lg:text-sm text-left text-gray-500 dark:text-gray-400">
                    @foreach($product->productFeatures as $ft)
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                            </svg>
                            <span>{{ $ft->title }}</span>
                        </li>
                    @endforeach
                </ul>

                <div class="max-w-sm mt-6 p-3 rounded-lg bg-slate-50 dark:bg-slate-950">
                    <div class="">
                        <div class="mb-5">
                            <label for="productFeatureTitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Feature Title/Name <span class="text-orange-400 dark:text-orange-600">(required)</span></label>
                            <input type="productFeatureTitle"
                                   id="productFeatureTitle"
                                   wire:model="productFeatureTitle"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="Feature title..." required />
                        </div>

                        <div class="mb-5">
                            <label for="productFeatureDescription" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Feature Description <span class="text-slate-400 dark:text-slate-600">(optional)</span> </label>

                            <textarea id="productFeatureDescription"
                                      rows="4"
                                      wire:model="productFeatureDescription"
                                      class="block mb-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                      placeholder="Describe the feature..."></textarea>
                        </div>

                        <div class="mt-6 flex justify-end gap-x-2">
                            <button x-on:click="$dispatch('close')" class="flex justify-between items-center p-1 md:px-2 hover:border rounded-md border-slate-200 dark:border-slate-800 text-xs">
                                {{ __('Cancel') }}
                            </button>

                            <x-primary-button wire:click="addProductFeature" class="text-xs">Add Feature</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </x-modal>

        <x-modal name="upload-product-images">
            <div class="p-4 py-10">
                <p class="font-semibold">Upload Additional Images for this Product</p>

                <p class="py-1 mt-2 text-sm">Product: <span class="text-orange-700 dark:text-orange-300">{{ $product->name }}</span> </p>

                <div class="lg:mt-2 flex-shrink-0">
                    <img class="w-20 md:w-44 h-auto rounded-xl" src="/storage/{{ $product->image }}" alt="{{ $product->name }} image">
                </div>

                <h4 class="mb-4 py-1 text-sm sm:text-lg font-semibold">
                    Current Images
                </h4>

                <ul class="flex flex-wrap gap-4 text-left text-gray-500 dark:text-gray-400">
                    @forelse($product->productImages as $img)
                        <div class="space-y-1">
                            <img class="w-8 md:w-20 h-8 md:h-20 rounded-sm" src="/storage/{{ $img->image_location }}" alt="{{ $img->title }} image">

                            <button wire:click="deleteProductImage({{$img->id}})"
                                    class="p-1 flex items-center gap-x-2 border border-red-200 dark:border-red-800 rounded-md text-xs text-red-500 dark:text-red-600"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                Delete
                            </button>
                        </div>
                    @empty
                        <li>No Other Images.</li>
                    @endforelse
                </ul>

                <div class="mt-6 p-3 rounded-md border border-slate-100 dark:border-slate-900">
                    <form class="" wire:submit="uploadProductImages" enctype="multipart/form-data">

                        <div class="flex items-center justify-center w-full mb-6">
                            <label for="productImages" class="hidden md:flex flex-col items-center justify-center w-full h-20 md:h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                @if($productImages)
                                    @foreach($productImages as $img)
                                    <div class="space-y-1">
                                        <img class="w-10 md:w-24 h-10 md:h-24 rounded-sm" src="{{ $img->temporaryUrl() }}" alt="image">

                                        <button wire:click="deleteUploadedImage($img->temporaryUrl())"
                                                class="p-1 flex items-center gap-x-2 border border-red-200 dark:border-red-800 rounded-md text-xs text-red-500 dark:text-red-600"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                            Delete
                                        </button>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF</p>
                                    </div>
                                @endif
                                <input id="productImages" wire:model="productImages" type="file" multiple class="hidden" />
                            </label>

                            <input id="productImages" wire:model="productImages" type="file" multiple class="block md:hidden p-1 text-xs bg-slate-100 dark:bg-slate-900 rounded" />
                        </div>

                        <div class="mt-6 flex justify-end gap-x-2">

                            <button x-on:click="$dispatch('close')" class="flex justify-between items-center p-1 md:px-2 hover:border rounded-md border-slate-200 dark:border-slate-800 text-xs">
                                {{ __('Cancel') }}
                            </button>

                            <x-primary-button>Upload</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </x-modal>

        @script
        <script>
            Livewire.on('product-updated', () => {
                Swal.fire({title: 'Success', text: 'Product Updated', icon: 'success'});
            });

            Livewire.on('feature-added', () => {
                Swal.fire({title: 'Success', text: 'Feature Added', icon: 'success'});
            });

            Livewire.on('image-deleted', () => {
                Swal.fire({icon: 'warning', title: 'Deleted!', text:'Image Deleted Permanently!'});
            });
        </script>
        @endscript
    </div>
</div>
