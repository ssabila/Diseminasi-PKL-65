<script setup>
import { Head, Link } from '@inertiajs/vue3';
// Asumsi kamu menggunakan layout ini. Sesuaikan jika perlu.
import PKL65Layout from '@/Layouts/PKL65Layout.vue'; 

// Memberitahu Inertia untuk membungkus halaman ini dengan layout
defineOptions({ layout: PKL65Layout });
</script>

<template>
  <Head title="Beranda" />

  <main>
    <section class="relative overflow-hidden bg-white">

      <img 
        src="/images/assets/pattern-batik.svg" 
        alt="Pola batik" 
        class="absolute inset-0 w-full h-full object-cover opacity-10 z-10"
        aria-hidden="true"
      >
      
      <img 
        src="/images/assets/lanskap-gunung-abstrak.svg" 
        alt="Lanskap gunung abstrak"
        class="absolute inset-0 w-full h-full object-cover z-0"
        aria-hidden="true"
      >

      <img 
        src="/images/assets/landmark-tugu-yogya.svg" 
        alt="Landmark Tugu Yogya"
        class="absolute bottom-0 left-0 h-1/2 md:h-2/3 lg:h-3/4 w-auto z-10"
        aria-hidden="true"
      >
      
      <img 
        src="/images/assets/landmark-prambanan-siluet.svg" 
        alt="Landmark Siluet Prambanan"
        class="absolute bottom-0 right-0 h-1/2 md:h-2/3 lg:h-3/4 w-auto z-10"
        aria-hidden="true"
      >

      <div class="relative min-h-[70vh] md:min-h-[80vh] flex items-center z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="max-w-2xl lg:max-w-3xl">
            
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-900">
              Diseminasi Hasil Kegiatan PKL 65
            </h1>
            
            <p class="mt-6 text-lg sm:text-xl text-gray-700">
              {Ganti teks ini} Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nulla vel
              ultrices, nisl nunc aliquet nunc, nec tincidunt nisl nunc euismod.
            </p>
            
            <div class="mt-10">
              <Link 
                href="#" 
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
              >
                Selengkapnya
                <svg class="ml-3 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-900 text-center">
          Bagian Konten Lainnya
        </h2>
        <div class="mt-10 text-center text-gray-500">
          ...
        </div>
      </div>
    </section>
  </main>
</template>