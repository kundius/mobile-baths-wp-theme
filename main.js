import 'normalize.css'
import './src/styles/main.scss'
import './src/images/video-slogan.png'
import './src/images/logo.png'
import './src/images/logo-dark.png'
import './src/images/sprite.svg'
import { initStickyHeader } from './src/scripts/sticky-header'
import { initVideoCarousel } from './src/scripts/video-carousel'
import { initFSModal } from './src/scripts/fs-modal'
import { initWorkCarousel } from './src/scripts/work-carousel'
import { initGallery } from './src/scripts/gallery'

initStickyHeader()
initVideoCarousel()
initWorkCarousel()
initFSModal()
initGallery()
