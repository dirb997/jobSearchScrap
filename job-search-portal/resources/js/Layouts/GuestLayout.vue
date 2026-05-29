<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();
</script>

<template>
    <div class="relative min-h-screen overflow-hidden bg-slate-950 text-slate-100">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -left-24 top-0 h-72 w-72 rounded-full bg-cyan-500/20 blur-3xl"></div>
            <div class="absolute right-0 top-32 h-96 w-96 rounded-full bg-indigo-500/20 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/2 h-80 w-80 -translate-x-1/2 rounded-full bg-emerald-500/10 blur-3xl"></div>
        </div>

        <div class="relative mx-auto grid min-h-screen w-full max-w-7xl items-center gap-10 px-6 py-10 lg:grid-cols-[1.05fr_0.95fr] lg:px-10">
            <section class="space-y-8">
                <Link href="/" class="inline-flex items-center gap-3">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl border border-cyan-400/20 bg-cyan-400/10">
                        <ApplicationLogo class="h-6 w-6 fill-current text-cyan-300" />
                    </span>
                    <span class="text-lg font-semibold tracking-wide text-white">{{ t('app.name') }}</span>
                </Link>

                <div class="space-y-5">
                    <p class="text-sm uppercase tracking-[0.3em] text-cyan-300/80">{{ t('auth.layout.kicker') }}</p>
                    <h1 class="max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                        {{ t('auth.layout.headline') }}
                    </h1>
                    <p class="max-w-2xl text-lg leading-8 text-slate-300">
                        {{ t('auth.layout.copy') }}
                    </p>
                </div>

                <div class="grid gap-3 sm:grid-cols-3">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                        <p class="text-sm text-slate-400">{{ t('auth.layout.cards.saved.title') }}</p>
                        <p class="mt-2 text-2xl font-semibold text-white">{{ t('auth.layout.cards.saved.value') }}</p>
                        <p class="mt-1 text-sm text-slate-300">{{ t('auth.layout.cards.saved.copy') }}</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                        <p class="text-sm text-slate-400">{{ t('auth.layout.cards.tracking.title') }}</p>
                        <p class="mt-2 text-2xl font-semibold text-white">{{ t('auth.layout.cards.tracking.value') }}</p>
                        <p class="mt-1 text-sm text-slate-300">{{ t('auth.layout.cards.tracking.copy') }}</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                        <p class="text-sm text-slate-400">{{ t('auth.layout.cards.stack.title') }}</p>
                        <p class="mt-2 text-2xl font-semibold text-white">{{ t('auth.layout.cards.stack.value') }}</p>
                        <p class="mt-1 text-sm text-slate-300">{{ t('auth.layout.cards.stack.copy') }}</p>
                    </div>
                </div>
            </section>

            <section class="w-full lg:justify-self-end lg:max-w-md">
                <div class="rounded-[2rem] border border-white/10 bg-slate-900/80 p-6 shadow-2xl shadow-black/20 backdrop-blur sm:p-8">
                    <slot />
                </div>
            </section>
        </div>
    </div>
</template>
