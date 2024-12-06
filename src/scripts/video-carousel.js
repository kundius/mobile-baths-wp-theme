import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'

export function initVideoCarousel() {
  const emblaNode = document.querySelector('[data-video-carousel]')
  const prevBtnNode = document.querySelector('[data-video-carousel-prev]')
  const nextBtnNode = document.querySelector('[data-video-carousel-next]')

  if (!emblaNode || !prevBtnNode || !nextBtnNode) return

  const options = { loop: false, slidesToScroll: 'auto' }
  const emblaApi = EmblaCarousel(emblaNode, options)

  const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
    emblaApi,
    prevBtnNode,
    nextBtnNode
  )

  emblaApi.on('destroy', removePrevNextBtnsClickHandlers)
}
