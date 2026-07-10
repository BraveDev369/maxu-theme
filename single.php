<?php
if (! defined('ABSPATH')) exit;
get_header();


get_template_part('components/page-title');

?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="blog_area single_max site_b">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6">
            <!-- single blog -->
            <div class="single_blog">
              <div class="single_blog_inner">
                <!-- thumb -->
                <div class="single_blog_thumb">
                  <img src="<?= esc_url(get_the_post_thumbnail_url()) ?>" alt="<?= esc_attr(img_alt(get_the_id())) ?>">
                </div>
                <!-- meta -->
                <div class="single_blog_post_meta">
                  <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                    <i class="fa fa-user"></i>
                    <?php echo esc_html(get_the_author()); ?>
                  </a>
                  <a href="#"><i class="fa fa-clock-o"></i><span><?= jdate('l j F Y', get_the_time('U')); ?></span></a>
                  <a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i><?php echo get_comments_number(); ?></a>
                </div>
              </div>
              <!-- title -->
              <div class="single_blog_title">
                <h2><?= esc_html(get_the_title()) ?></h2>
              </div>
              <!-- content -->
              <div class="single_blog_content">
                <p style="text-align: justify;">
                  <?php echo get_the_excerpt(); ?>
                </p>
              </div>
            </div>

            <!-- comment area -->
            <?php if (get_comments_number() != 0) : ?>
              <div class="comment_area">

                <div class="comment_inner">
                  <h2>
                    دیدگاه‌ها (<?= esc_html(get_comments_number()); ?>)
                  </h2>

                  <?php comments_template() ?>

                </div>

              </div>
            <?php endif; ?>
            <!-- START BOLOG AREA -->

            <?php

            echo get_template_part('./templates/comments');
            ?>

            <!-- END BOLOG AREA	 -->
          </div>

          <?php get_template_part('templates/sidebar') ?>
        </div>
      </div>
    </div>
<?php endwhile;
endif; ?>
<?php
get_footer();
?>