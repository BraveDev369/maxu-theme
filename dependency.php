<?php

if (! defined('ABSPATH')) exit;

//////////////////////////////////////////////////
// Theme Assets (CSS & JS)
//////////////////////////////////////////////////

function maxu_enqueue_assets()
{
  $uri = get_template_directory_uri();

  // CSS
  wp_enqueue_style('bootstrap', $uri . '/assets/css/bootstrap.min.css', [], filemtime(get_template_directory() . '/assets/css/bootstrap.min.css'));
  wp_enqueue_style('font-awesome', $uri . '/assets/css/font-awesome.min.css', [], filemtime(get_template_directory() . '/assets/css/font-awesome.min.css'));
  wp_enqueue_style('theme-default', $uri . '/assets/css/theme-default.css', [], filemtime(get_template_directory() . '/assets/css/theme-default.css'));
  wp_enqueue_style('meanmenu', $uri . '/assets/css/meanmenu.min.css', [], filemtime(get_template_directory() . '/assets/css/meanmenu.min.css'));
  wp_enqueue_style('header-top-style', $uri . '/assets/css/header-top.css', [], filemtime(get_template_directory() . '/assets/css/header-top.css'));
  wp_enqueue_style('header-menu', $uri . '/assets/css/header-menu.css', [], filemtime(get_template_directory() . '/assets/css/header-menu.css'));
  wp_enqueue_style('slick', $uri . '/assets/css/slick.css', [], filemtime(get_template_directory() . '/assets/css/slick.css'));
  wp_enqueue_style('venobox', $uri . '/assets/css/venobox.css', [], filemtime(get_template_directory() . '/assets/css/venobox.css'));
  wp_enqueue_style('owl-carousel', $uri . '/assets/css/owl.carousel.css', [], filemtime(get_template_directory() . '/assets/css/owl.carousel.css'));
  wp_enqueue_style('owl-transitions', $uri . '/assets/css/owl.transitions.css', [], filemtime(get_template_directory() . '/assets/css/owl.transitions.css'));
  wp_enqueue_style('maxu-style', $uri . '/assets/css/style.css', [], filemtime(get_template_directory() . '/assets/css/style.css'));
  wp_enqueue_style('maxu-responsive', $uri . '/assets/css/responsive.css', [], filemtime(get_template_directory() . '/assets/css/responsive.css'));
  wp_enqueue_style('widget-style', $uri . '/assets/css/widget.css', [], filemtime(get_template_directory() . '/assets/css/widget.css'));
  wp_enqueue_style('rating-star', $uri . '/assets/css/rating-star.css', [], filemtime(get_template_directory() . '/assets/css/rating-star.css'));

  // JS
  wp_enqueue_script(
    'modernizr',
    $uri . '/assets/js/vendor/modernizr-3.5.0.min.js',
    [],
    '3.5.0',
    false
  );

  wp_enqueue_script('jquery');

  wp_enqueue_script('bootstrap', $uri . '/assets/js/bootstrap.min.js', ['jquery'], '1.0', true);
  wp_enqueue_script('imagesloaded', $uri . '/assets/js/imagesloaded.pkgd.min.js', ['jquery'], '1.0', true);
  wp_enqueue_script('meanmenu', $uri . '/assets/js/jquery.meanmenu.js', ['jquery'], '1.0', true);
  wp_enqueue_script('isotope', $uri . '/assets/js/isotope.pkgd.min.js', ['jquery'], '1.0', true);
  wp_enqueue_script('owl-carousel', $uri . '/assets/js/owl.carousel.min.js', ['jquery'], '1.0', true);
  wp_enqueue_script('scrollup', $uri . '/assets/js/jquery.scrollUp.js', ['jquery'], '1.0', true);
  wp_enqueue_script('nivo-slider', $uri . '/assets/js/jquery.nivo.slider.pack.js', ['jquery'], '1.0', true);
  wp_enqueue_script('counterup', $uri . '/assets/js/jquery.counterup.min.js', ['jquery'], '1.0', true);
  wp_enqueue_script('slick', $uri . '/assets/js/slick.min.js', ['jquery'], '1.0', true);
  wp_enqueue_script('jquery-nav', $uri . '/assets/js/jquery.nav.js', ['jquery'], '1.0', true);
  wp_enqueue_script('wow', $uri . '/assets/js/wow.js', [], '1.0', true);
  wp_enqueue_script('scrolltofixed', $uri . '/assets/js/jquery-scrolltofixed-min.js', ['jquery'], '1.0', true);
  wp_enqueue_script('venobox', $uri . '/assets/js/venobox.min.js', ['jquery'], '1.0', true);
  wp_enqueue_script('waypoints', $uri . '/assets/js/waypoints.min.js', ['jquery'], '1.0', true);

  wp_enqueue_script(
    'theme',
    $uri . '/assets/js/theme.js',
    [
      'jquery',
      'bootstrap',
      'owl-carousel',
      'slick',
      'meanmenu',
      'venobox',
      'wow',
      'isotope'
    ],
    filemtime(get_template_directory() . '/assets/js/theme.js'),
    true
  );
}

