<?php

if (!function_exists('img_alt')) {

  function img_alt($post_id = null)
  {
    $post_id = $post_id ?: get_the_ID();

    $thumbnail_id = get_post_thumbnail_id($post_id);

    if (!$thumbnail_id) {
      return '';
    }

    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

    if (empty($alt)) {
      $alt = get_the_title($post_id);
    }

    return esc_attr($alt);
  }
}




/**
 * تیره یا روشن کردن رنگ Hex
 *
 * @param string $hex   رنگ Hex (#12a9ff)
 * @param int    $amount مقدار تغییر Lightness
 *                       منفی = تیره‌تر
 *                       مثبت = روشن‌تر
 *
 * @return string
 */
function adjust_hex_lightness($hex, $amount = -20)
{
  $hex = ltrim($hex, '#');

  if (strlen($hex) == 3) {
    $hex =
      $hex[0] . $hex[0] .
      $hex[1] . $hex[1] .
      $hex[2] . $hex[2];
  }

  $r = hexdec(substr($hex, 0, 2)) / 255;
  $g = hexdec(substr($hex, 2, 2)) / 255;
  $b = hexdec(substr($hex, 4, 2)) / 255;

  $max = max($r, $g, $b);
  $min = min($r, $g, $b);

  $h = $s = 0;
  $l = ($max + $min) / 2;

  if ($max != $min) {

    $d = $max - $min;

    $s = $l > 0.5
      ? $d / (2 - $max - $min)
      : $d / ($max + $min);

    switch ($max) {
      case $r:
        $h = ($g - $b) / $d + ($g < $b ? 6 : 0);
        break;

      case $g:
        $h = ($b - $r) / $d + 2;
        break;

      case $b:
        $h = ($r - $g) / $d + 4;
        break;
    }

    $h /= 6;
  }

  // تغییر روشنایی
  $l += $amount / 100;

  $l = max(0, min(1, $l));

  $hue2rgb = function ($p, $q, $t) {

    if ($t < 0) $t += 1;
    if ($t > 1) $t -= 1;

    if ($t < 1 / 6) return $p + ($q - $p) * 6 * $t;
    if ($t < 1 / 2) return $q;
    if ($t < 2 / 3) return $p + ($q - $p) * (2 / 3 - $t) * 6;

    return $p;
  };

  if ($s == 0) {

    $r = $g = $b = $l;
  } else {

    $q = $l < 0.5
      ? $l * (1 + $s)
      : $l + $s - $l * $s;

    $p = 2 * $l - $q;

    $r = $hue2rgb($p, $q, $h + 1 / 3);
    $g = $hue2rgb($p, $q, $h);
    $b = $hue2rgb($p, $q, $h - 1 / 3);
  }

  return sprintf(
    '#%02X%02X%02X',
    round($r * 255),
    round($g * 255),
    round($b * 255)
  );
}



function theme_custom_css_variables()
{
  $primary_color = get_field('primary_color', 'option');

  if (empty($primary_color)) {
    $primary_color = '#12a9ff';
  }

  // حذف #
  $hex = ltrim($primary_color, '#');

  // تبدیل Hex به RGB
  if (strlen($hex) === 3) {
    $r = hexdec(str_repeat($hex[0], 2));
    $g = hexdec(str_repeat($hex[1], 2));
    $b = hexdec(str_repeat($hex[2], 2));
  } else {
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
  }
  $primary_dark = adjust_hex_lightness($primary_color, -10);
  $primary_darker = adjust_hex_lightness($primary_color, -20);
  $primary_darkest = adjust_hex_lightness($primary_color, -30);

?>
  <style>
    :root {
      --primary-color: <?= esc_html($primary_color); ?>;
      --secondary-color: rgba(<?= $r; ?>, <?= $g; ?>, <?= $b; ?>, .20);
      --primary-rgb: <?= $r; ?>, <?= $g; ?>, <?= $b; ?>;
      --primary-dark: <?= esc_html($primary_dark); ?>;
      --primary-darker: <?= esc_html($primary_darker); ?>;
      --primary-darkest: <?= esc_html($primary_darkest); ?>;
    }
  </style>
<?php
}

add_action('wp_head', 'theme_custom_css_variables');





