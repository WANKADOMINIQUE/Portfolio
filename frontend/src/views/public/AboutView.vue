<script setup>
const stack = [
  { icon: 'code', label: 'PHP / Laravel' },
  { icon: 'layers', label: 'Vue.js' },
  { icon: 'developer_board', label: 'Java / Spring Boot' },
  { icon: 'terminal', label: 'Python' },
  { icon: 'database', label: 'MySQL' },
  { icon: 'storage', label: 'SQLite' },
  { icon: 'api', label: 'REST APIs' },
  { icon: 'hub', label: 'CRM Integration' },
  { icon: 'smartphone', label: 'KivyMD' },
  { icon: 'task_alt', label: 'Agile / Testing' },
]

const fieldSkills = [
  {
    icon: 'fact_check',
    title: 'Quality Control & Site Inspection',
    description: 'Comfortable with structured on-site checks and verifying work against specifications.',
  },
  {
    icon: 'description',
    title: 'Documentation Validation',
    description: 'Reviewing technical documents, compliance records, and reports for completeness and accuracy.',
  },
  {
    icon: 'groups',
    title: 'Subcontractor Coordination',
    description: 'Coordinating across teams and subcontractors to keep delivery aligned and on schedule.',
  },
  {
    icon: 'health_and_safety',
    title: 'Safety & EHS Awareness',
    description: 'Aware of safety and compliance standards in construction and field environments.',
  },
  {
    icon: 'engineering',
    title: 'Construction & Civil Works',
    description: 'Working knowledge of construction fundamentals from practical site exposure.',
  },
  {
    icon: 'analytics',
    title: 'Technical Reporting',
    description: 'Translating field and system data into clear, actionable reports for stakeholders.',
  },
]

const timeline = [
  {
    period: 'April 2025 — Present',
    title: 'Junior Developer',
    org: 'Vgroup · Yaoundé, Cameroon',
    description:
      'Develop and maintain websites with PHP Laravel and Vue.js. Integrate third-party applications with CRM systems for business automation, manage API integrations, and optimize systems for better performance.',
    dotColor: 'bg-primary',
  },
  {
    period: 'October 2024 — April 2025',
    title: 'Professional Intern — Virtual Assistant / Developer Trainee',
    org: 'Vgroup · Yaoundé, Cameroon',
    description:
      'Three months of intensive training in Virtual Assistance and workflow management, then a transition into software development training on Laravel and Vue.js. Supported CRM process automation and client management.',
    dotColor: 'bg-secondary',
  },
  {
    period: 'February 2024 — April 2024',
    title: 'Intern Software Developer',
    org: 'ASCI · Douala, Cameroon',
    description:
      'Built a video downloader application using Python and KivyMD. Implemented a responsive UI and collaborated on optimization and technical troubleshooting.',
    dotColor: 'bg-primary',
  },
  {
    period: 'August 2022 — October 2022',
    title: 'Intern Software Developer',
    org: 'Camsoft · Yaoundé, Cameroon',
    description:
      'Developed a desktop application using Java, Spring Boot, and XAMPP. Enhanced system performance and user experience through feature implementation, debugging, and testing.',
    dotColor: 'bg-outline-variant',
  },
]
</script>

