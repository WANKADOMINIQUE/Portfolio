<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
  <section class="pt-32 pb-section-padding">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter text-center">
      <p class="font-label-md text-label-md text-secondary uppercase tracking-widest">404</p>
      <h1 class="mt-2 font-display text-display-mobile md:text-display text-primary">Page not found</h1>
      <p class="mt-stack-sm font-body-lg text-body-lg text-on-surface-variant max-w-xl mx-auto">
        The page you're looking for doesn't exist. It may have been moved, or you might have followed an old link.
      </p>
      <div class="mt-stack-lg flex flex-wrap justify-center gap-stack-sm">
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
