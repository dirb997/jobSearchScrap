<script setup>
import InputError from '@/Components/InputError.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head :title="t('auth.login.headTitle')" />

        <div class="mb-8 space-y-2">
            <p class="text-sm font-medium uppercase tracking-[0.25em] text-cyan-300/80">
                {{ t('auth.login.kicker') }}
            </p>
            <h2 class="text-3xl font-semibold text-white">{{ t('auth.login.title') }}</h2>
            <p class="text-sm leading-6 text-slate-300">
                {{ t('auth.login.copy') }}
            </p>
        </div>

        <div v-if="status" class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-200">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="space-y-5">
            <div class="space-y-2">
                <label for="email" class="text-sm font-medium text-slate-300">{{ t('auth.login.email') }}</label>

                <TextInput
                    id="email"
                    type="email"
                    class="block w-full rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-3 text-white shadow-none placeholder:text-slate-500 focus:border-cyan-400 focus:ring-cyan-400/30"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError :message="form.errors.email" />
            </div>

            <div class="space-y-2">
                <label for="password" class="text-sm font-medium text-slate-300">{{ t('auth.login.password') }}</label>

                <TextInput
                    id="password"
                    type="password"
                    class="block w-full rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-3 text-white shadow-none placeholder:text-slate-500 focus:border-cyan-400 focus:ring-cyan-400/30"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError :message="form.errors.password" />
            </div>

            <div class="flex items-center justify-between gap-4">
                <label class="flex items-center gap-3 text-sm text-slate-300">
                    <input
                        name="remember"
                        type="checkbox"
                        v-model="form.remember"
                        class="h-4 w-4 rounded border-white/20 bg-slate-900 text-cyan-400 focus:ring-cyan-400/30"
                    />
                    <span>{{ t('auth.login.remember') }}</span>
                </label>

                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="text-sm text-cyan-300 transition hover:text-cyan-200"
                >
                    {{ t('auth.login.forgot') }}
                </Link>
            </div>

            <div class="flex items-center justify-between gap-4 pt-2">
                <Link :href="route('register')" class="text-sm text-slate-300 transition hover:text-white">
                    {{ t('auth.login.registerLink') }}
                </Link>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="inline-flex items-center justify-center rounded-full bg-cyan-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300 disabled:cursor-not-allowed disabled:opacity-50"
                >
                    {{ t('auth.login.submit') }}
                </button>
            </div>
        </form>
    </GuestLayout>
</template>
