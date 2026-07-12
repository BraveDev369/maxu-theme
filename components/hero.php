<?php
if (!defined('ABSPATH')) exit;

$hero_action_var = get_fields();
?>

<div class="witr_slider_area">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="witr_ds_content_area witr_dsider_js_active" dir="rtl">

          <?php foreach ($hero_action_var['hero_slides'] as $hero) : ?>
            <div class="witr_ds_slider_content">
              <div class="witr_ds_content text-<?= esc_attr($hero['text_align']); ?>">
                <div class="witr_ds_content_inner container">

                  <h2><?= esc_html($hero['title_1']); ?></h2>

                  <h2><?= esc_html($hero['title_2']); ?></h2>

                  <p><?= esc_html($hero['description']); ?></p>

                  <div class="slider_btn">
                    <div class="btns">
                      <a href="<?= esc_url($hero['button_link']); ?>">
                        <?= esc_html($hero['button_text']); ?>
                      </a>
                    </div>
                  </div>

                  <?php if ($hero['text_align'] !== 'center') : ?>
                    <div class="witr_slider_thumb">
                      <div class="witr_slider_thumb_inner">
                        <img
                          src="<?= esc_url($hero['image']['url']); ?>"
                          alt="<?= esc_attr($hero['image']['title']); ?>">
                      </div>
                    </div>
                  <?php endif; ?>

                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</div>