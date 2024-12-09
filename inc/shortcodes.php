<?php

add_shortcode('sitemap', 'display_sitemap');

function display_sitemap($atts)
{
  $atts = shortcode_atts([], $atts);
  ob_start();

  $projects = new WP_Query([
    'posts_per_page' => -1,
    'post_type' => 'project',
    'orderby' => [
      'is_sticky' => 'DESC',
      'date' => 'DESC',
    ],
  ]);

  $works = new WP_Query([
    'posts_per_page' => -1,
    'post_type' => 'work',
    'orderby' => [
      'is_sticky' => 'DESC',
      'date' => 'DESC',
    ],
  ]);

  $posts = new WP_Query([
    'posts_per_page' => -1,
    'post_type' => 'post',
    'orderby' => [
      'is_sticky' => 'DESC',
      'date' => 'DESC',
    ],
  ]);
?>
  <h3>Страницы</h3>
  <?php wp_nav_menu([
    'container' => false,
    'theme_location' => 'menu-sitemap',
  ]); ?>

  <?php if ($posts->have_posts()): ?>
    <h3>Статьи</h3>
    <ul>
      <?php while ($posts->have_posts()): ?>
        <?php $posts->the_post(); ?>
        <li>
          <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        </li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  <?php endif; ?>

  <?php if ($projects->have_posts()): ?>
    <h3>Проекты</h3>
    <ul>
      <?php while ($projects->have_posts()): ?>
        <?php $projects->the_post(); ?>
        <li>
          <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        </li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  <?php endif; ?>

  <?php if ($works->have_posts()): ?>
    <h3>Наши работы</h3>
    <ul>
      <?php while ($works->have_posts()): ?>
        <?php $works->the_post(); ?>
        <li>
          <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        </li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  <?php endif; ?>
<?php
  $output = ob_get_contents();
  ob_end_clean();
  return $output;
}
