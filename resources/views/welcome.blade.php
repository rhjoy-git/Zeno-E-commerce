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
    <nav x-data="{ isMobileMenuOpen: false, searchOpen: false }" class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search Bar Overlay -->
            <div x-show="searchOpen" x-cloak class="absolute inset-0 bg-white z-50" @click.away="searchOpen = false">
                <div class="container mx-auto h-16 flex items-center justify-between px-4">
                    <form class="flex-1 flex max-w-3xl mx-auto" action="/search">
                        <input type="text" placeholder="Search products..."
                            class="w-full px-4 py-2 text-lg border-b-2 border-gray-300 focus:border-indigo-600 outline-none"
                            autofocus>
                        <button type="button" @click="searchOpen = false"
                            class="ml-4 text-gray-600 hover:text-indigo-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/" class="flex-shrink-0">
                    <img class="h-8 w-auto" src="{{asset('images/Zeno.png')}}" alt="Zeno Logo">
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:space-x-8 flex-1 justify-center">
                    <a href="#"
                        class="text-gray-700 hover:text-indigo-600 px-3 py-2 transition-colors uppercase">Men</a>
                    <a href="#"
                        class="text-gray-700 hover:text-indigo-600 px-3 py-2 transition-colors uppercase">Women</a>
                    <a href="#"
                        class="text-gray-700 hover:text-indigo-600 px-3 py-2 transition-colors uppercase">Kid</a>
                    <a href="#"
                        class="text-gray-700 hover:text-indigo-600 px-3 py-2 transition-colors uppercase">Accessories</a>
                    <a href="#"
                        class="text-red-600 hover:text-red-700 px-3 py-2 transition-colors font-semibold uppercase">Sale</a>
                </div>

                <!-- Right Icons -->
                <div class="flex items-center space-x-4">
                    <!-- Search Icon -->
                    <button @click="searchOpen = true" class="p-2 text-gray-600 hover:text-indigo-600 md:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    <div class="hidden md:flex items-center space-x-4">
                        <button @click="searchOpen = true" class="p-2 text-gray-600 hover:text-indigo-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>

                        <button class="p-2 text-gray-600 hover:text-indigo-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </button>

                        <button class="p-2 text-gray-600 hover:text-indigo-600 relative">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.25 1H2.636C3.146 1 3.591 1.343 3.723 1.835L4.106 3.272M4.106 3.272C9.67664 3.11589 15.2419 3.73515 20.642 5.112C19.818 7.566 18.839 9.95 17.718 12.25H6.5M4.106 3.272L6.5 12.25M6.5 12.25C5.70435 12.25 4.94129 12.5661 4.37868 13.1287C3.81607 13.6913 3.5 14.4544 3.5 15.25H19.25M5 18.25C5 18.4489 4.92098 18.6397 4.78033 18.7803C4.63968 18.921 4.44891 19 4.25 19C4.05109 19 3.86032 18.921 3.71967 18.7803C3.57902 18.6397 3.5 18.4489 3.5 18.25C3.5 18.0511 3.57902 17.8603 3.71967 17.7197C3.86032 17.579 4.05109 17.5 4.25 17.5C4.44891 17.5 4.63968 17.579 4.78033 17.7197C4.92098 17.8603 5 18.0511 5 18.25ZM17.75 18.25C17.75 18.4489 17.671 18.6397 17.5303 18.7803C17.3897 18.921 17.1989 19 17 19C16.8011 19 16.6103 18.921 16.4697 18.7803C16.329 18.6397 16.25 18.4489 16.25 18.25C16.25 18.0511 16.329 17.8603 16.4697 17.7197C16.6103 17.579 16.8011 17.5 17 17.5C17.1989 17.5 17.3897 17.579 17.5303 17.7197C17.671 17.8603 17.75 18.0511 17.75 18.25Z"
                                    stroke="#071630" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                            <span
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">0</span>
                        </button>

                        <button class="p-2 text-gray-600 hover:text-indigo-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div>

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
                    <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 uppercase">Men</a>
                    <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 uppercase">Women</a>
                    <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 uppercase">Kid</a>
                    <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 uppercase">Accessories</a>
                    <a href="#" class="block px-3 py-2 text-red-600 hover:bg-gray-100 uppercase">Sale</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div x-data="heroSlider()" class="relative overflow-hidden h-[90vh] min-h-[400px]">
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
                <img src="{{ asset('images/slider1.jpg')}}" alt="Slide 1"
                    class="absolute inset-0 w-full h-full object-cover">
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
                <img src="{{ asset('images/slider2.jpg')}}" alt="Slide 2"
                    class="absolute inset-0 w-full h-full object-cover">
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

    <!-- New Arrivals Section -->
    <section class="py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="text-left mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">New Arrivals You Can’t Miss</h2>
            <p class="text-gray-600">Fresh drops, bold designs, and iconic fits—get them before they’re gone!</p>
        </div>

        <!-- Category Filters -->
        <div class="flex flex-wrap justify-start gap-2 mb-8">
            <button class="px-4 py-2 rounded bg-indigo-600 text-white text-sm font-medium">
                All
            </button>
            <button class="px-4 py-2 rounded bg-gray-100 text-gray-700 hover:bg-gray-200 text-sm font-medium">
                Men
            </button>
            <button class="px-4 py-2 rounded bg-gray-100 text-gray-700 hover:bg-gray-200 text-sm font-medium">
                Women
            </button>
            <button class="px-4 py-2 rounded bg-gray-100 text-gray-700 hover:bg-gray-200 text-sm font-medium">
                Kids
            </button>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Product Card 1 -->
            <div class="group relative bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                <div class="aspect-square bg-gray-100 rounded-t-lg relative overflow-hidden">
                    <span
                        class="absolute top-2 left-2 bg-green-600 text-white px-2 py-1 text-xs font-medium rounded z-10">
                        New
                    </span>
                    <button
                        class="absolute top-2 right-2 p-2 text-gray-600 hover:text-red-500 bg-white/80 rounded-full z-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                    <img src="{{asset('images/pro1.jpg')}}" alt="Product"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-medium text-gray-900">Men's Casual Shirt</h3>
                    <div class="mt-2 flex items-center gap-2">
                        <span class="text-lg font-bold text-indigo-600">$49.99</span>
                        <span class="text-sm text-gray-500 line-through">$69.99</span>
                        <span class="text-sm text-green-600">Save 29%</span>
                    </div>
                </div>
                <div
                    class="absolute inset-x-0 bottom-0 p-4 bg-white/90 backdrop-blur opacity-0 group-hover:opacity-100 transition-opacity duration-300 h-1/5">
                    <div class="flex items-end gap-2">
                        <button
                            class="flex-1 bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition-colors text-sm font-medium">
                            Add to Cart
                        </button>
                        <button
                            class="flex-1 bg-gray-900 text-white py-2 rounded-md hover:bg-gray-800 transition-colors text-sm font-medium">
                            Buy Now
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="group relative bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                <div class="aspect-square bg-gray-100 rounded-t-lg relative overflow-hidden">
                    <img src="{{asset('images/pro3.jpg')}}" alt="Product"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-medium text-gray-900">Women's Summer Dress</h3>
                    <div class="mt-2 flex items-center gap-2">
                        <span class="text-lg font-bold text-indigo-600">$79.99</span>
                    </div>
                </div>
                <div
                    class="absolute inset-x-0 bottom-0 p-4 bg-white/90 backdrop-blur opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <button
                        class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-gray-200 transition-colors text-sm font-medium">
                        Add to Wishlist
                    </button>
                </div>
            </div>
        </div>

        <!-- Show More Button -->
        <div class="mt-8 text-center">
            <button
                class="bg-indigo-600 text-white px-8 py-3 rounded-md hover:bg-indigo-700 transition-colors font-medium">
                Show More
            </button>
        </div>
    </section>

    <div x-data="categorySlider()" class="relative w-full bg-gray-50">
        <!-- Hero Banner -->
        <div class="relative h-72 bg-cover bg-center flex items-center justify-center text-center"
            style="background-image: url('{{ asset('images/hero-banner.jpg') }}');">
            <div class="bg-black bg-opacity-40 w-full h-full absolute top-0 left-0"></div>
            <div class="relative z-10 text-white">
                <h2 class="text-3xl font-bold">MEN’S FASHION</h2>
                <p class="mt-1 text-sm">From streetwear to formals, shop the latest styles</p>
            </div>
        </div>

        <!-- Category Slider -->
        <div class="mt-6 px-4 overflow-hidden relative">
            <div class="flex space-x-4 overflow-x-auto scroll-smooth no-scrollbar" x-ref="slider"
                @scroll="updateProgress" style="scroll-behavior: smooth;">
                <!-- Category Cards -->
                <template x-for="(category, index) in categories" :key="index">
                    <div @click="goToCategory(category)"
                        class="relative min-w-[calc(33.333%-1rem)] bg-white h-80 cursor-pointer group overflow-hidden rounded-xl shadow-sm hover:shadow-lg transition-all duration-300"
                        :class="{ 'ring-2 ring-indigo-500': activeCategory === index }">
                        <!-- Image Container -->
                        <div class="absolute inset-0 overflow-hidden">
                            <img :src="category.image" :alt="category.title"
                                class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent">
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <h3 class="text-2xl font-bold mb-1" x-text="category.title"></h3>
                            <p class="text-sm opacity-90" x-text="category.subtitle"></p>
                            <button
                                class="mt-3 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-xs font-medium hover:bg-white/30 transition-colors">
                                Shop Collection →
                            </button>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Navigation Arrows -->
            <div class="absolute right-4 bottom-8 flex space-x-2">
                <button @click="scrollLeft"
                    class="w-10 h-10 bg-white/90 backdrop-blur rounded-full flex items-center justify-center hover:bg-white shadow-lg transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="scrollRight"
                    class="w-10 h-10 bg-white/90 backdrop-blur rounded-full flex items-center justify-center hover:bg-white shadow-lg transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Progress Bar -->
            <div class="mt-6 w-full h-1.5 bg-gray-100 rounded-full">
                <div class="h-full bg-gradient-to-r from-indigo-500 to-purple-500 transition-all duration-300 rounded-full"
                    :style="{ width: `${progress}%` }"></div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('categorySlider', () => ({
                categories: [
                    { 
                        title: 'Casual Wear', 
                        subtitle: 'Everyday Essentials',
                        image: 'https://images.unsplash.com/photo-1536766820879-059fec98ec0a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800'
                    },
                    { 
                        title: 'Formal Attire', 
                        subtitle: 'Office & Events',
                        image: 'https://images.unsplash.com/photo-1536766820879-059fec98ec0a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800'
                    },
                    { 
                        title: 'Formal Attire', 
                        subtitle: 'Office & Events',
                        image: 'https://images.unsplash.com/photo-1536766820879-059fec98ec0a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800'
                    },
                    { 
                        title: 'Formal Attire', 
                        subtitle: 'Office & Events',
                        image: 'https://images.unsplash.com/photo-1536766820879-059fec98ec0a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800'
                    },
                    { 
                        title: 'Formal Attire', 
                        subtitle: 'Office & Events',
                        image: 'https://images.unsplash.com/photo-1536766820879-059fec98ec0a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800'
                    },
                    { 
                        title: 'Formal Attire', 
                        subtitle: 'Office & Events',
                        image: 'https://images.unsplash.com/photo-1536766820879-059fec98ec0a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800'
                    },
                    { 
                        title: 'Formal Attire', 
                        subtitle: 'Office & Events',
                        image: 'https://images.unsplash.com/photo-1536766820879-059fec98ec0a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800'
                    },
                    
                    // Add other categories with images...
                ],
                progress: 0,
                activeCategory: 0,
                itemWidth: 0,
                visibleItems: 3,
        
                init() {
                    this.$nextTick(() => {
                        const slider = this.$refs.slider;
                        this.itemWidth = slider.children[0].offsetWidth + 16; // 16px gap
                    });
                },
        
                updateProgress() {
                    const slider = this.$refs.slider;
                    const scrollLeft = slider.scrollLeft;
                    const maxScroll = slider.scrollWidth - slider.clientWidth;
                    this.progress = (scrollLeft / maxScroll) * 100;
                    this.activeCategory = Math.round(scrollLeft / this.itemWidth);
                },
        
                scrollLeft() {
                    const slider = this.$refs.slider;
                    slider.scrollBy({ 
                        left: -this.itemWidth * this.visibleItems, 
                        behavior: 'smooth' 
                    });
                },
        
                scrollRight() {
                    const slider = this.$refs.slider;
                    slider.scrollBy({ 
                        left: this.itemWidth * this.visibleItems, 
                        behavior: 'smooth' 
                    });
                },
        
                goToCategory(category) {
                    // Handle category navigation
                    console.log('Selected category:', category);
                }
            }));
        });
    </script>




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