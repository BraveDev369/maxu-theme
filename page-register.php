<?php
if (!defined('ABSPATH')) exit;

get_header();

$login_url = get_field('login_url', 'option');

$errors = [];
$old = [];

if (isset($_GET['register']) && $_GET['register'] !== 'success') {

  $data = json_decode(
    base64_decode(
      urldecode($_GET['register'])
    ),
    true
  );

  $errors = $data['errors'] ?? [];
  $old    = $data['old'] ?? [];
}
?>

<div class="container" style="margin-top: 50px; margin-bottom:50px">

  <div class="row">

    <div class="col-md-6 col-md-offset-3">

      <div class="panel panel-default">

        <div class="panel-body">

          <h2 class="text-center">
            ثبت نام
          </h2>

          <br>

          <?php if (!empty($errors['general'])) : ?>
            <div class="alert alert-danger">
              <?= esc_html($errors['general']); ?>
            </div>
          <?php endif; ?>

          <form class="js-register-form"
            action="<?= esc_url(admin_url('admin-post.php')); ?>"
            method="post">

            <?php wp_nonce_field('maxu_register', 'maxu_register_nonce'); ?>

            <input
              type="hidden"
              name="action"
              value="maxu_register">

            <div class="form-group">

              <label>نام کاربری</label>

              <input
                type="text"
                name="username"
                class="form-control js-register-username"
                value="<?= esc_attr($old['username'] ?? ''); ?>">

              <?php if (!empty($errors['username'])) : ?>
                <small class="text-danger">
                  <?= esc_html($errors['username']); ?>
                </small>
              <?php endif; ?>

            </div>

            <div class="form-group">

              <label>ایمیل</label>

              <input
                type="email"
                name="email"
                class="form-control js-register-email"
                value="<?= esc_attr($old['email'] ?? ''); ?>">

              <?php if (!empty($errors['email'])) : ?>
                <small class="text-danger">
                  <?= esc_html($errors['email']); ?>
                </small>
              <?php endif; ?>

            </div>

            <div class="form-group">

              <label>رمز عبور</label>

              <input
                type="password"
                name="password"
                class="form-control js-register-password">

              <?php if (!empty($errors['password'])) : ?>
                <small class="text-danger">
                  <?= esc_html($errors['password']); ?>
                </small>
              <?php endif; ?>

            </div>

            <div class="form-group">

              <label>تکرار رمز عبور</label>

              <input
                type="password"
                name="confirm_password"
                class="form-control js-register-confirm-password">

              <?php if (!empty($errors['confirm_password'])) : ?>
                <small class="text-danger">
                  <?= esc_html($errors['confirm_password']); ?>
                </small>
              <?php endif; ?>

            </div>

            <button
              type="submit"
              class="btn btn-primary btn-block">

              ثبت نام

            </button>

            <br>

            <div class="text-center">

              <span>حساب کاربری دارید؟ </span>

              <a class="primary-color" href="<?= esc_url($login_url['url'] ?? '#'); ?>">
                وارد شوید
              </a>

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

</div>

<?php get_footer(); ?>