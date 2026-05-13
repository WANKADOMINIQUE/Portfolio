<script setup>
defineProps({
  title: { type: String, required: true },
  phase: { type: String, default: 'Coming soon' },
})
</script>

<template>
  <section class="pt-32 pb-section-padding">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
      <p class="font-label-md text-label-md text-secondary uppercase tracking-widest">{{ phase }}</p>
      <h1 class="mt-2 font-display text-display-mobile md:text-display text-primary">{{ title }}</h1>
      <p class="mt-stack-sm font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
        This page is wired to the router and waiting on content. Check back soon — or
        <RouterLink to="/contact" class="text-primary underline underline-offset-4 hover:opacity-70 transition-opacity">get in touch</RouterLink>
        if you have something in mind.
      </p>
      <div class="mt-stack-lg flex flex-wrap gap-stack-sm">
        <RouterLink
          to="/"
          class="bg-primary text-on-primary font-label-md text-label-md px-8 py-4 rounded-lg natural-shadow hover:bg-on-surface transition-all flex items-center gap-2 group"
        >
          <span class="material-symbols-outlined transition-transform group-hover:-translate-x-1">arrow_back</span>
          Back home
        </RouterLink>
        <RouterLink
          to="/projects"
          class="border border-outline-variant text-primary font-label-md text-label-md px-8 py-4 rounded-lg hover:bg-surface-container transition-all"
        >
          See projects
        </RouterLink>
      </div>
    </div>
  </section>
</template>
