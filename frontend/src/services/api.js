import http from './http'

const unwrap = (res) => res.data?.data ?? res.data

export const publicApi = {
  home:           () => http.get('/home').then(unwrap),
  profile:        () => http.get('/profile').then(unwrap),
  skills:         () => http.get('/skills').then(unwrap),
  experiences:    () => http.get('/experiences').then(unwrap),
  services:       () => http.get('/services').then(unwrap),
  service:        (slug) => http.get(`/services/${slug}`).then(unwrap),
  projects:       (params) => http.get('/projects', { params }).then(unwrap),
  featuredProjects: () => http.get('/projects/featured').then(unwrap),
  project:        (slug) => http.get(`/projects/${slug}`).then(unwrap),
  testimonials:   () => http.get('/testimonials').then(unwrap),
  blogs:          (params) => http.get('/blogs', { params }).then(unwrap),
  recentBlogs:    () => http.get('/blogs/recent').then(unwrap),
  blog:           (slug) => http.get(`/blogs/${slug}`).then(unwrap),
  socialLinks:    () => http.get('/social-links').then(unwrap),
  contact:        (payload) => http.post('/contact', payload).then(unwrap),
}

export const authApi = {
  login:  (payload) => http.post('/auth/login', payload).then(unwrap),
  logout: () => http.post('/admin/auth/logout').then(unwrap),
  me:     () => http.get('/admin/me').then(unwrap),
}

const adminCrud = (resource) => ({
  list:    (params) => http.get(`/admin/${resource}`, { params }).then(unwrap),
  show:    (id) => http.get(`/admin/${resource}/${id}`).then(unwrap),
  create:  (payload) => http.post(`/admin/${resource}`, payload).then(unwrap),
  update:  (id, payload) => http.put(`/admin/${resource}/${id}`, payload).then(unwrap),
  destroy: (id) => http.delete(`/admin/${resource}/${id}`).then(unwrap),
})

export const adminApi = {
  dashboard:    () => http.get('/admin/dashboard').then(unwrap),
  profile:      {
    show:        () => http.get('/admin/profile').then(unwrap),
    update:      (payload) => http.put('/admin/profile', payload).then(unwrap),
    uploadAvatar: (file) => {
      const fd = new FormData()
      fd.append('avatar', file)
      return http.post('/admin/profile/avatar', fd).then(unwrap)
    },
    uploadCv: (file) => {
      const fd = new FormData()
      fd.append('cv', file)
      return http.post('/admin/profile/cv', fd).then(unwrap)
    },
  },
  skills:       adminCrud('skills'),
  experiences:  adminCrud('experiences'),
  projects:     {
    ...adminCrud('projects'),
    addImage: (id, file, caption) => {
      const fd = new FormData()
      fd.append('image', file)
      if (caption) fd.append('caption', caption)
      return http.post(`/admin/projects/${id}/images`, fd).then(unwrap)
    },
    deleteImage: (id, imageId) =>
      http.delete(`/admin/projects/${id}/images/${imageId}`).then(unwrap),
  },
  services:     adminCrud('services'),
  testimonials: adminCrud('testimonials'),
  blogs:        adminCrud('blogs'),
  socialLinks:  adminCrud('social-links'),
  contacts:     {
    list:     (params) => http.get('/admin/contacts', { params }).then(unwrap),
    show:     (id) => http.get(`/admin/contacts/${id}`).then(unwrap),
    markRead: (id) => http.patch(`/admin/contacts/${id}/read`).then(unwrap),
    archive:  (id) => http.patch(`/admin/contacts/${id}/archive`).then(unwrap),
    destroy:  (id) => http.delete(`/admin/contacts/${id}`).then(unwrap),
  },
}
