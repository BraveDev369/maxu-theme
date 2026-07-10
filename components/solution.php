<?php
if (! defined('ABSPATH')) exit;

$solution = get_fields();
?>

<div class="solution_area">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="solution_title">

          <h1><?= esc_html($solution['solution_title_1']); ?></h1>

          <h2><?= esc_html($solution['solution_title_2']); ?></h2>

          <p><?= esc_html($solution['solution_description']); ?></p>

          <?php if (!empty($solution['solution_button_url'])) : ?>

            <?php if (is_array($solution['solution_button_url'])) :

              $button = $solution['solution_button_url'];
              $target = $button['target'] ?? '_self';

            ?>

              <div class="solution_btn">
                <div class="btns">
                  <a href="<?= esc_url($button['url'] ?? '#'); ?>"
                    target="<?= esc_attr($target); ?>"
                    <?= $target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>>

                    <?= esc_html($solution['solution_button_text'] ?? 'بیشتر بخوانید'); ?>

                  </a>
                </div>
              </div>

            <?php else : ?>

              <div class="solution_btn">
                <div class="btns">
                  <a href="<?= esc_url($solution['solution_button_url']['url']); ?>">
                    <?= esc_html($solution['solution_button_text'] ?? 'بیشتر بخوانید'); ?>
                  </a>
                </div>
              </div>

            <?php endif; ?>

          <?php endif; ?>

        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-xs-12">

        <?php if (!empty($solution['solution_image'])) : ?>

          <div class="solution_thumb">
            <img
              src="<?= esc_url($solution['solution_image']['url']); ?>"
              alt="<?= esc_attr($solution['solution_image']['alt'] ?? ''); ?>">
          </div>

        <?php endif; ?>

      </div>

    </div>
  </div>
</div>