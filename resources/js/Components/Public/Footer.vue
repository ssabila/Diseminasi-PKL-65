<script setup>
// Pastikan kamu sudah rename '1.svg' menjadi 'pattern-batik.svg'
const batikPatternUrl = '/images/assets/pattern-batik.svg'; 
const logoUrl = '/images/assets/LOGO-PKL_REV8.png'; //
</script>

<template>
    <footer 
        class="bg-pkl-base-orange text-white p-10 relative overflow-hidden"
    >
        <div 
            class="absolute inset-0 opacity-20"
            :style="{ 
                backgroundImage: `url(${batikPatternUrl})`, 
                backgroundSize: '300px', 
                backgroundRepeat: 'repeat' 
            }"
        ></div>

        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
            <div>
                <img :src="logoUrl" alt="Logo PKL 65" class="h-16 w-auto mb-4 bg-white rounded-full p-1">
                <p class="font-sans text-sm">
                    "sinergi ekonomi lingkungan, digital, dan kreatif dalam mendorong pembangunan berkelanjutan pada usaha mikro dan kecil."
                </p>
            </div>
            
            <div>
                <h4 class="font-sub text-lg mb-3">Tautan Cepat</h4>
                <ul class="space-y-2 font-sans text-sm">
                    <li><a href="/" class="hover:underline">Beranda</a></li>
                    <li><a href="/hasil-diseminasi" class="hover:underline">Hasil Diseminasi</a></li>
                    <li><a href="/dokumen" class="hover:underline">Dokumen</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-sub text-lg mb-3">Hubungi Kami</h4>
                <p class="font-sans text-sm">
                    Politeknik Statistika STIS<br>
                    Jl. Otto Iskandardinata No.64C, Jakarta Timur
                </p>
            </div>
        </div>
        
        <div class="border-t border-white border-opacity-30 mt-8 pt-6 text-center relative z-10">
            <p class="font-sans text-xs">
                &copy; {{ new Date().getFullYear() }} PKL 65 Politeknik Statistika STIS. All rights reserved.
            </p>
        </div>
    </footer>
</template>