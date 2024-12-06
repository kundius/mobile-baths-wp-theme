import { throttle } from 'throttle-debounce'

export function initStickyHeader() {
  const header = document.querySelector('[data-sticky-header]')

  if (!header) return

  const handler = () => {
    const currentPosition = window.scrollY
    if (currentPosition > 400) {
      header.dataset.stickyHeader = 'active'
    } else {
      header.dataset.stickyHeader = ''
    }
  }

  const optimizedHandler = throttle(100, handler)

  window.addEventListener('scroll', optimizedHandler)
  window.addEventListener('resize', optimizedHandler)

  return
}
