<?php
if (! defined('ABSPATH')) exit;


$section_title       = get_field('section_title');
$section_description = get_field('section_description');
$plans               = get_field('plans');

?>

<div class="pricing_area">
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

    <?php if ($plans) : ?>

      <div class="row">

        <?php foreach ($plans as $plan) : ?>

          <div class="col-md-4 col-sm-4 col-xs-12">

            <div class="single_pricing <?= !empty($plan['active']) ? 'active' : ''; ?>">

              <div class="single_pricing_title">

                <div class="single_pricing_title_inner">
                  <h3><?= esc_html($plan['title']); ?></h3>
                </div>

                <div class="single_pricing_thumb">

                  <img src="<?= get_template_directory_uri(); ?>/assets/images/prining/p-bg1.png" alt="">

                </div>

                <div class="single_pricing_item">

                  <span class="tk">
                    <?= esc_html(number_format($plan['price'], 0, '.', '٬')); ?>
                  </span>

                  <span>
                    <?= esc_html($plan['currency']); ?>
                  </span>

                </div>

              </div>

              <?php if (!empty($plan['features'])) : ?>

                <div class="pricing_text">

                  <ul>

                    <?php foreach ($plan['features'] as $feature) : ?>

                      <li>

                        <a href="#">

                          <?= esc_html($feature['text']); ?>

                        </a>

                      </li>

                    <?php endforeach; ?>

                  </ul>

                </div>

              <?php endif; ?>

              <?php if (!empty($plan['button_text'])) : ?>

                <div class="single_pricing_btn">

                  <div class="btns">

                    <a
                      href="<?= esc_url($plan['button_link']['url']); ?>"
                      target="_blank">

                      <?= esc_html($plan['button_text']); ?>

                    </a>

                  </div>

                </div>

              <?php endif; ?>

            </div>

          </div>

        <?php endforeach; ?>

      </div>

    <?php endif; ?>

  </div>
</div>