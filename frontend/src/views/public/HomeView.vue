<script setup>
import { onMounted } from 'vue'
import { storeToRefs } from 'pinia'
import { usePortfolioStore } from '@/stores/portfolio'
import { useTyping } from '@/composables/useTyping'
import { useSeo } from '@/composables/useSeo'

const store = usePortfolioStore()
const { profile, loading } = storeToRefs(store)

const fallbackPhrases = [
  'Full Stack Developer',
  'Software Engineer',
  'Problem Solver',
  'Technical Support Specialist',
]

const { text } = useTyping(
  () => profile.value?.typing_phrases?.length ? profile.value.typing_phrases : fallbackPhrases,
)

useSeo(() => ({
  title: profile.value?.full_name
    ? `${profile.value.full_name} · ${profile.value.headline}`
    : 'Software Engineer',
  description: profile.value?.bio_short || 'Full Stack Developer · Software Engineer · Technical Support Specialist',
}))

onMounted(() => store.loadHome())
</script>

<template>
  <section class="relative overflow-hidden">
    <div class="container-x py-24 md:py-32">
      <div class="max-w-3xl">
        <p class="font-mono text-sm text-brand-600 dark:text-brand-400 mb-4">
          Hello, my name is
        </p>
        <h1 class="font-display text-5xl md:text-7xl font-bold tracking-tight text-balance">
          <template v-if="loading && !profile">
            <span class="skeleton inline-block w-3/4 h-12" />
          </template>
          <template v-else>
            {{ profile?.full_name || 'Your Name' }}
          </template>
        </h1>
        <h2 class="mt-4 text-2xl md:text-4xl font-semibold text-ink-600 dark:text-ink-300">
          I'm a
          <span class="gradient-text">{{ text }}</span>
          <span class="animate-blink">|</span>
        </h2>
        <p class="mt-6 max-w-2xl text-lg text-ink-600 dark:text-ink-400">
          {{ profile?.bio_short || 'Building modern, scalable web applications with Vue, Laravel, and a love for clean architecture.' }}
        </p>

        <div class="mt-10 flex flex-wrap gap-4">
          <RouterLink to="/projects" class="btn-primary">View my work</RouterLink>
          <RouterLink to="/contact" class="btn-outline">Get in touch</RouterLink>
          <a
            v-if="profile?.cv_path"
            :href="profile.cv_path"
            class="btn-ghost"
            download
          >
            Download CV
          </a>
        </div>
      </div>
    </div>

    <p class="container-x pb-16 text-sm text-ink-500">
      Phase 1 scaffold loaded. Full hero, sections, and admin UI arrive in Phase 3 & 4.
    </p>
  </section>
</template>
