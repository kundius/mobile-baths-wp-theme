<?php
/*
Template Name: Контакты
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head'); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="flex flex-col min-h-screen">
    <?php get_template_part('partials/header'); ?>

    <section class="header-section">
      <?php if (is_new_year()): ?>
        <canvas id="snow" style="height:100%;width:100%;position:absolute;pointer-events:none;top:0;z-index:0"></canvas>
      <?php endif; ?>
      <div class="container">
        <div class="flex flex-col items-center justify-center pt-9 pb-12 gap-7 max-lg:gap-4 max-lg:pt-6 max-lg:pb-8 max-md:pt-4 max-md:pb-6 max-md:gap-2">
          <div class="header-section__breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <span property="itemListElement" typeof="ListItem">
              <a property="item" typeof="WebPage" title="Перейти к Главная" href="/">
                <span property="name">Главная</span>
              </a>
              <meta property="position" content="<?php echo ++$position; ?>">
            </span>
            <span class="separator"></span>
            <span property="itemListElement" typeof="ListItem">
              <span property="name" class="post post-work current-item"><?php the_title() ?></span>
              <meta property="url" content="<?php the_permalink() ?>">
              <meta property="position" content="2">
            </span>
          </div>
          <h1 class="header-section__page-title">
            <?php the_title(); ?>
          </h1>
        </div>
      </div>
    </section>

    <div class="grow z-30">
      <div class="container">
        <div class="bg-white rounded p-5">
          <div class="flex gap-16 max-lg:flex-col max-lg:gap-8">
            <div class="grow py-8 px-6 max-md:px-0 max-md:py-0">
              <div class="flex flex-col gap-10">
                <a href="tel:<?php echo carbon_get_theme_option('crb_theme_phone'); ?>" class="contacts-phone">
                  <span class="contacts-phone__icon">
                    <?php icon('phone-filled', 18); ?>
                  </span>
                  <span class="contacts-phone__text">
                    <span class="contacts-phone__value"><?php echo carbon_get_theme_option('crb_theme_phone'); ?></span>
                    <!-- <span class="contacts-phone__desc">звонок по России бесплатный</span> -->
                  </span>
                </a>

                <div class="contacts-address">
                  <div class="contacts-address__icon">
                    <?php icon('marker-filled', 20); ?>
                  </div>
                  <div class="contacts-address__text">
                    <div>
                      <span><strong>Пн - Сб</strong> : 09.00 - 20.00, <strong>Вс</strong> - выходной, без перерывов</span>
                    </div>

                    <div class="mt-6">
                      <?php echo carbon_get_theme_option('crb_theme_address') ?>
                    </div>
                  </div>
                </div>

                <div class="contacts-additional">
                  <div class="contacts-additional__item">
                    <div class="contacts-additional__item-icon">
                      <?php icon('mail-circle', 40); ?>
                    </div>
                    <div class="contacts-additional__item-value">
                      <?php echo carbon_get_theme_option('crb_theme_email') ?>
                    </div>
                  </div>
                  <div class="contacts-additional__item">
                    <div class="contacts-additional__item-icon">
                      <?php icon('whatsapp', 40); ?>
                    </div>
                    <div class="contacts-additional__item-value">
                      <?php echo carbon_get_theme_option('crb_theme_whatsapp') ?>
                    </div>
                  </div>
                </div>

                <div class="contacts-social">
                  <div class="contacts-social__title">Мы в соцсетях:</div>
                  <div class="contacts-social__items">
                    <a href="https://vk.com/banimobilnie" target="_blank" class="contacts-social__item contacts-social__item-vk"></a>
                    <a href="https://rutube.ru/channel/49132526/" target="_blank" class="contacts-social__item contacts-social__item-rutube"></a>
                    <a href="https://ok.ru/group/70000032164117" target="_blank" class="contacts-social__item contacts-social__item-ok"></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="w-2/5 shrink-0 flex max-lg:w-full">
              <div class="bg-sky-50 rounded-3xl grow w-full h-full max-lg:h-80 max-md:h-64 max-md:-mx-5"></div>
            </div>
          </div>
        </div>

        <div class="my-24">
          <?php get_template_part('partials/feedback'); ?>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
