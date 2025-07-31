<!DOCTYPE html>
<html <?php language_attributes() ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head') ?>
</head>

<body <?php body_class() ?>>
  <?php wp_body_open() ?>

  <div class="flex flex-col min-h-screen">
    <?php get_template_part('partials/header'); ?>

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
            <?php if ($catalog_page = carbon_get_theme_option('crb_catalog_page')): ?>
              <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Перейти к <?php echo get_the_title($catalog_page[0]['id']) ?>" href="<?php the_permalink($catalog_page[0]['id']) ?>">
                  <span property="name"><?php echo get_the_title($catalog_page[0]['id']) ?></span>
                </a>
                <meta property="position" content="<?php echo ++$position; ?>">
              </span>
              <span class="separator"></span>
            <?php endif; ?>
            <?php $terms = get_the_terms(get_the_ID(), 'project_category'); ?>
            <?php $term = array_pop($terms); ?>
            <span property="itemListElement" typeof="ListItem">
              <a property="item" typeof="WebPage" title="Перейти к <?php echo $term->name; ?>" href="<?php echo get_term_link($term->slug, 'project_category'); ?>">
                <span property="name"><?php echo $term->name; ?></span>
              </a>
              <meta property="position" content="<?php echo ++$position; ?>">
            </span>
            <span class="separator"></span>
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
        <div class="bg-white rounded-xl p-5 shadow-main">
          <div class="flex gap-5 max-lg:flex-col">
            <div class="w-full flex">
              <?php if ($gallery = carbon_get_the_post_meta('crb_gallery')): ?>
                <div class="gallery" data-gallery>
                  <div class="gallery-main">
                    <div class="gallery-main__viewport" data-gallery-main-viewport>
                      <div class="gallery-main__container">
                        <?php foreach ($gallery as $key => $id): ?>
                          <div class="gallery-main__slide">
                            <a
                              href="<?php echo wp_get_attachment_image_url($id, 'original') ?>"
                              target="_blank"
                              data-fslightbox="gallery">
                              <?php echo wp_get_attachment_image($id, 'work-large'); ?>
                              <span class="gallery-main__loupe">
                                <?php icon('loupe', 24); ?>
                              </span>
                            </a>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <button type="button" data-gallery-main-prev class="gallery-main__prev"></button>
                    <button type="button" data-gallery-main-next class="gallery-main__next"></button>
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
                  </div>
                  <div class="gallery-thumbs">
                    <div class="gallery-thumbs__viewport" data-gallery-thumbs-viewport>
                      <div class="gallery-thumbs__container">
                        <?php foreach ($gallery as $key => $id): ?>
                          <div class="gallery-thumbs__slide">
                            <?php echo wp_get_attachment_image($id, 'work-small'); ?>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <button type="button" data-gallery-thumbs-prev class="gallery-thumbs__prev"></button>
                    <button type="button" data-gallery-thumbs-next class="gallery-thumbs__next"></button>
                  </div>
                </div>
              <?php endif; ?>
            </div>

            <div class="w-80 shrink-0 flex flex-col gap-2 max-lg:w-full">
              <div class="grow flex">
                <div class="project-details">
                  <div class="project-details__title">Стоимость бани</div>

                  <div class="project-details__price">
                    <?php if ($crb_oldprice = carbon_get_the_post_meta('crb_oldprice')): ?>
                      <div class="project-details__price-old"><?php echo number_format($crb_oldprice, 0, ',', ' '); ?> <span>₽</span></div>
                    <?php endif; ?>
                    <?php if ($crb_price = carbon_get_the_post_meta('crb_price')): ?>
                      <div class="project-details__price-current"><?php echo number_format($crb_price, 0, ',', ' '); ?> <span>₽</span></div>
                    <?php endif; ?>
                  </div>

                  <?php if ($crb_area = carbon_get_the_post_meta('crb_area')): ?>
                    <div class="project-details__area">
                      <div class="project-details__area-label">Площадь</div>
                      <div class="project-details__area-value"><?php echo number_format($crb_area, 1, ',', ' '); ?> <span>м<sup>2</sup></span></div>
                    </div>
                  <?php endif; ?>

                  <div class="project-details__all-params">
                    <div class="project-details__params">
                      <?php if ($crb_number = carbon_get_the_post_meta('crb_number')): ?>
                        <div class="project-details__params-label">Номер проекта:</div>
                        <div class="project-details__params-value"><?php echo $crb_number; ?></div>
                      <?php endif; ?>

                      <?php if ($crb_dimensions = carbon_get_the_post_meta('crb_dimensions')): ?>
                        <div class="project-details__params-label">Размер:</div>
                        <div class="project-details__params-value"><?php echo $crb_dimensions; ?></div>
                      <?php endif; ?>
                    </div>

                    <?php if ($crb_params = carbon_get_the_post_meta('crb_params')): ?>
                      <div class="project-details__params">
                        <?php foreach ($crb_params as $param): ?>
                          <div class="project-details__params-label"><?php echo $param['name']; ?></div>
                          <div class="project-details__params-value"><?php echo $param['content']; ?></div>
                        <?php endforeach; ?>
                      </div>
                    <?php endif; ?>
                  </div>

                  <button type="button" class="project-details__order" data-order-button="<?php the_title() ?>">Оформить заказ</button>
                </div>
              </div>

              <div class="project-prepay">
                <div class="project-prepay__title">
                  Мы работаем<br>
                  без предоплаты!
                </div>
                <div class="project-prepay__desc">
                  Все расчёты за работы производятся по факту выполненных работ
                </div>
              </div>

              <div class="project-changes">
                <div class="project-changes__title">
                  В проект можно внести любые изменения<br>
                  по желанию заказчика
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php if ($live_gallery = carbon_get_the_post_meta('crb_live_gallery')): ?>
          <div class="work-gallery mt-5 grid grid-cols-6 gap-5 max-lg:grid-cols-5 max-lg:gap-3 max-md:grid-cols-3 max-md:gap-2">
            <?php foreach ($gallery as $key => $id): ?>
            <a
              class="work-gallery__item"
              href="<?php echo wp_get_attachment_image_url($id, 'original') ?>"
              target="_blank"
              data-fslightbox="live-gallery">
              <?php echo wp_get_attachment_image($id, 'work-large'); ?>
            </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <div class="content my-12">
          <?php the_content(); ?>
        </div>

        <div class="mt-12 mb-24">
          <?php get_template_part('partials/application'); ?>
        </div>

        <div class="mt-12 mb-24">
          <?php get_template_part('partials/advantages'); ?>
        </div>
      </div>
    </div>

    <script src="https://yastatic.net/share2/share.js"></script>

    <?php get_template_part('partials/footer') ?>
  </div>
</body>

</html>
