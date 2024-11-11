<div class="relative">
    <!-- Grid -->
    <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32 text-slate-900 dark:text-slate-100">

        <div class="mt-5 sm:mt-10 lg:mt-0 md:col-span-1 p-2">
            <div class="mb-10 lg:mb-0">
                <h2 class="py-2 text-xl text-gray-800 font-medium lg:text-3xl dark:text-neutral-200">
                    {{ $product->name }}
                </h2>

                <!--price-->
                <div class="my-3">
                    <p class="hidden py-2">
                        <span class="line-through text-sm text-slate-600 dark:text-slate-400"> {{ config('app.currency_symbol') }} {{ number_format(($product->price * 1.29), 2)  }} </span>
                    </p>
                    <p class="lg:text-xl font-medium leading-tight">{{ config('app.currency_symbol') .' '. number_format($product->price, 2) }} </p>
                </div>

                <div class="mt-4 py-3 sm:items-center md:gap-4 md:flex">

                    <div class="flex items-center gap-2 mt-2 sm:mt-0">
                        <div class="flex items-center gap-1">
                            @for($rt =1; $rt <= $product->productRatings()->average('rating') + 0.5; $rt++)
                                <svg
                                    class="w-4 h-4 text-yellow-300"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                                    />
                                </svg>
                            @endfor
                        </div>

                        <p
                            class="text-sm font-medium leading-none text-gray-500 dark:text-gray-400"
                        >
                            ({{ number_format($product->productRatings()->average('rating'), 1) }})
                        </p>

                        <a
                            href="#reviews"
                            class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline dark:text-white"
                        >
                            {{ $product->productReviews()->count() }} Reviews
                        </a>
                    </div>
                </div>

                <!-- details -->
                <div class="py-2 space-y-2 text-slate-600 dark:text-slate-400 text-sm">
                    <div class="py-2">
                        <p class="py-1">
                            Category: <span class="text-emerald-500 dark:text-emerald-500">
                                {{ $product->category->name }}
                            </span>
                        </p>
                        <p class="py-1">
                            Subcategory: <span class="text-emerald-500 dark:text-emerald-500">
                                {{ $product->subCategory->name }}
                            </span>
                        </p>
                        <p class="py-1">
                            Brand: <span class="text-emerald-500 dark:text-emerald-500">
                                {{ $product->brand->name }}
                            </span>
                        </p>
                        <p class="py-1">
                            Shipped from: <span class="text-emerald-500 dark:text-emerald-500">
                                {{ $product->shipped_from }}
                            </span>
                        </p>
                        <p class="py-1">
                            Return Policy: <span class="text-emerald-500 dark:text-emerald-500">
                                {{ $product->returnPolicy->name }}
                            </span>
                        </p>
                        <p class="py-1">
                            Items in Stock: <span class="text-emerald-500 dark:text-emerald-500">
                                {{ $product->stock_quantity }}
                            </span>
                        </p>
                        <p class="py-1 font-medium">
                            Total Sales: <span class="text-teal-400 dark:text-teal-600">
                                {{ config('app.currency_symbol') .' '. number_format($product->price, 2) }}
                            </span>
                        </p>
                    </div>
                </div>

                <!-- buttons -->
                <div class="hidden mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                    <a
                        class="hidden flex items-center justify-center py-2.5 px-5 text-sm font-medium text-emerald-800 focus:outline-none bg-white rounded-lg border border-emerald-200 hover:bg-slate-200 hover:text-emerald-700 focus:z-10 dark:bg-slate-800 dark:text-emerald-400 dark:border-emerald-600 dark:hover:text-emerald-200 dark:hover:bg-slate-700"
                        href="{{ route('admin.products.edit', $product->slug) }}"
                    >
                        <svg class="w-5 h-5 -ms-2 me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                        Edit
                    </a>

                    <button
                        class="hidden text-white mt-4 sm:mt-0 bg-orange-500 hover:bg-orange-600 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center"
                        role="button"
                        wire:click="addToCart"
                    >
                        <svg
                            class="w-5 h-5 -ms-2 me-2"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"
                            />
                        </svg>

                        Add to cart
                    </button>
                </div>

                <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />
            </div>
        </div>

        <!-- description -->
        <div class="col-span-1 p-2">
            <h4 class="py-1 text-sm font-semibold">
                Product Description
            </h4>
            <p class="mb-6 whitespace-pre-wrap text-sm">
                {{ $product->description }}
            </p>
        </div>

        <!-- benefits/features -->
        <div class="mt-10">
            <h4 class="py-1 text-sm font-semibold">
                Product Benefits/Features
            </h4>

            <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400">
                @forelse($product->productFeatures as $ft)
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                        </svg>
                        <span>{{ $ft->title }}</span>
                    </li>
                @empty
                    <div class="min-h-32 flex flex-col border shadow-sm rounded-xl border-slate-200 dark:border-slate-700 dark:shadow-slate-700/70">
                        <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-10"><path d="M15.536 11.293a1 1 0 0 0 0 1.414l2.376 2.377a1 1 0 0 0 1.414 0l2.377-2.377a1 1 0 0 0 0-1.414l-2.377-2.377a1 1 0 0 0-1.414 0z"/><path d="M2.297 11.293a1 1 0 0 0 0 1.414l2.377 2.377a1 1 0 0 0 1.414 0l2.377-2.377a1 1 0 0 0 0-1.414L6.088 8.916a1 1 0 0 0-1.414 0z"/><path d="M8.916 17.912a1 1 0 0 0 0 1.415l2.377 2.376a1 1 0 0 0 1.414 0l2.377-2.376a1 1 0 0 0 0-1.415l-2.377-2.376a1 1 0 0 0-1.414 0z"/><path d="M8.916 4.674a1 1 0 0 0 0 1.414l2.377 2.376a1 1 0 0 0 1.414 0l2.377-2.376a1 1 0 0 0 0-1.414l-2.377-2.377a1 1 0 0 0-1.414 0z"/></svg>
                            <p class="mt-2 py-3 md:py-6 text-sm text-slate-800 dark:text-slate-300">
                                You have not added any benefits/features for this product.
                            </p>

                            <button
                                class="mt-4 sm:mt-0 px-5 py-2.5 flex items-center justify-center hover:text-emerald-500 dark:hover:text-emerald-400 border border-emerald-200 dark:border-emerald-800 font-medium rounded-lg text-sm"
                                @click="$dispatch('open-modal', 'product-feature')"
                            >
                                <svg class="flex-shrink-0 w-3.5 h-3.5 me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg> Add New Feature
                            </button>
                        </div>
                    </div>
                @endforelse
            </ul>
        </div>

        <!-- main image -->
        <div class="col-span-1 p-2">
            <img class="rounded-xl w-full" src="{{ asset($product->image) }}" alt="{{ $product->name }} Image">
        </div>

        <!-- more images -->
        <div class="md:col-span-2 p-2 text-slate-600 dark:text-slate-300">
            <p class="mt-4 py-1 font-medium">More Product Images...</p>

            <div class="grid grid-cols-3">
                @forelse($product->productImages as $img)
                    <div class="col-span-1 p-2">
                        <img class="rounded-xl w-full" src="{{ asset($img->image_location) }}" alt="{{ $product->name }} Image">
                    </div>
                @empty
                    <div class="italic">Ooops!! We found nothing.</div>
                @endforelse
            </div>
        </div>

        <!-- reviews -->
        <div id="reviews" class="max-w-lg py-4 mt-6 text-slate-600 dark:text-slate-400 text-xs lg:text-sm">
            <h4 class="py-2 font-semibold text-lg">Product Reviews</h4>

            <div class="py-2">
                @forelse($product->productReviews as $rv)
                    <p class="mt-2 p-2 bg-slate-50 dark:bg-slate-900 border border-slate-300 dark:broder-slate-700 italic rounded-lg">
                        <span class="font-semibold text-orange-500 dark:text-orange-600">{{ $rv->user->name }} ~ </span>
                        <span class="font-medium text-lg lg:text-2xl">"</span>{{ $rv->review }}"
                    </p>
                @empty
                    <p>No reviews.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
