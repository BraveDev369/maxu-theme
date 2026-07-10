<?php
if (! defined('ABSPATH')) exit;

$social_medias = get_field('social_medias', 'option');

$phone_numbers    = get_field('phone_numbers', 'option');
$emails_address    = get_field('emails_address', 'option');

?>
<div class="maxu-header-top">
  <div class="container">
    <div class="row">
      <!-- TOP LEFT -->
      <div class="col-xs-12 col-md-8 col-sm-8">
        <div class="top-address">
          <p>
            <?php if ($phone_numbers): ?>
              <a href="tel:<?= esc_html($phone_numbers[0]['phone_number']) ?>"><i class="fa fa-phone"></i><span class="ltr_text"><?= esc_html($phone_numbers[0]['phone_number']) ?></span></a>
            <?php endif; ?>
            <?php if ($emails_address): ?>
              <a href="mailto:<?= esc_html($emails_address[0]['email']) ?>"><i class="fa fa-envelope-o"></i><?= esc_html($emails_address[0]['email']) ?></a>
            <?php endif; ?>

          </p>
        </div>
      </div>
      <!-- TOP RIGHT -->
      <div class="col-xs-12 col-md-4 col-sm-4">
        <div class="top-right-menu">
          <ul class="social-icons text-right">
            <?php if (!empty($social_medias)) : ?>
              <?php foreach ($social_medias as $sm) : ?>
                <?php if ($sm['social_link']) : ?>
                  <li>
                    <a class="social-icon" href="<?= esc_url($sm['social_link']); ?>" title="<?= esc_html($sm['social_name']) ?>" target="_blank" rel="noopener noreferrer">
                      <i class="fa fa-<?= esc_attr($sm['social_icon']) ?> fa-fw"></i>
                    </a>
                  </li>
            <?php endif;
              endforeach;
            endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>