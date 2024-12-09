import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'
import { addThumbBtnsClickHandlers, addToggleThumbBtnsActive } from './EmblaCarouselThumbsButton'

export function applyGallery(gallery) {
  const mainNode = gallery.querySelector('[data-gallery-main-viewport]')
  const mainPrevNode = gallery.querySelector('[data-gallery-main-prev]')
  const mainNextNode = gallery.querySelector('[data-gallery-main-next]')
  const thumbsNode = gallery.querySelector('[data-gallery-thumbs-viewport]')
  const thumbsPrevNode = gallery.querySelector('[data-gallery-thumbs-prev]')
  const thumbsNextNode = gallery.querySelector('[data-gallery-thumbs-next]')

  const emblaApiMain = EmblaCarousel(mainNode, {
    loop: false,
    slidesToScroll: 'auto'
  })
  const emblaApiThumbs = EmblaCarousel(thumbsNode, {
    // containScroll: 'trimSnaps',
    containScroll: 'trimSnaps',
    // loop: true,
    dragFree: true
  })

  const removeMainPrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
    emblaApiMain,
    mainPrevNode,
    mainNextNode
  )
  const removeThumbsPrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
    emblaApiThumbs,
    thumbsPrevNode,
    thumbsNextNode
  )
  const removeThumbBtnsClickHandlers = addThumbBtnsClickHandlers(emblaApiMain, emblaApiThumbs)
  const removeToggleThumbBtnsActive = addToggleThumbBtnsActive(emblaApiMain, emblaApiThumbs)

  emblaApiMain
    .on('destroy', removeMainPrevNextBtnsClickHandlers)
    .on('destroy', removeThumbBtnsClickHandlers)
    .on('destroy', removeToggleThumbBtnsActive)
  emblaApiThumbs
    .on('destroy', removeThumbsPrevNextBtnsClickHandlers)
    .on('destroy', removeThumbBtnsClickHandlers)
    .on('destroy', removeToggleThumbBtnsActive)
}

export function initGallery() {
  const items = document.querySelectorAll('[data-gallery]') || []

  Array.from(items).forEach(applyGallery)
}
