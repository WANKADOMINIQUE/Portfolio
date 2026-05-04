import { ref, shallowRef } from 'vue'

export function useApi(fn, { immediate = false, initialData = null } = {}) {
  const data = shallowRef(initialData)
  const error = ref(null)
  const loading = ref(false)

  async function execute(...args) {
    loading.value = true
    error.value = null
    try {
      data.value = await fn(...args)
      return data.value
    } catch (err) {
      error.value = err.response?.data?.message || err.message || 'Request failed.'
      throw err
    } finally {
      loading.value = false
    }
  }

  if (immediate) execute()

  return { data, error, loading, execute, refresh: execute }
}
