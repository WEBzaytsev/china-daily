<?php

function cd_create_post_type()
{
    $labels = array(
        'name' => __('Услуги'),
        'singular_name' => __('Услуги'),
        'add_new' => __('Новая услуга'),
        'add_new_item' => __('Добавить новую услугу'),
        'edit_item' => __('Редактировать услугу'),
        'new_item' => __('Новая услуга'),
        'view_item' => __('Смотреть услугу'),
        'search_items' => __('Искать услугу'),
        'not_found' => __('Не найдено'),
        'not_found_in_trash' => __('Не найдено в корзине'),
        'parent_item_colon' => __('dashicons-book-alt'),
        'menu_name' => __('Услуги'),
    );
    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => true,
        'menu_position' => 5,
        'show_in_rest' => true,
        'taxonomies' => array('service_cat'),
        'supports' => array(
            'title',
            'editor',
            'custom-fields',
        ),
    );
    register_post_type('service', $args);
}