<template>
  <main class="pt-[120px] pb-section-padding max-w-container-max mx-auto px-margin-mobile md:px-gutter">
    <!-- Hero / Bio -->
    <section class="grid grid-cols-1 md:grid-cols-12 gap-stack-lg mb-section-padding">
      <div class="md:col-span-5">
        <div class="aspect-square w-full bg-surface-container-highest rounded-xl overflow-hidden natural-shadow border border-outline-variant/20">
          <img
            alt="Wanka Dominique Fongwa"
            class="w-full h-full object-cover"
            src="/images/professional_pic_one_.png"
          />
        </div>
      </div>
      <div class="md:col-span-7 flex flex-col justify-center">
        <span class="font-label-md text-label-md text-secondary mb-unit uppercase tracking-widest">About Me</span>
        <h1 class="font-display text-display-mobile md:text-display text-primary mb-stack-md">Building clean systems, with care.</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-stack-md">
          I'm Wanka Dominique Fongwa, a Software Engineering graduate from the University of Bamenda. I build web applications and CRM integrations using Laravel and Vue.js — currently as a Junior Developer at Vgroup in Yaoundé.
        </p>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-stack-md">
          My background blends software development with hands-on field experience: quality control, site coordination, documentation validation, and compliance follow-through. That mix shapes how I work — precise, structured, and accountable.
        </p>
        <div class="flex flex-wrap gap-stack-sm">
          <span class="font-label-md text-label-md text-secondary flex items-center gap-2">
            <span class="material-symbols-outlined text-[18px]">location_on</span>
            Yaoundé, Cameroon
          </span>
          <span class="font-label-md text-label-md text-secondary flex items-center gap-2">
            <span class="material-symbols-outlined text-[18px]">school</span>
            B.Tech Software Engineering, 2024
          </span>
        </div>
      </div>
    </section>

    <!-- Technical Stack -->
    <section class="mb-section-padding">
      <div class="flex flex-col items-center mb-stack-lg">
        <h2 class="font-headline-lg text-headline-lg text-primary text-center">Technical Stack</h2>
        <div class="w-16 h-1 bg-primary mt-unit"></div>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-stack-sm">
        <div
          v-for="item in stack"
          :key="item.label"
          class="flex flex-col items-center p-stack-md bg-surface-container-lowest border border-outline-variant/20 natural-shadow rounded-lg group hover:border-secondary transition-colors"
        >
          <span class="material-symbols-outlined text-secondary mb-unit text-[32px]">{{ item.icon }}</span>
          <span class="font-label-md text-label-md text-on-surface-variant text-center">{{ item.label }}</span>
        </div>
      </div>
    </section>

    <!-- Field & Quality Skills -->
    <section class="mb-section-padding">
      <div class="flex flex-col items-center mb-stack-lg">
        <h2 class="font-headline-lg text-headline-lg text-primary text-center">Field &amp; Quality Skills</h2>
        <p class="font-body-md text-body-md text-on-surface-variant mt-unit max-w-xl text-center">
          Beyond code, I bring hands-on experience in coordination, quality control, and compliance work — that translates well into telecom rollout and infrastructure delivery.
        </p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-stack-sm">
        <div
          v-for="skill in fieldSkills"
          :key="skill.title"
          class="p-stack-md bg-surface-container-lowest border border-outline-variant/20 rounded-lg hover:border-secondary/60 transition-colors"
        >
          <span class="material-symbols-outlined text-secondary text-[28px] mb-unit block">{{ skill.icon }}</span>
          <h3 class="font-headline-md text-[18px] text-primary mb-unit">{{ skill.title }}</h3>
          <p class="font-body-md text-body-md text-on-surface-variant">{{ skill.description }}</p>
        </div>
      </div>
    </section>

    <!-- Experience Timeline -->
    <section>
      <div class="flex flex-col mb-stack-lg">
        <h2 class="font-headline-lg text-headline-lg text-primary">Experience Timeline</h2>
        <p class="font-body-md text-body-md text-on-surface-variant mt-unit">A brief history of my professional journey.</p>
      </div>
      <div class="space-y-stack-md relative before:absolute before:left-4 md:before:left-1/2 before:w-[1px] before:h-full before:bg-outline-variant/30">
        <div
          v-for="(item, idx) in timeline"
          :key="item.title + item.period"
          class="relative grid grid-cols-1 md:grid-cols-2 gap-stack-lg items-center"
        >
          <div
            class="md:text-right md:pr-stack-lg"
            :class="idx % 2 === 1 ? 'order-2 md:order-1' : ''"
          >
            <template v-if="idx % 2 === 0">
              <span class="font-label-md text-label-md text-secondary">{{ item.period }}</span>
              <h3 class="font-headline-md text-headline-md text-primary">{{ item.title }}</h3>
              <p class="font-body-md text-body-md text-on-surface-variant mt-unit">{{ item.org }}</p>
            </template>
            <template v-else>
              <p class="font-body-md text-body-md text-on-surface-variant">{{ item.description }}</p>
            </template>
          </div>
          <div
            class="absolute left-4 md:left-1/2 -translate-x-1/2 w-3 h-3 rounded-full border-4 border-surface ring-1 ring-outline-variant/50"
            :class="item.dotColor"
          ></div>
          <div
            class="pl-12 md:pl-stack-lg"
            :class="idx % 2 === 1 ? 'order-1 md:order-2' : ''"
          >
            <template v-if="idx % 2 === 0">
              <p class="font-body-md text-body-md text-on-surface-variant">{{ item.description }}</p>
            </template>
            <template v-else>
              <span class="font-label-md text-label-md text-secondary">{{ item.period }}</span>
              <h3 class="font-headline-md text-headline-md text-primary">{{ item.title }}</h3>
              <p class="font-body-md text-body-md text-on-surface-variant mt-unit">{{ item.org }}</p>
            </template>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>
