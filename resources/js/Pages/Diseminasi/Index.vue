<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import { ref, watch } from 'vue'
import Default from '@/Layouts/Default.vue'
import FormSelect from '@/Components/FormSelect.vue'
import FormInput from '@/Components/FormInput.vue'
import FormTextarea from '@/Components/FormTextarea.vue'
import axios from 'axios'

defineOptions({
    layout: Default
})

const props = defineProps({
    risets: Array,
    visualizationTypes: Array,
})

const form = useForm({
    riset_id: null,
    topic_id: null,
    visualization_type_id: null,
    title: '',
    interpretation: '',
    chart_data: null,
    chart_options: null,
    data_source: '',
    is_published: false,
})

const topics = ref([])
const loadingTopics = ref(false)
const showPreview = ref(false)
const previewData = ref(null)

// Watch for riset selection changes
watch(() => form.riset_id, async (newRisetId) => {
    topics.value = []
    form.topic_id = null
    
    if (newRisetId) {
        loadingTopics.value = true
        try {
            const response = await axios.get(route('diseminasi.topics'), {
                params: { riset_id: newRisetId }
            })
            topics.value = response.data.topics
        } catch (error) {
            console.error('Failed to load topics:', error)
        } finally {
            loadingTopics.value = false
        }
    }
})

const risetOptions = props.risets.map(r => ({
    value: r.id,
    label: r.name
}))

const topicOptions = ref([])
watch(topics, (newTopics) => {
    topicOptions.value = newTopics.map(t => ({
        value: t.id,
        label: t.name
    }))
})

const visualizationTypeOptions = props.visualizationTypes.map(vt => ({
    value: vt.id,
    label: vt.type_name
}))

const handleSubmit = () => {
    form.post(route('diseminasi.store'), {
        onSuccess: () => {
            form.reset()
            topics.value = []
        }
    })
}

const handleReset = () => {
    form.reset()
    topics.value = []
    showPreview.value = false
    previewData.value = null
}

const handlePreview = async () => {
    if (!form.riset_id || !form.topic_id || !form.visualization_type_id || !form.title || !form.interpretation) {
        alert('Mohon lengkapi semua field yang wajib diisi')
        return
    }

    try {
        const response = await axios.post(route('diseminasi.preview'), {
            riset_id: form.riset_id,
            topic_id: form.topic_id,
            visualization_type_id: form.visualization_type_id,
            title: form.title,
            interpretation: form.interpretation,
            chart_data: form.chart_data,
            chart_options: form.chart_options,
        })
        
        previewData.value = response.data.preview
        showPreview.value = true
    } catch (error) {
        console.error('Preview failed:', error)
        alert('Gagal membuat preview')
    }
}

const closePreview = () => {
    showPreview.value = false
}
</script>

<template>
    <Head title="Input Data Riset" />

    <div class="min-h-screen bg-[var(--color-background)]">
        <div class="max-w-6xl mx-auto sm:p-4">
            <h1 class="font-rakkas mt-3 text-[40px] tracking-wide">Kelola Diseminasi</h1>
            <p class="text-[16px]">Kelola Data dan Interpretasi untuk Diseminasi</p>
        </div>
        
        <main class="max-w-6xl mx-auto p-4 sm:p-4">
            <div class="bg-[var(--color-surface)] rounded-lg shadow-md p-6 border border-[var(--color-border)]">
                <div class="mb-6">
                    <h2 class="text-[20px] text-[var(--color-text)]">
                        Form Input Data
                    </h2>
                    <p class="text-[16px]">Kelola Data dan Interpretasi untuk Diseminasi</p>
                </div>

                <form @submit.prevent="handleSubmit">
                    <div class="mb-7">
                        <FormSelect 
                            label="Pilih Riset" 
                            v-model="form.riset_id"
                            :options="risetOptions"
                            :error="form.errors.riset_id"
                            placeholder="-- Pilih Riset --"
                            required 
                        />
                    </div>

                    <div class="mb-7">
                        <FormSelect 
                            label="Pilih Sub Topik" 
                            v-model="form.topic_id"
                            :options="topicOptions"
                            :error="form.errors.topic_id"
                            :disabled="!form.riset_id || loadingTopics"
                            :placeholder="loadingTopics ? 'Loading...' : '-- Pilih Sub Topik --'"
                            required 
                        />
                    </div>

                    <div class="mb-7">
                        <FormSelect 
                            label="Pilih Jenis Grafik" 
                            v-model="form.visualization_type_id"
                            :options="visualizationTypeOptions"
                            :error="form.errors.visualization_type_id"
                            placeholder="-- Pilih Jenis Grafik --"
                            required 
                        />
                    </div>

                    <div class="mb-7">
                        <FormInput 
                            label="Judul" 
                            v-model="form.title"
                            :error="form.errors.title"
                            placeholder="Masukkan judul visualisasi" 
                            required 
                        />
                    </div>

                    <div class="mb-7">
                        <FormTextarea
                            label="Interpretasi"
                            v-model="form.interpretation"
                            :error="form.errors.interpretation"
                            placeholder="Masukkan interpretasi visualisasi"
                            :rows="4"
                            required
                        />
                    </div>

                    <div class="mb-7">
                        <FormInput 
                            label="Sumber Data" 
                            v-model="form.data_source"
                            :error="form.errors.data_source"
                            placeholder="Masukkan sumber data (opsional)"
                        />
                    </div>

                    <div class="mb-7">
                        <label class="flex items-center">
                            <input 
                                type="checkbox" 
                                v-model="form.is_published"
                                class="mr-2 rounded border-gray-300"
                            />
                            <span class="text-sm">Publikasikan sekarang</span>
                        </label>
                    </div>

                    <div class="flex justify-end gap-3">
                        <button 
                            type="button" 
                            @click="handleReset"
                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition"
                        >
                            Reset
                        </button>
                        <button 
                            type="button"
                            @click="handlePreview"
                            class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition"
                        >
                            Preview
                        </button>
                        <button 
                            type="submit"
                            :disabled="form.processing"
                            class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition disabled:opacity-50"
                        >
                            {{ form.processing ? 'Menyimpan...' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>
        </main>

        <!-- Preview Modal -->
        <div 
            v-if="showPreview && previewData"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
            @click.self="closePreview"
        >
            <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-2xl font-bold">Preview Visualisasi</h3>
                        <button 
                            @click="closePreview"
                            class="text-gray-500 hover:text-gray-700 text-2xl"
                        >
                            &times;
                        </button>
                    </div>
                    
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-600">Riset</p>
                            <p class="font-semibold">{{ previewData.riset_name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Sub Topik</p>
                            <p class="font-semibold">{{ previewData.topic_name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Jenis Visualisasi</p>
                            <p class="font-semibold">{{ previewData.visualization_type }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Judul</p>
                            <p class="text-xl font-bold">{{ previewData.title }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Interpretasi</p>
                            <p class="text-justify">{{ previewData.interpretation }}</p>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button 
                            @click="closePreview"
                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition"
                        >
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>