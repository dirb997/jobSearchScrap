<script setup>
import InputError from '@/Components/InputError.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head :title="t('auth.register.headTitle')" />

        <div class="mb-8 space-y-2">
            <p class="text-sm font-medium uppercase tracking-[0.25em] text-cyan-300/80">
                {{ t('auth.register.kicker') }}
            </p>
            <h2 class="text-3xl font-semibold text-white">{{ t('auth.register.title') }}</h2>
            <p class="text-sm leading-6 text-slate-300">
                {{ t('auth.register.copy') }}
            </p>
        </div>

        <form @submit.prevent="submit" class="space-y-5">
            <div class="space-y-2">
                <label for="name" class="text-sm font-medium text-slate-300">{{ t('auth.register.name') }}</label>

                <TextInput
                    id="name"
                    type="text"
                    class="block w-full rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-3 text-white shadow-none placeholder:text-slate-500 focus:border-cyan-400 focus:ring-cyan-400/30"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError :message="form.errors.name" />
            </div>

            <div class="space-y-2">
                <label for="email" class="text-sm font-medium text-slate-300">{{ t('auth.register.email') }}</label>

                <TextInput
                    id="email"
                    type="email"
                    class="block w-full rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-3 text-white shadow-none placeholder:text-slate-500 focus:border-cyan-400 focus:ring-cyan-400/30"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError :message="form.errors.email" />
            </div>

            <div class="space-y-2">
                <label for="password" class="text-sm font-medium text-slate-300">{{ t('auth.register.password') }}</label>

                <TextInput
                    id="password"
                    type="password"
                    class="block w-full rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-3 text-white shadow-none placeholder:text-slate-500 focus:border-cyan-400 focus:ring-cyan-400/30"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError :message="form.errors.password" />
            </div>

            <div class="space-y-2">
                <label for="password_confirmation" class="text-sm font-medium text-slate-300">{{ t('auth.register.passwordConfirmation') }}</label>

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="block w-full rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-3 text-white shadow-none placeholder:text-slate-500 focus:border-cyan-400 focus:ring-cyan-400/30"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-between gap-4 pt-2">
                <Link :href="route('login')" class="text-sm text-slate-300 transition hover:text-white">
                    {{ t('auth.register.loginLink') }}
                </Link>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="inline-flex items-center justify-center rounded-full bg-cyan-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300 disabled:cursor-not-allowed disabled:opacity-50"
                >
                    {{ t('auth.register.submit') }}
                </button>
            </div>
        </form>
    </GuestLayout>
</template>
