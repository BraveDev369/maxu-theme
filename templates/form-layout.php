<?php
if (! defined("ABSPATH")) exit;

$errors = [];
$old = [];

if (isset($_GET['contact'])) {
  $data = json_decode(
    base64_decode(
      urldecode($_GET['contact'])
    ),
    true
  );

  $errors = $data['errors'] ?? [];
  $old    = $data['old'] ?? [];
}
?>


<div class="contact_about_us">
  <h2 class="contact-title">دیدگاه خود را بیان کنید</h2>

  <form class="contact-form" action="<?= esc_url(admin_url('admin-post.php')); ?>" method="post">
    <input type="hidden" name="action" value="contact_form">

    <?php wp_nonce_field('contact_form_action', 'contact_nonce'); ?>
    <div class="contact_form_inner">

      <div class="form_field">

        <div class="form_field_inner">
          <input
            class="js-name"
            type="text"
            name="name"
            value="<?= esc_attr($old['name'] ?? '') ?>"
            placeholder="نام شما">
          <small class="error-message text-red"><?= esc_html($errors['name'] ?? '') ?></small>
        </div>
        <div class="form_field_inner">
          <input
            class="js-email"

            type="text"
            name="email"
            value="<?= esc_attr($old['email'] ?? '') ?>"
            placeholder="ایمیل">
          <small class="error-message text-red"><?= esc_html($errors['email'] ?? '') ?></small>
        </div>

        <div class="form_field_inner">
          <input
            class="js-phone"
            type="text"
            name="phone"
            placeholder="شماره تماس"
            value="<?= esc_attr($old['phone'] ?? '') ?>">
          <small class="error-message text-red"><?= esc_html($errors['phone'] ?? '') ?></small>
        </div>



        <div class="form_field_inner">
          <input
            class="js-website"
            type="text"
            name="website"
            placeholder="آدرس وبسایت"
            value="<?= esc_attr($old['website'] ?? '') ?>">
          <small class="error-message text-red"><?= esc_html($errors['website'] ?? '') ?></small>
        </div>



        <div class="form_field_comment">
          <textarea
            class="js-message"
            name="message"
            placeholder="پیام خود را بنویسید ..."
            cols="30"
            rows="10"><?= esc_textarea($old['message'] ?? '') ?></textarea>
          <small class="error-message text-red"><?= esc_html($errors['message'] ?? '') ?></small>
        </div>

      </div>

    </div>



    <div class="contact_bnt single_btns">
      <button type="submit" name="submit">
        <?= esc_html('ارسال دیدگاه') ?>
      </button>
    </div>

  </form>


</div>

<?php if (isset($_GET['contact'])) : ?>

  <?php if ($_GET['contact'] === 'success') : ?>

    <div class="toast-notification toast-success js-toast">
      <button type="button" class="toast-close">&times;</button>
      <span class="toast-text">پیام شما با موفقیت ثبت شد.</span>
    </div>

  <?php elseif ($_GET['contact'] === 'db_error') : ?>

    <div class="toast-notification toast-error js-toast">
      <button type="button" class="toast-close">&times;</button>
      <span class="toast-text">خطایی هنگام ذخیره اطلاعات رخ داد.</span>
    </div>

  <?php endif; ?>

<?php endif; ?>