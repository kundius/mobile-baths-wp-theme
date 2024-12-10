<div class="header" data-sticky-header data-mobile-menu-state="closed">
  <div class="container">
    <div class="header__container">
      <a href="/" class="header__logo" title="<?php bloginfo('name'); ?>"></a>
      <button class="header__toggle" type="button" data-mobile-menu-open>
        <span class="header__toggle-icon">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50">
            <path d="M 0 7.5 L 0 12.5 L 50 12.5 L 50 7.5 Z M 0 22.5 L 0 27.5 L 50 27.5 L 50 22.5 Z M 0 37.5 L 0 42.5 L 50 42.5 L 50 37.5 Z"></path>
          </svg>
        </span>
        <span class="header__toggle-label">Меню</span>
      </button>
      <div class="header__menu">
        <?php wp_nav_menu([
          'container' => false,
          'theme_location' => 'menu-main',
        ]); ?>
        <button type="button" class="header__menu-close" data-mobile-menu-close>
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
            <path fill="none" stroke="currentColor" stroke-dasharray="12" stroke-dashoffset="12" stroke-linecap="round" stroke-width="2" d="M12 12L19 19M12 12L5 5M12 12L5 19M12 12L19 5">
              <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="12;0" />
            </path>
          </svg>
        </button>
      </div>
      <a href="tel:<?php echo carbon_get_theme_option('crb_theme_phone'); ?>" class="header__callback" data-call-button>
        <span class="header__callback-text">
          Перезвоните мне
        </span>
        <span class="header__callback-icon">
          <?php icon('phone', 12); ?>
        </span>
      </a>
    </div>
  </div>
</div>