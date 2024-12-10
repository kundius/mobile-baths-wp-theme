import { disableScroll, enableScroll } from './utils'

export function initMobileMenu() {
  const state = document.querySelector('[data-mobile-menu-state]')
  const close = document.querySelector('[data-mobile-menu-close]')
  const open = document.querySelector('[data-mobile-menu-open]')

  if (!state || !close || !open) return false

  open.addEventListener('click', (e) => {
    e.preventDefault()
    state.dataset.mobileMenuState = 'opened'
    disableScroll()
  })

  close.addEventListener('click', (e) => {
    e.preventDefault()
    state.dataset.mobileMenuState = 'closed'
    enableScroll()
  })
}
