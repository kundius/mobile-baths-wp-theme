<?php
/*
Template Name: Главная
*/
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head'); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="flex flex-col min-h-screen">
    <?php get_template_part('partials/header'); ?>

    <section class="header-section header-section_landing">
      <?php if (is_new_year()): ?>
        <canvas id="snow" style="height:100%;width:100%;position:absolute;pointer-events:none;top:0;z-index:0"></canvas>
      <?php endif; ?>
      <div class="container">
        <div class="flex flex-col items-center justify-center min-h-96 pt-12 pb-12 gap-16 max-lg:min-h-64 max-lg:pt-6 max-lg:pb-6 max-lg:gap-8 max-md:min-h-48 max-md:pt-4 max-md:pb-4 max-md:gap-6">
          <h1 class="header-section__title"><?php the_title(); ?></h1>
          <?php if ($crb_slogan = carbon_get_the_post_meta('crb_slogan')): ?>
            <div class="header-section__desc">
              <?php echo $crb_slogan; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <div class="relative z-30">
      <section class="section-about">
        <div class="container">
          <div class="bg-white rounded p-12 max-lg:p-5">
            <div class="section-about__video">
              <div class="section-about__video-slogan">
                <img src="<?php bloginfo('template_url'); ?>/src/images/video-slogan.png" alt="Баня строить и жить помогает">
              </div>
              <div class="section-about__video-player">
                <iframe src="https://rutube.ru/play/embed/af32a23a57e09654b12ad4407000f8c7/" width="640px" height="360px" frameborder="0" allow="fullscreen" allowfullscreen=""></iframe>
              </div>
            </div>
            <div class="section-about__content">
              <?php the_content(); ?>
            </div>
          </div>
          <?php get_template_part('partials/warranty'); ?>
        </div>
      </section>

      <?php $categories = get_terms('project_category', [
        'hide_empty' => true,
      ]); ?>
      <?php foreach ($categories as $category): ?>
        <section class="my-16">
          <div class="container">
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
        </section>
      <?php endforeach; ?>

      <?php
      $works = new WP_Query([
        'post_type' => 'work',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => -1,
        'meta_query' => [
          [
            'key' => 'crb_is_sticky',
            'value' => 'yes'
          ]
        ]
      ]);
      ?>
      <?php if ($works->have_posts()): ?>
        <section class="works-section">
          <div class="container">
            <div class="works-section__headline">
              <div class="works-section__headline-title">Наши работы</div>
              <a href="<?php echo the_permalink(33); ?>" class="works-section__headline-all"><span>Смотреть все</span><span></span></a>
            </div>
            <div class="grid grid-cols-4 gap-x-6 gap-y-10 mt-8 max-lg:grid-cols-3 max-md:grid-cols-2 max-md:gap-x-4 max-md:gap-y-8 max-md:mt-6">
              <?php while ($works->have_posts()): ?>
                <?php $works->the_post(); ?>
                <article class="work-card">
                  <figure class="work-card__image">
                    <?php the_post_thumbnail('archive'); ?>
                  </figure>
                  <a href="/nashi-raboty" class="work-card__title"><?php the_title() ?></a>
                </article>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            </div>
          </div>
        </section>
      <?php endif; ?>

      <section class="mt-16 mb-20">
        <div class="container">
          <?php get_template_part('partials/advantages'); ?>
        </div>
      </section>

      <section class="section-schema">
        <div class="container">
          <div class="section-schema__title">
            Схема работы
          </div>
          <div class="section-schema__items">
            <article class="schema-card">
              <div class="schema-card__icon">
                <img src="<?php bloginfo('template_url'); ?>/src/images/schema-1.png" alt="">
              </div>
              <div class="schema-card__dot"></div>
              <div class="schema-card__title">
                Вы оставляете заявку на подбор или расчет стоимости бани
              </div>
            </article>
            <article class="schema-card">
              <div class="schema-card__icon">
                <img src="<?php bloginfo('template_url'); ?>/src/images/schema-2.png" alt="">
              </div>
              <div class="schema-card__dot"></div>
              <div class="schema-card__title">
                Мы связываемся<br> с вами для уточнения деталей
              </div>
            </article>
            <article class="schema-card">
              <div class="schema-card__icon">
                <img src="<?php bloginfo('template_url'); ?>/src/images/schema-3.png" alt="">
              </div>
              <div class="schema-card__dot"></div>
              <div class="schema-card__title">
                Расчитываем
                точную стоимость строительства
              </div>
            </article>
            <article class="schema-card">
              <div class="schema-card__icon">
                <img src="<?php bloginfo('template_url'); ?>/src/images/schema-4.png" alt="">
              </div>
              <div class="schema-card__dot"></div>
              <div class="schema-card__title">
                После подбора оптимального проекта заключаем договор
              </div>
            </article>
            <article class="schema-card">
              <div class="schema-card__icon">
                <img src="<?php bloginfo('template_url'); ?>/src/images/schema-5.png" alt="">
              </div>
              <div class="schema-card__dot"></div>
              <div class="schema-card__title">
                Строим, сдаем проект
              </div>
            </article>
            <article class="schema-card">
              <div class="schema-card__icon">
                <img src="<?php bloginfo('template_url'); ?>/src/images/schema-6.png" alt="">
              </div>
              <div class="schema-card__dot"></div>
              <div class="schema-card__title">
                Вы оставляете нам&nbsp;отзыв
              </div>
            </article>
          </div>
        </div>
      </section>

      <section class="section-add">
        <div class="container">
          <div class="section-add__title">Мобильные бани</div>
          <div class="section-add__desc">Вы находитесь на сайте компании производителя мобильных бань:</div>
          <div class="flex items-center mt-16 max-md:flex-col max-md:mt-12 max-md:gap-12">
            <div class="w-1/2 max-md:w-full">
              <div class="add-text">
                <div class="add-text__title">Тем, кто ищет подрядчика</div>
                <ul class="add-text__list">
                  <li>Заказать понравившуюся баню и связаться с нами;<br> просмотреть интересующие Вас проекты и цены;</li>
                  <li>отправить заявку заявку и получить предложения от наших менеджеров;</li>
                  <li>отсортировать и вести обсуждения по выбранной мобильной&nbsp;бане.</li>
                </ul>
                <?php if ($catalog_page = carbon_get_theme_option('crb_catalog_page')): ?>
                  <div class="add-text__projects">
                    <a href="<?php the_permalink($catalog_page[0]['id']) ?>" class="button-primary">Показать все проекты</a>
                  </div>
                <?php endif; ?>
                <div class="add-text__end">
                  Чем мы отличаемся от других производителей?<br> Мы не имеем аналогов по предоставляемым возможностям.
                </div>
              </div>
            </div>
            <div class="w-1/2 xl:px-12 max-md:w-full">
              <form action="<?php echo admin_url('admin-ajax.php') ?>" class="feedback" data-feedack-form data-feedack-form-goal="ASK_QUESTION">
                <input type="hidden" name="submitted" value="">
                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
                <input type="hidden" name="subject" value="Хочу задать вопрос">

                <div class="feedback__headline">
                  <div class="feedback__headline-icon"></div>
                  <div class="feedback__headline-title">Хочу задать вопрос</div>
                  <div class="feedback__headline-desc">Отправьте нам сообщение, и мы свяжемся с вами в ближайшее время</div>
                </div>

                <div class="feedback__messages" data-feedack-form-messages></div>

                <div class="feedback__fields">
                  <input type="text" name="your-name" value="" placeholder="Ваше имя">
                  <input type="email" name="your-email" value="" placeholder="E-mail">
                  <input type="tel" name="your-phone" value="" placeholder="Телефон*" required>
                  <textarea name="your-message" placeholder="Задайте свой вопрос" rows="4"></textarea>
                </div>

                <label class="feedback__rules">
                  <input type="checkbox" name="approve" value="1" checked>
                  <span></span>
                  Прочитал(-а) соглашаюсь с
                  <?php if ($crb_agreement_page = carbon_get_theme_option('crb_agreement_page')): ?>
                    <a href="<?php the_permalink($crb_agreement_page[0]['id']) ?>">политикой обработки персональных данных</a>
                  <?php else: ?>
                    политикой обработки персональных данных
                  <?php endif; ?>
                </label>

                <button type="submit" class="feedback__submit">
                  Отправить
                </button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
