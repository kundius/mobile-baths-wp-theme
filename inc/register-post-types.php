<?php
add_action('init', 'create_taxonomy');
function create_taxonomy()
{
  // список параметров: wp-kama.ru/function/get_taxonomy_labels
  register_taxonomy('project_category', ['project'], [
    'label' => '',
    'labels' => [
      'name' => 'Категории',
      'singular_name' => 'Категория',
      'search_items' => 'Искать категории',
      'all_items' => 'Все категории',
      'view_item '    => 'Смотреть категорию',
      'parent_item' => 'Родительская категория',
      'parent_item_colon' => 'Родительская категория:',
      'edit_item' => 'Редактировать категорию',
      'update_item' => 'Обновить категорию',
      'add_new_item' => 'Добавить категорию',
      'new_item_name' => 'Новое имя категории',
      'menu_name' => 'Категория',
      'back_to_items' => '← вернуться в категорию',
    ],
    'description' => '',
    'public' => true,
    'hierarchical' => false,
    'rewrite' => true,
    'capabilities' => [],
    'meta_box_cb' => 'post_categories_meta_box', // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
    'show_admin_column' => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
    'show_in_rest' => null, // добавить в REST API
    'rest_base' => null, // $taxonomy
  ]);
}

add_action('init', 'register_post_type_init');
function register_post_type_init()
{
  $labels = [
    'name' => 'Проекты',
    'singular_name' => 'Проект',
    'add_new' => 'Добавить проект',
    'add_new_item' => 'Добавить проект',
    'edit_item' => 'Редактировать проект',
    'new_item' => 'Новый проект',
    'all_items' => 'Все проекты',
    'search_items' => 'Искать проекты',
    'not_found' =>  'Проектов по заданным критериям не найдено.',
    'not_found_in_trash' => 'В корзине нет проектов.',
    'menu_name' => 'Проекты'
  ];
  $args = [
    'taxonomies' => ['project_category'],
    'labels' => $labels,
    'public' => true,
    'menu_icon' => 'dashicons-portfolio',
    'menu_position' => 22,
    'supports' => ['title', 'editor', 'thumbnail']
  ];
  register_post_type('project', $args);

  $labels = [
    'name' => 'Наши работы',
    'singular_name' => 'Работа',
    'add_new' => 'Добавить работу',
    'add_new_item' => 'Добавить работу',
    'edit_item' => 'Редактировать работу',
    'new_item' => 'Новая работа',
    'all_items' => 'Все работы',
    'search_items' => 'Искать работы',
    'not_found' =>  'Работ по заданным критериям не найдено.',
    'not_found_in_trash' => 'В корзине нет работ.',
    'menu_name' => 'Наши работы'
  ];
  $args = [
    'labels' => $labels,
    'public' => true,
    'menu_icon' => 'dashicons-format-gallery',
    'menu_position' => 22,
    'supports' => ['title', 'editor', 'thumbnail']
  ];
  register_post_type('work', $args);
}
