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
        <div class="bg-white rounded p-5 mb-24 content">
          <?php the_content() ?>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>