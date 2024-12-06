<?php
$category = get_queried_object();
$query_params = [
  'post_type' => 'post',
  'orderby' => [
    'is_sticky' => 'DESC',
    'date' => 'DESC',
  ],
  'paged' => get_query_var('paged') ?: 1,
  'tax_query' => [
    'relation' => 'AND',
    [
      'taxonomy' => $category->taxonomy,
      'field' => 'id',
      'terms' => [$category->term_id]
    ]
  ]
];
$articles = new WP_Query($query_params);
$pagination = [
  'prev_text' => '',
  'next_text' => '',
  'total' => $articles->max_num_pages,
  'current' => max(1, get_query_var('paged'))
];
?>
<!DOCTYPE html>
<html <?php language_attributes() ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head') ?>
</head>

<body <?php body_class() ?>>
  <?php wp_body_open() ?>

  <div class="flex flex-col min-h-screen">
    <?php get_template_part('partials/header') ?>

    <section class="header-section">
      <div class="container">
        <div class="flex flex-col items-center justify-center pt-9 pb-12 gap-7">
          <div class="header-section__breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <span property="itemListElement" typeof="ListItem">
              <a property="item" typeof="WebPage" title="Перейти к <?php echo get_the_title(2) ?>" href="<?php the_permalink(2) ?>">
                <span property="name"><?php echo get_the_title(2) ?></span>
              </a>
              <meta property="position" content="1">
            </span>
            <span class="separator"></span>
            <span property="itemListElement" typeof="ListItem">
              <span property="name" class="post post-work current-item"><?php single_term_title() ?></span>
              <meta property="url" content="<?php echo get_term_link($category) ?>">
              <meta property="position" content="2">
            </span>
          </div>
          <h1 class="header-section__page-title">
            <?php single_term_title(); ?>
          </h1>
        </div>
      </div>
    </section>

    <div class="grow z-30">
      <div class="container">
        <?php if ($articles->have_posts()): ?>
          <div class="space-y-5">
            <?php while ($articles->have_posts()): ?>
              <?php $articles->the_post() ?>
              <article class="archive-card">
                <figure class="archive-card__image">
                  <img src="<?php the_post_thumbnail_url('archive') ?>" alt="<?php the_title() ?>" />
                </figure>
                <div class="archive-card__body">
                  <?php $date_from = carbon_get_the_post_meta('crb_event_date_from'); ?>
                  <?php $date_to = carbon_get_the_post_meta('crb_event_date_to'); ?>
                  <div class="archive-card__date">
                    <?php if (!empty($date_from)): ?>
                      <div>
                        с <span><?php echo $date_from ?></span>
                      </div>
                    <?php endif; ?>
                    <?php if (!empty($date_to)): ?>
                      <div>
                        по <span><?php echo $date_to ?></span>
                      </div>
                    <?php endif; ?>
                    <?php if (empty($date_from) && empty($date_to)): ?>
                      <div>
                        <span><?php echo get_the_date('d.m.Y') ?></span>
                      </div>
                    <?php endif; ?>
                  </div>
                  <h2 class="archive-card__title"><?php the_title() ?></h2>
                  <div class="archive-card__excerpt">
                    <?php the_excerpt() ?>
                  </div>
                  <div class="archive-card__more">
                    <a href="<?php the_permalink() ?>">Узнать больше</a>
                  </div>
                </div>
              </article>
            <?php endwhile ?>
            <?php wp_reset_postdata() ?>
          </div>

          <?php if ($links = paginate_links($pagination)): ?>
            <div class="my-10 pagination">
              <?php echo $links; ?>
            </div>
          <?php endif; ?>
        <?php else: ?>
          <p>Извините, ничего не найдено.</p>
        <?php endif ?>

        <div class="my-20"><?php echo term_description() ?></div>

        <div class="my-20">
          <?php get_template_part('partials/feedback'); ?>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/footer') ?>
  </div>
</body>

</html>