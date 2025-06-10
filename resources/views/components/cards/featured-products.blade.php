<!-- Featured Products Slider -->
@php
$featuredProducts = App\Models\Product::with(['productFeatures', 'productRatings', 'productReviews'])
        ->whereHas('productReviews')
        ->active()
        ->latest()
        ->limit(6)
        ->get();
@endphp
<section class="py-16 bg-gray-50">
    <div x-data="{
            currentIndex: 0,
            products: [
                @foreach($featuredProducts as $product)
                {
                    id: {{ $product->id }},
                    name: '{{ $product->name }}',
                    price: {{ $product->price }},
                    image: '{{ $product->image_url }}',
                    rating: {{ $product->productRatings->avg('rating') ?? 4.5 }},
                    reviewCount: {{ $product->productReviews->count() }},
                    isNew: {{ $product->is_new ? 'true' : 'false' }},
                    onOffer: {{ $product->on_offer ? 'true' : 'false' }},
                    features: [
                        @foreach($product->productFeatures->take(2) as $feature)
                        '{{ $feature->title }}',
                        @endforeach
                    ]
                },
                @endforeach
            ],
            next() {
                this.currentIndex = (this.currentIndex + 1) % this.products.length;
            },
            previous() {
                this.currentIndex = (this.currentIndex - 1 + this.products.length) % this.products.length;
            },
            get visibleProducts() {
                const start = this.currentIndex;
                const end = (start + 3) % this.products.length;

                if (start < end) {
                    return this.products.slice(start, end);
                } else {
                    return [...this.products.slice(start), ...this.products.slice(0, end)];
                }
            }
        }" class="container px-6 mx-auto">
        <div class="md:flex md:justify-between border-t-4 p-4 py-6 rounded-lg border-primary-300">
            <div class="">
                <span class="inline-block px-4 py-2 mb-2 text-sm font-bold tracking-widest text-accent-600 uppercase bg-primary/20 rounded-full">
                    Hot Deals
                </span>
                <h2 class="text-2xl font-medium lg:text-4xl xl:text-5xl">
                    These are <span class="text-accent-500">On Offer Today</span>
                </h2>
                <p class="max-w-2xl mt-2 text-lg text-secondary-600">
                    Hot offers available for a limited time.
                </p>
            </div>

            <div class="flex gap-2 h-fit">
                <button @click="previous()" class="p-3 text-gray-700 transition-all duration-300 bg-white border border-gray-200 rounded-full hover:bg-gray-100 hover:shadow-sm">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button @click="next()" class="p-3 text-gray-700 transition-all duration-300 bg-white border border-gray-200 rounded-full hover:bg-gray-100 hover:shadow-sm">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="relative py-4 border-t">
            <!-- Slider Track -->
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <template x-for="(product, index) in visibleProducts" :key="product.id">
                    <div x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="overflow-hidden transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-lg hover:-translate-y-2">
                        <!-- Product Image -->
                        <div class="relative h-64 overflow-hidden">
                            <img :src="product.image" :alt="product.name" class="object-cover w-full h-full">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

                            <!-- Badges -->
                            <div class="absolute top-4 left-4 flex gap-2">
                                <span x-show="product.isNew" class="px-3 py-1 text-xs font-bold text-white bg-blue-500 rounded-full">NEW</span>
                                <span x-show="product.onOffer" class="px-3 py-1 text-xs font-bold text-white bg-red-500 rounded-full">SALE</span>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="p-6">
                            <h3 class="mb-2 text-xl font-bold text-gray-900" x-text="product.name"></h3>

                            <!-- Rating -->
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400">
                                    <template x-for="i in 5">
                                        <i :class="{'fas fa-star': i <= Math.round(product.rating), 'far fa-star': i > Math.round(product.rating)}"></i>
                                    </template>
                                </div>
                                <span class="ml-2 text-sm text-gray-600" x-text="`${product.reviewCount} reviews`"></span>
                            </div>

                            <!-- Features -->
                            <ul class="mb-4 space-y-1 text-sm text-gray-600">
                                <template x-for="feature in product.features">
                                    <li class="flex items-center">
                                        <i class="mr-2 text-green-500 fas fa-check-circle"></i>
                                        <span x-text="feature"></span>
                                    </li>
                                </template>
                            </ul>

                            <!-- Price & CTA -->
                            <div class="flex items-center justify-between mt-6">
                                <span class="text-2xl font-bold text-gray-900" x-text="`$${product.price.toFixed(2)}`"></span>
                                <button class="px-4 py-2 text-sm font-bold text-white transition-all duration-300 bg-accent-500 rounded-lg hover:bg-accent-600">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Mobile Dots -->
            <div class="flex justify-center gap-2 mt-8 sm:hidden">
                <template x-for="(_, index) in products" :key="index">
                    <button @click="currentIndex = index"
                            class="w-3 h-3 transition-all duration-300 rounded-full"
                            :class="{'bg-accent-500 w-6': currentIndex === index, 'bg-gray-300': currentIndex !== index}">
                    </button>
                </template>
            </div>
        </div>
    </div>
</section>
