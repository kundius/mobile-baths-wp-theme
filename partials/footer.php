<div itemscope itemtype="https://schema.org/Organization">
  <section class="sticky-footer">
    <div class="container sticky-footer__container">
      <button type="button" class="sticky-footer__feedback" data-order-button>Заказать обратный звонок</button>
      <div class="sticky-footer__contacts">
        <a itemprop="telephone" href="tel:<?php echo carbon_get_theme_option('crb_theme_phone') ?>" class="sticky-footer__phone">
          <span><?php icon('phone', 12) ?></span>
          <?php echo carbon_get_theme_option('crb_theme_phone') ?>
        </a>
        <a itemprop="email" href="mailto:<?php echo carbon_get_theme_option('crb_theme_email') ?>" class="sticky-footer__email">
          <span><?php icon('mail', 12) ?></span>
          <?php echo carbon_get_theme_option('crb_theme_email') ?>
        </a>
      </div>
    </div>
  </section>
  
  <section class="underground">
    <div class="container underground-container">
      <div class="underground-about">
        <a href="/" class="underground-about__logo">
          <img itemprop="logo" src="<?php bloginfo('template_url') ?>/dist/assets/logo-dark.png" alt="<?php bloginfo('name') ?>" />
        </a>
        <div class="underground-about__copyrigt">
          © 2025, <strong itemprop="name">Мобильные баньки.рф</strong> -<br>
          Бани от производителя<br>
          ОГРНИП 325530000003661
        </div>
      </div>
  
      <div class="underground-contacts">
        <a href="tel:<?php echo carbon_get_theme_option('crb_theme_phone') ?>" class="underground-phone">
          <span class="underground-phone__icon">
            <?php icon('phone-filled', 18); ?>
          </span>
          <span class="underground-phone__text">
            <span class="underground-phone__value"><?php echo carbon_get_theme_option('crb_theme_phone') ?></span>
            <!-- <span class="underground-phone__desc">звонок по России бесплатный</span> -->
          </span>
        </a>
        <a href="whatsapp://send?text=Hello&phone=<?php echo carbon_get_theme_option('crb_theme_whatsapp') ?>" class="underground-whatsapp">
          <span class="underground-whatsapp__icon">
            <?php icon('whatsapp', 36); ?>
          </span>
          <span class="underground-whatsapp-text">
            <?php echo carbon_get_theme_option('crb_theme_whatsapp') ?>
          </span>
        </a>
      </div>
  
      <div class="underground-menu">
        <?php wp_nav_menu([
          'container' => false,
          'theme_location' => 'menu-footer',
        ]); ?>
      </div>
  
      <div class="underground-address">
        <div class="underground-address__icon">
          <?php icon('marker-filled', 20); ?>
        </div>
        <div class="underground-address__text" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          <?php echo carbon_get_theme_option('crb_theme_address') ?>
        </div>
      </div>
  
      <div class="underground-social">
        <div class="underground-social__title">Мы в соцсетях:</div>
        <div class="underground-social__items">
          <a itemprop="sameAs" href="https://vk.com/banimobilnie" target="_blank" class="underground-social__item underground-social__item-vk"></a>
          <a itemprop="sameAs" href="https://rutube.ru/channel/49132526/" target="_blank" class="underground-social__item underground-social__item-rutube"></a>
          <a itemprop="sameAs" href="https://ok.ru/group/70000032164117" target="_blank" class="underground-social__item underground-social__item-ok"></a>
        </div>
      </div>
    </div>
  </section>
  
  <section class="footer">
    <div class="container footer-container">
      <div class="footer-counters"><?php echo carbon_get_theme_option('crb_theme_counters') ?></div>
  
      <div class="footer-links">
        <?php if ($crb_sitemap_page = carbon_get_theme_option('crb_sitemap_page')): ?>
          <a href="<?php the_permalink($crb_sitemap_page[0]['id']) ?>">Карта сайта</a>
        <?php endif; ?>
        <?php if ($crb_agreement_page = carbon_get_theme_option('crb_agreement_page')): ?>
          <a href="<?php the_permalink($crb_agreement_page[0]['id']) ?>">Политика конфиденциальности</a>
        <?php endif; ?>
      </div>
  
      <a href="https://domenart-studio.ru/" target="_blank" class="footer-creator">
        <img src="<?php bloginfo('template_url') ?>/src/images/creator.png" alt="Разработка и продвижение сайтов «ДоменАРТ»" />
      </a>
    </div>
  </section>
