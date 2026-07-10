<?php

add_action('acf/init', function () {

  $blocks = [
    [
      'name'        => 'banner',
      'title'       => 'بنر',
      'description' => 'بنر صفحه اصلی',
      'icon'        => 'cover-image',
      'keywords'    => ['hero', 'banner', 'اسلایدر'],
      'template'    => get_template_directory() . '/components/hero.php',
      'category'    => 'layout'
    ],
    [
      'name'        => 'feature',
      'title'       => 'ویژگی‌ها',
      'description' => 'بلاک نمایش ویژگی‌ها و مزایای خدمات',
      'icon'        => 'star-filled',
      'keywords'    => ['feature', 'services', 'ویژگی', 'مزایا'],
      'template'    => get_template_directory() . '/components/feature.php',
      'category'    => 'layout',
    ],
    [
      'name'        => 'solution',
      'title'       => 'معرفی',
      'description' => 'بلاک معرفی کسب‌وکار یا خدمات',
      'icon'        => 'welcome-learn-more',
      'keywords'    => ['solution', 'about', 'intro', 'معرفی', 'درباره ما'],
      'template'    => get_template_directory() . '/components/solution.php',
      'category'    => 'layout',
    ],
    [
      'name'        => 'service',
      'title'       => 'خدمات',
      'description' => 'بلاک نمایش خدمات',
      'icon'        => 'admin-tools',
      'keywords'    => ['service', 'services', 'خدمات', 'سرویس'],
      'template'    => get_template_directory() . '/components/service.php',
      'category'    => 'layout',
    ],
    [
      'name'        => 'portfolio',
      'title'       => 'نمونه کارها',
      'description' => 'بلاک نمایش پروژه‌ها و نمونه کارها',
      'icon'        => 'portfolio',
      'keywords'    => ['portfolio', 'projects', 'نمونه کار', 'پروژه'],
      'template'    => get_template_directory() . '/components/portfolio.php',
      'category'    => 'layout',
    ],
    [
      'name'        => 'our-team',
      'title'       => 'تیم ما',
      'description' => 'نمایش اعضای تیم',
      'icon'        => 'groups',
      'keywords'    => ['team', 'member', 'اعضا', 'تیم'],
      'template'    => get_template_directory() . '/components/our-team.php',
      'category'    => 'layout',
    ],
    [
      'name'        => 'testimonial',
      'title'       => 'نظرات مشتریان',
      'description' => 'نمایش نظرات مشتریان به صورت اسلایدر',
      'icon'        => 'format-quote',
      'keywords'    => ['testimonial', 'review', 'customer', 'نظر', 'مشتری'],
      'template'    => get_template_directory() . '/components/testimonial.php',
      'category'    => 'layout',
    ],
    [
      'name'        => 'pricing',
      'title'       => 'پلن‌های قیمت',
      'description' => 'نمایش پلن‌های قیمت‌گذاری',
      'icon'        => 'money-alt',
      'keywords'    => ['pricing', 'price', 'plan', 'package', 'پلن', 'قیمت', 'تعرفه', 'بسته'],
      'template'    => get_template_directory() . '/components/pricing.php',
      'category'    => 'layout',
    ],
    [
      'name'        => 'recent-blog',
      'title'       => 'آخرین مقالات',
      'description' => 'نمایش آخرین مقالات وبلاگ',
      'icon'        => 'welcome-write-blog',
      'keywords'    => [
        'blog',
        'post',
        'article',
        'news',
        'recent',
        'وبلاگ',
        'مقاله',
        'اخبار'
      ],
      'template'    => get_template_directory() . '/components/recent-blog.php',
      'category'    => 'layout',
    ],
    [
      'name'        => 'page-title',
      'title'       => 'عنوان صفحه',
      'description' => 'نمایش عنوان صفحه و مسیر راهنما (Breadcrumb)',
      'icon'        => 'heading',
      'keywords'    => [
        'page',
        'title',
        'heading',
        'breadcrumb',
        'hero',
        'عنوان',
        'صفحه',
        'بردکرامب'
      ],
      'template'    => get_template_directory() . '/components/page-title.php',
      'category'    => 'layout',
    ],
    [
      'name'        => 'contact-us',
      'title'       => 'تماس با ما',
      'description' => 'بخش تماس با ما',
      'icon'        => 'email',
      'keywords'    => [
        'contact',
        'phone',
        'email',
        'تماس',
        'ارتباط'
      ],
      'template'    => get_template_directory() . '/components/contact-us.php',
      'category'    => 'layout',
    ],
    [
      'name'        => 'single-service',
      'title'       => 'جزيیات خدمت',
      'description' => 'جزيیات خدمت',
      'icon'        => 'admin-tools',
      'keywords'    => ['service', 'خدمات', 'سرویس'],
      'template'    => get_template_directory() . '/components/single-service.php',
      'category'    => 'layout',
    ],
    [
      'name'        => 'counter-items',
      'title'       => 'بخش آمار',
      'description' => 'نمایش آمار و ارقام به صورت کارت‌های شمارنده',
      'icon'        => 'chart-bar',
      'keywords'    => [
        'counter',
        'stats',
        'numbers',
        'statistics',
        'آمار',
        'شمارنده',
        'اعداد'
      ],
      'template'    => get_template_directory() . '/components/counter-items.php',
      'category'    => 'layout',
    ],
    [
      'name'        => 'our-team-page',
      'title'       => 'صفحه تیم ما',
      'description' => 'نمایش اعضای تیم',
      'icon'        => 'groups',
      'keywords'    => [
        'team',
        'member',
        'staff',
        'employee',
        'our team',
        'تیم',
        'اعضا',
        'کارمندان',
        'پرسنل'
      ],
      'template'    => get_template_directory() . '/components/our-team-page.php',
      'category'    => 'layout',
    ],
  ];

  foreach ($blocks as $block) {

    acf_register_block_type([
      'name'            => $block['name'],
      'title'           => $block['title'],
      'description'     => $block['description'],
      'render_template' => $block['template'],
      'category'        => $block['category'],
      'icon'            => $block['icon'],
      'keywords'        => $block['keywords'],
      'mode'            => 'preview',
      'supports'        => [
        'align' => ['wide', 'full'],
        'jsx'   => false
      ]
    ]);
  }
});
