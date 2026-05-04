import { onUnmounted, ref, watch } from 'vue'

export function useTyping(phrases, { speed = 70, pause = 1400, deleteSpeed = 40 } = {}) {
  const text = ref('')
  let timer = null
  let phraseIdx = 0
  let charIdx = 0
  let deleting = false
  let stopped = false

  function tick() {
    if (stopped) return
    const list = phrases.value || phrases
    if (!list || list.length === 0) return

    const current = list[phraseIdx % list.length]
    if (!deleting) {
      charIdx++
      text.value = current.slice(0, charIdx)
      if (charIdx === current.length) {
        deleting = true
        timer = setTimeout(tick, pause)
        return
      }
      timer = setTimeout(tick, speed)
    } else {
      charIdx--
      text.value = current.slice(0, charIdx)
      if (charIdx === 0) {
        deleting = false
        phraseIdx++
      }
      timer = setTimeout(tick, deleteSpeed)
    }
  }

  function start() {
    stop()
    stopped = false
    timer = setTimeout(tick, 200)
  }

  function stop() {
    stopped = true
    if (timer) clearTimeout(timer)
    timer = null
  }

  if (phrases && typeof phrases === 'object' && 'value' in phrases) {
    watch(phrases, (v) => {
      if (v && v.length) start()
    }, { immediate: true })
  } else {
    start()
  }

  onUnmounted(stop)

  return { text, start, stop }
}
