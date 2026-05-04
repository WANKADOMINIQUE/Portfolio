import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const PublicLayout = () => import('@/layouts/PublicLayout.vue')
const AdminLayout  = () => import('@/layouts/AdminLayout.vue')

const routes = [
  {
    path: '/',
    component: PublicLayout,
    children: [
      { path: '',           name: 'home',          component: () => import('@/views/public/HomeView.vue'),         meta: { title: 'Home' } },
      { path: 'projects',   name: 'projects',      component: () => import('@/views/public/ProjectsView.vue'),     meta: { title: 'Projects' } },
      { path: 'projects/:slug', name: 'project',   component: () => import('@/views/public/ProjectDetailView.vue'), meta: { title: 'Project' } },
      { path: 'blog',       name: 'blog',          component: () => import('@/views/public/BlogView.vue'),         meta: { title: 'Blog' } },
      { path: 'blog/:slug', name: 'blog-detail',   component: () => import('@/views/public/BlogDetailView.vue'),   meta: { title: 'Article' } },
      { path: 'services',   name: 'services',      component: () => import('@/views/public/ServicesView.vue'),     meta: { title: 'Services' } },
      { path: 'contact',    name: 'contact',       component: () => import('@/views/public/ContactView.vue'),      meta: { title: 'Contact' } },
    ],
  },
  {
    path: '/admin/login',
    name: 'admin-login',
    component: () => import('@/views/admin/LoginView.vue'),
    meta: { title: 'Sign in', guestOnly: true },
  },
  {
    path: '/admin',
    component: AdminLayout,
    meta: { requiresAdmin: true },
    children: [
      { path: '',             name: 'admin-dashboard',   component: () => import('@/views/admin/DashboardView.vue'),    meta: { title: 'Dashboard' } },
      { path: 'profile',      name: 'admin-profile',     component: () => import('@/views/admin/ProfileView.vue'),      meta: { title: 'Profile' } },
      { path: 'projects',     name: 'admin-projects',    component: () => import('@/views/admin/ProjectsView.vue'),     meta: { title: 'Projects' } },
      { path: 'experiences',  name: 'admin-experiences', component: () => import('@/views/admin/ExperiencesView.vue'),  meta: { title: 'Experience' } },
      { path: 'skills',       name: 'admin-skills',      component: () => import('@/views/admin/SkillsView.vue'),       meta: { title: 'Skills' } },
      { path: 'services',     name: 'admin-services',    component: () => import('@/views/admin/ServicesView.vue'),     meta: { title: 'Services' } },
      { path: 'testimonials', name: 'admin-testimonials',component: () => import('@/views/admin/TestimonialsView.vue'), meta: { title: 'Testimonials' } },
      { path: 'blogs',        name: 'admin-blogs',       component: () => import('@/views/admin/BlogsView.vue'),        meta: { title: 'Blogs' } },
      { path: 'social-links', name: 'admin-socials',     component: () => import('@/views/admin/SocialLinksView.vue'),  meta: { title: 'Social Links' } },
      { path: 'contacts',     name: 'admin-contacts',    component: () => import('@/views/admin/ContactsView.vue'),     meta: { title: 'Inbox' } },
    ],
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'not-found',
    component: () => import('@/views/public/NotFoundView.vue'),
    meta: { title: 'Not Found' },
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to, from, saved) {
    if (saved) return saved
    if (to.hash) return { el: to.hash, behavior: 'smooth', top: 80 }
    return { top: 0, behavior: 'smooth' }
  },
})

router.beforeEach(async (to) => {
  const auth = useAuthStore()
  if (!auth.initialized) {
    await auth.bootstrap()
  }

  if (to.meta.requiresAdmin && !auth.isAdmin) {
    return { name: 'admin-login', query: { redirect: to.fullPath } }
  }
  if (to.meta.guestOnly && auth.isAuthenticated) {
    return { name: 'admin-dashboard' }
  }
})

router.afterEach((to) => {
  const base = import.meta.env.VITE_APP_NAME || 'Portfolio'
  document.title = to.meta.title ? `${to.meta.title} · ${base}` : base
})

export default router
