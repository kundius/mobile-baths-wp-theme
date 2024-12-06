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
            <?php $terms = get_the_terms(get_the_ID(), 'project_category'); ?>
            <?php $term = array_pop($terms); ?>
            <span property="itemListElement" typeof="ListItem">
              <a property="item" typeof="WebPage" title="Перейти к <?php echo $term->name; ?>" href="<?php echo get_term_link($term->slug, 'project_category'); ?>">
                <span property="name"><?php echo $term->name; ?></span>
              </a>
              <meta property="position" content="2">
            </span>
            <span class="separator"></span>
            <span property="itemListElement" typeof="ListItem">
              <span property="name" class="post post-work current-item"><?php the_title() ?></span>
              <meta property="url" content="<?php the_permalink() ?>">
              <meta property="position" content="3">
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
          <div class="flex gap-5">
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
                              data-fs-modal
                              data-fs-modal-group="catalog-large"
                              data-fs-modal-type="image">
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
                  </div>
                </div>
              <?php endif; ?>
            </div>

            <div class="w-80 shrink-0 flex flex-col gap-2">
              <div class="grow flex">
                <div class="project-details">
                  <div class="project-details__title">Цена за комплект</div>
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
                  <div class="project-details__params">
                    <?php if ($crb_number = carbon_get_the_post_meta('crb_number')): ?>
                      <div class="project-details__params-label">Номер проекта:</div>
                      <div class="project-details__params-value"><?php echo $crb_number; ?></div>
                    <?php endif; ?>
                    <?php if ($crb_dimensions = carbon_get_the_post_meta('crb_dimensions')): ?>
                      <div class="project-details__params-label">Размер:</div>
                      <div class="project-details__params-value"><?php echo $crb_dimensions; ?></div>
                    <?php endif; ?>
                    <div class="project-details__params-label">&nbsp;</div>
                    <div class="project-details__params-value">&nbsp;</div>
                    <?php if ($crb_restroom = carbon_get_the_post_meta('crb_restroom')): ?>
                      <div class="project-details__params-label">Комната отдыха:</div>
                      <div class="project-details__params-value">есть</div>
                    <?php endif; ?>
                    <?php if ($crb_bathroom = carbon_get_the_post_meta('crb_bathroom')): ?>
                      <div class="project-details__params-label">Санузел:</div>
                      <div class="project-details__params-value">есть</div>
                    <?php endif; ?>
                    <?php if ($crb_shower = carbon_get_the_post_meta('crb_shower')): ?>
                      <div class="project-details__params-label">Душ:</div>
                      <div class="project-details__params-value">есть</div>
                    <?php endif; ?>
                    <?php if ($crb_rooftype = carbon_get_the_post_meta('crb_rooftype')): ?>
                      <div class="project-details__params-label">Тип крыши:</div>
                      <div class="project-details__params-value"><?php echo $crb_rooftype; ?></div>
                    <?php endif; ?>
                  </div>
                  <button type="button" class="project-details__order">Оформить заказ</button>
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

        <div class="content mt-16 mb-12">
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