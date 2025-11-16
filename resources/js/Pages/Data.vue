<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import { ref, watch, computed, nextTick } from 'vue'
import Default from '@/Layouts/Default.vue'
import FormSelect from '@/Components/FormSelect.vue'
import FormTextarea from '@/Components/FormTextarea.vue'
import FormInput from '@/Components/FormInput.vue'
import axios from 'axios'
import L from 'leaflet'
import 'leaflet/dist/leaflet.css'
import 'leaflet.heat'
import VueApexCharts from 'vue3-apexcharts'

defineOptions({
    layout: Default
})
</script>

<template>
    
</template>
