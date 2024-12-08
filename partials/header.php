<div class="header" data-sticky-header>
  <div class="container">
    <div class="header__container">
      <a href="/" class="header__logo">
        <img src="<?php bloginfo('template_url'); ?>/dist/assets/logo.png" alt="<?php bloginfo(
  'name'
); ?>" />
      </a>
      <div class="header__menu">
      <?php wp_nav_menu([
        'container' => false,
        'theme_location' => 'menu-main',
      ]); ?>
      </div>
      <a href="tel:<?php echo carbon_get_theme_option(
        'crb_theme_phone'
      ); ?>" class="header__callback" data-call-button>
        <span class="header__callback-text">
          Перезвоните мне
        </span>
        <span class="header__callback-icon">
          <?php icon('phone', 12); ?>
        </span>
      </a>
      <a href="tel:<?php echo carbon_get_theme_option(
        'crb_theme_phone'
      ); ?>" class="header__phone"><?php echo carbon_get_theme_option('crb_theme_phone'); ?></a>
    </div>
  </div>
</div>
