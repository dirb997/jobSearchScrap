<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="relative min-h-screen overflow-hidden bg-slate-950 text-slate-100">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -left-24 top-0 h-72 w-72 rounded-full bg-cyan-500/20 blur-3xl"></div>
            <div class="absolute right-0 top-32 h-96 w-96 rounded-full bg-indigo-500/20 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/2 h-80 w-80 -translate-x-1/2 rounded-full bg-emerald-500/10 blur-3xl"></div>
        </div>

        <div class="relative flex min-h-screen flex-col">
            <nav class="relative z-50 border-b border-white/10 bg-slate-950/80 backdrop-blur">
                <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-10">
                    <div class="flex items-center gap-6">
                        <Link :href="route('dashboard')" class="inline-flex items-center gap-3">
                            <span class="flex h-11 w-11 items-center justify-center rounded-2xl border border-cyan-400/30 bg-gradient-to-br from-cyan-400/15 to-indigo-400/10 shadow-lg shadow-cyan-500/10 ring-1 ring-inset ring-white/5">
                                <ApplicationLogo class="h-5 w-5 fill-current text-cyan-200 drop-shadow-[0_0_10px_rgba(34,211,238,0.45)]" />
                            </span>
                            <span class="hidden text-sm font-semibold uppercase tracking-[0.3em] text-cyan-200/90 sm:inline">
                                {{ $t('app.name') }}
                            </span>
                        </Link>

                        <div class="hidden sm:flex sm:items-center sm:gap-2">
                            <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                {{ $t('dashboard') }}
                            </NavLink>
                            <NavLink :href="route('profile.edit')" :active="route().current('profile.edit')">
                                {{ $t('profile') }}
                            </NavLink>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center">
                        <div class="relative ms-3">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-full border border-white/10 bg-white/5 shadow-sm shadow-black/20">
                                        <button
                                            type="button"
                                            class="inline-flex items-center rounded-full px-4 py-2 text-sm font-medium leading-4 text-slate-100 transition duration-150 ease-in-out hover:bg-white/10 hover:text-white focus:outline-none"
                                        >
                                            {{ $page.props.auth.user.name }}

                                            <svg
                                                class="-me-0.5 ms-2 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                aria-hidden="true"
                                            >
                                                <path
                                                    class="text-slate-400"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')">
                                        {{ $t('profile') }}
                                    </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        {{ $t('logout') }}
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>

                    <div class="-me-2 flex items-center sm:hidden">
                        <button
                            @click="showingNavigationDropdown = !showingNavigationDropdown"
                            class="inline-flex items-center justify-center rounded-full border border-white/10 bg-white/5 p-2 text-slate-300 transition duration-150 ease-in-out hover:bg-white/10 hover:text-white focus:outline-none"
                        >
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path
                                    :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex': !showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{
                                        hidden: !showingNavigationDropdown,
                                        'inline-flex': showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>

                <div
                    :class="{
                        block: showingNavigationDropdown,
                        hidden: !showingNavigationDropdown,
                    }"
                    class="border-t border-white/10 bg-slate-950/95 sm:hidden"
                >
                    <div class="space-y-1 px-4 pb-4 pt-3">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            {{ $t('dashboard') }}
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('profile.edit')" :active="route().current('profile.edit')">
                            {{ $t('profile') }}
                        </ResponsiveNavLink>
                    </div>

                    <div class="border-t border-white/10 px-4 pb-4 pt-4">
                        <div class="text-base font-medium text-white">
                            {{ $page.props.auth.user.name }}
                        </div>
                        <div class="text-sm font-medium text-slate-400">
                            {{ $page.props.auth.user.email }}
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')">
                                {{ $t('profile') }}
                            </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                {{ $t('logout') }}
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <header v-if="$slots.header" class="relative z-10 border-b border-white/10 bg-white/5 backdrop-blur">
                <div class="mx-auto max-w-7xl px-6 py-6 sm:px-6 lg:px-10">
                    <slot name="header" />
                </div>
            </header>

            <main class="relative z-0 flex-1 px-6 py-8 lg:px-10 lg:py-10">
                <div class="mx-auto max-w-7xl">
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>