add_action('wp_enqueue_scripts', 'maxu_enqueue_assets');

//////////////////////////////////////////////////
// Form Layout Script
//////////////////////////////////////////////////

add_action('wp_enqueue_scripts', function () {

  wp_enqueue_script(
    'maxu-form-layout',
    get_template_directory_uri() . '/inc/js/form-layout.js',
    ['jquery'],
    filemtime(get_template_directory() . '/inc/js/form-layout.js'),
    true
  );
});

//////////////////////////////////////////////////
// Newsletter Script
//////////////////////////////////////////////////

add_action('wp_enqueue_scripts', function () {

  wp_enqueue_script(
    'maxu-newsletter',
    get_template_directory_uri() . '/inc/js/newsletter.js',
    ['jquery'],
    filemtime(get_template_directory() . '/inc/js/newsletter.js'),
    true
  );
});

//////////////////////////////////////////////////
// Scroll Bar Script
//////////////////////////////////////////////////

add_action('wp_enqueue_scripts', function () {

  wp_enqueue_script(
    'maxu-scroll-bar',
    get_template_directory_uri() . '/inc/js/scroll-bar.js',
    ['jquery'],
    filemtime(get_template_directory() . '/inc/js/scroll-bar.js'),
    true
  );
});

//////////////////////////////////////////////////
// Register Page Script
//////////////////////////////////////////////////

add_action('wp_enqueue_scripts', function () {

  if (is_page('register')) {

    wp_enqueue_script(
      'maxu-register',
      get_template_directory_uri() . '/inc/js/register.js',
      ['jquery'],
      filemtime(get_template_directory() . '/inc/js/register.js'),
      true
    );
  }
});

//////////////////////////////////////////////////
// SweetAlert2
//////////////////////////////////////////////////

function maxu_enqueue_sweetalert()
{
  wp_enqueue_script(
    'maxu-sweetalert2',
    get_template_directory_uri() . '/assets/js/sweetalert2.all.min.js',
    [],
    filemtime(get_template_directory() . '/assets/js/sweetalert2.all.min.js'),
    true
  );
}

add_action('wp_enqueue_scripts', 'maxu_enqueue_sweetalert');

//////////////////////////////////////////////////
// Toastify Notification
//////////////////////////////////////////////////

function maxu_enqueue_toastify()
{
  wp_enqueue_style(
    'maxu-toastify',
    get_template_directory_uri() . '/inc/toastify/toastify.css',
    [],
    filemtime(get_template_directory() . '/inc/toastify/toastify.css')
  );

  wp_enqueue_script(
    'maxu-toastify',
    get_template_directory_uri() . '/inc/toastify/toastify.js',
    [],
    filemtime(get_template_directory() . '/inc/toastify/toastify.js'),
    true
  );
}

add_action('wp_enqueue_scripts', 'maxu_enqueue_toastify');
