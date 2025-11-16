<script setup>
import { Head, Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'
import Auth from '../../Layouts/Auth.vue'
import FormInput from '../../Components/FormInput.vue'

defineOptions({
    layout: Auth
})

const form = useForm({
    email: ''
})

const submit = () => {
    form.post(route('password.request'))
}
</script>

<template>
    <Head title="Lupa password" />

    <main class="min-h-screen flex items-center justify-center bg-auth" role="main">
        <div class="w-[380px] rounded-2xl bg-white shadow-lg overflow-hidden">
            <h1 class="main-heading text-center font-rakkas">Lupa Password</h1>
            <form
                class="mt-6 container-border p-5 space-y-6"
                aria-labelledby="reset-form"
                @submit.prevent="submit">
                <p class="text-[var(--color-text-muted)] text-sm text-center" role="note">
                    Masukan email anda untuk menerima tautan reset password
                </p>

                <FormInput
                    id="email"
                    v-model="form.email"
                    label="Email"
                    name="email"
                    type="email"
                    required
                    autocomplete="email"
                    :error="form.errors.email" />

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full btn-primary"
                    aria-busy="form.processing">
                    {{ form.processing ? 'Please wait...' : 'Send reset email' }}
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-[var(--color-text-muted)]">
                Back to
                <Link :href="route('login')" class="text-sm link" aria-label="Return to login page">
                    login
                </Link>
            </p>
        </div>
    </main>
</template>
