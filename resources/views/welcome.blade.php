<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <title>Zeno - E-Commerce</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

    @include('frontend.navbar')
    @include('frontend.heroSection')
    @include('frontend.new-arrivals')
    
    

    <!-- Category Slider Section -->
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
            <div class="flex space-x-4 overflow-x-hidden scroll-smooth no-scrollbar" x-ref="slider"
                @scroll.debounce.50="updateProgress" style="scroll-behavior: smooth;">
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

            <div class="flex items-center justify-between mt-4 gap-4">
                <!-- Progress Bar -->
                <div class="flex-1 h-1.5 bg-gray-100 rounded-full">
                    <div class="h-full bg-indigo-600 transition-all duration-300 rounded-full"
                        :style="{ width: `${progress}%` }"></div>
                </div>

                <!-- Navigation -->
                <div class="flex items-center gap-2">
                    <button @click="scrollLeft" :disabled="progress === 0"
                        class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors shadow-sm disabled:opacity-50 disabled:cursor-not-allowed">
                        <!-- Left arrow SVG -->
                        <svg width="29" height="28" viewBox="0 0 29 28" class="w-7 h-7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M25.3114 12.1249C27.2783 12.1249 28.8728 13.6919 28.8728 15.6249V24.1249H25.8202V15.6249C25.8202 15.3487 25.5924 15.1249 25.3114 15.1249H5.59274L12.9082 22.3142L10.7497 24.4355L0.828639 14.6855C0.232576 14.0997 0.232576 13.15 0.828639 12.5642L10.7497 2.81421L12.9082 4.93553L5.59274 12.1249H25.3114Z"
                                fill="black" />
                        </svg>
                    </button>
                    <button @click="scrollRight" :disabled="progress >= 100"
                        class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors shadow-sm disabled:opacity-50 disabled:cursor-not-allowed">
                        <!-- Right arrow SVG -->
                        <svg width="29" height="28" viewBox="0 0 29 28" class="w-7 h-7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.68858 12.1249C1.72167 12.1249 0.127178 13.6919 0.127178 15.6249V24.1249H3.17981V15.6249C3.17981 15.3487 3.40759 15.1249 3.68858 15.1249H23.4073L16.0918 22.3142L18.2503 24.4355L28.1714 14.6855C28.7674 14.0997 28.7674 13.15 28.1714 12.5642L18.2503 2.81421L16.0918 4.93553L23.4073 12.1249H3.68858Z"
                                fill="#111827" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </div>

    <!-- Newsletter Section -->
    <section class="relative py-20 px-4 text-center overflow-hidden mt-10">
        <!-- Background Image with Subtle Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/newsletter-bg.jpg') }}" alt="Fashion background"
                class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-white/60"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-3xl mx-auto">

            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Join Our Style Community</h2>
            <p class="text-gray-600 mb-8 max-w-md mx-auto text-lg">Get curated fashion insights, exclusive offers,
                and 15% off your first purchase.</p>

            <form class="flex flex-col sm:flex-row justify-center items-center gap-3 max-w-xl mx-auto">
                <input type="email" placeholder="Your email address" required
                    class="px-5 py-3 w-full rounded-lg border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 shadow-sm transition-all">
                <button type="submit"
                    class="w-full sm:w-auto bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 transition-colors font-medium shadow-md hover:shadow-lg">
                    Subscribe
                </button>
            </form>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 text-gray-600 max-w-5xl mx-auto">
                <div class="flex items-center justify-center gap-2 bg-white p-3 rounded-lg shadow-sm">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm">Zero spam policy</span>
                </div>
                <div class="flex items-center justify-center gap-2 bg-white p-3 rounded-lg shadow-sm">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm">Member-only deals</span>
                </div>
                <div class="flex items-center justify-center gap-2 bg-white p-3 rounded-lg shadow-sm">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm">Easy unsubscribe</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Brand Trust Section -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="flex items-start space-x-4 p-6 bg-white rounded-xl border border-gray-100 hover:border-indigo-100 transition-all">
                <div class="flex-shrink-0 bg-indigo-50 p-3 rounded-lg">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_27_1245)">
                            <path
                                d="M39.6475 19.262L37.6892 13.3595C37.1808 11.8253 35.7725 10.8337 34.1025 10.8337H28.8592L29.0508 9.27116C29.1358 8.59616 28.9358 7.92783 28.5033 7.43699C28.0717 6.94783 27.4375 6.66699 26.7617 6.66699H6.56417C5.23083 6.66699 4.02083 7.74449 3.86667 9.06116L3.76 9.89449C3.7025 10.3512 4.02417 10.7687 4.48083 10.827C4.94333 10.8937 5.35583 10.5628 5.41333 10.1062L5.52083 9.26366C5.57833 8.76783 6.06583 8.33366 6.56417 8.33366H26.7617C26.9617 8.33366 27.1358 8.40699 27.2533 8.53949C27.3725 8.67449 27.4233 8.85949 27.3975 9.06616L25.4458 25.0012H3.56917C3.56917 24.5878 3.27333 24.2262 2.8525 24.1745C2.395 24.1162 1.97917 24.442 1.92333 24.8987L1.6125 27.4045C1.5325 28.082 1.73667 28.7512 2.1725 29.2403C2.60833 29.7312 3.22333 30.0012 3.9025 30.0012H5.51583C5.52833 30.8287 5.80167 31.6003 6.34 32.207C6.9825 32.9337 7.8975 33.3345 8.91417 33.3345C10.8208 33.3345 12.5542 31.8637 12.9442 30.0012H27.3833C27.3958 30.8287 27.6692 31.5995 28.2058 32.2062C28.8492 32.9337 29.7642 33.3345 30.7817 33.3345C32.6875 33.3345 34.4208 31.8637 34.8117 30.0012H36.6058C37.9542 30.0012 39.1392 28.947 39.3033 27.6028L39.9433 22.3837C40.0758 21.3028 39.9767 20.2528 39.6483 19.2628L39.6475 19.262ZM37.86 19.167H32.8383L33.2342 15.9353C33.24 15.8928 33.3083 15.8337 33.3425 15.8337H36.7542L37.86 19.167ZM28.6558 12.5003H34.1033C35.0575 12.5003 35.8242 13.0303 36.1075 13.8845L36.2017 14.167H33.3425C32.4617 14.167 31.6883 14.8545 31.5808 15.732L31.1725 19.0653C31.1167 19.522 31.2542 19.9753 31.55 20.3095C31.845 20.642 32.2742 20.8328 32.73 20.8328H38.2917C38.3425 21.2712 38.3458 21.7203 38.2892 22.1795L37.9433 24.9995H27.1242L28.655 12.4995L28.6558 12.5003ZM27.7392 28.3337H26.7158L26.92 26.667H29.0983C28.515 27.0995 28.0425 27.672 27.7392 28.3337ZM25.0375 28.3337H12.9217C12.79 27.8278 12.555 27.3587 12.2042 26.962C12.1058 26.8512 11.9908 26.7628 11.8808 26.667H25.2425L25.0375 28.3337ZM5.86417 28.3337H3.90167C3.70167 28.3337 3.53417 28.2637 3.41667 28.132C3.295 27.9962 3.2425 27.8062 3.26583 27.6028L3.38167 26.667H7.2025C6.62417 27.097 6.16 27.6678 5.86333 28.3337H5.86417ZM11.3608 29.482C11.2158 30.667 10.095 31.667 8.91333 31.667C8.38 31.667 7.91 31.4662 7.58667 31.1012C7.25833 30.7312 7.115 30.2278 7.18083 29.6853C7.32667 28.5003 8.4475 27.5003 9.62917 27.5003C10.1625 27.5003 10.6333 27.7012 10.9558 28.0662C11.2842 28.4362 11.4275 28.9395 11.3608 29.482ZM33.2283 29.482C33.0825 30.667 31.9617 31.667 30.7808 31.667C30.2475 31.667 29.7767 31.4662 29.4533 31.1012C29.125 30.7312 28.9817 30.2278 29.0483 29.6853C29.1942 28.5003 30.315 27.5003 31.4958 27.5003C32.0292 27.5003 32.5 27.7012 32.8233 28.0662C33.1517 28.4362 33.295 28.9395 33.2283 29.482ZM36.6058 28.3337H34.7892C34.6575 27.8278 34.4225 27.3587 34.0717 26.962C33.9733 26.8512 33.8583 26.7628 33.7483 26.667H37.74L37.65 27.3987C37.5892 27.897 37.1008 28.3337 36.6058 28.3337Z"
                                fill="black" />
                            <path
                                d="M7.525 21.6663C7.525 21.2055 7.1525 20.833 6.69167 20.833H0.833333C0.3725 20.833 0 21.2055 0 21.6663C0 22.1272 0.3725 22.4997 0.833333 22.4997H6.69167C7.1525 22.4997 7.525 22.1272 7.525 21.6663Z"
                                fill="black" />
                            <path
                                d="M3.40584 16.667C2.94501 16.667 2.57251 17.0403 2.57251 17.5003C2.57251 17.9603 2.94501 18.3337 3.40584 18.3337H7.20668C7.66751 18.3337 8.04001 17.9603 8.04001 17.5003C8.04001 17.0403 7.66751 16.667 7.20668 16.667H3.40584Z"
                                fill="black" />
                            <path
                                d="M1.81249 14.1667H8.54582C9.00666 14.1667 9.37916 13.7933 9.37916 13.3333C9.37916 12.8733 9.00666 12.5 8.54582 12.5H1.81249C1.35166 12.5 0.979156 12.8733 0.979156 13.3333C0.979156 13.7933 1.35166 14.1667 1.81249 14.1667Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_27_1245">
                                <rect width="40" height="40" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-2">Fast Delivery</h3>
                    <p class="text-gray-600 text-sm">Nationwide shipping with real-time tracking</p>
                </div>
            </div>

            <div
                class="flex items-start space-x-4 p-6 bg-white rounded-xl border border-gray-100 hover:border-indigo-100 transition-all">
                <div class="flex-shrink-0 bg-indigo-50 p-3 rounded-lg">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.43124 29.6764C3.22311 26.3839 2.20936 22.3864 2.57874 18.4158C2.65436 17.5433 2.80686 16.6283 3.03061 15.7033C3.23624 14.8946 3.49374 14.1158 3.79874 13.3846C4.67124 11.2289 5.96061 9.29268 7.63124 7.6283C9.07124 6.18268 10.7169 5.01955 12.5231 4.17143C13.3537 3.78018 14.2187 3.4533 15.095 3.19955C15.8975 2.96455 16.6987 2.79268 17.4775 2.68768C17.5056 2.68393 17.5331 2.6783 17.56 2.67018C22.085 2.03643 26.595 3.15518 30.2594 5.82393C30.6181 6.08393 30.9669 6.35768 31.3044 6.6433L29.985 6.71393C29.6406 6.73205 29.3756 7.02643 29.3944 7.37143C29.4125 7.70518 29.6887 7.9633 30.0181 7.9633C30.0294 7.9633 30.0406 7.9633 30.0525 7.96268L32.8456 7.8133C32.9056 7.81018 32.9619 7.7883 33.0181 7.76768C33.0331 7.76268 33.0494 7.76205 33.0637 7.7558C33.1056 7.73643 33.14 7.70705 33.1769 7.67893C33.2075 7.65643 33.24 7.6383 33.2656 7.61143C33.2694 7.60768 33.275 7.6058 33.2787 7.60143C33.2981 7.58018 33.3056 7.55205 33.3212 7.5283C33.3494 7.48768 33.3775 7.4483 33.3956 7.40143C33.4069 7.37143 33.4075 7.3408 33.4144 7.30955C33.4237 7.26643 33.4406 7.22643 33.4406 7.1808C33.4406 7.17268 33.4362 7.16518 33.4356 7.15643C33.4356 7.15205 33.4375 7.1483 33.4375 7.14393L33.2781 4.36018C33.2587 4.0158 32.9519 3.7508 32.6181 3.77205C32.2737 3.79205 32.01 4.08705 32.0306 4.43205L32.1019 5.68205C31.7437 5.38018 31.3756 5.0883 30.9956 4.8133C27.0494 1.93893 22.1912 0.743302 17.3131 1.4433C17.2881 1.44705 17.2637 1.45205 17.2394 1.45893C16.4219 1.57268 15.5837 1.75455 14.7475 1.99955C13.81 2.27143 12.8831 2.62143 11.9937 3.04018C10.0556 3.94955 8.29061 5.19643 6.74874 6.74455C4.96061 8.52705 3.57874 10.6027 2.64499 12.9096C2.31936 13.6914 2.04249 14.5277 1.82061 15.4027C1.57999 16.3958 1.41686 17.3733 1.33686 18.3039C0.941863 22.5564 2.02811 26.8421 4.39686 30.3727C4.51686 30.5527 4.71499 30.6496 4.91624 30.6496C5.03561 30.6496 5.15686 30.6152 5.26374 30.5439C5.55061 30.3514 5.62686 29.9633 5.43436 29.6764H5.43124Z"
                            fill="black" />
                        <path
                            d="M34.7393 9.45551C34.4525 9.64801 34.3762 10.0361 34.5687 10.323C36.7768 13.6155 37.7906 17.613 37.4212 21.5836C37.3456 22.4561 37.1931 23.3711 36.9693 24.2961C36.7637 25.1049 36.5062 25.8836 36.2012 26.6149C35.3287 28.7705 34.0393 30.7068 32.3687 32.3711C30.9287 33.8168 29.2831 34.9799 27.4768 35.828C26.6462 36.2193 25.7812 36.5461 24.905 36.7999C24.1025 37.0349 23.3012 37.2068 22.5225 37.3118C22.4943 37.3155 22.4668 37.3211 22.44 37.3293C17.9131 37.9611 13.405 36.8443 9.74059 34.1755C9.37622 33.9118 9.02997 33.6386 8.69497 33.3555L10.015 33.2824C10.36 33.263 10.6243 32.9686 10.6043 32.6236C10.5856 32.2793 10.2837 32.0111 9.94622 32.0343L7.15685 32.1886C6.81185 32.208 6.54747 32.5024 6.56747 32.8474L6.72122 35.6368C6.73934 35.9699 7.01497 36.2274 7.34435 36.2274C7.35622 36.2274 7.36747 36.2274 7.37934 36.2268C7.72434 36.208 7.98872 35.913 7.96872 35.568L7.89997 34.3199C8.25497 34.6193 8.62059 34.9086 9.00559 35.1874C12.2156 37.5249 16.0281 38.753 19.9631 38.753C20.8662 38.753 21.7768 38.688 22.6875 38.5574C22.7125 38.5536 22.7368 38.5486 22.7612 38.5418C23.5787 38.428 24.4168 38.2461 25.2531 38.0011C26.1906 37.7293 27.1175 37.3793 28.0068 36.9605C29.945 36.0511 31.71 34.8043 33.2518 33.2561C35.04 31.4736 36.4218 29.398 37.3556 27.0911C37.6812 26.3093 37.9581 25.473 38.18 24.598C38.4206 23.6049 38.5837 22.6274 38.6637 21.6968C39.0587 17.4443 37.9725 13.1586 35.6037 9.62801C35.4118 9.34114 35.0231 9.26364 34.7368 9.45739L34.7393 9.45551Z"
                            fill="black" />
                        <path
                            d="M30.05 14.4559C30.05 14.3871 30.0375 14.3246 30.0125 14.2684C30.0062 14.2434 30 14.2246 29.9875 14.2059C29.9625 14.1434 29.925 14.0934 29.8812 14.0434C29.875 14.0371 29.8687 14.0309 29.8562 14.0246C29.825 13.9871 29.7875 13.9559 29.7437 13.9309L20.3437 8.51211C20.1562 8.39961 19.9125 8.39961 19.7187 8.51211L10.2562 13.9746C10.0625 14.0871 9.94373 14.2934 9.94373 14.5121V25.1246C9.94373 25.1496 9.95623 25.1746 9.95623 25.1996C9.96248 25.2434 9.96873 25.2871 9.98748 25.3309C9.99998 25.3684 10.0125 25.3996 10.0375 25.4309C10.0562 25.4684 10.075 25.4996 10.1062 25.5309C10.1312 25.5621 10.1625 25.5871 10.1937 25.6121C10.2187 25.6309 10.2312 25.6559 10.2562 25.6684L19.6562 31.0934C19.6687 31.1059 19.6875 31.1059 19.7 31.1184C19.7187 31.1246 19.7312 31.1309 19.75 31.1371C19.8187 31.1621 19.8937 31.1809 19.9687 31.1809C20.0437 31.1809 20.1125 31.1621 20.1875 31.1371C20.2 31.1309 20.2187 31.1246 20.2312 31.1184C20.25 31.1121 20.2625 31.1059 20.2812 31.0996L29.7437 25.6309C29.7687 25.6184 29.7812 25.5934 29.8062 25.5746C29.8375 25.5496 29.8687 25.5309 29.8937 25.4996C29.925 25.4684 29.9437 25.4309 29.9687 25.3934C29.9875 25.3621 30 25.3309 30.0125 25.2934C30.0312 25.2496 30.0375 25.2059 30.0437 25.1621C30.0437 25.1371 30.0562 25.1184 30.0562 25.0871V14.4746C30.0562 14.4684 30.05 14.4621 30.05 14.4559ZM20.0312 9.77461L28.1812 14.4746L25.0687 16.2746L16.9187 11.5684L20.0312 9.77461ZM19.3437 29.4746L11.1937 24.7684V15.5996L19.3437 20.2996V29.4746ZM19.9625 19.2184L11.8187 14.5121L15.6687 12.2934L23.8187 16.9934L19.9625 19.2184ZM28.8062 24.7309L20.5937 29.4746V20.2996L24.4437 18.0746V19.7809C24.4437 20.1246 24.7187 20.4059 25.0687 20.4059C25.4125 20.4059 25.6937 20.1246 25.6937 19.7809V17.3559L28.8062 15.5559V24.7309Z"
                            fill="black" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-2">Easy Returns</h3>
                    <p class="text-gray-600 text-sm">30-day hassle-free return policy</p>
                </div>
            </div>

            <div
                class="flex items-start space-x-4 p-6 bg-white rounded-xl border border-gray-100 hover:border-indigo-100 transition-all">
                <div class="flex-shrink-0 bg-indigo-50 p-3 rounded-lg">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_27_1238)">
                            <path
                                d="M24.5242 16.2842L18.5142 21.9608L15.6298 18.9934C15.3101 18.6642 14.7836 18.6567 14.4547 18.9765C14.1255 19.2965 14.118 19.8228 14.4377 20.152L17.8972 23.7032C18.2185 24.0265 18.7379 24.0376 19.0727 23.7279L25.6831 17.4929C25.8437 17.3415 25.9374 17.1325 25.9436 16.912C25.9498 16.6916 25.8681 16.4776 25.7163 16.3174C25.3946 15.983 24.8642 15.9684 24.5242 16.2842Z"
                                fill="black" />
                            <path
                                d="M20.0645 7.54785C13.1958 7.54785 7.61072 13.1329 7.61072 20.0016C7.61072 26.8706 13.1958 32.4557 20.0645 32.4557C26.9335 32.4557 32.5186 26.8706 32.5186 20.0016C32.5186 13.1329 26.9335 7.54785 20.0645 7.54785ZM20.0645 30.7885C14.1128 30.7885 9.27791 25.9452 9.27791 20.0016C9.27791 14.058 14.1128 9.21504 20.0645 9.21504C26.0221 9.21504 30.8514 14.0443 30.8514 20.0016C30.8514 25.9589 26.0221 30.7885 20.0645 30.7885Z"
                                fill="black" />
                            <path
                                d="M37.2033 15.4173L37.4784 10.4741C37.4976 10.1422 37.3172 9.83063 37.0199 9.68214L32.6185 7.45651L30.3929 3.05507C30.2414 2.76038 29.9318 2.58097 29.6009 2.5966L24.6492 2.86361L20.5229 0.137494C20.2448 -0.0458314 19.8844 -0.0458314 19.606 0.137494L15.4797 2.86361L10.5367 2.58846C10.2046 2.56892 9.89329 2.74931 9.7448 3.04693L7.51885 7.44837L3.11773 9.674C2.82272 9.82509 2.64363 10.1348 2.65926 10.4659L2.93408 15.4092L0.208295 19.5355C0.0249694 19.8136 0.0249694 20.174 0.208295 20.4524L2.92594 24.5869L2.65079 29.5301C2.63158 29.862 2.81165 30.1736 3.10927 30.3221L7.51071 32.5477L9.73634 36.9491C9.88743 37.2441 10.1971 37.4232 10.5283 37.4076L15.4715 37.1325L19.5978 39.8582C19.8743 40.0474 20.2383 40.0474 20.5148 39.8582L24.6411 37.1325L29.5843 37.4076C29.9161 37.4268 30.2274 37.2464 30.3763 36.9491L32.6019 32.5477L37.0033 30.3221C37.298 30.1706 37.4774 29.8613 37.4618 29.5301L37.1866 24.5869L39.9124 20.4606C40.0958 20.1825 40.0958 19.8217 39.9124 19.5436L37.2033 15.4173ZM35.6526 23.9034C35.551 24.0525 35.5038 24.2319 35.5195 24.412L35.7777 29.0883L31.6182 31.1889C31.4596 31.2683 31.331 31.3973 31.2515 31.5558L29.1506 35.7153L24.4743 35.4571C24.2953 35.4506 24.1184 35.4969 23.9657 35.5903L20.0644 38.1663L16.1635 35.5903C16.028 35.4988 15.8685 35.4493 15.705 35.4487H15.6633L10.9867 35.7072L8.88614 31.5474C8.80669 31.3888 8.67807 31.2602 8.51916 31.1807L4.35119 29.0883L4.60974 24.412C4.61625 24.2329 4.56968 24.0561 4.47623 23.9034L1.90056 20.0021L4.47623 16.1008C4.57815 15.952 4.62537 15.7723 4.60974 15.5925L4.35119 10.9159L8.51102 8.81534C8.6696 8.73588 8.79822 8.60726 8.87767 8.44869L10.9783 4.28886L15.6549 4.5474C15.8336 4.55359 16.0104 4.50735 16.1635 4.4139L20.0644 1.83822L23.9657 4.4139C24.1149 4.51582 24.2946 4.56303 24.4743 4.5474L29.1506 4.28886L31.2515 8.44869C31.331 8.60726 31.4596 8.73588 31.6182 8.81534L35.7777 10.9159L35.5195 15.5925C35.513 15.7713 35.5595 15.9481 35.6526 16.1008L38.2286 20.0021L35.6526 23.9034Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_27_1238">
                                <rect width="40" height="40" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-2">Premium Quality</h3>
                    <p class="text-gray-600 text-sm">Certified quality assurance</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-white text-gray-900 py-12 px-4">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-8">
            <!-- Brand Info -->
            <div class="space-y-4">
                <h3 class="text-2xl font-bold text-gray-900">Zeno</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Premium Fashion Marketplace</p>
                <div class="flex space-x-4">
                    <a href="#"
                        class="text-gray-500 hover:text-gray-900 transition-colors w-10 h-10 rounded-full p-3 bg-slate-400 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="text-gray-500 hover:text-gray-900 transition-colors w-10 h-10 rounded-full p-3 bg-slate-400 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.998 12c0-6.628-5.372-12-11.999-12C5.372 0 0 5.372 0 12c0 5.988 4.388 10.952 10.124 11.852v-8.384H7.078v-3.469h3.046V9.356c0-3.008 1.792-4.669 4.532-4.669 1.313 0 2.686.234 2.686.234v2.953H15.83c-1.49 0-1.955.925-1.955 1.874v2.25h3.328l-.532 3.469h-2.796v8.384C19.612 22.952 24 17.988 24 12z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="text-gray-500 hover:text-gray-900 transition-colors w-10 h-10 rounded-full p-3 bg-slate-400 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="#"
                        class="text-gray-500 hover:text-gray-900 transition-colors w-10 h-10 rounded-full p-3 bg-slate-400 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19.615 3.184A3.02 3.02 0 0017.367 2H6.633a3.02 3.02 0 00-2.248 1.184A3.83 3.83 0 003.5 5.65v12.7a3.83 3.83 0 00.885 2.465A3.02 3.02 0 006.633 22h10.734a3.02 3.02 0 002.248-1.184A3.83 3.83 0 0020.5 18.35V5.65a3.83 3.83 0 00-.885-2.466zM9 15.5v-7l6 3.5-6 3.5z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-3">
                <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider">Categories</h4>
                <nav class="space-y-2">
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors block">Men's
                        Collection</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors block">Women's
                        Style</a>
                    <a href="#"
                        class="text-sm text-gray-600 hover:text-gray-900 transition-colors block">Accessories</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors block">New
                        Arrivals</a>
                </nav>
            </div>

            <!-- Support -->
            <div class="space-y-3">
                <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider">Support</h4>
                <nav class="space-y-2">
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors block">Contact
                        Us</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors block">FAQs</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors block">Shipping
                        Policy</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors block">Returns</a>
                </nav>
            </div>

            <!-- Legal -->
            <div class="space-y-3">
                <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider">Legal</h4>
                <nav class="space-y-2">
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors block">Terms of
                        Service</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors block">Privacy
                        Policy</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors block">Cookie
                        Policy</a>
                </nav>
            </div>

            <!-- Contact -->
            <div class="space-y-3">
                <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider">Contact</h4>
                <div class="space-y-2 text-sm text-gray-600">
                    <p>+1 (555) 123-4567</p>
                    <p>support@ebe.com</p>
                    <p>123 Fashion Avenue<br>New York, NY 10001</p>
                </div>
            </div>
        </div>

        <!-- Payment & Copyright -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex flex-wrap gap-4 items-center">
                    <span class="text-sm text-gray-600">Secure payments:</span>
                    <!-- Payment Methods -->
                    <div class="flex flex-wrap items-center justify-center gap-6 py-8">
                        <!-- Visa -->
                        <img class="w-10" src="{{asset('images/svg/visa-svgrepo-com (1).svg')}}" alt="">

                        <!-- Mastercard -->
                        <img class="w-10" src="{{asset('images/svg/maestro-svgrepo-com.svg')}}" alt="">

                        <!-- American Express -->
                        <img class="w-10" src="{{asset('images/svg/mastercard-svgrepo-com.svg')}}" alt="">

                        <!-- PayPal -->
                        <img class="w-10" src="{{asset('images/svg/amex-svgrepo-com.svg')}}" alt="">

                        <!-- Apple Pay -->
                        <img class="w-10" src="{{asset('images/svg/jcb-svgrepo-com.svg')}}" alt="">
                    </div>

                </div>

                <div class="text-sm text-gray-600">
                    <p>&copy; 2025 EBE. All rights reserved</p>
                    <div class="mt-1 flex space-x-4">
                        <a href="#" class="hover:text-gray-900 transition-colors">Terms</a>
                        <a href="#" class="hover:text-gray-900 transition-colors">Privacy</a>
                        <a href="#" class="hover:text-gray-900 transition-colors">Cookies</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script>
        document.addEventListener('alpine:init', () => {
        Alpine.data('categorySlider', () => ({
            categories: [
                { 
                    title: 'Casual Wear', 
                    subtitle: 'Everyday Essentials',
                    image: '{{asset('images/kids.jpg')}}'
                },
                { 
                    title: 'Formal Attire', 
                    subtitle: 'Office & Events',
                    image: 'https://images.unsplash.com/photo-1536766820879-059fec98ec0a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800'
                },
                { 
                    title: 'Formal Attire', 
                    subtitle: 'Office & Events',
                    image: '{{asset('images/women.jpg')}}'

                },
                { 
                    title: 'Formal Attire', 
                    subtitle: 'Office & Events',
                    image: '{{asset('images/watch.jpg')}}'
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
                
            ],
            progress: 0,
            activeCategory: 0,
            itemWidth: 0,
            visibleItems: 3,
    
            init() {
            this.$nextTick(() => {
                const slider = this.$refs.slider;
                this.itemWidth = slider.children[0].offsetWidth + 16;
                this.visibleItems = Math.floor(slider.clientWidth / this.itemWidth);
                this.maxScroll = slider.scrollWidth - slider.clientWidth;
                this.updateProgress();
                this.totalItems = slider.children.length;
            });
        },

        updateProgress() {
            const slider = this.$refs.slider;
            const scrollLeft = slider.scrollLeft;
            this.maxScroll = slider.scrollWidth - slider.clientWidth;
            this.progress = Math.min((scrollLeft / this.maxScroll) * 100, 100);
            this.activeCategory = Math.round(scrollLeft / this.itemWidth);
        },

        scrollLeft() {
            const slider = this.$refs.slider;
            const scrollAmount = this.itemWidth * this.visibleItems;
            const newPosition = Math.max(slider.scrollLeft - scrollAmount, 0);
            
            slider.scrollTo({
                left: newPosition,
                behavior: 'smooth'
            });
        },

        scrollRight() {
            const slider = this.$refs.slider;
            const scrollAmount = this.itemWidth * this.visibleItems;
            const newPosition = Math.min(slider.scrollLeft + scrollAmount, this.maxScroll);
            
            slider.scrollTo({
                left: newPosition,
                behavior: 'smooth'
            });
        },
    
            goToCategory(category) {
                console.log('Selected category:', category);
            }
        }));
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Include Swiper JS -->
    <script>
        const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        slidesPerView: 1,
        
        // If you need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        
        // Optional autoplay
        autoplay: {
            delay: 5000,
        },
    });
    </script>
</body>

</html>