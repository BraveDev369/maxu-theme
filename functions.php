<?php

if (!defined('ABSPATH')) exit;

//////////////////////////////////////////////////
// Required Files
//////////////////////////////////////////////////

require_once get_template_directory() . '/assets/tools/more-speed.php';

require_once get_template_directory() . '/acf/blocks.php';
require_once get_template_directory() . '/acf/post-type.php';

require_once get_template_directory() . '/dependency.php';

require_once get_template_directory() . '/assets/tools/jdf.php';
require_once get_template_directory() . '/assets/tools/tools.php';
require_once get_template_directory() . '/assets/tools/comments.php';
require_once get_template_directory() . '/assets/tools/form-validation.php';
require_once get_template_directory() . '/assets/tools/contact-table.php';
require_once get_template_directory() . '/assets/tools/newsletter-table.php';
require_once get_template_directory() . '/assets/tools/fonts.php';

//////////////////////////////////////////////////
// Admin - Contact Messages
//////////////////////////////////////////////////

require_once get_template_directory() . '/inc/admin/class-contact-list-table.php';
require_once get_template_directory() . '/inc/admin/contact-page.php';
require_once get_template_directory() . '/inc/admin/contact-actions.php';
require_once get_template_directory() . '/inc/admin/contact-view.php';

//////////////////////////////////////////////////
// Admin - Newsletter
//////////////////////////////////////////////////

require_once get_template_directory() . '/inc/Repositories/NewsletterRepository.php';
require_once get_template_directory() . '/inc/NewsletterHandler.php';
require_once get_template_directory() . '/inc/admin/class-newsletter-list-table.php';
require_once get_template_directory() . '/inc/admin/newsletter-page.php';
require_once get_template_directory() . '/inc/admin/newsletter-actions.php';

//////////////////////////////////////////////////
// ACF Custom Fields
//////////////////////////////////////////////////

require_once get_template_directory() . '/acf/fields/acf-fontawesome-picker/acf-fontawesome-picker.php';

//////////////////////////////////////////////////
// Authentication
//////////////////////////////////////////////////

require_once get_template_directory() . '/inc/RegisterHandler.php';
require_once get_template_directory() . '/inc/LoginHandler.php';

//////////////////////////////////////////////////
// Theme Support
//////////////////////////////////////////////////

add_theme_support('post-thumbnails');

//////////////////////////////////////////////////
// Navigation Menus
//////////////////////////////////////////////////

function maxu_register_menus()
{
  register_nav_menus([
    'primary' => 'منوی اصلی',
    'mobile'  => 'منوی موبایل',
  ]);
}

add_action('after_setup_theme', 'maxu_register_menus');

//////////////////////////////////////////////////
// ACF Bootstrap Icons Field
//////////////////////////////////////////////////

add_action('acf/include_field_types', function () {

  require_once get_template_directory() . '/acf/fields/bootstrap-icons/bootstrap-icons.php';

  new ACF_Field_Bootstrap_Icon();
});

//////////////////////////////////////////////////
// ACF FontAwesome Picker
//////////////////////////////////////////////////

add_action('acf/include_field_types', function ($version) {

  require_once get_template_directory() . '/acf/fields/acf-fontawesome-picker/class-acf-field-fontawesome.php';
});

//////////////////////////////////////////////////
// Home Posts Limit
//////////////////////////////////////////////////

add_action('pre_get_posts', function ($query) {

  if (
    !is_admin() &&
    $query->is_main_query() &&
    $query->is_home()
  ) {
    $query->set('posts_per_page', 6);
  }
});

//////////////////////////////////////////////////
// Hide Admin Bar
//////////////////////////////////////////////////

add_filter('show_admin_bar', function () {
  return false;
});

//////////////////////////////////////////////////
// Restrict Admin Dashboard
//////////////////////////////////////////////////

add_action('admin_init', function () {

  global $pagenow;

  if (in_array($pagenow, ['admin-post.php', 'admin-ajax.php'], true)) {
    return;
  }

  if (
    is_admin() &&
    !current_user_can('administrator')
  ) {
    wp_safe_redirect(home_url());
    exit;
  }
});

//////////////////////////////////////////////////
// ACF JSON Save Path
//////////////////////////////////////////////////

add_filter('acf/settings/save_json', function () {
  return get_stylesheet_directory() . '/acf-json';
});

//////////////////////////////////////////////////
// ACF JSON Load Path
//////////////////////////////////////////////////

add_filter('acf/settings/load_json', function ($paths) {

  $paths[] = get_stylesheet_directory() . '/acf-json';

  return $paths;
});
