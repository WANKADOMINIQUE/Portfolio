<script setup>
import { ref, computed } from 'vue'

const form = ref({ name: '', email: '', message: '' })
const sent = ref(false)

const mailtoFallback = computed(() => {
  const subject = encodeURIComponent('Portfolio enquiry')
  const body = encodeURIComponent(
    `Hi Wanka,\n\nMy name is ${form.value.name || '[your name]'}.\n\n${form.value.message || ''}\n\n— ${form.value.email || ''}`
  )
  return `mailto:wankadominique4@gmail.com?subject=${subject}&body=${body}`
})

const whatsappUrl = computed(() => {
  const greeting = encodeURIComponent('Hi Wanka, I came across your portfolio.')
  return `https://wa.me/237673746914?text=${greeting}`
})

const submit = () => {
  window.location.href = mailtoFallback.value
  sent.value = true
}
</script>

<template>
  <main class="pt-32 pb-section-padding">
    <section class="max-w-[1000px] mx-auto px-margin-mobile">
      <div class="text-center mb-stack-lg">
        <h1 class="font-display text-display-mobile md:text-display mb-stack-sm text-primary">Let's Build Something Together</h1>
        <p class="font-body-lg text-body-lg text-secondary max-w-[600px] mx-auto">
          Open to junior developer roles, freelance projects, and telecom rollout quality control opportunities. The fastest way to reach me is email — I usually respond within 24 hours.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-12 gap-stack-lg items-start">
        <!-- Form -->
        <div class="md:col-span-8 bg-surface-container-lowest p-stack-lg rounded-xl border border-outline-variant/20 shadow-[0px_4px_20px_rgba(0,0,0,0.03)]">
          <form class="space-y-stack-md" @submit.prevent="submit">
            <div class="space-y-unit">
              <label
                class="font-label-md text-label-md text-secondary-container bg-primary-container px-2 py-0.5 rounded-sm inline-block"
                for="name"
              >
                Full Name <span class="text-error">*</span>
              </label>
              <input
                id="name"
                v-model.trim="form.name"
                class="w-full border-0 border-b border-outline-variant bg-transparent py-stack-sm focus:ring-0 focus:border-secondary transition-colors font-body-md text-body-md [&:not(:placeholder-shown):invalid]:border-error"
                name="name"
                placeholder="Your name"
                type="text"
                required
                minlength="2"
              />
            </div>
            <div class="space-y-unit">
              <label
                class="font-label-md text-label-md text-secondary-container bg-primary-container px-2 py-0.5 rounded-sm inline-block"
                for="email"
              >
                Email Address <span class="text-error">*</span>
              </label>
              <input
                id="email"
                v-model.trim="form.email"
                class="w-full border-0 border-b border-outline-variant bg-transparent py-stack-sm focus:ring-0 focus:border-secondary transition-colors font-body-md text-body-md [&:not(:placeholder-shown):invalid]:border-error"
                name="email"
                placeholder="you@example.com"
                type="email"
                required
              />
            </div>
            <div class="space-y-unit">
              <label
                class="font-label-md text-label-md text-secondary-container bg-primary-container px-2 py-0.5 rounded-sm inline-block"
                for="message"
              >
                Message <span class="text-error">*</span>
              </label>
              <textarea
                id="message"
                v-model.trim="form.message"
                class="w-full border-0 border-b border-outline-variant bg-transparent py-stack-sm focus:ring-0 focus:border-secondary transition-colors font-body-md text-body-md resize-none [&:not(:placeholder-shown):invalid]:border-error"
                name="message"
                placeholder="Tell me a bit about the role or project..."
                rows="4"
                required
                minlength="10"
              ></textarea>
            </div>
            <p class="font-label-md text-[12px] text-outline">
              <span class="text-error">*</span> All fields are required
            </p>
            <div class="pt-stack-sm flex flex-col md:flex-row items-stretch md:items-center gap-stack-md">
              <button
                class="w-full md:w-auto bg-primary text-on-primary font-label-md text-label-md px-stack-lg py-4 rounded-full flex items-center justify-center gap-stack-sm hover:opacity-90 transition-all active:scale-[0.98]"
                type="submit"
              >
                Send Message
                <span class="material-symbols-outlined text-[20px]">send</span>
              </button>
              <a
                class="font-label-md text-label-md text-secondary hover:text-primary transition-colors underline underline-offset-4 self-center"
                :href="mailtoFallback"
              >Or email me directly</a>
            </div>
            <p v-if="sent" class="font-body-md text-body-md text-secondary pt-stack-sm">
              Thanks — your draft is ready in your email client.
            </p>
          </form>
        </div>

        <!-- Side info -->
        <div class="md:col-span-4 space-y-stack-lg">
          <div class="space-y-stack-sm">
            <h3 class="font-headline-md text-headline-md text-primary">Direct Contact</h3>
            <div class="flex flex-col gap-stack-sm">
              <a class="flex items-center gap-stack-sm group" href="mailto:wankadominique4@gmail.com">
                <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center group-hover:bg-primary group-hover:text-on-primary transition-colors">
                  <span class="material-symbols-outlined">mail</span>
                </div>
                <div class="flex flex-col">
                  <span class="font-label-md text-[12px] text-outline uppercase tracking-wider">Email</span>
                  <span class="font-body-md text-body-md text-on-surface group-hover:text-primary transition-colors">wankadominique4@gmail.com</span>
                </div>
              </a>
              <a class="flex items-center gap-stack-sm group" href="tel:+237673746914">
                <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center group-hover:bg-primary group-hover:text-on-primary transition-colors">
                  <span class="material-symbols-outlined">call</span>
                </div>
                <div class="flex flex-col">
                  <span class="font-label-md text-[12px] text-outline uppercase tracking-wider">Phone</span>
                  <span class="font-body-md text-body-md text-on-surface group-hover:text-primary transition-colors">+237 673-746-914</span>
                </div>
              </a>
              <a class="flex items-center gap-stack-sm group" :href="whatsappUrl" target="_blank" rel="noopener noreferrer">
                <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center group-hover:bg-primary group-hover:text-on-primary transition-colors">
                  <span class="material-symbols-outlined">chat</span>
                </div>
                <div class="flex flex-col">
                  <span class="font-label-md text-[12px] text-outline uppercase tracking-wider">WhatsApp</span>
                  <span class="font-body-md text-body-md text-on-surface group-hover:text-primary transition-colors">Chat on WhatsApp</span>
                </div>
              </a>
              <a class="flex items-center gap-stack-sm group" href="https://www.linkedin.com/in/wanka-dominique-b0a4b7259" target="_blank" rel="noopener noreferrer">
                <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center group-hover:bg-primary group-hover:text-on-primary transition-colors">
                  <span class="material-symbols-outlined">work</span>
                </div>
                <div class="flex flex-col">
                  <span class="font-label-md text-[12px] text-outline uppercase tracking-wider">LinkedIn</span>
                  <span class="font-body-md text-body-md text-on-surface group-hover:text-primary transition-colors">wanka-dominique</span>
                </div>
              </a>
              <div class="flex items-center gap-stack-sm">
                <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center">
                  <span class="material-symbols-outlined">location_on</span>
                </div>
                <div class="flex flex-col">
                  <span class="font-label-md text-[12px] text-outline uppercase tracking-wider">Based In</span>
                  <span class="font-body-md text-body-md text-on-surface">Yaoundé, Cameroon</span>
                </div>
              </div>
            </div>
          </div>

          <div class="space-y-stack-sm">
            <h4 class="font-label-md text-label-md uppercase tracking-widest text-outline">Availability</h4>
            <p class="font-body-md text-body-md text-secondary">
              Open to full-time, contract, and remote roles. Responding within 24 business hours.
            </p>
          </div>

          <div class="border-l-2 border-outline-variant pl-stack-sm py-unit italic text-secondary">
            <p class="font-body-md text-body-md">
              "Software is a craft, and every line of code should serve a clear purpose."
              <span class="not-italic font-label-md text-label-md text-outline-variant mt-2 block">— My approach to engineering</span>
            </p>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>
