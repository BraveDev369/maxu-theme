<?php
if (!defined('ABSPATH')) exit;

get_header();

$sign_up_url = get_field('sign_up_url', 'option');

$errors = [];
$old = [];

if (isset($_GET['login']) && $_GET['login'] !== 'success') {

  $data = json_decode(
    base64_decode(
      urldecode($_GET['login'])
    ),
    true
  );

  $errors = $data['errors'] ?? [];
  $old    = $data['old'] ?? [];
}
?>

<div class="container">

  <div class="row">

    <div class="col-md-6 col-md-offset-3">

      <div class="panel panel-default">

        <div class="panel-body">

          <h2 class="text-center">
            ورود
          </h2>

          <br>

          <?php if (!empty($errors['general'])) : ?>
            <div class="alert alert-danger">
              <?= esc_html($errors['general']); ?>
            </div>
          <?php endif; ?>

          <form
            class="js-login-form"
            action="<?= esc_url(admin_url('admin-post.php')); ?>"
            method="post">

            <?php wp_nonce_field('maxu_login', 'maxu_login_nonce'); ?>

            <input
              type="hidden"
              name="action"
              value="maxu_login">

            <div class="form-group">

              <label>نام کاربری یا ایمیل</label>

              <input
                type="text"
                name="username"
                class="form-control js-login-username"
                value="<?= esc_attr($old['username'] ?? '') ?>">

              <?php if (!empty($errors['username'])) : ?>
                <small class="text-danger">
                  <?= esc_html($errors['username']) ?>
                </small>
              <?php endif; ?>

            </div>

            <div class="form-group">

              <label>رمز عبور</label>

              <input
                type="password"
                name="password"
                class="form-control js-login-password">

              <?php if (!empty($errors['password'])) : ?>
                <small class="text-danger">
                  <?= esc_html($errors['password']) ?>
                </small>
              <?php endif; ?>

            </div>

            <button
              type="submit"
              class="btn btn-primary btn-block">

              ورود

            </button>

            <br>

            <div class="text-center">

              <span>حساب کاربری ندارید؟ </span>

              <a href="<?= esc_url($sign_up_url['url'] ?? '#') ?>">
                ثبت نام کنید
              </a>

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

</div>

<?php get_footer(); ?>