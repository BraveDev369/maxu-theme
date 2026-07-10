<?php
if (! defined('ABSPATH')) exit;

$testimonial = get_fields();
?>

<div class="testimonial_area">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="section_title lage">

                    <h2><?= esc_html($testimonial['title']); ?></h2>

                    <p><?= esc_html($testimonial['description']); ?></p>

                </div>
            </div>
        </div>

        <?php if (!empty($testimonial['testimonials'])) : ?>

            <div class="row">
                <div class="testimonial_list owl-carousel curosel-style">

                    <?php foreach ($testimonial['testimonials'] as $item) : ?>

                        <div class="col-md-12">

                            <div class="single_testimonial">

                                <?php if (!empty($item['image'])) : ?>

                                    <div class="single_testimonial_thumb">
                                        <img
                                            src="<?= esc_url($item['image']['url']); ?>"
                                            alt="<?= esc_attr($item['image']['alt'] ?? ''); ?>">
                                    </div>

                                <?php endif; ?>

                                <div class="single_testimonial_icon">
                                    <i class="fa fa-quote-left"></i>
                                </div>

                                <div class="single_testimonial_icon2">
                                    <i class="fa fa-quote-right"></i>
                                </div>

                                <div class="single_testimonial_text">
                                    <p><?= esc_html($item['text']); ?></p>
                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>
            </div>

        <?php endif; ?>

    </div>
</div>