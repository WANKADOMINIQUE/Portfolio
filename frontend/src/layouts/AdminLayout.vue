<script setup>
import { RouterView } from 'vue-router'
</script>

<template>
  <div class="min-h-full bg-ink-50 dark:bg-ink-950 font-sans">
    <!-- Sidebar & Topbar will be implemented in Phase 4 -->
    <main class="container-x py-8">
      <RouterView />
    </main>
  </div>
</template>
