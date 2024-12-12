<?php
/*
Template Name: Каталог
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head'); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="flex flex-col min-h-screen relative overflow-hidden">
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
        <div class="bg-white rounded p-5 space-y-16">
          <?php $categories = get_terms('project_category', [
            'hide_empty' => true,
          ]); ?>
          <?php foreach ($categories as $category): ?>
            <div>
              <?php
              $projects = new WP_Query([
                'post_type' => 'project',
                'orderby' => [
                  'is_sticky' => 'DESC',
                  'date' => 'DESC',
                ],
                'posts_per_page' => -1,
                'meta_query' => [
                  [
                    'key' => 'crb_is_sticky',
                    'value' => 'yes'
                  ]
                ],
                'tax_query' => [
                  [
                    'taxonomy' => $category->taxonomy,
                    'field' => 'term_id',
                    'terms' => $category->term_id
                  ]
                ]
              ]); ?>
              <div class="category-headline">
                <div class="category-headline__title"><?php echo $category->name ?></div>
                <a href="<?php echo get_term_link($category->term_id, $category->taxonomy); ?>" class="category-headline__all"><span>Смотреть все</span><span></span></a>
              </div>
              <div class="grid grid-cols-3 gap-x-6 gap-y-3 mt-6 max-lg:grid-cols-2 max-md:grid-cols-1">
                <?php while ($projects->have_posts()): ?>
                  <?php $projects->the_post(); ?>
                  <article class="project-card">
                    <figure class="project-card__image">
                      <?php the_post_thumbnail('archive') ?>
                      <div class="project-flags">
                        <?php if ($crb_bestprice = carbon_get_the_post_meta('crb_bestprice')): ?>
                          <div class="project-flags__bestprice">Лучшая цена</div>
                        <?php endif; ?>
                        <?php if ($crb_new = carbon_get_the_post_meta('crb_new')): ?>
                          <div class="project-flags__new">Новинка</div>
                        <?php endif; ?>
                        <?php if ($crb_action = carbon_get_the_post_meta('crb_action')): ?>
                          <div class="project-flags__action">Акция</div>
                        <?php endif; ?>
                      </div>
                    </figure>
                    <div class="project-card__title"><?php the_title() ?></div>
                    <div class="flex items-center justify-between mt-8">
                      <?php if ($crb_area = carbon_get_the_post_meta('crb_area')): ?>
                        <div class="project-card__area">
                          <div class="project-card__area-label">Площадь</div>
                          <div class="project-card__area-value"><?php echo number_format($crb_area, 1, ',', ' '); ?> <span>м<sup>2</sup></span></div>
                        </div>
                      <?php endif; ?>
                      <div class="project-card__price">
                        <?php if ($crb_oldprice = carbon_get_the_post_meta('crb_oldprice')): ?>
                          <div class="project-card__price-old"><?php echo number_format($crb_oldprice, 0, ',', ' '); ?> <span>₽</span></div>
                        <?php endif; ?>
                        <?php if ($crb_price = carbon_get_the_post_meta('crb_price')): ?>
                          <div class="project-card__price-current"><?php echo number_format($crb_price, 0, ',', ' '); ?> <span>₽</span></div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="flex items-center justify-between mt-5">
                      <button type="button" class="project-card__order" data-order-button="<?php the_title() ?>">Заказать</button>
                      <a href="<?php the_permalink() ?>" class="project-card__details">Проект подробнее</a>
                    </div>
                  </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

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