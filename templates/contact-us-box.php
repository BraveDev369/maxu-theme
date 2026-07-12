<?php
if (! defined("ABSPATH")) exit;
$phone_numbers  = get_field('phone_numbers', 'option');
$emails_address  = get_field('emails_address', 'option');
$address  = get_field('address', 'option');
$address_link  = get_field('address_link', 'option');
?>
<div class="contact_about_us">
  <h2 class="contact-title">اطلاعات تماس</h2>
  <!-- About contact -->
  <div class="contact-address">
    <?php if ($phone_numbers): ?>
      <div class="contact_s_inner">
        <div class="contact-sociala-icon">
          <a href="#"><i class="fa fa-phone"></i></a>
        </div>
        <div class="contact-sociala-info">
          <p>
            <?php foreach ($phone_numbers as $phone_number) : ?>
              <a href="tel:<?= esc_html($phone_number['phone_number']) ?>"><span class="ltr_text"><?= esc_html($phone_number['phone_number']) ?></span></a>
              <br>
            <?php endforeach; ?>
          </p>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($emails_address): ?>
      <div class="contact_s_inner">
        <div class="contact-sociala-icon">
          <a href="#"><i class="fa fa-envelope"></i></a>
        </div>
        <div class="contact-sociala-info">
          <p>
            <?php foreach ($emails_address as $email_address) : ?>

              <a href="mailto:<?= esc_attr($email_address['email']) ?>"><?= esc_html($email_address['email']) ?></a>
              <br>
            <?php endforeach; ?>
          </p>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($address): ?>

      <div class="contact_s_inner">
        <div class="contact-sociala-icon">
          <a href="#"><i class="fa fa-map-marker"></i></a>
        </div>
        <div class="contact-sociala-info">
          <a href="<?= !empty($address_link) ? esc_url($address_link) : '#'; ?>" target="<?= !empty($address_link) ? "_blank" : ''; ?>">
            <?= esc_html($address); ?>
          </a>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($address_link): ?>

      <iframe
        src="<?= esc_url($address_link) ?>"
        width="100%"
        height="130px"
        style="border:0;"
        loading="lazy">
      </iframe>
    <?php endif; ?>

  </div>
</div>