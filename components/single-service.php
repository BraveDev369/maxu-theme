<?php

if (! defined("ABSPATH")) exit;

$service = get_fields();
?>


<div class="blog_area single_max site_b">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6">
        <!-- single blog -->
        <div class="single_blog">
          <div class="single_blog_inner">
            <!-- thumb -->
            <div class="">
              <?php if (!empty($service['service_image'])) : ?>
                <img
                  src="<?= esc_url($service['service_image']['url']); ?>"
                  alt="<?= esc_attr($service['service_image']['alt']); ?>">
              <?php endif; ?>
            </div>
            <!-- meta -->
          </div>
          <!-- title -->
          <div class="single_blog_title">
            <h2><?= esc_html($service['section_title']); ?></h2>
          </div>
          <!-- content -->
          <div class="single_blog_content">
            <p><?= esc_html($service['section_description']); ?></p>
          </div>
        </div>
      </div>
      <?php get_template_part('templates/sidebar') ?>
    </div>
  </div>
</div>