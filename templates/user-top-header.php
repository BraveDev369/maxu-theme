<?php
if (! defined('ABSPATH')) exit;

$sign_up_url = get_field("sign_up_url", "option");
if (is_user_logged_in()) :
?>

  <?php $current_user = wp_get_current_user(); ?>

  <div class="header-user">

    <button type="button" class="header-user-toggle">
      <i class="fa fa-user"></i>
    </button>

    <div class="header-user-dropdown">

      <div class="header-user-info">

        <strong>
          <?= esc_html($current_user->display_name); ?>
        </strong>

        <small>
          <?= esc_html($current_user->user_email); ?>
        </small>

      </div>

      <ul>
        <?php if (current_user_can('administrator')) : ?>

          <li>
            <a href="<?= esc_url(admin_url()); ?>">
              پیشخوان
            </a>
          </li>

        <?php endif; ?>

        <li>
          <a class="text-red" href="<?= esc_url(wp_logout_url(home_url())); ?>">
            خروج
          </a>
        </li>

      </ul>

    </div>

  </div>

<?php else : ?>

  <?php if (!empty($sign_up_url)) : ?>

    <div class="header_btn">
      <div class="btns">
        <a href="<?= esc_url($sign_up_url['url']) ?>">
          ثبت‌نام
        </a>
      </div>
    </div>

  <?php endif; ?>

<?php endif; ?>