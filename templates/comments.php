<?php
if (post_password_required()) {
    return;
}

$req       = get_option('require_name_email');
$commenter = wp_get_current_commenter();
$required  = $req ? 'required' : '';



?>

<div class="blogs_contact_area">
    <div class="contact_about_us">

        <?php if (comments_open()) : ?>

            <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>

                <p class="alert alert-warning">
                    برای ثبت دیدگاه باید وارد شوید.
                </p>

            <?php else : ?>

                <h2 class="contact-title">دیدگاه خود را بیان کنید</h2>

                <form id="commentForm" action="<?= esc_url(site_url('/wp-comments-post.php')); ?>" method="post">

                    <div class="contact_form_inner">

                        <div class="form_field">

                            <?php if (!is_user_logged_in()) : ?>

                                <div class="form_field_inner">
                                    <input
                                        type="text"
                                        name="author"
                                        placeholder="<?= $req ? 'نام شما *' : 'نام شما'; ?>"
                                        value="<?= esc_attr($commenter['comment_author']); ?>"
                                        <?= $required; ?>>
                                </div>

                                <div class="form_field_inner">
                                    <input
                                        type="text"
                                        name="phone"
                                        placeholder="شماره تلفن"
                                        dir="ltr"
                                        value="<?= isset($_POST['phone']) ? esc_attr($_POST['phone']) : ''; ?>">
                                </div>

                                <div class="form_field_inner">
                                    <input
                                        type="email"
                                        name="email"
                                        placeholder="<?= $req ? 'ایمیل *' : 'ایمیل'; ?>"
                                        dir="ltr"
                                        value="<?= esc_attr($commenter['comment_author_email']); ?>"
                                        <?= $required; ?>>
                                </div>

                                <div class="form_field_inner">
                                    <input
                                        type="text"
                                        name="url"
                                        placeholder="وب‌سایت شما"
                                        dir="ltr"
                                        value="<?= esc_attr($commenter['comment_author_url']); ?>">
                                </div>

                            <?php else : ?>

                                <p>
                                    شما با نام
                                    <strong><?= esc_html(wp_get_current_user()->display_name); ?></strong>
                                    وارد شده‌اید.
                                </p>

                            <?php endif; ?>



                            <div class="form_field_comment">
                                <textarea
                                    name="comment"
                                    placeholder="پیام خود را بنویسید ..."
                                    cols="30"
                                    rows="10"
                                    required></textarea>
                            </div>
                            <?php get_template_part("templates/rating-star"); ?>

                        </div>

                    </div>

                    <?php comment_id_fields(); ?>

                    <?php do_action('comment_form', get_the_ID()); ?>

                    <div class="contact_bnt single_btns">
                        <button type="submit" name="submit">
                            <?= esc_html('ارسال دیدگاه') ?>
                        </button>
                    </div>

                </form>

            <?php endif; ?>

        <?php endif; ?>

    </div>
</div>