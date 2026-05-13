<script setup>
const featured = {
  crm: {
    title: 'CRM Integrations & Workflow Automation',
    description:
      "Business websites and automations built at Vgroup — Laravel APIs talking to third-party CRMs to streamline client workflows and back-office operations.",
    image: '/images/integrated_apps.png',
    tags: ['Current', 'Vgroup'],
    techLeft: 'Laravel / PHP',
    techRight: 'Vue.js',
    url: '',
  },
  video: {
    title: 'Video Downloader App',
    description: 'A cross-platform video downloader built in Python with a responsive KivyMD UI during my internship at ASCI.',
    image: '',
    tech: 'Python · KivyMD',
    url: '',
  },
}

const builtWith = [
  { icon: 'code', label: 'Laravel' },
  { icon: 'layers', label: 'Vue.js' },
  { icon: 'developer_board', label: 'Java' },
  { icon: 'terminal', label: 'Python' },
  { icon: 'database', label: 'MySQL' },
  { icon: 'api', label: 'REST APIs' },
  { icon: 'hub', label: 'CRM Integration' },
]
</script>

<template>
  <main class="pt-20">
    <!-- Hero Section -->
    <section class="min-h-[707px] flex flex-col justify-center items-center pt-section-padding pb-stack-lg px-margin-mobile md:px-gutter max-w-container-max mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-stack-lg items-center">
        <div class="md:col-span-7 flex flex-col items-start gap-stack-md order-2 md:order-1">
          <div class="space-y-4">
            <span class="font-label-md text-label-md tracking-widest text-secondary uppercase block">Software Engineer · Yaoundé, Cameroon</span>
            <h1 class="font-display text-display-mobile md:text-display text-primary leading-tight">
              Wanka Dominique <span class="italic font-body-lg text-secondary">·</span> Fongwa
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl">
              Software Engineering graduate building clean, dependable web apps with Laravel and Vue.js. I integrate third-party tools with CRM systems and care about precision, structured documentation, and quality delivery.
            </p>
          </div>
          <div class="flex flex-wrap gap-4 mt-4">
            <RouterLink
              to="/projects"
              class="bg-primary text-on-primary font-label-md text-label-md px-10 py-5 rounded-lg natural-shadow hover:bg-on-surface transition-all flex items-center gap-2 group"
            >
              View Projects
              <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
            </RouterLink>
            <RouterLink
              to="/contact"
              class="border border-outline-variant text-primary font-label-md text-label-md px-10 py-5 rounded-lg hover:bg-surface-container transition-all"
            >
              Get in Touch
            </RouterLink>
          </div>
        </div>
        <div class="md:col-span-5 order-1 md:order-2 flex justify-center">
          <div class="relative w-full aspect-square max-w-[450px]">
            <div class="absolute inset-0 bg-secondary-container/20 rounded-full translate-x-4 translate-y-4 -z-10"></div>
            <div class="w-full h-full rounded-full overflow-hidden border-2 border-white natural-shadow">
              <img
                alt="Wanka Dominique Fongwa"
                class="w-full h-full object-cover"
                src="/images/professional_pic_one_.png"
              />
            </div>
            <div class="absolute -bottom-4 -left-4 glass-card px-6 py-4 rounded-xl natural-shadow border border-outline-variant/20">
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">terminal</span>
                <div>
                  <p class="font-label-md text-[12px] text-outline uppercase tracking-wider">Status</p>
                  <p class="font-headline-md text-[16px] text-primary">Open to Opportunities</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Tech Stack Strip -->
    <section class="border-y border-outline-variant/30 bg-gradient-to-r from-secondary-container/30 via-surface-container-low/60 to-secondary-fixed-dim/30 py-stack-md">
      <div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
        <div class="flex flex-col md:flex-row items-center justify-between gap-stack-md">
          <span class="font-label-md text-label-md text-secondary uppercase tracking-widest shrink-0">Built with</span>
          <div class="flex flex-wrap items-center justify-center md:justify-end gap-stack-md">
            <span
              v-for="tool in builtWith"
              :key="tool.label"
              class="flex items-center gap-2 text-on-surface-variant hover:text-primary transition-colors"
            >
              <span class="material-symbols-outlined text-[20px] text-secondary">{{ tool.icon }}</span>
              <span class="font-label-md text-label-md">{{ tool.label }}</span>
            </span>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Projects -->
    <section class="pt-stack-lg pb-section-padding px-margin-mobile md:px-gutter max-w-container-max mx-auto">
      <div class="flex flex-col md:flex-row justify-between items-end mb-stack-lg gap-4">
        <div class="space-y-2">
          <h2 class="font-headline-lg text-headline-lg text-primary">Selected Work</h2>
          <p class="font-body-md text-on-surface-variant max-w-md">A snapshot of the systems I've built across web, desktop, and mobile.</p>
        </div>
        <RouterLink to="/projects" class="font-label-md text-label-md text-primary flex items-center gap-1 group">
          See All Projects
          <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">chevron_right</span>
        </RouterLink>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
        <component
          :is="featured.crm.url ? 'a' : 'div'"
          :href="featured.crm.url || null"
          :target="featured.crm.url ? '_blank' : null"
          :rel="featured.crm.url ? 'noopener noreferrer' : null"
          class="md:col-span-8 group cursor-pointer block"
        >
          <div class="bg-white border border-outline-variant/30 rounded-xl overflow-hidden natural-shadow transition-all group-hover:shadow-md">
            <div class="aspect-[16/9] bg-surface-container relative overflow-hidden flex items-center justify-center">
              <img
                v-if="featured.crm.image"
                :src="featured.crm.image"
                :alt="featured.crm.title"
                class="w-full h-full object-contain p-4"
              />
              <span v-else class="material-symbols-outlined text-[120px] text-outline-variant">hub</span>
              <div class="absolute top-6 left-6 flex gap-2">
                <span class="bg-primary/90 text-white font-label-md text-[10px] px-3 py-1 rounded-full backdrop-blur-md uppercase tracking-widest">Current</span>
                <span class="bg-white/90 text-primary font-label-md text-[10px] px-3 py-1 rounded-full backdrop-blur-md uppercase tracking-widest border border-outline-variant/20">Vgroup</span>
              </div>
            </div>
            <div class="p-8 space-y-3">
              <h3 class="font-headline-md text-headline-md text-primary">{{ featured.crm.title }}</h3>
              <p class="font-body-md text-on-surface-variant line-clamp-2">{{ featured.crm.description }}</p>
              <div class="flex flex-wrap gap-4 pt-2 items-center">
                <span class="text-outline font-label-md text-label-md flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">code</span> {{ featured.crm.techLeft }}</span>
                <span class="text-outline font-label-md text-label-md flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">layers</span> {{ featured.crm.techRight }}</span>
                <span v-if="featured.crm.url" class="ml-auto font-label-md text-label-md text-primary flex items-center gap-1">
                  Visit Site
                  <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">open_in_new</span>
                </span>
              </div>
            </div>
          </div>
        </component>
        <component
          :is="featured.video.url ? 'a' : 'div'"
          :href="featured.video.url || null"
          :target="featured.video.url ? '_blank' : null"
          :rel="featured.video.url ? 'noopener noreferrer' : null"
          class="md:col-span-4 group cursor-pointer block"
        >
          <div class="bg-white border border-outline-variant/30 rounded-xl overflow-hidden natural-shadow transition-all group-hover:shadow-md h-full flex flex-col">
            <div class="aspect-square bg-surface-container relative overflow-hidden flex items-center justify-center">
              <span class="material-symbols-outlined text-[96px] text-outline-variant">download</span>
            </div>
            <div class="p-8 flex-grow flex flex-col justify-between">
              <div class="space-y-3">
                <h3 class="font-headline-md text-headline-md text-primary">{{ featured.video.title }}</h3>
                <p class="font-body-md text-on-surface-variant">{{ featured.video.description }}</p>
              </div>
              <div class="flex flex-wrap gap-4 pt-6 items-center">
                <span class="text-outline font-label-md text-label-md flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">terminal</span> {{ featured.video.tech }}</span>
                <span v-if="featured.video.url" class="ml-auto font-label-md text-label-md text-primary flex items-center gap-1">
                  Visit
                  <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">open_in_new</span>
                </span>
              </div>
            </div>
          </div>
        </component>
      </div>
    </section>

    <!-- Stats / Philosophy -->
    <section class="py-section-padding bg-primary text-on-primary">
      <div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-stack-lg border-y border-outline-variant/20 py-stack-lg">
          <div class="space-y-2">
            <p class="font-display text-display text-primary-fixed">4</p>
            <p class="font-label-md text-label-md text-primary-fixed-dim uppercase tracking-widest">Languages I Build With</p>
            <p class="font-body-md text-on-primary-container/80 pt-4">PHP, Vue.js, Java, and Python — picked for the job, not for the trend.</p>
          </div>
          <div class="space-y-2">
            <p class="font-display text-display text-primary-fixed">3+</p>
            <p class="font-label-md text-label-md text-primary-fixed-dim uppercase tracking-widest">Industry Roles &amp; Internships</p>
            <p class="font-body-md text-on-primary-container/80 pt-4">Shipping web, desktop, and mobile work at Vgroup, ASCI, and Camsoft.</p>
          </div>
          <div class="space-y-2">
            <p class="font-display text-display text-primary-fixed">B.Tech</p>
            <p class="font-label-md text-label-md text-primary-fixed-dim uppercase tracking-widest">Software Engineering, 2024</p>
            <p class="font-body-md text-on-primary-container/80 pt-4">University of Bamenda — graduated with hands-on, project-driven training.</p>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>
