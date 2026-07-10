<?php
if (! defined('ABSPATH')) exit;
get_header();

get_template_part('components/page-title');

?>
<div class="blog_area site_b">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6">
        <div class="row">
          <!-- single blog -->
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

              <div class="col-md-6 col-xs-12">

                <div class="single_blog">

                  <div class="single_blog_inner">

                    <!-- thumb -->
                    <div class="single_blog_thumb">

                      <a href="<?php the_permalink(); ?>">

                        <?php
                        if (has_post_thumbnail()) {
                          the_post_thumbnail('large', [
                            'class' => 'img-responsive',
                            'alt'   => get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true),
                          ]);
                        }
                        ?>

                      </a>

                    </div>

                    <!-- meta -->
                    <div class="single_blog_post_meta">

                      <a href="<?= esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <i class="fa fa-user"></i>
                        <?php the_author(); ?>
                      </a>
                      <a href="<?= esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
                        <i class="fa fa-clock-o"></i>
                        <span><?= jdate('l j F Y', get_post_timestamp()); ?></span>
                      </a>

                      <a href="<?php comments_link(); ?>">
                        <i class="fa fa-comment-o"></i>

                        <?php echo get_comments_number(); ?>
                      </a>

                    </div>

                  </div>

                  <!-- title -->
                  <div class="single_blog_title">

                    <a href="<?php the_permalink(); ?>">
                      <h2><?php the_title(); ?></h2>
                    </a>

                    <p>
                      <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                    </p>

                  </div>

                  <!-- button -->
                  <div class="single_blog_bnt">

                    <a href="<?php the_permalink(); ?>">
                      بیشتر بخوانید
                      <i class="fa fa-angle-left"></i>
                    </a>

                  </div>

                </div>

              </div>

            <?php endwhile; ?>

          <?php else : ?>

            <div class="col-md-12">
              <p>هیچ مطلبی یافت نشد.</p>
            </div>

          <?php endif; ?>

        </div>
        <!-- START PAGINATION -->
        <div class="row">
          <div class="col-md-12">
            <div class="paginations">

              <ul class="page-numbers">

                <?php
                echo paginate_links([
                  'type'      => 'array',
                  'mid_size'  => 2,
                  'prev_text' => '<i class="fa fa-long-arrow-right"></i>',
                  'next_text' => '<i class="fa fa-long-arrow-left"></i>',
                ])
                  ? '<li>' . implode('</li><li>', paginate_links([
                    'type'      => 'array',
                    'mid_size'  => 2,
                    'prev_text' => '<i class="fa fa-long-arrow-right"></i>',
                    'next_text' => '<i class="fa fa-long-arrow-left"></i>',
                  ])) . '</li>'
                  : '';
                ?>

              </ul>

            </div>
          </div>
        </div>
        <!-- END START PAGINATION -->
      </div>

      <?php get_template_part('templates/sidebar') ?>

    </div>
  </div>
</div>
<?php
get_footer();
?>