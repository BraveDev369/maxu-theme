<?php
if (! defined('ABSPATH')) exit;


$section_title       = get_field('section_title');
$section_description = get_field('section_description');
$posts_count         = get_field('posts_count') ?: 3;

$blog_query = new WP_Query([
  'post_type'           => 'post',
  'post_status'         => 'publish',
  'posts_per_page'      => $posts_count,
  'ignore_sticky_posts' => true,
  'no_found_rows'       => true,
]);

?>

<div class="blog_area" id="blog">
  <div class="container">

    <div class="row">
      <div class="col-md-12">

        <div class="section_title lage">

          <?php if ($section_title) : ?>
            <h2><?= esc_html($section_title); ?></h2>
          <?php endif; ?>

          <?php if ($section_description) : ?>
            <p><?= esc_html($section_description); ?></p>
          <?php endif; ?>

        </div>

      </div>
    </div>

    <?php if ($blog_query->have_posts()) : ?>

      <div class="row">

        <div class="blog_active owl-carousel curosel-style">

          <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>

            <div class="col-md-12 col-sm-12">

              <div class="single_blog">

                <div class="single_blog_inner">

                  <div class="single_blog_thumb">

                    <a href="<?php esc_url(the_permalink()); ?>">

                      <?php if (has_post_thumbnail()) : ?>

                        <?php the_post_thumbnail('large', [
                          'class' => 'img-responsive'
                        ]); ?>

                      <?php endif; ?>

                    </a>

                  </div>

                  <div class="single_blog_post_meta">

                    <a href="#">
                      <i class="fa fa-user"></i>
                      <?php esc_html(the_author()); ?>
                    </a>

                    <a href="#">
                      <i class="fa fa-clock-o"></i>
                      <?= esc_html(get_the_date()); ?>
                    </a>

                    <a href="<?= esc_url(comments_link()); ?>">
                      <i class="fa fa-comment-o"></i>
                      <?= esc_html(get_comments_number()); ?>
                    </a>

                  </div>

                </div>

                <div class="single_blog_title">

                  <a href="<?= esc_url(the_permalink()); ?>">

                    <h2><?= esc_html(the_title()); ?></h2>

                  </a>

                  <p>

                    <?= esc_html(wp_trim_words(get_the_excerpt(), 18)); ?>

                  </p>

                </div>

                <div class="single_blog_bnt">

                  <a href="<?=  esc_url(the_permalink()); ?>">

                    بیشتر بخوانید

                    <i class="fa fa-angle-left"></i>

                  </a>

                </div>

              </div>

            </div>

          <?php endwhile; ?>

        </div>

      </div>

      <?php wp_reset_postdata(); ?>

    <?php endif; ?>

  </div>
</div>