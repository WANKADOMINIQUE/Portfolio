import { defineStore } from 'pinia'
import { authApi } from '@/services/api'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null,
    initialized: false,
    loading: false,
    error: null,
  }),

  getters: {
    isAuthenticated: (s) => !!s.user,
    isAdmin: (s) => s.user?.role === 'admin',
  },

  actions: {
    async bootstrap() {
      window.addEventListener('auth:unauthenticated', () => {
        this.user = null
      })
      try {
        this.user = await authApi.me()
      } catch {
        this.user = null
      } finally {
        this.initialized = true
      }
    },

    async login(credentials) {
      this.loading = true
      this.error = null
      try {
        const result = await authApi.login(credentials)
        this.user = result.user ?? result
        return this.user
      } catch (err) {
        this.error = err.response?.data?.message || 'Login failed.'
        throw err
      } finally {
        this.loading = false
      }
    },

    async logout() {
      try {
        await authApi.logout()
      } finally {
        this.user = null
      }
    },
  },
})
