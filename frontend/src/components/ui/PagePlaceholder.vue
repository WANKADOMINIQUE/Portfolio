<script setup>
defineProps({
  title: { type: String, required: true },
  phase: { type: String, default: 'Phase 3' },
})
</script>

<template>
  <section class="container-x py-24">
    <p class="font-mono text-sm text-brand-500">{{ phase }}</p>
    <h1 class="mt-2 font-display text-4xl font-bold">{{ title }}</h1>
    <p class="mt-3 text-ink-500 max-w-xl">
      This page is wired to the API and router. Full UI, animations, and content arrive in {{ phase }}.
    </p>
  </section>
</template>