</div>

<button class="scroll-up" type="button"></button>

<div id="modal-call" aria-hidden="true" class="modal">
  <div class="modal__overlay" tabindex="-1" data-modal-close>
    <div class="modal__container" id="modal-call-content" role="dialog" aria-modal="true" aria-labelledby="modal-call-title">

      <button class="modal__close" aria-label="Закрыть" data-modal-close></button>

      <div class="modal__content">

        <div class="modal__title" id="modal-call-title">
          Перезвоните мне
        </div>

        <form action="<?php echo admin_url('admin-ajax.php') ?>" class="modal-form" data-feedack-form data-feedack-form-goal="MODAL_CALLBACK">
          <input type="hidden" name="submitted" value="">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
          <input type="hidden" name="subject" value="Перезвоните мне">

          <div class="modal-form__messages" data-feedack-form-messages></div>

          <div class="modal-form__field">
            <label class="modal-form__label">Ваше имя</label>
            <input type="text" name="your-name" value="" class="modal-form__input">
          </div>

          <div class="modal-form__field">
            <label class="modal-form__label">Телефон<span>*</span></label>
            <input type="tel" name="your-phone" value="" class="modal-form__input" required>
          </div>

          <div class="modal-form__field modal-form__field_submit">
            <button type="submit" class="modal-form__submit">
              Заказать звонок
            </button>
          </div>

          <div class="modal-form__field">
            <label class="feedback-rules">
              <input class="feedback-rules__input" type="checkbox" name="approve" value="1" checked>
              <span class="feedback-rules__check"></span>
              <span class="feedback-rules__text">
                Прочитал(-а) соглашаюсь с
                <?php if ($crb_agreement_page = carbon_get_theme_option('crb_agreement_page')): ?>
                  <a href="<?php the_permalink($crb_agreement_page[0]['id']) ?>">политикой обработки персональных данных</a>
                <?php else: ?>
                  политикой обработки персональных данных
                <?php endif; ?>
              </span>
            </label>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>

<div id="modal-order" aria-hidden="true" class="modal">
  <div class="modal__overlay" tabindex="-1" data-modal-close>
    <div class="modal__container" id="modal-order-content" role="dialog" aria-modal="true" aria-labelledby="modal-order-title">

      <button class="modal__close" aria-label="Закрыть" data-modal-close></button>

      <div class="modal__content">

        <div class="modal__title" id="modal-order-title">
          Получить консультацию<br>по проекту
        </div>

        <form action="<?php echo admin_url('admin-ajax.php') ?>" class="modal-form" data-feedack-form data-feedack-form-goal="MODAL_CONSULTATION">
          <input type="hidden" name="submitted" value="">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
          <input type="hidden" name="subject" value="Получить консультацию по проекту">

          <div class="modal-form__messages" data-feedack-form-messages></div>

          <div class="modal-form__field">
            <label class="modal-form__label">Ваше имя</label>
            <input type="text" name="your-name" value="" class="modal-form__input">
          </div>

          <div class="modal-form__field">
            <label class="modal-form__label">Телефон<span>*</span></label>
            <input type="tel" name="your-phone" value="" class="modal-form__input" required>
          </div>

          <div class="modal-form__field modal-form__field_submit">
            <button type="submit" class="modal-form__submit">
              Отправить
            </button>
          </div>

          <div class="modal-form__field">
            <label class="feedback-rules">
              <input class="feedback-rules__input" type="checkbox" name="approve" value="1" checked>
              <span class="feedback-rules__check"></span>
              <span class="feedback-rules__text">
                Прочитал(-а) соглашаюсь с
                <?php if ($crb_agreement_page = carbon_get_theme_option('crb_agreement_page')): ?>
                  <a href="<?php the_permalink($crb_agreement_page[0]['id']) ?>">политикой обработки персональных данных</a>
                <?php else: ?>
                  политикой обработки персональных данных
                <?php endif; ?>
              </span>
            </label>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>

<?php wp_footer() ?>
