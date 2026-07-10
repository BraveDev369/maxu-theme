<?php

$errors = [];
$old = [];

if (isset($_GET['contact'])) {

  if ($_GET['contact'] === 'success') {

    echo '<div class="alert alert-success">
                پیام شما با موفقیت ثبت شد.
              </div>';
  } elseif ($_GET['contact'] === 'db_error') {

    echo '<div class="alert alert-danger">
                خطایی هنگام ذخیره اطلاعات رخ داد.
              </div>';
  } else {

    $data = json_decode(
      base64_decode(
        urldecode($_GET['contact'])
      ),
      true
    );

    $errors = $data['errors'] ?? [];
    $old    = $data['old'] ?? [];
  }
}
?>


<div class="contact_about_us">
  <h2 class="contact-title">دیدگاه خود را بیان کنید</h2>

  <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="post">
    <input type="hidden" name="action" value="contact_form">

    <?php wp_nonce_field('contact_form_action', 'contact_nonce'); ?>
    <div class="contact_form_inner">

      <div class="form_field">

        <div class="form_field_inner">
          <input
            type="text"
            name="name"
            value="<?= esc_attr($old['name'] ?? '') ?>"
            placeholder="نام شما">
          <?php if (!empty($errors['name'])) : ?>
            <small class="text-danger">
              <?= esc_html($errors['name']) ?>
            </small>
          <?php endif; ?>
        </div>
        <div class="form_field_inner">
          <input
            type="email"
            name="email"
            value="<?= esc_attr($old['email'] ?? '') ?>"
            placeholder="ایمیل">
          <?php if (!empty($errors['email'])) : ?>
            <small class="text-danger">
              <?= esc_html($errors['email']) ?>
            </small>
          <?php endif; ?>
        </div>

        <div class="form_field_inner">
          <input
            type="text"
            name="phone"
            placeholder="شماره تماس"
            value="<?= esc_attr($old['phone'] ?? '') ?>">
        </div>



        <div class="form_field_inner">
          <input
            type="text"
            name="website"
            placeholder="آدرس وبسایت"
            value="<?= esc_attr($old['website'] ?? '') ?>">
        </div>



        <div class="form_field_comment">
          <textarea
            name="message"
            placeholder="پیام خود را بنویسید ..."
            cols="30"
            rows="10"
            required><?= esc_textarea($old['message'] ?? '') ?></textarea>
          <?php if (!empty($errors['message'])) : ?>
            <small class="text-danger">
              <?= esc_html($errors['message']) ?>
            </small>
          <?php endif; ?>
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