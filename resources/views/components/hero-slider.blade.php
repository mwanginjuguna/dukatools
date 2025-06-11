<!-- Hero Slider -->
<section x-data="{
    currentSlide: 0,
    slides: [
        {
            title: 'Transform Your Space',
            subtitle: 'Premium Building Materials',
            description: 'Discover our extensive collection of high-quality building materials for your next project.',
            bgImage: 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1920',
            productImage: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=800',
            ctaText: 'Shop Now',
            accentColor: 'emerald'
        },
        {
            title: 'Professional Tools',
            subtitle: 'For Every Project',
            description: 'Equip yourself with the finest tools from leading brands for unmatched performance.',
            bgImage: 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=1920',
            productImage: 'https://images.unsplash.com/photo-1581147036320-84d4e6694b3d?q=80&w=800',
            ctaText: 'Explore Tools',
            accentColor: 'blue'
        },
        {
            title: 'Quality Paint',
            subtitle: 'Perfect Finishes',
            description: 'Premium paints and finishes to bring your vision to life with lasting beauty.',
            bgImage: 'https://images.unsplash.com/photo-1565538810643-b5bdb714032a?q=80&w=1920',
            productImage: 'https://images.unsplash.com/photo-1589939705384-5185137a7f0f?q=80&w=800',
            ctaText: 'View Colors',
            accentColor: 'amber'
        }
    ],
    autoplay: true,
    timer: null,
    init() {
        this.startAutoplay();
    },
    startAutoplay() {
        this.timer = setInterval(() => {
            this.next();
        }, 6000);
    },
    stopAutoplay() {
        clearInterval(this.timer);
    },
    next() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    },
    prev() {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
    },
    goTo(index) {
        this.currentSlide = index;
    }
}"
class="relative min-h-[600px] md:min-h-[800px] overflow-hidden bg-gray-50 dark:bg-gray-900">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5 dark:opacity-10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgdmlld0JveD0iMCAwIDYwIDYwIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiMwMDAiIGZpbGwtb3BhY2l0eT0iLjEiPjxwYXRoIGQ9Ik0zNiAzNEg2di04aDMwdjh6bTE2LTE2SDZ2LThoNDZ2OHpNNiA1MGg0NnY4SDZ2LTh6Ii8+PC9nPjwvZz48L3N2Zz4=')]"></div>
    </div>

    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="currentSlide === index"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 transform translate-x-full"
             x-transition:enter-end="opacity-100 transform translate-x-0"
             x-transition:leave="transition ease-in duration-700"
             x-transition:leave-start="opacity-100 transform translate-x-0"
             x-transition:leave-end="opacity-0 transform -translate-x-full"
             class="absolute inset-0">

            <!-- Background Image with Overlay -->
            <div class="absolute inset-0">
                <img :src="slide.bgImage"
                     :alt="slide.title"
                     class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-white/90 to-white/50 dark:from-gray-900/90 dark:to-gray-900/50"></div>
            </div>

            <!-- Content Container -->
            <div class="relative container mx-auto px-4 h-full flex items-center">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <!-- Text Content -->
                    <div class="text-gray-900 dark:text-white">
                        <span class="inline-block px-4 py-2 mb-4 text-sm font-bold tracking-widest uppercase rounded-full"
                              :class="{
                                'bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400': slide.accentColor === 'emerald',
                                'bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400': slide.accentColor === 'blue',
                                'bg-amber-100 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400': slide.accentColor === 'amber'
                              }"
                              x-text="slide.subtitle"></span>

                        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4" x-text="slide.title"></h2>

                        <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-8" x-text="slide.description"></p>

                        <button class="px-8 py-4 text-lg font-bold text-white transition-all duration-300 rounded-lg hover:shadow-lg"
                                :class="{
                                    'bg-emerald-500 hover:bg-emerald-600 hover:shadow-emerald-500/30': slide.accentColor === 'emerald',
                                    'bg-blue-500 hover:bg-blue-600 hover:shadow-blue-500/30': slide.accentColor === 'blue',
                                    'bg-amber-500 hover:bg-amber-600 hover:shadow-amber-500/30': slide.accentColor === 'amber'
                                }"
                                x-text="slide.ctaText"></button>
                    </div>

                    <!-- Product Image -->
                    <div class="relative hidden md:block">
                        <div class="relative z-10">
                            <img :src="slide.productImage"
                                 :alt="slide.title"
                                 class="w-full h-[500px] object-cover rounded-2xl shadow-2xl transform transition-transform duration-700 hover:scale-105">

                            <!-- Decorative Elements -->
                            <div class="absolute -top-4 -right-4 w-32 h-32 rounded-full mix-blend-multiply filter blur-xl opacity-70"
                                 :class="{
                                    'bg-emerald-300': slide.accentColor === 'emerald',
                                    'bg-blue-300': slide.accentColor === 'blue',
                                    'bg-amber-300': slide.accentColor === 'amber'
                                 }"></div>
                            <div class="absolute -bottom-4 -left-4 w-32 h-32 rounded-full mix-blend-multiply filter blur-xl opacity-70"
                                 :class="{
                                    'bg-emerald-300': slide.accentColor === 'emerald',
                                    'bg-blue-300': slide.accentColor === 'blue',
                                    'bg-amber-300': slide.accentColor === 'amber'
                                 }"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <!-- Navigation Controls -->
    <div class="absolute bottom-8 left-0 right-0">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-center space-x-4">
                <button @click="prev(); stopAutoplay(); autoplay = false;"
                        class="p-3 text-gray-600 dark:text-gray-300 transition-all duration-300 bg-white/80 dark:bg-gray-800/80 rounded-full hover:bg-white dark:hover:bg-gray-800 hover:shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <!-- Slide Indicators -->
                <div class="flex space-x-2">
                    <template x-for="(_, index) in slides" :key="index">
                        <button @click="goTo(index); stopAutoplay(); autoplay = false;"
                                class="w-3 h-3 rounded-full transition-all duration-300 focus:outline-none"
                                :class="{
                                    'w-6 bg-emerald-500 dark:bg-emerald-400': currentSlide === index && slides[index].accentColor === 'emerald',
                                    'w-6 bg-blue-500 dark:bg-blue-400': currentSlide === index && slides[index].accentColor === 'blue',
                                    'w-6 bg-amber-500 dark:bg-amber-400': currentSlide === index && slides[index].accentColor === 'amber',
                                    'bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500': currentSlide !== index
                                }"
                                :aria-label="`Go to slide ${index + 1}`">
                        </button>
                    </template>
                </div>

                <button @click="next(); stopAutoplay(); autoplay = false;"
                        class="p-3 text-gray-600 dark:text-gray-300 transition-all duration-300 bg-white/80 dark:bg-gray-800/80 rounded-full hover:bg-white dark:hover:bg-gray-800 hover:shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
