<?php
if (! defined('ABSPATH')) exit;

$hero_action_var = get_fields();
?>


<div class="witr_slider_area">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-sm-12">
        <div class="witr_ds_content_area witr_dsider_js_active" dir="rtl">
          <!-- single slider item -->
          <?php foreach ($hero_action_var['hero_slides'] as $hero) : ?>
            <div class="witr_ds_slider_content">
              <div class="witr_ds_content text-<?= $hero['text_align']; ?>">
                <div class="witr_ds_content_inner container">
                  <h2><?= $hero['title_1']; ?></h2>
                  <h2> <?= $hero['title_2']; ?></h2>
                  <p><?= $hero['description']; ?></p>
                  <!-- btn -->
                  <div class="slider_btn">
                    <div class="btns">
                      <a href="<?= $hero['button_link']; ?>"><?= $hero['button_text']; ?></a>
                    </div>
                  </div>
                  <!-- slider thumb image -->
                  <?php if ($hero['text_align'] != 'center') : ?>
                    <div class="witr_slider_thumb">
                      <div class="witr_slider_thumb_inner">
                        <img src="<?= $hero['image']['url']; ?>" alt="<?= $hero['image']['title']; ?>">
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!-- single slider item -->
        </div>
      </div>
    </div>
  </div>
</div>