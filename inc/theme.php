<?php

define( 'DISALLOW_FILE_EDIT', true );

// add_filter('wpcf7_load_js', '__return_false');
// add_filter('wpcf7_load_css', '__return_false');
add_filter('excerpt_length', function () {
    return 15;
});

add_image_size('archive', 480, 320, true);
add_image_size('work-small', 200, 160, true);
add_image_size('work-large', 800, 600, true);

// Add the theme support basic elements
add_theme_support('align-wide');
add_theme_support('responsive-embeds');
add_theme_support('editor-styles');
add_theme_support('wp-block-styles');
add_theme_support('post-thumbnails');
add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'script', 'style']);

add_shortcode('template_part', function ($atts, $content = null) {
    $tp_atts = shortcode_atts([
        'path' =>  null,
    ], $atts);
    ob_start();
    get_template_part($tp_atts['path']);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
});

function get_icon($name, $size = 24)
{
    $output = '<svg viewBox="0 0 ' . $size . ' ' . $size . '" width="' . $size . '" height="' . $size . '" class="sprite-icon">';
    $output .= '<use href="' . get_bloginfo('template_url') . '/dist/assets/sprite.svg?123456#' . $name . '"></use>';
    $output .= '</svg>';
    return $output;
}

function icon($name, $size = 24)
{
    echo get_icon($name, $size);
}

function is_new_year()
{
  if (date('m') === '12' && date('d') >= '12') {
    return true;
  }
  if (date('m') === '01' && date('d') <= '10') {
    return true;
  }
  return false;
}
