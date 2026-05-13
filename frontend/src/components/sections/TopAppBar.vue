<script setup>
import { ref, onMounted, onBeforeUnmount, computed } from 'vue'
import { useRoute, RouterLink } from 'vue-router'

const route = useRoute()
const mobileOpen = ref(false)
const scrolled = ref(false)

const navLinks = [
  { to: '/projects', label: 'Projects' },
  { to: '/about', label: 'About' },
  { to: '/services', label: 'Services' },
  { to: '/blog', label: 'Blog' },
]

const isActive = (path) => route.path === path || route.path.startsWith(path + '/')

const handleScroll = () => {
  scrolled.value = window.scrollY > 8
}

onMounted(() => {
  handleScroll()
  window.addEventListener('scroll', handleScroll, { passive: true })
})
onBeforeUnmount(() => window.removeEventListener('scroll', handleScroll))

const headerClasses = computed(() => [
  'fixed top-0 w-full z-50 backdrop-blur-md transition-all duration-300 ease-in-out',
  'bg-gradient-to-r from-secondary-container/80 via-surface-container-low/85 to-secondary-fixed-dim/70',
  scrolled.value ? 'shadow-[0_4px_24px_rgba(73,97,114,0.12)] border-b border-secondary/30' : 'border-b border-secondary/20 shadow-[0_1px_20px_rgba(73,97,114,0.08)]',
])
</script>

<template>
  <header :class="headerClasses">
    <div class="flex justify-between items-center max-w-container-max mx-auto px-margin-mobile md:px-gutter h-20">
      <RouterLink to="/" class="flex items-center gap-stack-sm group">
        <span class="material-symbols-outlined text-primary transition-transform group-hover:rotate-6">code_blocks</span>
        <span class="font-display text-display-mobile tracking-tighter text-primary uppercase">WANKA DOMINIQUE</span>
      </RouterLink>

      <nav class="hidden md:flex items-center gap-stack-md">
        <RouterLink
          v-for="link in navLinks"
          :key="link.to"
          :to="link.to"
          class="font-label-md text-label-md hover:opacity-70 transition-opacity"
          :class="isActive(link.to) ? 'text-primary font-bold' : 'text-secondary'"
        >{{ link.label }}</RouterLink>
      </nav>

      <div class="flex items-center gap-stack-sm">
        <RouterLink
          to="/contact"
          class="hidden md:inline-flex font-label-md text-label-md px-6 py-2 bg-primary text-on-primary rounded-full hover:opacity-90 transition-all"
        >Contact</RouterLink>
        <button
          type="button"
          class="md:hidden w-10 h-10 rounded-full flex items-center justify-center text-primary hover:bg-surface-container-high transition-colors"
          aria-label="Toggle navigation"
          @click="mobileOpen = !mobileOpen"
        >
          <span class="material-symbols-outlined">{{ mobileOpen ? 'close' : 'menu' }}</span>
        </button>
      </div>
    </div>

    <transition
      enter-active-class="transition duration-200 ease-out"
      enter-from-class="opacity-0 -translate-y-2"
      enter-to-class="opacity-100 translate-y-0"
      leave-active-class="transition duration-150 ease-in"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >
      <nav
        v-if="mobileOpen"
        class="md:hidden bg-surface-container-lowest/95 backdrop-blur-md border-t border-outline-variant/40 px-margin-mobile py-stack-md flex flex-col gap-stack-sm"
      >
        <RouterLink
          v-for="link in navLinks"
          :key="link.to"
          :to="link.to"
          class="font-label-md text-label-md py-2"
          :class="isActive(link.to) ? 'text-primary font-bold' : 'text-secondary'"
          @click="mobileOpen = false"
        >{{ link.label }}</RouterLink>
        <RouterLink
          to="/contact"
          class="font-label-md text-label-md px-6 py-2 bg-primary text-on-primary rounded-full text-center"
          @click="mobileOpen = false"
        >Contact</RouterLink>
      </nav>
    </transition>
  </header>
</template>
