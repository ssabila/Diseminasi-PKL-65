<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PKL65Layout from '@/Layouts/PKL65Layout.vue'; 

// Memberitahu Inertia untuk membungkus halaman ini dengan layout PKL65Layout
defineOptions({ layout: PKL65Layout });

// (Nanti tim bisa tambahin props di sini kalo butuh data dari controller)
// defineProps({
//   risets: Array,
//   ...
// });
</script>

<template>
  <Head title="Beranda" />

  <main class="font-sans bg-pkl-light-yellow"> <section id="hero" class="relative overflow-hidden">
      <div class="container mx-auto px-6 py-24 pt-32 relative z-10">
        <div class="max-w-3xl">
          <h1 class="font-sub text-6xl lg:text-7xl font-bold text-pkl-dark-blue">
            Praktik Kerja Lapangan
          </h1>
          <p class="mt-4 font-sub text-2xl text-gray-800">
            Politeknik Statistika STIS T.A. 2025/2026
          </p>
          <p class="mt-6 text-lg text-gray-700 max-w-2xl">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praktik Kerja
            Lapangan Mahasiswa Tingkat III Politeknik Statistika STIS...
          </p>
          <Link 
            href="#latar-belakang" 
            class="mt-8 inline-block bg-green-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg hover:bg-green-800 transition-colors"
          >
            Lihat Selengkapnya
          </Link>
        </div>
      </div>
      
      </section>

    <section id="latar-belakang" class="bg-pkl-base-orange py-20">
      <div class="container mx-auto px-6">
        <h2 class="font-sub text-4xl lg:text-5xl text-white text-center">
          Latar Belakang
        </h2>
        
        <p class="mt-6 text-lg text-orange-100 max-w-4xl mx-auto text-center">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit...
        </p>
        
        <div class="mt-12 bg-white rounded-lg shadow-xl p-8 max-w-3xl mx-auto">
          <h3 class="font-sub text-2xl text-pkl-dark-blue">Fenomena Gig Economy</h3>
          <ul class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2">
            <li class="flex items-center text-gray-700">
              <svg class="h-5 w-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="..."></path></svg>
              Lorem ipsum dolor sit amet...
            </li>
            <li class="flex items-center text-gray-700">
              <svg class="h-5 w-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="..."></path></svg>
              Sed do eiusmod tempor...
            </li>
            </ul>
        </div>
      </div>
    </section>

    <section id="tujuan" class="bg-pkl-light-yellow py-20">
      <div class="container mx-auto px-6">
        <h2 class="font-sub text-4xl lg:text-5xl text-pkl-dark-blue text-center">
          Tujuan Penelitian
        </h2>
        
        <div class="mt-12 max-w-4xl mx-auto">
          <p class="text-center text-gray-700">(Orang 2 isi 6 poin tujuan di sini)</p>
        </div>
      </div>
    </section>

    <section id="riset" class="bg-pkl-base-orange py-20 relative overflow-hidden">
      <img 
        src="/images/assets/landmark-prambanan-siluet.svg" 
        alt="Siluet Prambanan"
        class="absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-6xl h-auto z-0 opacity-20"
      >
      
      <div class="container mx-auto px-6 relative z-10">
        <h2 class="font-sub text-4xl lg:text-5xl text-white text-center">
          Riset
        </h2>
        
        <div class="mt-12 grid md:grid-cols-3 gap-8">
          <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h3 class="font-sub text-2xl text-pkl-base-orange">Riset 1</h3>
            <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet...</p>
            <button class="mt-6 bg-gray-200 text-gray-800 font-semibold py-2 px-5 rounded-lg">
              Lihat Hasil
            </button>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h3 class="font-sub text-2xl text-pkl-base-orange">Riset 2</h3>
            <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet...</p>
            <button class="mt-6 bg-gray-200 text-gray-800 font-semibold py-2 px-5 rounded-lg">
              Lihat Hasil
            </button>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h3 class="font-sub text-2xl text-pkl-base-orange">Riset 5</h3>
            <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet...</p>
            <button class="mt-6 bg-gray-200 text-gray-800 font-semibold py-2 px-5 rounded-lg">
              Lihat Hasil
            </button>
          </div>
        </div>
      </div>
    </section>

    <section id="cakupan" class="bg-pkl-light-yellow py-20">
      <div class="container mx-auto px-6">
        <h2 class="font-sub text-4xl lg:text-5xl text-pkl-dark-blue text-center">
          Cakupan Penelitian
        </h2>
        
        <div class="mt-12 max-w-4xl mx-auto">
          <p class="text-center text-gray-700">(Orang 3 isi 4 poin cakupan di sini)</p>
        </div>
      </div>
    </section>

    <section id="metode-sampel" class="bg-pkl-base-orange py-20">
      <div class="container mx-auto px-6">
        <h2 class="font-sub text-4xl lg:text-5xl text-white text-center">
          Metode Penarikan Sampel
        </h2>
        
        <div class="mt-12 max-w-2xl mx-auto">
          <p class="text-center text-orange-100">(Orang 3 isi 4 step vertikal di sini)</p>
        </div>
      </div>
    </section>

    <section id="metode-data" class="bg-pkl-light-yellow py-20">
      <div class="container mx-auto px-6">
        <h2 class="font-sub text-4xl lg:text-5xl text-pkl-dark-blue text-center">
          Metode Pengumpulan Data
        </h2>
        
        <div class="mt-12 max-w-4xl mx-auto">
          <p class="text-center text-gray-700">(Orang 3 isi "Wawancara" & 5 step "Alur" di sini)</p>
        </div>
      </div>
    </section>

    <section id="hasil" class="bg-pkl-base-orange py-20">
      <div class="container mx-auto px-6">
        <h2 class="font-sub text-4xl lg:text-5xl text-white text-center">
          Hasil Penelitian
        </h2>
        
        <div class="mt-12 max-w-5xl mx-auto">
          <p class="text-center text-orange-100">(Orang 3 isi 3 kolom hasil & kesimpulan di sini)</p>
        </div>
      </div>
    </section>

  </main>
</template>