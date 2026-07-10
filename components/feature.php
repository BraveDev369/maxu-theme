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
      <?php if (!empty($feature_action_var['features'])): ?>
        <?php foreach ($feature_action_var['features'] as $feature) : ?>

          <div class="col-md-4 col-sm-6 col-xs-12">

            <div class="single_feature">

              <div class="single_feature_inner">

                <div class="single_feature_thumb">

                  <img
                    src="<?= esc_url($feature['image']['url']); ?>"
                    alt="<?= esc_attr($feature['image']['alt']); ?>">

                </div>

                <div class="single_feature_content">

                  <h2><?= esc_html($feature['title']); ?></h2>

                  <p><?= esc_html($feature['description']); ?></p>

                </div>

              </div>

            </div>

          </div>

        <?php endforeach; ?>
      <?php endif; ?>
    </div>

  </div>
</div>