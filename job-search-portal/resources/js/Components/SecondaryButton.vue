<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center rounded-full border border-white/10 bg-white/5 px-5 py-3 text-sm font-semibold text-slate-200 shadow-sm transition duration-150 ease-in-out hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-cyan-400/30 disabled:opacity-25"
    >
        <slot />
    </button>
</template>
