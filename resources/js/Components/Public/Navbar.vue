<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

// Dapatkan URL halaman saat ini dari Inertia
const page = usePage();
const currentUrl = computed(() => page.url);

// Fungsi helper untuk mengecek link aktif
const isActive = (url) => {
  return currentUrl.value === url;
};
</script>

<template>
  <nav class="w-full bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-20">
        
        <div class="flex-shrink-0">
          <Link href="/">
            <img 
              class="h-12 w-auto" 
              src="/images/assets/LOGO-PKL_REV8.png" 
              alt="Logo PKL 65"
            >
          </Link>
        </div>

        <div class="hidden md:flex md:items-center md:space-x-10">
          <Link 
            href="/" 
            :class="[
              'text-base font-medium transition-colors duration-150',
              isActive('/') ? 'text-gray-900 font-bold' : 'text-gray-500 hover:text-gray-900'
            ]"
          >
            Beranda
          </Link>
          <Link 
            href="/publikasi" 
            :class="[
              'text-base font-medium transition-colors duration-150',
              isActive('/publikasi') ? 'text-gray-900 font-bold' : 'text-gray-500 hover:text-gray-900'
            ]"
          >
            Publikasi
          </Link>
          <Link 
            href="/visualisasi" 
            :class="[
              'text-base font-medium transition-colors duration-150',
              isActive('/visualisasi') ? 'text-gray-900 font-bold' : 'text-gray-500 hover:text-gray-900'
            ]"
          >
            Visualisasi
          </Link>
          <Link 
            href="/tentang-pkl" 
            :class="[
              'text-base font-medium transition-colors duration-150',
              isActive('/tentang-pkl') ? 'text-gray-900 font-bold' : 'text-gray-500 hover:text-gray-900'
            ]"
          >
            Tentang PKL
          </Link>
        </div>

        <div class="flex items-center">
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
              <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
              </svg>
            </span>
            
            <input 
              id="search" 
              name="search" 
              class="block w-full bg-gray-100 border border-transparent rounded-full py-2 pl-10 pr-4 text-sm placeholder-gray-500 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
              placeholder="Cari..." 
              type="search"
            >
          </div>
        </div>

        </div>
    </div>
  </nav>
</template>