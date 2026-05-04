import { watchEffect } from 'vue'

function setMeta(name, content, attr = 'name') {
  if (!content) return
  let el = document.querySelector(`meta[${attr}="${name}"]`)
  if (!el) {
    el = document.createElement('meta')
    el.setAttribute(attr, name)
    document.head.appendChild(el)
  }
  el.setAttribute('content', content)
}

export function useSeo(getter) {
  watchEffect(() => {
    const meta = getter() || {}
    if (meta.title) document.title = meta.title
    setMeta('description', meta.description)
    setMeta('keywords', meta.keywords)
    setMeta('og:title', meta.title, 'property')
    setMeta('og:description', meta.description, 'property')
    setMeta('og:image', meta.image, 'property')
    setMeta('og:type', meta.type || 'website', 'property')
    setMeta('twitter:card', 'summary_large_image')
    setMeta('twitter:title', meta.title)
    setMeta('twitter:description', meta.description)
    setMeta('twitter:image', meta.image)
  })
}
