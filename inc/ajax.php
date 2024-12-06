<?php

add_action('wp_enqueue_scripts', 'ajax_data', 99);

add_action('wp_ajax_get_attachment', 'get_attachment_callback');
add_action('wp_ajax_nopriv_get_attachment', 'get_attachment_callback');

function ajax_data()
{
  wp_localize_script('scripts', 'theme_ajax', [
    'url' => admin_url('admin-ajax.php'),
  ]);
}

function get_attachment_callback()
{

  $id = intval($_POST['id']);

  if (!$id) {
    echo json_encode([
      'success' => false,
    ]);

    wp_die();
  }

  echo json_encode([
    'success' => true,
    'data' => [
      'title' => get_the_title($id),
      'url' => wp_get_attachment_url($id),
      'caption' => wp_get_attachment_caption($id),
    ],
  ]);

  wp_die();
}
