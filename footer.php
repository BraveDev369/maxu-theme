<?php
if (! defined("ABSPATH")) exit;

$phone_numbers    = get_field('phone_numbers', 'option');
$emails_address    = get_field('emails_address', 'option');

$footer_second_col_title    = get_field('footer_second_col_title', 'option');

$second_col_images    = get_field('second_col_images', 'option');

$footer_menu    = get_field('footer_menu', 'option');

$social_medias = get_field('social_medias', 'option');

$footer_button_area_menu = get_field('footer_button_area_menu', 'option');


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


<footer>
  <div class="footer-middle">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="ftitleb">
            <h2 class="footer_title">آدرس</h2>
          </div>
          <div class="footer_us">
            <!-- footer address -->
            <div class="footer-address">
              <div class="footer_s_inner">
                <div class="footer-sociala-icon">
                  <a href="#"><i class="fa fa-map-marker fa-fw"></i></a>
                </div>
                <div class="footer-sociala-info">
                  <p><?php esc_html(the_field('address', 'option')); ?></p>
                </div>
              </div>
              <?php if ($phone_numbers) : ?>
                <div class="footer_s_inner">
                  <div class="footer-sociala-icon">
                    <a href="#"><i class="fa fa-phone fa-fw"></i></a>
                  </div>
                  <div class="footer-sociala-info">
                    <?php foreach ($phone_numbers as $phone_number) : ?>
                      <a style="color: #fff;" href="tel:<?= esc_attr($phone_number['phone_number']) ?>"><span class="ltr_text"><?= esc_html($phone_number['phone_number']) ?></span></a>
                      <br>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endif; ?>
              <div class="footer_s_inner">
                <div class="footer-sociala-icon">
                  <a href="#"><i class="fa fa-envelope fa-fw"></i></a>
                </div>
                <div class="footer-sociala-info">
                  <?php foreach ($emails_address as $email_address) : ?>
                    <a style="color: #fff;" href="mailto:<?= esc_attr($email_address['email']) ?>"><span class="ltr_text"><?= esc_html($email_address['email']) ?></span></a>
                    <br>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <?php if ($footer_second_col_title) : ?>
            <div class="ftitleb">
              <h2 class="footer_title"><?= esc_html($footer_second_col_title) ?></h2>
            </div>
          <?php endif; ?>
          <?php if ($second_col_images) : ?>
            <div class="footer_text">
              <div class="text_footer_img">
                <!-- footer thumb -->
                <?php foreach ($second_col_images as $image) : ?>
                  <div class="footer_thumb">
                    <?php if ($image['image']) : ?>
                      <a href="<?= esc_url($image['image']['url']) ?>"><img src="<?= esc_url($image['image']['url']) ?>" alt="<?= esc_attr($image['image']['alt']) ?>"></a>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 ">
          <div class="ftitleb">
            <h2 class="footer_title mrfbi">پیوندها</h2>
          </div>
          <div class="widget widget_nav_menu">

            <?php if ($footer_menu) : ?>
              <div class="menu-quick-link-container">
                <ul class="menu">
                  <?php foreach ($footer_menu as $menu) : ?>
                    <li><a href="<?= esc_url(get_permalink($menu->ID)); ?>"><?= esc_html($menu->post_title); ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
            <div class="menu_netlink">
              <ul>
                <?php if (!empty($social_medias)) : ?>
                  <?php foreach ($social_medias as $sm) : ?>
                    <?php if ($sm['social_link']): ?>
                      <li>
                        <a class="facebook social-icon"
                          href="<?= esc_url($sm['social_link']); ?>"
                          title="<?= esc_attr($sm['social_name']) ?>"
                          target="_blank"
                          rel="noopener noreferrer">
                          <?= esc_html($sm['social_name']) ?>
                        </a>
                      </li>
                <?php endif;
                  endforeach;
                endif; ?>
              </ul>
            </div>
          </div>
        </div>
        <?php if (get_field('show_footer_newsletter', 'option')) : ?>
          <!-- Newsletter -->
          <div class=" col-md-3 col-sm-6 col-xs-12">
            <div class="ftitleb">
              <h2 class="footer_title">خبرنامه</h2>
            </div>
            <div class="widget widget_mc4wp_form_widget">
              <form
                class="footer-newsletter-form"
                action="<?= esc_url(admin_url('admin-post.php')); ?>"
                method="post">

                <?php wp_nonce_field('maxu_newsletter', 'maxu_newsletter_nonce'); ?>

                <input
                  type="hidden"
                  name="action"
                  value="maxu_newsletter">

                <div class="mc4wp-form-fields">

                  <p>
                    در خبرنامه ما مشترک شوید تا شما را از آخرین اتفاقات آگاه سازیم
                  </p>

                  <p>

                    <input
                      type="text"
                      name="email"
                      class="js-newsletter-email"
                      value="<?= esc_attr($old['email'] ?? '') ?>"
                      placeholder="آدرس ایمیل شما"
                      dir="ltr">
                    <smal class="text red fnl-error-message"></smal>
                  </p>

                  <?php if (!empty($errors['email'])) : ?>

                    <small class="text-danger">
                      <?= esc_html($errors['email']) ?>
                    </small>

                  <?php endif; ?>

                  <?php if (isset($_GET['newsletter']) && $_GET['newsletter'] === 'success') : ?>

                    <small class="text-success">
                      با موفقیت عضو خبرنامه شدید.
                    </small>

                  <?php endif; ?>

                </div>

                <div class="contact_bnt">
                  <button type="submit">
                    اشتراک
                  </button>
                </div>

              </form>
            </div>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
  <!-- END FOOTER MIDDLE AREA -->

  <!-- FOOTER BOTTOM AREA  -->

  <div class="footer_bottom_area">
    <div class="container">
      <div class="row">
        <!-- left -->
        <div class="col-md-6 col-sm-6">
          <div class="footer_bottom_title">
            <p>ارائه شده در وب‌سایت <a href="https://soft46.ir" target="_blank">soft46.ir</a></p>
          </div>
        </div>
        <!-- right -->
        <div class="col-md-6 col-sm-6">
          <div class="footer_menu">
            <ul>
              <?php if (!empty($footer_button_area_menu)) : ?>
                <?php foreach ($footer_button_area_menu as $item) : ?>
                  <li><a href="<?= esc_url(get_permalink($item->ID)); ?>"><?= esc_html($item->post_title); ?></a></li>
              <?php endforeach;
              endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END FOOTER BOTTOM AREA  -->
</footer>
<?php wp_footer(); ?>
</body>

</html>