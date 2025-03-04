import 'normalize.css'
import './src/styles/main.scss'
import './src/images/video-slogan.png'
import './src/images/logo.png'
import './src/images/logo-dark.png'
import './src/images/sprite.svg'
import { initStickyHeader } from './src/scripts/sticky-header'
import { initVideoCarousel } from './src/scripts/video-carousel'
import { initWorkCarousel } from './src/scripts/work-carousel'
import { initGallery } from './src/scripts/gallery'
import { initFeedbackForm } from './src/scripts/feedback-form'
import { initCallButton } from './src/scripts/call-button'
import { initOrderButton } from './src/scripts/order-button'
import fslightbox from 'fslightbox'
import { initMobileMenu } from './src/scripts/mobile-menu'
import { initSnow } from './src/scripts/snow'

initStickyHeader()
initVideoCarousel()
initWorkCarousel()
initGallery()
initFeedbackForm()
initCallButton()
initOrderButton()
initMobileMenu()
initSnow()
