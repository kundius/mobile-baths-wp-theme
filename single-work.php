<?php
$gallery = carbon_get_the_post_meta('crb_gallery');
?>
<!DOCTYPE html>
<html <?php language_attributes() ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head') ?>
</head>

<body <?php body_class() ?>>
  <?php wp_body_open() ?>

  <div class="flex flex-col min-h-screen relative overflow-hidden">
    <?php get_template_part('partials/header') ?>

    <section class="header-section">
      <?php if (is_new_year()): ?>
        <canvas id="snow" style="height:100%;width:100%;position:absolute;pointer-events:none;top:0;z-index:0"></canvas>
      <?php endif; ?>
      <div class="container">
        <div class="flex flex-col items-center justify-center pt-9 pb-12 gap-7 max-lg:gap-4 max-lg:pt-6 max-lg:pb-8 max-md:pt-4 max-md:pb-6 max-md:gap-2">
          <?php $position = 0; ?>
          <div class="header-section__breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <span property="itemListElement" typeof="ListItem">
              <a property="item" typeof="WebPage" title="Перейти к Главная" href="/">
                <span property="name">Главная</span>
              </a>
              <meta property="position" content="<?php echo ++$position; ?>">
            </span>
            <span class="separator"></span>
            <?php if ($works_page = carbon_get_theme_option('crb_works_page')): ?>
              <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Перейти к <?php echo get_the_title($works_page[0]['id']) ?>" href="<?php the_permalink($works_page[0]['id']) ?>">
                  <span property="name"><?php echo get_the_title($works_page[0]['id']) ?></span>
                </a>
                <meta property="position" content="<?php echo ++$position; ?>">
              </span>
              <span class="separator"></span>
            <?php endif; ?>
            <span property="itemListElement" typeof="ListItem">
              <span property="name" class="post post-work current-item"><?php the_title() ?></span>
              <meta property="url" content="<?php the_permalink() ?>">
              <meta property="position" content="<?php echo ++$position; ?>">
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
        <div class="bg-white rounded p-5 shadow">
          <div class="flex gap-5 max-lg:flex-col">
            <div class="w-full order-1">
              <?php if ($gallery): ?>
                <div class="work-carousel" data-work-carousel>
                  <div class="work-carousel__container">
                    <?php foreach ($gallery as $key => $id): ?>
                      <div class="work-carousel__slide">
                        <a
                          href="<?php echo wp_get_attachment_image_url($id, 'original') ?>"
                          target="_blank"
                          data-fslightbox="gallery">
                          <?php echo wp_get_attachment_image($id, 'work-large'); ?>
                          <span class="work-carousel__loupe">
                            <?php icon('loupe', 24); ?>
                          </span>
                        </a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <button type="button" data-work-carousel-prev class="work-carousel__prev"></button>
                  <button type="button" data-work-carousel-next class="work-carousel__next"></button>
                </div>
              <?php endif; ?>
            </div>
            <div class="w-80 shrink-0 flex max-lg:w-full">
              <div class="work-side">
                <?php if ($year = carbon_get_the_post_meta('crb_year')): ?>
                  <div class="work-side__year">
                    <?php echo $year; ?>
                  </div>
                <?php endif; ?>
                <?php if ($location = carbon_get_the_post_meta('crb_location')): ?>
                  <div class="work-side__location">
                    <?php echo $location; ?>
                  </div>
                <?php endif; ?>
                <div class="work-side__content">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          </div>
          <?php if ($gallery): ?>
            <div class="work-gallery mt-5 grid grid-cols-6 gap-5 max-lg:grid-cols-5 max-lg:gap-3 max-md:grid-cols-3 max-md:gap-2">
              <?php foreach ($gallery as $key => $id): ?>
                <a
                  href="<?php echo wp_get_attachment_image_url($id, 'original') ?>"
                  class="work-gallery__item"
                  target="_blank"
                  data-work-carousel-trigger="<?php echo $key + 1; ?>">
                  <?php echo wp_get_attachment_image($id, 'work-small'); ?>
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="my-12">
          <?php get_template_part('partials/feedback') ?>
        </div>
      </div>
    </div>

    <script src="https://yastatic.net/share2/share.js"></script>

    <?php get_template_part('partials/footer') ?>
  </div>
</body>

</html>