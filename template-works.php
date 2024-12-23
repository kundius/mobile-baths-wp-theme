<?php
/*
Template Name: Наши работы
*/
$works = new WP_Query([
  'post_type' => 'work',
  'order' => 'ASC',
  'orderby' => 'menu_order',
  'paged' => get_query_var('paged') ?: 1,
]);
$pagination = [
  'total' => $works->max_num_pages,
  'current' => max(1, get_query_var('paged')),
  'prev_text' => '',
  'next_text' => '',
];
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
        <div class="works-video bg-white rounded p-5">
          <div class="works-video__headline">
            <div class="works-video__title">
              Видеоотчёты
            </div>
            <div class="works-video__nav">
              <button type="button" data-video-carousel-prev class="works-video__nav-prev"></button>
              <button type="button" data-video-carousel-next class="works-video__nav-next"></button>
            </div>
          </div>
          <?php if ($slides = carbon_get_the_post_meta('crb_video_items')): ?>
            <div class="video-carousel" data-video-carousel>
              <div class="video-carousel__container">
                <?php foreach ($slides as $key => $slide): ?>
                  <div class="video-carousel__slide">
                    <a
                      href="#video-<?php echo $key; ?>"
                      target="_blank"
                      data-fslightbox="gallery">
                      <?php echo wp_get_attachment_image($slide['photo'], 'archive'); ?>
                      <span class="video-carousel__slide-play"></span>
                    </a>
                    <div class="hidden">
                      <iframe
                        src="<?php echo $slide['url']; ?>"
                        id="video-<?php echo $key; ?>"
                        width="1920px"
                        height="1080px"
                        frameBorder="0"
                        allow="fullscreen"
                        allowFullScreen></iframe>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>
          <?php if ($desc = carbon_get_the_post_meta('crb_video_desc')): ?>
            <div class="works-video__desc">
              <?php echo $desc; ?>
            </div>
          <?php endif; ?>
        </div>

        <?php if ($works->have_posts()): ?>
          <div class="mt-4">
            <div class="works-headline">
              <div class="works-headline__icon">
                <?php icon('works', 24); ?>
              </div>
              <div class="works-headline__title">
                Фототчёты
              </div>
            </div>
            <div class="grid grid-cols-4 gap-x-6 gap-y-10 mt-5 max-lg:grid-cols-3 max-md:grid-cols-2 max-md:gap-x-4 max-md:gap-y-8">
              <?php while ($works->have_posts()): ?>
                <?php $works->the_post(); ?>
                <article class="work-card">
                  <figure class="work-card__image">
                    <?php the_post_thumbnail('archive'); ?>
                  </figure>
                  <a href="<?php the_permalink() ?>" class="work-card__title"><?php the_title() ?></a>
                </article>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            </div>
            <?php if ($links = paginate_links($pagination)): ?>
              <div class="my-10 pagination">
                <?php echo $links; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <div class="my-24 content">
          <?php the_content(); ?>
        </div>

        <div class="my-24">
          <?php get_template_part('partials/advantages'); ?>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>