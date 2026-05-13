<script setup>
const projects = [
  {
    title: 'CRM Integrations & Business Websites',
    role: 'Junior Developer · Vgroup, Yaoundé',
    period: 'April 2025 — Present',
    icon: 'hub',
    image: '/images/integrated_apps.png',
    imageFit: 'contain',
    description:
      'Develop and maintain client-facing websites and dashboards in PHP Laravel + Vue.js. Build API integrations between business tools and third-party CRMs to automate sales, lead capture, and back-office workflows. Focus on system optimization, clean documentation, and dependable delivery.',
    tags: ['Full Stack', 'CRM Integration'],
    tech: [
      { icon: 'code', label: 'Laravel / PHP' },
      { icon: 'layers', label: 'Vue.js' },
      { icon: 'api', label: 'REST APIs' },
      { icon: 'database', label: 'MySQL' },
    ],
    liveUrl: '',
    sourceUrl: '',
  },
  {
    title: 'Workflow Automation & Client Management',
    role: 'Professional Intern · Vgroup',
    period: 'October 2024 — April 2025',
    icon: 'flowsheet',
    image: '/images/Workflow.png',
    description:
      'Completed three months of intensive training in Virtual Assistance and workflow management before transitioning into software development. Supported CRM process automation and client management solutions while skilling up on Laravel and Vue.js.',
    tags: ['Automation', 'Training Track'],
    tech: [
      { icon: 'code', label: 'Laravel' },
      { icon: 'layers', label: 'Vue.js' },
      { icon: 'task_alt', label: 'CRM Workflows' },
    ],
    liveUrl: '',
    sourceUrl: '',
  },
  {
    title: 'Java Desktop Application',
    role: 'Intern Software Developer · Camsoft, Yaoundé',
    period: 'August 2022 — October 2022',
    icon: 'desktop_windows',
    description:
      'Built a desktop application in Java with Spring Boot and a XAMPP/MySQL backend. Implemented features end-to-end, ran debugging passes, and tested to lift application quality and user experience.',
    tags: ['Desktop', 'Java'],
    tech: [
      { icon: 'code', label: 'Java' },
      { icon: 'developer_board', label: 'Spring Boot' },
      { icon: 'storage', label: 'MySQL / XAMPP' },
    ],
    liveUrl: '',
    sourceUrl: '',
  },
  {
    title: 'Python Video Downloader',
    role: 'Intern Software Developer · ASCI, Douala',
    period: 'February 2024 — April 2024',
    icon: 'download',
    description:
      'Created a cross-platform video downloader in Python with KivyMD. Implemented a responsive, touch-friendly UI and collaborated on optimization and technical troubleshooting.',
    tags: ['Python', 'Cross-Platform'],
    tech: [
      { icon: 'terminal', label: 'Python' },
      { icon: 'smartphone', label: 'KivyMD' },
    ],
    liveUrl: '',
    sourceUrl: '',
  },
]
</script>

<template>
  <main class="pt-32 pb-section-padding">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
      <section class="mb-stack-lg">
        <h1 class="font-display text-display-mobile md:text-display mb-stack-sm text-primary">Projects</h1>
        <p class="font-body-lg text-body-lg text-secondary max-w-2xl">
          A walk through the systems I've built across full-stack web, desktop, and mobile — from CRM integrations on the job to internship projects in Python and Java.
        </p>
      </section>

      <div class="flex flex-col gap-stack-lg">
        <article
          v-for="project in projects"
          :key="project.title"
          class="bg-surface-container-lowest border border-outline-variant/20 rounded-xl overflow-hidden project-card-shadow flex flex-col md:grid md:grid-cols-12 group transition-all duration-300 hover:border-outline-variant/50 hover:shadow-md"
        >
          <div class="md:col-span-5 h-64 md:h-full relative overflow-hidden bg-surface-container flex items-center justify-center">
            <img
              v-if="project.image"
              :src="project.image"
              :alt="project.title"
              class="w-full h-full transition-transform duration-500 group-hover:scale-105"
              :class="project.imageFit === 'contain' ? 'object-contain p-4' : 'object-cover'"
            />
            <span
              v-else
              class="material-symbols-outlined text-[120px] text-outline-variant transition-transform duration-500 group-hover:scale-110"
            >{{ project.icon }}</span>
          </div>
          <div class="md:col-span-7 p-stack-md flex flex-col justify-between">
            <div>
              <div class="flex flex-wrap gap-2 mb-4">
                <span
                  v-for="(tag, idx) in project.tags"
                  :key="tag"
                  class="px-3 py-1 font-label-md text-label-md rounded-full"
                  :class="idx === 0 ? 'bg-secondary-container text-on-secondary-container' : 'bg-surface-variant text-on-surface-variant'"
                >{{ tag }}</span>
              </div>
              <h2 class="font-headline-lg text-headline-lg mb-stack-sm text-primary">{{ project.title }}</h2>
              <p class="font-label-md text-label-md text-secondary mb-stack-sm uppercase tracking-widest">{{ project.role }}</p>
              <p class="font-body-md text-body-md text-on-surface-variant mb-stack-md">{{ project.description }}</p>
              <div class="flex flex-wrap gap-stack-sm mb-stack-md">
                <span
                  v-for="techItem in project.tech"
                  :key="techItem.label"
                  class="text-secondary font-label-md text-label-md flex items-center gap-1"
                >
                  <span class="material-symbols-outlined text-[16px]">{{ techItem.icon }}</span>
                  {{ techItem.label }}
                </span>
              </div>
            </div>
            <div class="flex flex-wrap items-center gap-stack-md pt-stack-sm border-t border-outline-variant/20">
              <span class="font-label-md text-label-md text-outline flex items-center gap-1">
                <span class="material-symbols-outlined text-[18px]">event</span>
                {{ project.period }}
              </span>
              <a
                v-if="project.liveUrl"
                :href="project.liveUrl"
                target="_blank"
                rel="noopener noreferrer"
                class="font-label-md text-label-md text-primary flex items-center gap-1 hover:underline underline-offset-4 transition-all ml-auto"
              >
                Visit Site
                <span class="material-symbols-outlined text-[18px]">open_in_new</span>
              </a>
              <a
                v-if="project.sourceUrl"
                :href="project.sourceUrl"
                target="_blank"
                rel="noopener noreferrer"
                class="font-label-md text-label-md text-secondary flex items-center gap-1 hover:text-primary transition-all"
                :class="{ 'ml-auto': !project.liveUrl }"
              >
                View Source
                <span class="material-symbols-outlined text-[18px]">terminal</span>
              </a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </main>
</template>
