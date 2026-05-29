<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-3 text-white shadow-none placeholder:text-slate-500 focus:border-cyan-400 focus:ring-cyan-400/30"
        v-model="model"
        ref="input"
    />
</template>
