@php
$featuredProducts = App\Models\Product::with(['productFeatures', 'productRatings', 'productReviews'])
        ->whereHas('productReviews')
        ->active()
        ->latest()
        ->limit(6)
        ->get();
@endphp

<!-- Expo-Style Product Showcase -->
<section x-data="{
    currentSlide: 0,
    products: [
        @foreach($featuredProducts as $product)
        {
            id: {{ $product->id }},
            name: '{{ $product->name }}',
            price: {{ $product->price }},
            image: '{{ $product->image_url }}',
            features: [
                @foreach($product->productFeatures->take(3) as $feature)
                '{{ $feature->title }}',
                @endforeach
            ],
            rating: {{ $product->productRatings->avg('rating') ?? 4.5 }},
            reviews: {{ $product->productReviews->count() }},
            isNew: {{ $product->is_new ? 'true' : 'false' }}
        },
        @endforeach
    ],
    autoplay: true,
    direction: 'right',
    timer: null,
    init() {
        this.startAutoplay();
        // Init 3D tilt on cards
        document.querySelectorAll('.product-card').forEach(el => {
            this.tiltCard(el);
        });
    },
    startAutoplay() {
        this.timer = setInterval(() => {
            this.direction = 'right';
            this.next();
        }, 6000);
    },
    stopAutoplay() {
        clearInterval(this.timer);
    },
    next() {
        this.direction = 'right';
        this.currentSlide = (this.currentSlide + 1) % this.products.length;
    },
    prev() {
        this.direction = 'left';
        this.currentSlide = (this.currentSlide - 1 + this.products.length) % this.products.length;
    },
    goTo(index) {
        this.direction = index > this.currentSlide ? 'right' : 'left';
        this.currentSlide = index;
    },
    tiltCard(el) {
        el.addEventListener('mousemove', (e) => {
            const rect = el.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const angleX = (y - centerY) / 20;
            const angleY = (centerX - x) / 20;

            el.style.transform = `perspective(1000px) rotateX(${angleX}deg) rotateY(${angleY}deg) scale(1.05)`;
            el.querySelector('.product-spotlight').style.backgroundPosition = `${(x/rect.width)*100}% ${(y/rect.height)*100}%`;
        });

        el.addEventListener('mouseleave', () => {
            el.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
        });
    }
}"
class="relative py-20 overflow-hidden bg-primary-900">
    <!-- Stage Lighting Effects -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-primary-500 rounded-full mix-blend-overlay filter blur-[100px] opacity-10"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-accent-500 rounded-full mix-blend-overlay filter blur-[100px] opacity-10"></div>
        <div class="absolute top-1/2 left-1/2 w-[800px] h-[800px] bg-white rounded-full mix-blend-overlay filter blur-[150px] opacity-5 transform -translate-x-1/2 -translate-y-1/2"></div>
    </div>

    <!-- Grid Pattern Overlay -->
    <div class="absolute inset-0 opacity-5 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgdmlld0JveD0iMCAwIDYwIDYwIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIG9wYWNpdHk9Ii4xIj48cGF0aCBkPSJNMzYgMzRINnYtOGgzMHY4em0xNi0xNkg2di04aDQ2djh6TTYgNTBoNDZ2OEg2di04eiIvPjwvZz48L2c+PC9zdmc+')]"></div>

    <div class="container relative px-6 mx-auto">
        <!-- Section Header -->
        <div class="flex flex-col items-center mb-16 text-center">
            <span class="inline-block px-4 py-2 mb-4 text-sm font-bold tracking-widest text-accent-500 uppercase bg-black/20 rounded-full">
                Featured Products
            </span>
            <h2 class="text-4xl font-bold text-white sm:text-5xl md:text-6xl">
                Top Products <span class="text-accent-400">Everybody</span> is Shopping
            </h2>
            <p class="max-w-2xl mt-4 text-lg text-gray-300">
                Products that Kenyans trust and buy countrywide
            </p>
        </div>

        <!-- Product Stage -->
        <div class="relative h-[600px]">
            <!-- Background Platform -->
            <div class="absolute bottom-0 left-0 right-0 h-1/3 bg-gradient-to-t from-black/80 to-transparent">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCI+PHBhdGggZD0iTTAgMEgxMDBWMTAwSDBWMHoiIGZpbGw9Im5vbmUiLz48cGF0aCBkPSJNMjAgMjBINDBWNDBIMjBWMjB6TTYwIDIwSDgwVjQwSDYwVjIwek0yMCA2MEg0MFY4MEgyMFY2MHpNNjAgNjBIODBWODBINjBWNjB6IiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLW9wYWNpdHk9Ii4xIi8+PC9zdmc+')] opacity-20"></div>
            </div>

            <!-- Product Slides -->
            <template x-for="(product, index) in products" :key="index">
                <div x-show="currentSlide === index"
                        x-transition:enter="transition ease-out duration-1000"
                        x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-700"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-90"
                        class="absolute inset-0 flex items-center justify-center">
                    <!-- Product Card -->
                    <div class="product-card relative w-full max-w-4xl bg-black/30 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden shadow-2xl transition-all duration-500">
                        <!-- Product Spotlight Effect -->
                        <div class="product-spotlight absolute inset-0 bg-[radial-gradient(circle_at_center,_transparent_0%,_rgba(245,158,11,0.1)_70%)] pointer-events-none"></div>

                        <div class="grid md:grid-cols-2">
                            <!-- Product Image -->
                            <div class="relative h-[400px] md:h-[500px]">
                                <div class="absolute inset-0 flex items-center justify-center p-8">
                                    <div class="relative z-10 w-full h-full max-w-md">
                                        <img :src="product.image" :alt="product.name"
                                                class="absolute inset-0 object-contain w-full h-full transform transition-transform duration-700 hover:scale-110">
                                        <!-- Floating Reflection -->
                                        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white/10 to-transparent"></div>
                                    </div>
                                </div>
                                <!-- Decorative Elements -->
                                <div class="absolute top-8 left-8 w-16 h-16 bg-accent-500/20 rounded-full filter blur-xl"></div>
                                <div class="absolute bottom-8 right-8 w-24 h-24 bg-blue-500/20 rounded-full filter blur-xl"></div>
                            </div>

                            <!-- Product Info -->
                            <div class="flex flex-col justify-center p-8 text-white md:p-12">
                                <div class="mb-4">
                                    <span x-show="product.isNew" class="inline-block px-3 py-1 mb-3 text-xs font-bold tracking-widest text-white uppercase bg-accent-500 rounded-full">New Arrival</span>
                                    <h3 class="text-3xl font-bold sm:text-4xl" x-text="product.name"></h3>
                                    <div class="flex items-center mt-3">
                                        <div class="flex text-yellow-400">
                                            <template x-for="i in 5">
                                                <i :class="{'fas fa-star': i <= Math.round(product.rating), 'far fa-star': i > Math.round(product.rating)}"></i>
                                            </template>
                                        </div>
                                        <span class="ml-2 text-gray-300" x-text="`${product.reviews} reviews`"></span>
                                    </div>
                                </div>

                                <!-- Key Features -->
                                <ul class="my-6 space-y-3">
                                    <template x-for="feature in product.features">
                                        <li class="flex items-start">
                                            <i class="mt-1 mr-3 text-accent-400 fas fa-check-circle"></i>
                                            <span class="text-gray-200" x-text="feature"></span>
                                        </li>
                                    </template>
                                </ul>

                                <!-- Price & CTA -->
                                <div class="mt-auto">
                                    <div class="text-4xl font-bold text-accent-400" x-text="`Ksh ${product.price.toFixed(2)}`"></div>
                                    <button class="w-full px-8 py-4 mt-6 text-lg font-bold text-gray-900 transition-all duration-300 bg-accent-500 rounded-lg hover:bg-accent-600 hover:shadow-lg hover:shadow-accent-500/30">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Slider Controls -->
        <div class="flex items-center justify-center mt-12">
            <button @click="prev(); stopAutoplay(); autoplay = false;"
                    class="p-4 text-white transition-all duration-300 bg-black/30 rounded-full hover:bg-black/50 hover:scale-110">
                <i class="text-2xl fas fa-chevron-left"></i>
            </button>

            <!-- Navigation Dots -->
            <div class="flex mx-8">
                <template x-for="(_, index) in products" :key="index">
                    <button @click="goTo(index); stopAutoplay(); autoplay = false;"
                            class="w-3 h-3 mx-2 transition-all duration-300 rounded-full focus:outline-none"
                            :class="{
                                'w-6 bg-accent-500': currentSlide === index,
                                'bg-white/30 hover:bg-white/50': currentSlide !== index
                            }"
                            :aria-label="`Go to slide ${index + 1}`">
                    </button>
                </template>
            </div>

            <button @click="next(); stopAutoplay(); autoplay = false;"
                    class="p-4 text-white transition-all duration-300 bg-black/30 rounded-full hover:bg-black/50 hover:scale-110">
                <i class="text-2xl fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>
