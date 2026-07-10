<?php

/**
 * جلوگیری از آپدیت‌های وردپرس
 */
add_filter('automatic_updater_disabled', '__return_true');
remove_action('admin_init', '_maybe_update_core');
remove_action('admin_init', '_maybe_update_plugins');
remove_action('admin_init', '_maybe_update_themes');

add_filter('pre_site_transient_update_core', '__return_null');
add_filter('pre_site_transient_update_plugins', '__return_null');
add_filter('pre_site_transient_update_themes', '__return_null');


/**
 * حذف Emoji (چند درخواست اضافه)
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');


/**
 * حذف Embeds
 */
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');


/**
 * غیرفعال کردن DNS Prefetch
 */
add_filter('wp_resource_hints', '__return_empty_array', 999);


/**
 * حذف Dashicons برای کاربران مهمان
 */
add_action('wp_enqueue_scripts', function () {
  if (!is_user_logged_in()) {
    wp_deregister_style('dashicons');
  }
}, 100);


/**
 * حذف Gravatar
 */
add_filter('get_avatar_url', '__return_false');
add_filter('pre_option_show_avatars', '__return_zero');


/**
 * جلوگیری از بررسی فونت‌های خارجی
 */
add_filter('use_default_gallery_style', '__return_false');


/**
 * غیرفعال کردن Heartbeat
 */
add_action('admin_enqueue_scripts', function () {
  wp_deregister_script('heartbeat');
});
