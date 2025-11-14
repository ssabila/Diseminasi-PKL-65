<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

// Path ke logo di folder /public
const logoUrl = '/images/assets/LOGO-PKL_REV8.png';

// State untuk menu mobile (hamburger)
const isMobileMenuOpen = ref(false);
</script>

<template>
    <nav class="bg-pkl-base-cream shadow-md w-full sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <div class="flex-shrink-0">
                    <Link href="/">
                        <img :src="logoUrl" alt="Logo PKL 65" class="h-12 w-auto" />
                    </Link>
                </div>

                <div class="hidden md:flex md:items-center md:space-x-8">
                    <Link 
                        href="/" 
                        class="font-sub text-gray-700 hover:text-pkl-base-orange transition-colors duration-200"
                        :class="{ 'text-pkl-base-orange font-bold': $page.url === '/' }"
                    >
                        Beranda
                    </Link>
                    <Link 
                        href="/hasil-diseminasi" 
                        class="font-sub text-gray-700 hover:text-pkl-base-orange transition-colors duration-200"
                        :class="{ 'text-pkl-base-orange font-bold': $page.url.startsWith('/hasil-diseminasi') }"
                    >
                        Hasil Penelitian
                    </Link>
                    <Link 
                        href="/dokumen" 
                        class="font-sub text-gray-700 hover:text-pkl-base-orange transition-colors duration-200"
                        :class="{ 'text-pkl-base-orange font-bold': $page.url.startsWith('/dokumen') }"
                    >
                        Dokumen
                    </Link>
                </div>

                <div class="hidden md:block">
                    <Link 
                        href="/login" 
                        class="font-sub border border-pkl-base-orange text-pkl-base-orange px-4 py-2 rounded-md text-sm font-medium hover:bg-pkl-base-orange hover:text-white transition-colors duration-200"
                    >
                        Login Admin
                    </Link>
                </div>

                <div class="md:hidden flex items-center">
                    <button 
                        @click="isMobileMenuOpen = !isMobileMenuOpen" 
                        type="button" 
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-pkl-base-orange" 
                        aria-controls="mobile-menu" 
                        :aria-expanded="isMobileMenuOpen.toString()"
                    >
                        <span class="sr-only">Buka menu</span>
                        <svg v-if="!isMobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg v-else class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <div v-show="isMobileMenuOpen" class="md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <Link 
                    href="/" 
                    class="font-sub text-gray-700 hover:bg-gray-50 hover:text-pkl-base-orange block px-3 py-2 rounded-md text-base font-medium"
                    :class="{ 'bg-gray-50 text-pkl-base-orange': $page.url === '/' }"
                >
                    Beranda
                </Link>
                <Link 
                    href="/hasil-diseminasi" 
                    class="font-sub text-gray-700 hover:bg-gray-50 hover:text-pkl-base-orange block px-3 py-2 rounded-md text-base font-medium"
                    :class="{ 'bg-gray-50 text-pkl-base-orange': $page.url.startsWith('/hasil-diseminasi') }"
                >
                    Hasil Penelitian
                </Link>
                <Link 
                    href="/dokumen" 
                    class="font-sub text-gray-700 hover:bg-gray-50 hover:text-pkl-base-orange block px-3 py-2 rounded-md text-base font-medium"
                    :class="{ 'bg-gray-50 text-pkl-base-orange': $page.url.startsWith('/dokumen') }"
                >
                    Dokumen
                </Link>
            </div>
            <div class="pt-3 pb-3 border-t border-gray-200">
                <div class="px-2">
                    <Link 
                        href="/login" 
                        class="w-full text-center font-sub border border-pkl-base-orange text-pkl-base-orange px-4 py-2 rounded-md text-sm font-medium hover:bg-pkl-base-orange hover:text-white transition-colors duration-200"
                    >
                        Login Admin
                    </Link>
                </div>
            </div>
        </div>
    </nav>
</template>