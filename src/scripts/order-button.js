import MicroModal from 'micromodal'
import { disableScroll, enableScroll } from './utils'

export function applyOrderButton(el) {
  el.addEventListener('click', (e) => {
    e.preventDefault()

    const subjectInput = document.querySelector(`#modal-order [name="subject"]`)
    if (subjectInput) {
      if (!el.dataset.orderButton) {
        subjectInput.value = `Получить консультацию по проекту`
      } else {
        subjectInput.value = `Получить консультацию по проекту "${el.dataset.orderButton}"`
      }
    }

    MicroModal.show('modal-order', {
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
  })
}

export function initOrderButton() {
  const items = document.querySelectorAll('[data-order-button]') || []

  Array.from(items).forEach(applyOrderButton)
}
