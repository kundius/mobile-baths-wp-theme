<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'register_carbon_fields');
function register_carbon_fields()
{

  Container::make('post_meta', 'Главная страница')
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'template-home.php')
    ->add_fields([

      Field::make('textarea', 'crb_slogan', 'Слоган компании')
        ->set_rows(2),

    ]);

  Container::make('theme_options', 'Параметры')
    ->set_page_parent('themes.php')
    ->add_fields([

      Field::make('text', 'crb_theme_phone', 'Телефон'),
      Field::make('text', 'crb_theme_whatsapp', 'WhatsApp'),
      Field::make('text', 'crb_theme_email', 'Почта'),
      Field::make('text', 'crb_theme_counters', 'Счетчики'),
      Field::make('text', 'crb_theme_address', 'Адрес'),
      Field::make('association', 'crb_works_page', 'Страница наши работы')
        ->set_max(1)
        ->set_min(1)
        ->set_types([
          [
            'type' => 'post',
            'post_type' => 'page',
          ]
        ]),
      Field::make('association', 'crb_catalog_page', 'Страница каталог')
        ->set_max(1)
        ->set_min(1)
        ->set_types([
          [
            'type' => 'post',
            'post_type' => 'page',
          ]
        ])

    ]);

  Container::make('post_meta', 'Акция')
    ->where('post_type', '=', 'post')
    ->where('post_term', '=', [
      'field' => 'slug',
      'value' => 'akczii',
      'taxonomy' => 'category',
    ])
    ->add_fields([

      Field::make('date', 'crb_event_date_from', 'Дата начала действия акции')
        ->set_storage_format('d.m.Y'),
      Field::make('date', 'crb_event_date_to', 'Дата окончания действия акции')
        ->set_storage_format('d.m.Y')

    ]);

  Container::make('post_meta', 'Наши работы')
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'template-works.php')
    ->add_fields([

      Field::make('complex', 'crb_video_items', 'Список видео')
        ->add_fields([
          Field::make('image', 'photo', 'Превью')->set_width(50),
          Field::make('text', 'url', 'Ссылка на видео')->set_width(50),
        ]),
      Field::make('textarea', 'crb_video_desc', 'Общее описание')
        ->set_rows(5),

    ]);

  Container::make('post_meta', 'Работа')
    ->where('post_type', '=', 'work')
    ->add_fields([

      Field::make('text', 'crb_year', 'Год строительства'),
      Field::make('text', 'crb_location', 'Место строительства'),
      Field::make('media_gallery', 'crb_gallery', 'Галерея'),
      Field::make('checkbox', 'crb_is_sticky', 'Показывать на главной'),

    ]);

  Container::make('post_meta', 'Проект')
    ->where('post_type', '=', 'project')
    ->add_fields([

      Field::make('text', 'crb_area', 'Площадь')->set_attribute('type', 'number')->set_attribute('step', '0.1'),
      Field::make('text', 'crb_oldprice', 'Старая цена')->set_attribute('type', 'number'),
      Field::make('text', 'crb_price', 'Цена')->set_attribute('type', 'number'),
      Field::make('checkbox', 'crb_bestprice', 'Лучшая цена'),
      Field::make('checkbox', 'crb_new', 'Новинка'),
      Field::make('checkbox', 'crb_action', 'Акция'),
      Field::make('text', 'crb_number', 'Номер проекта'),
      Field::make('text', 'crb_dimensions', 'Размер'),
      Field::make('complex', 'crb_params', 'Параметры')
        ->add_fields([
          Field::make('text', 'name', 'Название')->set_width(50),
          Field::make('text', 'content', 'Значение')->set_width(50),
        ]),
      Field::make('media_gallery', 'crb_gallery', 'Галерея'),
      Field::make('checkbox', 'crb_is_sticky', 'Показывать на главной'),

    ]);

  Container::make('post_meta', 'SEO')
    ->where('post_type', '=', 'page')
    ->or_where('post_type', '=', 'post')
    ->add_fields([

      Field::make('text', 'crb_seo_title', 'Заголовок'),
      Field::make('text', 'crb_seo_keywords', 'Ключевые слова'),
      Field::make('textarea', 'crb_seo_description', 'Описание'),

    ]);
}
