import { defineStore } from 'pinia'

const STORAGE_KEY = 'portfolio.theme'

export const useThemeStore = defineStore('theme', {
  state: () => ({
    mode: 'system', // 'light' | 'dark' | 'system'
  }),

  getters: {
    isDark: (s) => {
      if (s.mode === 'system') {
        return window.matchMedia('(prefers-color-scheme: dark)').matches
      }
      return s.mode === 'dark'
    },
  },

  actions: {
    init() {
      const saved = localStorage.getItem(STORAGE_KEY)
      this.mode = saved || 'system'
      this.apply()

      window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        if (this.mode === 'system') this.apply()
      })
    },

    apply() {
      document.documentElement.classList.toggle('dark', this.isDark)
    },

    set(mode) {
      this.mode = mode
      localStorage.setItem(STORAGE_KEY, mode)
      this.apply()
    },

    toggle() {
      this.set(this.isDark ? 'light' : 'dark')
    },
  },
})
