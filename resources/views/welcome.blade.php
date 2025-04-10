<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM8U4j7z5l5e5e5e5e5e5e5e5e5e5e5e5e5e5" crossorigin="anonymous">
    <title>EBE - E-Commerce</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav x-data="{ isMobileMenuOpen: false }" class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/" class="flex-shrink-0">
                    <img class="h-8 w-auto" src="/logo.png" alt="EBE Logo">
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:space-x-8 flex-1 justify-center">
                    <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 transition-colors">Men</a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 transition-colors">Women</a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 transition-colors">Kid</a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 transition-colors">Accessories</a>
                    <a href="#"
                        class="text-red-600 hover:text-red-700 px-3 py-2 transition-colors font-semibold">Sale</a>
                </div>

                <!-- Right Icons -->
                <div class="flex items-center space-x-4">
                    <button class="p-2 text-gray-600 hover:text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    <button class="p-2 text-gray-600 hover:text-indigo-600 relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">0</span>
                    </button>

                    <button class="p-2 text-gray-600 hover:text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button @click="isMobileMenuOpen = !isMobileMenuOpen"
                        class="md:hidden p-2 text-gray-600 hover:text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden" x-show="isMobileMenuOpen" @click.away="isMobileMenuOpen = false">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100">Men</a>
                    <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100">Women</a>
                    <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100">Kid</a>
                    <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100">Accessories</a>
                    <a href="#" class="block px-3 py-2 text-red-600 hover:bg-gray-100">Sale</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div x-data="heroSlider()" class="relative overflow-hidden h-[70vh] min-h-[400px]">
        <div class="absolute inset-0 flex items-center justify-between z-10 px-4">
            <!-- Navigation Arrows -->
            <button @click="previous()" class="bg-white/30 hover:bg-white/50 rounded-full p-2 backdrop-blur-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button @click="next()" class="bg-white/30 hover:bg-white/50 rounded-full p-2 backdrop-blur-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Slides Container -->
        <div class="relative h-full transition-transform duration-300 ease-out"
            :style="`transform: translateX(-${activeIndex * 100}%)`">
            <!-- Slide 1 -->
            <div class="absolute w-full h-full flex items-center justify-center text-center">
                <div class="relative z-10 text-white px-4 max-w-2xl">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-md">New Season Arrivals</h1>
                    <p class="text-lg md:text-xl mb-8 drop-shadow-md">Discover our curated collection for modern
                        lifestyles</p>
                    <button
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-full text-lg transition-colors">
                        Shop Now
                    </button>
                </div>
                <img src="/slide1.jpg" alt="Slide 1" class="absolute inset-0 w-full h-full object-cover">
            </div>

            <!-- Slide 2 -->
            <div class="absolute w-full h-full left-full flex items-center justify-center text-center">
                <div class="relative z-10 text-white px-4 max-w-2xl">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-md">Summer Sale</h1>
                    <p class="text-lg md:text-xl mb-8 drop-shadow-md">Up to 50% off selected items</p>
                    <button
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-full text-lg transition-colors">
                        Explore Offers
                    </button>
                </div>
                <img src="/slide2.jpg" alt="Slide 2" class="absolute inset-0 w-full h-full object-cover">
            </div>
        </div>

        <!-- Dots Navigation -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
            <template x-for="(_, index) in slides" :key="index">
                <button @click="goToSlide(index)" class="w-3 h-3 rounded-full transition-colors"
                    :class="activeIndex === index ? 'bg-white' : 'bg-white/50 hover:bg-white/70'"></button>
            </template>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
        Alpine.data('heroSlider', () => ({
            activeIndex: 0,
            slides: 2, // Update with actual number of slides
            interval: null,
            
            init() {
                this.startAutoPlay();
            },
            
            next() {
                this.activeIndex = (this.activeIndex + 1) % this.slides;
            },
            
            previous() {
                this.activeIndex = (this.activeIndex - 1 + this.slides) % this.slides;
            },
            
            goToSlide(index) {
                this.activeIndex = index;
            },
            
            startAutoPlay() {
                this.interval = setInterval(() => {
                    this.next();
                }, 5000);
            },
            
            stopAutoPlay() {
                clearInterval(this.interval);
            }
        }));
    });
    </script>
</body>

</html>