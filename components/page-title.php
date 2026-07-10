<?php
if (!defined('ABSPATH')) exit;

/**
 * -----------------------------
 * تصویر پس‌زمینه
 * -----------------------------
 */
$page_title_image    = get_field('page_title_image', 'option');

if (isset($block)) {

  // اگر به صورت بلاک ACF لود شده
  $fields = get_fields();
  $image  = $fields['image'] ?? '';
} else {

  if (is_singular() && has_post_thumbnail()) {

    $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
  } else {
    $image = $page_title_image ?: '';
  }
}

if($page_title_image){
  $image = $page_title_image;
}


/**
 * -----------------------------
 * عنوان صفحه
 * -----------------------------
 */

if (is_front_page()) {

  $title = get_bloginfo('name');
} elseif (is_home()) {

  $blog_page = get_option('page_for_posts');

  $title = $blog_page ? get_the_title($blog_page) : 'وبلاگ';
} elseif (is_singular()) {

  $title = get_the_title();
} elseif (is_author()) {

  $author = get_queried_object();

  $title = $author->display_name;
} elseif (is_category()) {

  $title = single_cat_title('', false);
} elseif (is_tag()) {

  $title = single_tag_title('', false);
} elseif (is_tax()) {

  $title = single_term_title('', false);
} elseif (is_post_type_archive()) {

  $title = post_type_archive_title('', false);
} elseif (is_day()) {

  $title = jdate('j F Y', strtotime(get_query_var('year') . '-' . get_query_var('monthnum') . '-' . get_query_var('day')));
} elseif (is_month()) {

  $title = jdate('F Y', strtotime(get_query_var('year') . '-' . get_query_var('monthnum') . '-01'));
} elseif (is_year()) {

  $title = jdate('Y', strtotime(get_query_var('year') . '-01-01'));
} elseif (is_archive()) {

  $title = get_the_archive_title();
} elseif (is_search()) {

  $title = 'نتایج جستجو برای "' . get_search_query() . '"';
} elseif (is_404()) {

  $title = 'صفحه پیدا نشد';
} else {

  $title = wp_get_document_title();
}
?>

<div
  class="breadcumb-area"
  style="
        background-image:url('<?= esc_url($image); ?>');
        background-size:cover;
        background-position:center;
        background-repeat:no-repeat;
    ">

  <div class="container">

    <div class="row">

      <div class="col-md-12 txtc text-center ccase">

        <div class="breadcumb-inner">

          <ul>

            <li>
              <a href="<?= esc_url(home_url('/')); ?>">
                خانه
              </a>
            </li>

            <li>
              <i class="fa fa-angle-left"></i>
            </li>

            <li>
              <?= esc_html($title); ?>
            </li>

          </ul>

        </div>

      </div>

    </div>

  </div>

</div>