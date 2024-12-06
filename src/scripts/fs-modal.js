import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'
import { disableScroll, enableScroll } from './utils'
import MicroModal from 'micromodal' // es6 module

export function initFSModal() {
  const triggers = Array.from(document.querySelectorAll('[data-fs-modal]') || [])

  triggers.forEach((trigger) => {
    trigger.addEventListener('click', (e) => {
      e.preventDefault()

      const modalId = `modal-video`
      const groupped = triggers.filter(
        (el) => el.dataset.fsModalGroup === trigger.dataset.fsModalGroup
      )

      const modal = document.createElement('div')
      modal.classList.add('fs-modal')
      modal.setAttribute('id', modalId)
      modal.setAttribute('aria-hidden', 'true')

      const startIndex = groupped.findIndex((el) => el === trigger)

      const renderSlide = (el) => {
        const type = el.dataset.fsModalType || 'image'
        if (type === 'video') {
          return `
          <div class="fs-modal-carousel__slide">
            <iframe width="800" height="450" src="${el.href}" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
          </div>
        `
        }
        if (type === 'image') {
          return `
            <div class="fs-modal-carousel__slide">
              <img src="${el.href}" />
            </div>
          `
        }
      }

      modal.innerHTML = `
      <div class="fs-modal__overlay" tabindex="-1" data-modal-close>
        <div class="fs-modal__container" role="dialog" aria-modal="true">
          <button class="fs-modal__close" data-modal-close></button>
          <div class="fs-modal__content">
            <div class="fs-modal-carousel">
              <div class="fs-modal-carousel__container">
                ${groupped.map(renderSlide).join('')}
              </div>
            </div>
            <button class="fs-modal-carousel-prev"></button>
            <button class="fs-modal-carousel-next"></button>
          </div>
          <div class="fs-modal__side" hidden>
            side
          </div>
        </div>
      </div>
      `

      document.body.appendChild(modal)

      // открыть созданное окно успешного добавления
      MicroModal.show(modalId, {
        onShow: () => {
          disableScroll()

          const modalCarousel = modal.querySelector('.fs-modal-carousel')
          const modalCarouselPrev = modal.querySelector('.fs-modal-carousel-prev')
          const modalCarouselNext = modal.querySelector('.fs-modal-carousel-next')

          const options = { loop: true, slidesToScroll: 'auto', startIndex }
          const emblaApi = EmblaCarousel(modalCarousel, options)

          const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
            emblaApi,
            modalCarouselPrev,
            modalCarouselNext
          )

          emblaApi.on('destroy', removePrevNextBtnsClickHandlers)
        },
        onClose: (modal) => {
          enableScroll()
          const onanimationend = () => {
            document.body.removeChild(modal)
            modal.removeEventListener('animationend', onanimationend)
          }
          modal.addEventListener('animationend', onanimationend)
        },
        awaitOpenAnimation: true,
        awaitCloseAnimation: true,
        closeTrigger: 'data-modal-close'
      })
    })
  })
}
