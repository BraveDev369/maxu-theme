<?php
add_action('init', function () {

    register_post_type('portfolio', [

        'labels' => [
            'name'                  => 'نمونه‌کارها',
            'singular_name'         => 'نمونه‌کار',
            'menu_name'             => 'نمونه‌کارها',
            'name_admin_bar'        => 'نمونه‌کار',
            'add_new'               => 'افزودن',
            'add_new_item'          => 'افزودن نمونه‌کار',
            'new_item'              => 'نمونه‌کار جدید',
            'edit_item'             => 'ویرایش نمونه‌کار',
            'view_item'             => 'مشاهده نمونه‌کار',
            'all_items'             => 'همه نمونه‌کارها',
            'search_items'          => 'جستجوی نمونه‌کارها',
            'not_found'             => 'نمونه‌کاری یافت نشد.',
            'not_found_in_trash'    => 'نمونه‌کاری در زباله‌دان یافت نشد.',
        ],

        'public'             => true,
        'has_archive'        => true,

        'rewrite' => [
            'slug'       => 'portfolio',
            'with_front' => false,
        ],

        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-portfolio',

        'show_in_rest'       => true,

        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields',

        ],

        'taxonomies' => [
            'portfolio_category'
        ],

    ]);

    register_taxonomy(
        'portfolio_category',
        ['portfolio'],
        [

            'labels' => [
                'name'          => 'دسته‌بندی نمونه‌کارها',
                'singular_name' => 'دسته‌بندی نمونه‌کار',
            ],

            'public'       => true,
            'hierarchical' => true,
            'show_in_rest' => true,

            'rewrite' => [
                'slug' => 'portfolio-category',
            ],

        ]
    );


    register_post_type('service', [

        'labels' => [
            'name'                  => 'خدمات',
            'singular_name'         => 'خدمت',
            'menu_name'             => 'خدمات',
            'name_admin_bar'        => 'خدمت',
            'add_new'               => 'افزودن',
            'add_new_item'          => 'افزودن خدمت',
            'new_item'              => 'خدمت جدید',
            'edit_item'             => 'ویرایش خدمت',
            'view_item'             => 'مشاهده خدمت',
            'all_items'             => 'همه خدمات',
            'search_items'          => 'جستجوی خدمات',
            'not_found'             => 'خدمتی یافت نشد.',
            'not_found_in_trash'    => 'خدمتی در زباله‌دان یافت نشد.',
        ],

        'public'        => true,
        'has_archive'   => true,

        'rewrite' => [
            'slug'       => 'services',
            'with_front' => false,
        ],

        'menu_position' => 7,
        'menu_icon'     => 'dashicons-admin-tools',

        'show_in_rest'  => true,

        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields',
            'comments',
        ],

        'taxonomies' => [
            'service_category',
        ],
        register_taxonomy(
            'service_category',
            ['service'],
            [

                'labels' => [
                    'name'          => 'دسته‌بندی خدمات',
                    'singular_name' => 'دسته‌بندی خدمت',
                ],

                'public'       => true,
                'hierarchical' => true,
                'show_in_rest' => true,

                'rewrite' => [
                    'slug' => 'service-category',
                ],

            ]
        )

    ]);
});



if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'تنظیمات عمومی',
        'menu_title' => 'تنظیمات عمومی',
        'menu_slug'  => 'theme-settings',
        'redirect'   => false,
        'menu_position'      => 6,
    ]);
}
