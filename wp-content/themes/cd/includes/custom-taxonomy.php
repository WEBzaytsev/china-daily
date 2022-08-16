<?php

function cd_register_taxonomy()
{
    register_taxonomy('service_cat', 'service',
        array(
            'labels' => [
                'name' => 'Категории',
                'singular_name' => 'Категория',
                'search_items' => 'Искать категорию',
                'all_items' => 'Все категории',
                'view_item' => 'Просмотреть категории',
                'parent_item' => 'Parent service',
                'parent_item_colon' => 'Parent service:',
                'edit_item' => 'Редактировать категорию',
                'update_item' => 'Обновить категорию',
                'add_new_item' => 'Добавить категорию',
                'new_item_name' => 'Название категории',
                'menu_name' => 'Категории',
            ],
            'hierarchical' => true,
            'sort' => true,
            'args' => array('orderby' => 'term_order'),
            'show_in_rest' => true,
            'show_admin_column' => true
        )
    );
}