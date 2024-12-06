import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'

export function initWorkCarousel() {
  const emblaNode = document.querySelector('[data-work-carousel]')
  const prevBtnNode = document.querySelector('[data-work-carousel-prev]')
  const nextBtnNode = document.querySelector('[data-work-carousel-next]')

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
