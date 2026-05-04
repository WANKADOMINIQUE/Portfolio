<script setup>
import { RouterView } from 'vue-router'
</script>

<template>
  <div class="min-h-full flex flex-col">
    <!-- Header & Footer will be implemented in Phase 3 -->
    <main class="flex-1">
      <RouterView />
    </main>
  </div>
</template>
