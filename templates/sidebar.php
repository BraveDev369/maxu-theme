<?php
if (! defined('ABSPATH')) exit;

$title       = get_field('about_title', 'option');
$image       = get_field('about_image', 'option');
$name        = get_field('name', 'option');
$position    = get_field('about_position', 'option');
$description = get_field('about_description', 'option');

$social_medias = get_field('social_medias', 'option');

$post_type = get_post_type()
?>

<div class="col-md-4 col-sm-6">
  <div class="blog-left-side widget">
    <div id="search-3" class="widget widget_search">
      <div class="search">
        <form role="search" action="<?= esc_url(home_url('/')); ?>" method="get">
          <input
            style="padding-right: 10px;"
            type="search"
            name="s"
            value=""
            placeholder="جستجو..."
            title="جستجو برای:">
          <input type="hidden" name="post_type" value="<?= esc_attr($post_type) ?>" />
          <button type="submit" class="icons">
            <i class="fa fa-search"></i>
          </button>
        </form>
      </div>
    </div>
    <div id="text-4" class="widget widget_text">
      <h2 class="widget-title">درباره ما</h2>
      <div class="widget_thumb">
        <img src="<?= esc_url($image['url']); ?>" alt="">
      </div>
      <h3><?= $name ?><span> - بنیان گذار</span></h3>
      <p><?= esc_html($description); ?></p>
      <div class="widget_icon">
        <?php if ($social_medias) : ?>
          <?php foreach ($social_medias as $sm): ?>
            <?php if ($sm['social_link']): ?>
              <a href="<?= esc_url($sm['social_link']); ?>" class="<?= esc_attr($sm['social_icon']) ?>"><strong><?= esc_html($sm['social_name']) ?></strong></a>
        <?php endif;
          endforeach;
        endif; ?>
      </div>
      <!-- START SINGLE SIDEBAR -->
      <?php

      $taxonomies = get_object_taxonomies($post_type, 'objects');
      if ((!empty($taxonomies))) {
        $taxonomy = reset($taxonomies)->name;
        $cat_list = get_terms(array(
          'taxonomy' => $taxonomy,
          'orderby' => 'name',
          'order' => 'DSC',
          'hide_empty' => true
        ));
      }
      ?>
      <?php if (!empty($cat_list) and !is_wp_error($cat_list)) : ?>
        <div class="single_sidebar">
          <div class="single_sidebar_content">
            <h2>دسته ها</h2>
          </div>
          <div class="sidebar_category">
            <ul>
              <?php foreach ($cat_list as $cat) : ?>
                <li>
                  <a href="<?= esc_url(get_term_link($cat->term_id)) ?>">
                    <?= esc_html($cat->name); ?>
                  </a>
                  <span><?= esc_html($cat->count); ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      <?php endif; ?>
      <!-- START SINGLE SIDEBAR -->
      <div class="single_sidebar">
        <div class="widget_area">
          <div class="widget_search">
            <div class="search">
              <form action="#" method="get">
                <input type="text" name="s" value="" placeholder="جستجوی دسته ها ..." title="جستجو برای:">
                <input type="hidden" name="post_type" value="<?= esc_attr($taxonomy) ?>" />
                <button type="submit" class="icons">
                  <i class="fa fa-search"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- START SINGLE SIDEBAR -->
      <?php if ($social_medias) : ?>
        <div class="single_sidebar">
          <div class="single_sidebar_content">
            <h2>ما را دنبال کنید</h2>
          </div>
          <div class="widget_icon-bg">
            <?php foreach ($social_medias as $sm): ?>
              <?php if ($sm['social_link']) : ?>
                <a href="<?= esc_url($sm['social_link']); ?>" class="<?= esc_attr($sm['social_icon']) ?>" target="_blank" rel="noopener noreferrer">
                  <i class="fa fa-<?= esc_attr($sm['social_icon']) ?> fa-fw"></i><?= esc_html($sm['social_name']) ?>
                </a>
          <?php endif;
            endforeach;
          endif; ?>
          </div>
        </div>
        <!-- START SINGLE SIDEBAR -->
        <div class="single_sidebar">
          <div class="single_sidebar_content">
            <h2>مطالب محبوب</h2>
          </div>
          <?php
          $recent_posts = new WP_Query([
            'post_type'           => 'post',
            'post_status'         => 'publish',
            'posts_per_page'      => 3,
            'ignore_sticky_posts' => true,
            'no_found_rows'       => true,
          ]);
          if ($recent_posts->have_posts()) {
            while ($recent_posts->have_posts()) {
              $recent_posts->the_post();
          ?>
              <a href="<?= esc_url(get_permalink()) ?>">
                <div class="sidebar_recent_post">
                  <div class="single_recent_post">
                    <div class="recent_post_thumb">
                      <img src="<?= esc_url(get_the_post_thumbnail_url()) ?>" alt="<?= img_alt(get_the_id()) ?>">
                    </div>
                    <div class="recent_post_content">
                      <h4><?= esc_html(the_title()); ?></h4>
                    </div>
                    <div class="post_meta">
                      <span><?= esc_html(jdate('j F Y', get_the_time('U'))); ?></span>
                    </div>
                  </div>
                </div>
              </a>
          <?php
            }
            wp_reset_postdata();
          }
          ?>
        </div>
        <!-- START SINGLE SIDEBAR -->
        <div class="single_sidebar">
          <div class="single_sidebar_content">
            <h2>برچسب‌های محبوب</h2>
          </div>
          <div class="sidebar_tag">
            <?php
            $tags = get_tags([
              'hide_empty' => false,
            ]);

            if ($tags) {
              foreach ($tags as $tag) {
            ?>
                <a href="<?= esc_url(get_tag_link($tag->term_id)) ?>"><?= esc_html($tag->name) ?></a>
            <?php
              }
            }
            ?>
          </div>
        </div>
        <!-- START SINGLE SIDEBAR -->
        <?php get_template_part("templates/newsletter-form") ?>

    </div>
  </div>
</div>