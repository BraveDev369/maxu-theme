<?php

$errors = [];
$old = [];

if (isset($_GET['newsletter']) && $_GET['newsletter'] !== 'success') {

  $data = json_decode(
    base64_decode(
      urldecode($_GET['newsletter'])
    ),
    true
  );

  $errors = $data['errors'] ?? [];
  $old    = $data['old'] ?? [];
}
?>

<?php if (get_field('show_footer_newsletter', 'option')) : ?>

  <div class="single_sidebar">

    <div class="single_sidebar_content">
      <h2>خبرنامه</h2>
    </div>

    <div class="widget_area sk">

      <div class="widget_search">

        <div class="search">



          <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="post">

            <?php wp_nonce_field('maxu_newsletter', 'maxu_newsletter_nonce'); ?>

            <input
              type="hidden"
              name="action"
              value="maxu_newsletter">

            <input
              type="email"
              name="email"
              value="<?= esc_attr($old['email'] ?? '') ?>"
              placeholder="ایمیل خود را وارد کنید"
              title="عضویت در خبرنامه">

            <button type="submit" class="icons">
              <i class="fa fa-paper-plane"></i>
            </button>


          </form>

        </div>

        <?php if (!empty($errors['email'])) : ?>

          <small class="text-danger">
            <?= esc_html($errors['email']) ?>
          </small>

        <?php endif; ?>
        <?php if (isset($_GET['newsletter']) && $_GET['newsletter'] === 'success') : ?>

          <smal class="text-success">
            با موفقیت عضو خبرنامه شدید.
          </smal>

        <?php endif; ?>
      </div>

    </div>

  </div>

<?php endif; ?>