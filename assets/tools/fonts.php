<?php
add_action('customize_register', function ($wp_customize) {

  $wp_customize->add_section('theme_typography', [
    'title' => 'تایپوگرافی',
    'priority' => 30,
  ]);

  $wp_customize->add_setting('site_font', [
    'default' => 'Avini',
    'transport' => 'refresh',
  ]);

  $wp_customize->add_control('site_font', [
    'label' => 'فونت سایت',
    'section' => 'theme_typography',
    'type' => 'select',
    'choices' => [
      'aviny'            => 'آوینی',
      'azarmehr-cd'      => 'آذرمهر CD',
      'azarmehr'         => 'آذرمهر',
      'damavand'         => 'دماوند',
      'dana'             => 'دانا',
      'dastnevis'        => 'دستنویس',
      'dubai'            => 'دبی',
      'estedad'          => 'استعداد',
      'helvetica-neue'   => 'Helvetica Neue',
      'iran-sans-cd'     => 'ایران سنس CD',
      'iran-sans'        => 'ایران سنس',
      'iran-yekan-cd'    => 'ایران یکان CD',
      'iran-yekan'       => 'ایران یکان',
      'lalezar'          => 'لاله‌زار',
      'mikhak-sd'        => 'میخک SD',
      'mikhak'           => 'میخک',
      'myriad'           => 'Myriad',
      'noora'            => 'نورا',
      'palatino-sans'    => 'Palatino Sans',
      'pinar-sd'         => 'پینار SD',
      'pinar'            => 'پینار',
      'pofak'            => 'پفک',
      'shabnam'          => 'شبنم',
      'vanda'            => 'واندا',
      'vazir'            => 'وزیر',
    ],
  ]);
  $wp_customize->add_setting('h1_h2_font', [
    'default' => 'pinar',
    'transport' => 'refresh',
  ]);
  $wp_customize->add_control('h1_h2_font', [
    'label' => 'فونت h1,h2',
    'section' => 'theme_typography',
    'type' => 'select',
    'choices' => [
      'aviny'            => 'آوینی',
      'azarmehr-cd'      => 'آذرمهر CD',
      'azarmehr'         => 'آذرمهر',
      'damavand'         => 'دماوند',
      'dana'             => 'دانا',
      'dastnevis'        => 'دستنویس',
      'dubai'            => 'دبی',
      'estedad'          => 'استعداد',
      'helvetica-neue'   => 'Helvetica Neue',
      'iran-sans-cd'     => 'ایران سنس CD',
      'iran-sans'        => 'ایران سنس',
      'iran-yekan-cd'    => 'ایران یکان CD',
      'iran-yekan'       => 'ایران یکان',
      'lalezar'          => 'لاله‌زار',
      'mikhak-sd'        => 'میخک SD',
      'mikhak'           => 'میخک',
      'myriad'           => 'Myriad',
      'noora'            => 'نورا',
      'palatino-sans'    => 'Palatino Sans',
      'pinar-sd'         => 'پینار SD',
      'pinar'            => 'پینار',
      'pofak'            => 'پفک',
      'shabnam'          => 'شبنم',
      'vanda'            => 'واندا',
      'vazir'            => 'وزیر',
    ],
  ]);
});




add_action('wp_head', function () {

  $font = get_theme_mod('site_font', 'avini');
  $h1_h2_font = get_theme_mod('h1_h2_font', 'pinar')

?>
  <style>
    body {
      font-family: "<?php echo esc_html($font); ?>", sans-serif;
    }

    .primary-font {
      font-family: "<?php echo esc_html($font); ?>", "segoe ui", "tahoma" !important;
    }

    .secondary-font {
      font-family: "<?php echo esc_html($h1_h2_font); ?>", "<?php echo esc_html($font); ?>", "segoe ui", "tahoma" !important;
    }

    h1 {
      font-family: "<?php echo esc_html($h1_h2_font); ?>", "<?php echo esc_html($font); ?>", "segoe ui", "tahoma";
    }

    h2 {
      font-family: "<?php echo esc_html($h1_h2_font); ?>", "<?php echo esc_html($font); ?>", "segoe ui", "tahoma";
    }
  </style>
<?php

});

function theme_fonts()
{
  wp_enqueue_style(
    'theme-fonts',
    get_template_directory_uri() . '/assets/css/farsi-fonts-styles/fonts.css',
    [],
    '1.0'
  );
}

add_action('wp_enqueue_scripts', 'theme_fonts');
