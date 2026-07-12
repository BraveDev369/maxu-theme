<?php
if (! defined('ABSPATH')) exit;
$service = get_fields();
?>
<?php
$services = new WP_Query([
  'post_type'      => 'service',
  'posts_per_page' => -1,
  'post_status'    => 'publish',
  'orderby'        => 'menu_order',
  'order'          => 'ASC',
]);
?>
<?php if ($services->have_posts()) : ?>
  <div class="service_area" id="service">
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div class="section_title">

            <h2><?= esc_html($service['title']); ?></h2>

            <p><?= esc_html($service['description']); ?></p>

          </div>
        </div>
      </div>


      <div class="row">

        <?php while ($services->have_posts()) : $services->the_post(); ?>

          <div class="col-md-4 col-sm-6 col-xs-12">

            <div class="single_service">

              <div class="single_service_inner">

                <?php if (has_post_thumbnail()) : ?>

                  <div class="single_service_thumb">

                    <?php the_post_thumbnail('medium'); ?>

                  </div>

                <?php endif; ?>

                <div class="single_service_content">

                  <h2><?= esc_html(get_the_title()); ?></h2>

                  <?php
                  $excerpt = get_the_excerpt();

                  if (mb_strlen($excerpt) > 100) {
                    $excerpt = mb_substr($excerpt, 0, 100) . '...';
                  }
                  ?>

                  <p><?= esc_html($excerpt); ?></p>

                </div>

                <div class="service_btn">

                  <a href="<?= esc_url(get_permalink()); ?>">
                    مشاهده بیشتر
                  </a>

                </div>

              </div>

            </div>

          </div>

        <?php endwhile; ?>

      </div>

      <?php wp_reset_postdata(); ?>

    <?php endif; ?>

    </div>
  </div>