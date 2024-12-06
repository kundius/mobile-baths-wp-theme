<?php

add_action('wp', function () {
  $theme = wp_get_theme();

  wp_register_style('theme-style', get_stylesheet_uri(), [], $theme->get('Version'));
  wp_register_script('scripts', get_theme_file_uri('dist/assets/index.js'), null, null, true);
});

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_script('scripts');
});

add_action('wp_print_styles', function () {
  wp_enqueue_style('theme-style');
});


add_filter('stylesheet_uri', function (string $stylesheet_uri) {
  $file = 'dist/assets/index.css';

  if (file_exists(get_theme_file_path($file))) {
    return get_theme_file_uri($file);
  }

  return $stylesheet_uri;
});

add_action('init', function () {
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', false);
  }
});
