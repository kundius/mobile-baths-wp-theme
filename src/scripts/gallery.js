import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'
import { addThumbBtnsClickHandlers, addToggleThumbBtnsActive } from './EmblaCarouselThumbsButton'

export function applyGallery(gallery) {
  const mainNode = gallery.querySelector('[data-gallery-main-viewport]')
  const prevNode = gallery.querySelector('[data-gallery-main-prev]')
  const nextNode = gallery.querySelector('[data-gallery-main-next]')
  const thumbNode = gallery.querySelector('[data-gallery-thumbs-viewport]')

  const emblaApiMain = EmblaCarousel(mainNode, {
    loop: false,
    slidesToScroll: 'auto'
  })
  const emblaApiThumb = EmblaCarousel(thumbNode, {
    containScroll: 'keepSnaps',
    dragFree: true
  })

  const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
    emblaApiMain,
    prevNode,
    nextNode
  )
  const removeThumbBtnsClickHandlers = addThumbBtnsClickHandlers(emblaApiMain, emblaApiThumb)
  const removeToggleThumbBtnsActive = addToggleThumbBtnsActive(emblaApiMain, emblaApiThumb)

  emblaApiMain
    .on('destroy', removePrevNextBtnsClickHandlers)
    .on('destroy', removeThumbBtnsClickHandlers)
    .on('destroy', removeToggleThumbBtnsActive)
  emblaApiThumb
    .on('destroy', removeThumbBtnsClickHandlers)
    .on('destroy', removeToggleThumbBtnsActive)
}

export function initGallery() {
  const items = document.querySelectorAll('[data-gallery]') || []

  Array.from(items).forEach(applyGallery)
}
