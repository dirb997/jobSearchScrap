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
    ? 'inline-flex items-center border-b-2 border-cyan-400 px-1 pt-1 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out focus:outline-none focus:border-cyan-300'
    : 'inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium leading-5 text-slate-400 transition duration-150 ease-in-out hover:border-cyan-400/40 hover:text-slate-100 focus:outline-none focus:text-white focus:border-cyan-400/40',
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
