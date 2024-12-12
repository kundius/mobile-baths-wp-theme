import MicroModal from 'micromodal'
import { disableScroll, enableScroll } from './utils'

export function applyCallButton(el) {
  el.addEventListener('click', (e) => {
    if (window.matchMedia('(min-width: 768px)').matches) {
      e.preventDefault()

      MicroModal.show('modal-call', {
        // onShow: () => {
        //   disableScroll()
        // },
        // onClose: () => {
        //   enableScroll()
        // },
        awaitOpenAnimation: true,
        awaitCloseAnimation: true,
        closeTrigger: 'data-modal-close'
      })
    }
  })
}

export function initCallButton() {
  const items = document.querySelectorAll('[data-call-button]') || []

  Array.from(items).forEach(applyCallButton)
}
