<section class="sticky-footer">
  <button type="button" class="sticky-footer__feedback">Заказать проект бани</button>
  <div class="sticky-footer__contacts">
    <a href="#" class="sticky-footer__phone"><?php echo carbon_get_theme_option('crb_theme_phone') ?></a>
    <a href="mail:<?php echo carbon_get_theme_option('crb_theme_email') ?>" class="sticky-footer__email">
      <span><?php icon('mail', 12) ?></span>
      <?php echo carbon_get_theme_option('crb_theme_email') ?>
    </a>
  </div>
</section>

<section class="underground">
  <div class="container underground-container">
    <div class="underground-about">
      <a href="/" class="underground-about__logo">
        <img src="<?php bloginfo('template_url') ?>/dist/assets/logo-dark.png" alt="<?php bloginfo('name') ?>" />
      </a>
      <div class="underground-about__copyrigt">
        © 2024, <strong>Мобильные баньки.рф</strong> -<br>
        Бани от производителя
      </div>
    </div>

    <div class="underground-contacts">
      <a href="tel:<?php echo carbon_get_theme_option('crb_theme_phone') ?>" class="underground-phone">
        <span class="underground-phone__icon">
          <?php icon('phone-filled', 18); ?>
        </span>
        <span class="underground-phone__text">
          <span class="underground-phone__value"><?php echo carbon_get_theme_option('crb_theme_phone') ?></span>
          <span class="underground-phone__desc">звонок по России бесплатный</span>
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
      <ul>
        <li class="page_item current_page_item"><a href="http://mobile-baths.loc/" aria-current="page">Главная</a></li>
        <li><a href="/" class="page_item">Мобильные бани</a></li>
        <li><a href="/" class="page_item">Акции</a></li>
        <li><a href="/" class="page_item">Отзывы</a></li>
        <li><a href="/" class="page_item">Наши работы</a></li>
        <li><a href="/" class="page_item">Контакты</a></li>
      </ul>
    </div>

    <div class="underground-address">
      <div class="underground-address__icon">
        <?php icon('marker-filled', 20); ?>
      </div>
      <div class="underground-address__text">
        <?php echo carbon_get_theme_option('crb_theme_address') ?>
      </div>
    </div>

    <div class="underground-social">
      <div class="underground-social__title">Мы в соцсетях:</div>
      <div class="underground-social__items">
        <a href="#" class="underground-social__item underground-social__item-vk"></a>
        <a href="#" class="underground-social__item underground-social__item-rutube"></a>
        <a href="#" class="underground-social__item underground-social__item-ok"></a>
      </div>
    </div>
  </div>
</section>

<section class="footer">
  <div class="container footer-container">
    <div class="footer-counters"><?php echo carbon_get_theme_option('crb_theme_counters') ?></div>

    <div class="footer-links">
      <a href="<?php the_permalink(152) ?>">Карта сайта</a>
      <a href="<?php the_permalink(3) ?>">Политика конфиденциальности</a>
      <!-- <a href="<?php the_permalink(154) ?>">Пользовательское соглашение</a> -->
    </div>

    <a href="https://domenart-studio.ru/" target="_blank" class="footer-creator">
      <img src="<?php bloginfo('template_url') ?>/src/images/creator.png" alt="Разработка и продвижение сайтов «ДоменАРТ»" />
    </a>
  </div>
</section>

<button class="scroll-up" type="button"></button>

<?php wp_footer() ?>