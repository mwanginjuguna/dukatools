<!-- Dukatools Hero Slider -->
<section x-data="{
    currentSlide: 0,
    slides: [
        {
            title: 'Business Directory',
            subtitle: 'Get Discovered',
            description: 'List your business in Kenya\'s most comprehensive business directory. Connect with customers and grow your visibility.',
            bgImage: 'https://www.urtrips.com/wp-content/uploads/2022/04/Westfield-Mall-Sydney-4.jpg',
            icon: 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
            ctaText: 'List Your Business for Free',
            accentColor: 'emerald'
        },
        {
            title: 'Sales Management',
            subtitle: 'Track & Grow',
            description: 'Powerful dashboard to track sales, manage inventory, and monitor performance in real-time.',
            bgImage: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1920',
            icon: 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
            ctaText: 'Start Managing Sales Now',
            accentColor: 'blue'
        },
        {
            title: 'Point of Sale',
            subtitle: 'Modern POS System',
            description: 'Process sales quickly and efficiently. Accept payments and manage transactions seamlessly.',
            bgImage: 'https://venture-lab.org/wp-content/uploads/2019/12/Best-POS-point-of-sale-software.png',
            icon: 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z',
            ctaText: 'Try POS System for Free',
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

            <!-- Background Image -->
            <div class="absolute inset-0">
                <img :src="slide.bgImage"
                     :alt="slide.title"
                     class="absolute inset-0 w-full h-full object-cover">
            </div>

            <!-- Content Container -->
            <div class="relative container mx-auto px-4 h-full flex items-center">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <!-- Text Content -->
                    <div class="relative bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm p-8 rounded-lg shadow-xl">
                        <span class="inline-block px-4 py-2 mb-4 text-sm font-bold tracking-widest uppercase rounded-full"
                              :class="{
                                'bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400': slide.accentColor === 'emerald',
                                'bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400': slide.accentColor === 'blue',
                                'bg-amber-100 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400': slide.accentColor === 'amber'
                              }"
                              x-text="slide.subtitle"></span>

                        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4" x-text="slide.title"></h2>

                        <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-8" x-text="slide.description"></p>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <a :href="slide.accentColor === 'emerald' ? '{{ route('businesses.create') }}' : '{{ route('register') }}'"
                               class="px-8 py-4 text-lg font-medium text-white transition-all duration-300 rounded-lg hover:shadow-lg"
                               :class="{
                                    'bg-emerald-500 hover:bg-emerald-600 hover:shadow-emerald-500/30': slide.accentColor === 'emerald',
                                    'bg-blue-500 hover:bg-blue-600 hover:shadow-blue-500/30': slide.accentColor === 'blue',
                                    'bg-amber-500 hover:bg-amber-600 hover:shadow-amber-500/30': slide.accentColor === 'amber'
                               }"
                               x-text="slide.ctaText"></a>

                            <a :href="slide.accentColor === 'emerald' ? '{{ route('businesses.index') }}' : '{{ route('contact-me') }}'"
                               class="px-8 py-4 text-lg font-medium transition-all duration-300 rounded-lg border-2 hover:shadow-lg"
                               :class="{
                                    'border-emerald-500 text-emerald-600 hover:bg-emerald-50 dark:text-emerald-400 dark:hover:bg-emerald-900/30': slide.accentColor === 'emerald',
                                    'border-blue-500 text-blue-600 hover:bg-blue-50 dark:text-blue-400 dark:hover:bg-blue-900/30': slide.accentColor === 'blue',
                                    'border-amber-500 text-amber-600 hover:bg-amber-50 dark:text-amber-400 dark:hover:bg-amber-900/30': slide.accentColor === 'amber'
                               }"
                               x-text="slide.accentColor === 'emerald' ? 'Browse Directory' : 'Contact Us'">
                            </a>
                        </div>
                    </div>

                    <!-- Feature Icon -->
                    <div class="relative hidden md:block">
                        <div class="relative z-10 p-8">
                            <div class="relative w-64 h-64 mx-auto">
                                <!-- Icon Background -->
                                <div class="absolute inset-0 rounded-full mix-blend-multiply filter blur-xl opacity-70"
                                     :class="{
                                        'bg-emerald-300': slide.accentColor === 'emerald',
                                        'bg-blue-300': slide.accentColor === 'blue',
                                        'bg-amber-300': slide.accentColor === 'amber'
                                     }"></div>

                                <!-- Icon Container -->
                                <div class="relative flex items-center justify-center w-full h-full rounded-full bg-white/90 dark:bg-gray-800/90 shadow-2xl">
                                    <svg class="w-32 h-32"
                                         :class="{
                                            'text-emerald-500': slide.accentColor === 'emerald',
                                            'text-blue-500': slide.accentColor === 'blue',
                                            'text-amber-500': slide.accentColor === 'amber'
                                         }"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.5"
                                              :d="slide.icon"/>
                                    </svg>
                                </div>
                            </div>
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
                        class="p-3 text-gray-600 dark:text-gray-300 transition-all duration-300 bg-slate-100/10 dark:bg-slate-800/10 rounded-full hover:bg-white dark:hover:bg-gray-800 hover:shadow-lg">
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
                        class="p-3 text-gray-600 dark:text-gray-300 transition-all duration-300 bg-slate-200/30 dark:bg-slate-800/30 rounded-full hover:bg-white dark:hover:bg-gray-800 hover:shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
