import { defineStore } from 'pinia'
import { publicApi } from '@/services/api'

export const usePortfolioStore = defineStore('portfolio', {
  state: () => ({
    profile: null,
    skills: [],
    experiences: [],
    services: [],
    featuredProjects: [],
    testimonials: [],
    recentBlogs: [],
    socialLinks: [],
    homeLoaded: false,
    loading: false,
    error: null,
  }),

  getters: {
    skillsByCategory: (s) =>
      s.skills.reduce((acc, skill) => {
        ;(acc[skill.category] ||= []).push(skill)
        return acc
      }, {}),
  },

  actions: {
    async loadHome() {
      if (this.homeLoaded) return
      this.loading = true
      this.error = null
      try {
        const data = await publicApi.home()
        this.profile = data.profile
        this.skills = data.skills || []
        this.experiences = data.experiences || []
        this.services = data.services || []
        this.featuredProjects = data.featured_projects || []
        this.testimonials = data.testimonials || []
        this.recentBlogs = data.recent_blogs || []
        this.socialLinks = data.social_links || []
        this.homeLoaded = true
      } catch (err) {
        this.error = err.message || 'Failed to load portfolio.'
      } finally {
        this.loading = false
      }
    },
  },
})
