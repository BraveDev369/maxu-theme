<?php
if (! defined('ABSPATH')) exit;

$feature_action_var = get_fields();
?>

<div class="feature_area">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="section_title">

          <h2><?= esc_html($feature_action_var['section_title']); ?></h2>

          <p><?= esc_html($feature_action_var['section_description']); ?></p>

        </div>
      </div>
    </div>

    <div class="row">

      <?php
      $services = new WP_Query([
        'post_type'      => 'service',
        'posts_per_page' => 3,
        'post_status'    => 'publish',
      ]);

      if ($services->have_posts()) :
        while ($services->have_posts()) :
          $services->the_post();

          $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
          $alt   = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
      ?>

          <div class="col-md-4 col-sm-6 col-xs-12">

            <div class="single_feature">

              <div class="single_feature_inner">

                <div class="single_feature_thumb">

                  <?php if ($image) : ?>
                    <img
                      src="<?= esc_url($image); ?>"
                      alt="<?= esc_attr($alt ?: get_the_title()); ?>">
                  <?php endif; ?>

                </div>

                <div class="single_feature_content">

                  <h2><?= esc_html(get_the_title()); ?></h2>

                  <?php
                  $excerpt = get_the_excerpt();

                  if (mb_strlen($excerpt) > 125) {
                    $excerpt = mb_substr($excerpt, 0, 125) . '...';
                  }
                  ?>

                  <p><?= esc_html($excerpt); ?></p>

                </div>

              </div>

            </div>

          </div>

      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>

    </div>

  </div>
</div>