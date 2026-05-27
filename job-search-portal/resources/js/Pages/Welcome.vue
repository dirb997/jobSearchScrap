<script setup>
import { computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import { setLocale } from '../i18n';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const { t, locale } = useI18n();

const filters = computed(() => [
    t('filters.publishedWeek'),
    t('filters.levels'),
    t('filters.expertise'),
    t('filters.conditions'),
]);

const featuredJobs = computed(() => [
    {
        title: t('jobs.frontend.title'),
        company: t('jobs.frontend.company'),
        meta: t('jobs.frontend.meta'),
    },
    {
        title: t('jobs.software.title'),
        company: t('jobs.software.company'),
        meta: t('jobs.software.meta'),
    },
    {
        title: t('jobs.control.title'),
        company: t('jobs.control.company'),
        meta: t('jobs.control.meta'),
    },
]);

function updateLocale(nextLocale) {
    setLocale(nextLocale);
    locale.value = nextLocale;
}
</script>

<template>
    <Head :title="t('app.name')" />

    <div class="min-h-screen bg-slate-950 text-slate-100">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -left-24 top-0 h-72 w-72 rounded-full bg-cyan-500/20 blur-3xl"></div>
            <div class="absolute right-0 top-32 h-96 w-96 rounded-full bg-indigo-500/20 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/2 h-80 w-80 -translate-x-1/2 rounded-full bg-emerald-500/10 blur-3xl"></div>
        </div>

        <div class="relative mx-auto flex min-h-screen w-full max-w-7xl flex-col px-6 py-6 lg:px-10">
            <header class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-cyan-300/80">{{ t('app.name') }}</p>
                    <h1 class="mt-2 text-2xl font-semibold text-white">{{ t('app.tagline') }}</h1>
                </div>

                <div class="flex items-center gap-3">
                    <div class="flex rounded-full border border-white/10 bg-white/5 p-1 text-xs font-medium text-slate-200">
                        <button
                            type="button"
                            class="rounded-full px-3 py-1 transition"
                            :class="locale === 'en' ? 'bg-cyan-400 text-slate-950' : 'text-slate-300'"
                            @click="updateLocale('en')"
                        >
                            {{ t('app.english') }}
                        </button>
                        <button
                            type="button"
                            class="rounded-full px-3 py-1 transition"
                            :class="locale === 'es' ? 'bg-cyan-400 text-slate-950' : 'text-slate-300'"
                            @click="updateLocale('es')"
                        >
                            {{ t('app.spanish') }}
                        </button>
                    </div>

                    <nav class="flex items-center gap-3 text-sm">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-white transition hover:bg-white/10"
                        >
                            {{ t('app.dashboard') }}
                        </Link>
                        <template v-else>
                            <Link
                                v-if="canLogin"
                                :href="route('login')"
                                class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-white transition hover:bg-white/10"
                            >
                                {{ t('app.login') }}
                            </Link>
                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-full bg-cyan-400 px-4 py-2 font-medium text-slate-950 transition hover:bg-cyan-300"
                            >
                                {{ t('app.register') }}
                            </Link>
                        </template>
                    </nav>
                </div>
            </header>

            <main class="flex flex-1 items-center py-16 lg:py-20">
                <div class="grid w-full gap-8 lg:grid-cols-[1.1fr_0.9fr] lg:gap-10">
                    <section class="space-y-8">
                        <div class="space-y-5">
                            <span class="inline-flex rounded-full border border-cyan-400/30 bg-cyan-400/10 px-4 py-1 text-sm text-cyan-200">
                                {{ t('hero.badge') }}
                            </span>

                            <h2 class="max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                                {{ t('hero.headline') }}
                            </h2>

                            <p class="max-w-2xl text-base leading-7 text-slate-300 sm:text-lg">
                                {{ t('app.description') }}
                            </p>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-2">
                            <div
                                v-for="filter in filters"
                                :key="filter"
                                class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4 text-sm text-slate-200 shadow-lg shadow-black/10 backdrop-blur"
                            >
                                {{ filter }}
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-full bg-cyan-400 px-6 py-3 font-medium text-slate-950 transition hover:bg-cyan-300"
                            >
                                {{ t('app.startSearching') }}
                            </Link>
                            <a
                                href="#featured-jobs"
                                class="rounded-full border border-white/15 bg-white/5 px-6 py-3 font-medium text-white transition hover:bg-white/10"
                            >
                                {{ t('app.seeSampleJobs') }}
                            </a>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-3">
                            <div class="rounded-3xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                                <p class="text-sm text-slate-400">{{ t('stats.primaryTables') }}</p>
                                <p class="mt-2 text-2xl font-semibold text-white">{{ t('stats.primaryTablesValue') }}</p>
                                <p class="mt-1 text-sm text-slate-300">{{ t('stats.primaryTablesCopy') }}</p>
                            </div>
                            <div class="rounded-3xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                                <p class="text-sm text-slate-400">{{ t('stats.searchFocus') }}</p>
                                <p class="mt-2 text-2xl font-semibold text-white">{{ t('stats.searchFocusValue') }}</p>
                                <p class="mt-1 text-sm text-slate-300">{{ t('stats.searchFocusCopy') }}</p>
                            </div>
                            <div class="rounded-3xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                                <p class="text-sm text-slate-400">{{ t('stats.stack') }}</p>
                                <p class="mt-2 text-2xl font-semibold text-white">{{ t('stats.stackValue') }}</p>
                                <p class="mt-1 text-sm text-slate-300">{{ t('stats.stackCopy') }}</p>
                            </div>
                        </div>
                    </section>

                    <aside class="space-y-5 rounded-[2rem] border border-white/10 bg-slate-900/80 p-5 shadow-2xl shadow-black/20 backdrop-blur">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-slate-400">{{ t('savedSearch.title') }}</p>
                                <h3 class="text-lg font-semibold text-white">{{ t('savedSearch.name') }}</h3>
                            </div>
                            <span class="rounded-full bg-emerald-400/15 px-3 py-1 text-xs text-emerald-300">{{ t('app.active') }}</span>
                        </div>

                        <div class="space-y-3 rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="flex items-center justify-between text-sm text-slate-300">
                                <span>{{ t('savedSearch.publishedWithin') }}</span>
                                <span>{{ t('savedSearch.values.publishedWithin') }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm text-slate-300">
                                <span>{{ t('savedSearch.experience') }}</span>
                                <span>{{ t('savedSearch.values.experience') }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm text-slate-300">
                                <span>{{ t('savedSearch.field') }}</span>
                                <span>{{ t('savedSearch.values.field') }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm text-slate-300">
                                <span>{{ t('savedSearch.conditions') }}</span>
                                <span>{{ t('savedSearch.values.conditions') }}</span>
                            </div>
                        </div>

                        <div id="featured-jobs" class="space-y-3">
                            <div
                                v-for="job in featuredJobs"
                                :key="job.title"
                                class="rounded-2xl border border-white/10 bg-white/5 p-4 transition hover:bg-white/8"
                            >
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <h4 class="font-medium text-white">{{ job.title }}</h4>
                                        <p class="mt-1 text-sm text-slate-300">{{ job.company }}</p>
                                    </div>
                                    <span class="rounded-full border border-cyan-400/20 bg-cyan-400/10 px-3 py-1 text-xs text-cyan-200">{{ t('jobs.new') }}</span>
                                </div>
                                <p class="mt-3 text-sm text-slate-400">{{ job.meta }}</p>
                            </div>
                        </div>
                    </aside>
                </div>
            </main>
        </div>
    </div>
</template>