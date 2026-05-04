<script setup>
import { reactive } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const route = useRoute()
const router = useRouter()
const auth = useAuthStore()

const form = reactive({ email: '', password: '', remember: true })

async function submit() {
  try {
    await auth.login(form)
    const redirect = route.query.redirect || '/admin'
    router.replace(redirect)
  } catch {
    // error surfaced via auth.error
  }
}
</script>

<template>
  <div class="min-h-screen grid place-items-center bg-ink-50 dark:bg-ink-950 px-4">
    <form @submit.prevent="submit" class="card w-full max-w-md p-8 space-y-6">
      <div>
        <h1 class="font-display text-2xl font-bold">Admin sign in</h1>
        <p class="text-sm text-ink-500 mt-1">Access the portfolio dashboard.</p>
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Email</label>
        <input
          v-model="form.email"
          type="email"
          required
          autocomplete="email"
          class="w-full rounded-xl border border-ink-200 dark:border-ink-700 bg-transparent px-4 py-2.5"
        />
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Password</label>
        <input
          v-model="form.password"
          type="password"
          required
          autocomplete="current-password"
          class="w-full rounded-xl border border-ink-200 dark:border-ink-700 bg-transparent px-4 py-2.5"
        />
      </div>

      <p v-if="auth.error" class="text-sm text-red-500">{{ auth.error }}</p>

      <button type="submit" class="btn-primary w-full" :disabled="auth.loading">
        {{ auth.loading ? 'Signing in…' : 'Sign in' }}
      </button>
    </form>
  </div>
</template>
