<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
    ? 'block w-full border-l-4 border-cyan-400 bg-white/10 py-2 pe-4 ps-3 text-start text-base font-medium text-white transition duration-150 ease-in-out focus:outline-none focus:bg-white/10 focus:text-white focus:border-cyan-300'
    : 'block w-full border-l-4 border-transparent py-2 pe-4 ps-3 text-start text-base font-medium text-slate-300 transition duration-150 ease-in-out hover:border-cyan-400/40 hover:bg-white/5 hover:text-white focus:outline-none focus:bg-white/5 focus:text-white focus:border-cyan-400/40',
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
