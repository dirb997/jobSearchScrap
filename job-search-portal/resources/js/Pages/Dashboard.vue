<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-cyan-300/80">{{ $t('app.name') }}</p>
                    <h2 class="mt-2 text-2xl font-semibold tracking-tight text-white sm:text-3xl">
                        {{ $t('dashboard') }}
                    </h2>
                </div>

                <p class="max-w-xl text-sm leading-6 text-slate-300">
                    {{ $t('you_are_logged_in') }}
                </p>
            </div>
        </template>

        <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
            <div class="space-y-6 rounded-[2rem] border border-white/10 bg-slate-900/80 p-6 shadow-2xl shadow-black/20 backdrop-blur sm:p-8">
                <div class="space-y-3">
                    <p class="text-sm text-slate-400">{{ $t('app.description') }}</p>
                    <h3 class="text-2xl font-semibold text-white">{{ $t('searches.title') }}</h3>
                    <p class="max-w-2xl text-sm leading-6 text-slate-300">
                        {{ $t('savedSearch.title') }}
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                        <p class="text-sm text-slate-400">{{ $t('stats.primaryTables') }}</p>
                        <p class="mt-2 text-2xl font-semibold text-white">{{ $t('stats.primaryTablesValue') }}</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                        <p class="text-sm text-slate-400">{{ $t('stats.searchFocus') }}</p>
                        <p class="mt-2 text-2xl font-semibold text-white">{{ $t('stats.searchFocusValue') }}</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                        <p class="text-sm text-slate-400">{{ $t('stats.stack') }}</p>
                        <p class="mt-2 text-2xl font-semibold text-white">{{ $t('stats.stackValue') }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 shadow-2xl shadow-black/20 backdrop-blur sm:p-8">
                <h3 class="text-lg font-semibold text-white">{{ $t('savedSearch.title') }}</h3>
                <p class="mt-2 text-sm text-slate-300">{{ $t('savedSearch.name') }}</p>
                <div class="mt-6 space-y-3">
                    <div class="flex items-center justify-between text-sm text-slate-300">
                        <span>{{ $t('savedSearch.publishedWithin') }}</span>
                        <span>{{ $t('savedSearch.values.publishedWithin') }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm text-slate-300">
                        <span>{{ $t('savedSearch.experience') }}</span>
                        <span>{{ $t('savedSearch.values.experience') }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm text-slate-300">
                        <span>{{ $t('savedSearch.field') }}</span>
                        <span>{{ $t('savedSearch.values.field') }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm text-slate-300">
                        <span>{{ $t('savedSearch.conditions') }}</span>
                        <span>{{ $t('savedSearch.values.conditions') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
