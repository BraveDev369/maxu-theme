<?php
if (!defined('ABSPATH')) exit;
?>
<div style="display: none;">
  <?php
  get_header();
  ?>

</div>

<section class="error-404">
  <div class="container text-center align-center">

    <h1>404</h1>

    <h2>صفحه مورد نظر پیدا نشد</h2>
    <img
      class="not-found-image"
      src="<?= esc_url(get_template_directory_uri() . '/assets/images/not-found-image.png'); ?>"
      alt="404">

    <br><br>
    <div class="btns">
      <a href="<?= esc_url(home_url('/')); ?>">
        بازگشت به صفحه اصلی
      </a>
    </div>

  </div>
</section>
<div style="display: none;">

  <?php get_footer(); ?>

</div>