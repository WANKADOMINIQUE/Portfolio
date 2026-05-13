<script setup>
import { computed } from 'vue'
import { RouterLink } from 'vue-router'

const year = computed(() => new Date().getFullYear())

const whatsappUrl = computed(() => {
  const greeting = encodeURIComponent('Hi Wanka, I came across your portfolio.')
  return `https://wa.me/237673746914?text=${greeting}`
})
</script>

<template>
  <footer class="relative w-full py-stack-lg bg-gradient-to-br from-primary via-on-secondary-fixed-variant to-secondary text-on-primary overflow-hidden">
    <!-- Decorative accents -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-secondary-fixed-dim/50 to-transparent"></div>
    <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-secondary/20 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -left-32 w-96 h-96 rounded-full bg-primary/40 blur-3xl pointer-events-none"></div>

    <div class="relative flex flex-col md:flex-row justify-between items-center max-w-container-max mx-auto px-margin-mobile md:px-gutter gap-stack-md">
      <div class="flex flex-col items-center md:items-start gap-2">
        <div class="flex items-center gap-stack-sm">
          <span class="material-symbols-outlined text-secondary-fixed-dim">code_blocks</span>
          <span class="font-display text-label-md uppercase tracking-widest text-on-primary">WANKA DOMINIQUE FONGWA</span>
        </div>
        <p class="font-body-md text-body-md text-primary-fixed-dim/80">© {{ year }} Wanka Dominique Fongwa · Built with care in Yaoundé.</p>
      </div>

      <div class="grid grid-cols-3 gap-x-stack-md gap-y-stack-sm justify-items-start">
        <a
          class="font-label-md text-label-md text-secondary-fixed-dim hover:text-on-primary transition-colors duration-200 flex items-center gap-2"
          href="mailto:wankadominique4@gmail.com"
        >
          <span class="material-symbols-outlined text-[18px]">mail</span>
          Email
        </a>
        <a
          class="font-label-md text-label-md text-secondary-fixed-dim hover:text-on-primary transition-colors duration-200 flex items-center gap-2"
          :href="whatsappUrl"
          target="_blank"
          rel="noopener noreferrer"
        >
          <span class="material-symbols-outlined text-[18px]">chat</span>
          WhatsApp
        </a>
        <a
          class="font-label-md text-label-md text-secondary-fixed-dim hover:text-on-primary transition-colors duration-200 flex items-center gap-2"
          href="https://www.linkedin.com/in/wanka-dominique-b0a4b7259"
          target="_blank"
          rel="noopener noreferrer"
        >
          <span class="material-symbols-outlined text-[18px]">work</span>
          LinkedIn
        </a>
        <a
          class="font-label-md text-label-md text-secondary-fixed-dim hover:text-on-primary transition-colors duration-200 flex items-center gap-2"
          href="tel:+237673746914"
        >
          <span class="material-symbols-outlined text-[18px]">call</span>
          Call
        </a>
        <RouterLink
          class="font-label-md text-label-md text-secondary-fixed-dim hover:text-on-primary transition-colors duration-200 flex items-center gap-2"
          to="/projects"
        >
          <span class="material-symbols-outlined text-[18px]">folder_open</span>
          Projects
        </RouterLink>
        <RouterLink
          class="font-label-md text-label-md text-secondary-fixed-dim hover:text-on-primary transition-colors duration-200 flex items-center gap-2"
          to="/about"
        >
          <span class="material-symbols-outlined text-[18px]">person</span>
          About
        </RouterLink>
      </div>
    </div>
  </footer>
</template>
