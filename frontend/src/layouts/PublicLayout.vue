<script setup>
import { RouterView } from 'vue-router'
import TopAppBar from '@/components/sections/TopAppBar.vue'
import SiteFooter from '@/components/sections/SiteFooter.vue'
</script>

<template>
  <div id="app-root" class="min-h-screen flex flex-col bg-surface text-on-background">
    <TopAppBar />
    <RouterView v-slot="{ Component, route }" class="flex-1">
      <transition name="page" mode="out-in">
        <component :is="Component" :key="route.fullPath" />
      </transition>
    </RouterView>
    <SiteFooter />
  </div>
</template>

<style scoped>
.page-enter-active,
.page-leave-active {
  transition: opacity 200ms ease, transform 200ms ease;
}
.page-enter-from {
  opacity: 0;
  transform: translateY(8px);
}
.page-leave-to {
  opacity: 0;
  transform: translateY(-8px);
}
</style>
