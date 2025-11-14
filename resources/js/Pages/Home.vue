<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PKL65Layout from '@/Layouts/PKL65Layout.vue'; 

defineOptions({
    layout: PKL65Layout 
});

const heroAssets = {
    tugu: '/images/assets/landmark-tugu-yogya.svg',
    prambanan: '/images/assets/landmark-prambanan-siluet.svg',
    gunung: '/images/assets/lanskap-gunung-abstrak.svg'
};

const metodologiAssets = {
    cakupan: '/images/assets/metodologi-cakupan.svg',
    sampel: '/images/assets/metodologi-sampel.svg',
    data: '/images/assets/metodologi-data.svg'
};
</script>

<template>
    <Head title="Beranda - Diseminasi PKL 65 DI Yogyakarta" />

    <section class="relative pt-20 pb-32 overflow-hidden bg-pkl-base-cream bg-opacity-30">
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="text-center md:text-left">
                    <h1 class="font-headline text-5xl md:text-7xl text-pkl-base-orange drop-shadow-sm">
                        Mengupas Fenomena GIG Worker di DI Yogyakarta
                    </h1>
                    <p class="font-sub text-xl md:text-2xl text-gray-700 mt-6">
                        Hasil Praktik Kerja Lapangan ke-65 Politeknik Statistika STIS
                    </p>
                    <Link 
                        href="#hasil-penelitian" 
                        class="inline-block mt-10 bg-pkl-base-orange text-white font-sub text-lg px-8 py-3 rounded-md shadow-lg hover:bg-opacity-90 transition-all"
                    >
                        Lihat Hasil Penelitian
                    </Link>
                </div>
                <div class="relative h-64 md:h-96">
                    <img :src="heroAssets.gunung" alt="Lanskap Gunung" class="absolute bottom-0 left-0 w-full h-auto opacity-70 object-cover" />
                    <img :src="heroAssets.prambanan" alt="Landmark Prambanan" class="absolute bottom-0 right-0 h-3/4 w-auto" />
                    <img :src="heroAssets.tugu" alt="Landmark Tugu Yogya" class="absolute bottom-0 left-10 h-full w-auto" />
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="font-headline text-4xl text-gray-800 mb-6">Latar Belakang</h2>
                    <p class="font-sans text-gray-600 leading-relaxed mb-4">
                        (Placeholder) Masukkan teks paragraf latar belakang di sini. Jelaskan mengapa topik GIG worker di Yogyakarta penting untuk diteliti oleh mahasiswa Politeknik Statistika STIS.
                    </p>
                    <p class="font-sans text-gray-600 leading-relaxed">
                        (Placeholder) Teks paragraf kedua, mungkin menjelaskan dampak ekonomi atau sosial dari fenomena GIG worker ini.
                    </p>
                </div>
                <div>
                    <img src="/images/assets/ornamen-daun-warna.svg" alt="Ornamen Latar Belakang" class="w-full h-auto opacity-80" />
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-pkl-base-cream bg-opacity-30">
        <div class="container mx-auto px-4 max-w-4xl text-center">
            <h2 class="font-headline text-4xl text-gray-800">Tujuan Penelitian</h2>
            <p class="font-sans text-lg text-gray-600 mt-6 max-w-2xl mx-auto">
                (Placeholder) Masukkan deskripsi singkat mengenai tujuan umum dan khusus dari penelitian PKL 65 ini.
            </p>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto">
                <h2 class="font-headline text-4xl text-gray-800">Riset Utama</h2>
                <p class="font-sans text-lg text-gray-600 mt-6">
                    Fokus penelitian PKL 65 terbagi menjadi tiga riset utama yang saling berkaitan (Riset 1, 2, dan 5).
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 mt-16 max-w-6xl mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 text-center transition-transform hover:scale-105">
                    <span class="inline-block bg-pkl-compliment-yellow text-pkl-base-orange font-headline text-3xl h-16 w-16 rounded-full leading-relaxed shadow-md">1</span>
                    <h3 class="font-sub text-2xl text-gray-900 mt-4">Riset 1</h3>
                    <p class="font-sans text-gray-600 mt-2 h-20">
                        (Placeholder) Deskripsi singkat tentang apa itu Riset 1.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 text-center transition-transform hover:scale-105">
                    <span class="inline-block bg-pkl-compliment-blue text-white font-headline text-3xl h-16 w-16 rounded-full leading-relaxed shadow-md">2</span>
                    <h3 class="font-sub text-2xl text-gray-900 mt-4">Riset 2</h3>
                    <p class="font-sans text-gray-600 mt-2 h-20">
                        (Placeholder) Deskripsi singkat tentang apa itu Riset 2.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 text-center transition-transform hover:scale-105">
                    <span class="inline-block bg-pkl-compliment-green text-white font-headline text-3xl h-16 w-16 rounded-full leading-relaxed shadow-md">5</span>
                    <h3 class="font-sub text-2xl text-gray-900 mt-4">Riset 5</h3>
                    <p class="font-sans text-gray-600 mt-2 h-20">
                        (Placeholder) Deskripsi singkat tentang apa itu Riset 5.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-pkl-base-cream bg-opacity-30">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto">
                <h2 class="font-headline text-4xl text-gray-800">Metodologi</h2>
                <p class="font-sans text-lg text-gray-600 mt-6">
                    Metodologi yang digunakan dalam pelaksanaan Praktik Kerja Lapangan ke-65.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 mt-16 max-w-6xl mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 text-center">
                    <img :src="metodologiAssets.cakupan" alt="Cakupan Penelitian" class="h-40 mx-auto" />
                    <h3 class="font-sub text-2xl text-gray-900 mt-4">Cakupan Penelitian</h3>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 text-center">
                    <img :src="metodologiAssets.sampel" alt="Metode Penarikan Sampel" class="h-40 mx-auto" />
                    <h3 class="font-sub text-2xl text-gray-900 mt-4">Metode Penarikan Sampel</h3>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 text-center">
                    <img :src="metodologiAssets.data" alt="Metode Pengumpulan Data" class="h-40 mx-auto" />
                    <h3 class="font-sub text-2xl text-gray-900 mt-4">Metode Pengumpulan Data</h3>
                </div>
            </div>
        </div>
    </section>
    
    <section id="hasil-penelitian" class="py-24 bg-white">
        <div class="container mx-auto px-4 max-w-4xl text-center">
            <img src="/images/assets/hasil-penelitian.svg" alt="Hasil Penelitian" class="h-48 mx-auto mb-6" />
            <h2 class="font-headline text-4xl text-gray-800">Hasil Penelitian</h2>
            <p class="font-sans text-lg text-gray-600 mt-6 max-w-2xl mx-auto">
                Lihat visualisasi data dan temuan menarik dari hasil penelitian kami secara mendalam.
            </p>
            <Link 
                href="/hasil-diseminasi" 
                class="inline-block mt-10 bg-pkl-compliment-green text-white font-sub text-lg px-8 py-3 rounded-md shadow-lg hover:bg-opacity-90 transition-all"
            >
                Jelajahi Hasil Diseminasi
            </Link>
        </div>
    </section>
</template>