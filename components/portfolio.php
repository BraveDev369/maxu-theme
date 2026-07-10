<?php
if (!defined('ABSPATH')) exit;

$title       = get_field('title');
$description = get_field('description');

$terms = get_terms([
  'taxonomy'   => 'portfolio_category',
  'hide_empty' => true,
]);

$portfolio_query = new WP_Query([
  'post_type'      => 'portfolio',
  'posts_per_page' => -1,
  'post_status'    => 'publish',
]);
?>

<div class="portfolio_area" id="portfolio">

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <div class="section_title lage">

          <?php if ($title) : ?>
            <h2><?= esc_html($title); ?></h2>
          <?php endif; ?>

          <?php if ($description) : ?>
            <p><?= esc_html($description); ?></p>
          <?php endif; ?>

        </div>

        <div class="portfolio_menu">

          <ul class="filter_menu">

            <li class="current_menu_item" data-filter="*">
              همه دسته‌ها
            </li>

            <?php foreach ($terms as $term) : ?>

              <li data-filter=".<?= esc_attr($term->slug); ?>">
                <?= esc_html($term->name); ?>
              </li>

            <?php endforeach; ?>

          </ul>

        </div>

      </div>

    </div>

  </div>

  <div class="container-fluid">

    <div class="row nospace">

      <div class="em_load">

        <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post();

          $terms = get_the_terms(get_the_ID(), 'portfolio_category');

          $classes = '';

          $categories = [];

          if ($terms) {

            foreach ($terms as $term) {

              $classes .= $term->slug . ' ';
              $categories[] = $term->name;
            }
          }

        ?>

          <div class="col-md-4 col-sm-6 col-xs-12 grid-item <?= esc_attr(trim($classes)); ?>">

            <div class="single_protfolio">

              <div class="protfolio_thumb">

                <?php if (has_post_thumbnail()) : ?>

                  <?php the_post_thumbnail('large', [
                    'class' => 'img-responsive'
                  ]); ?>

                <?php endif; ?>

                <div class="protfoliot_icon">

                  <a
                    class="venobox vbox-item"
                    data-gall="myGallery"
                    href="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>">

                    <i class="fa fa-expand"></i>

                  </a>

                </div>

                <div class="protfolio_content">

                  <h3>

                    <a href="<?php the_permalink(); ?>">

                      <?php the_title(); ?>

                    </a>

                  </h3>

                  <span class="category-item-p">

                    <?= esc_html(implode(' / ', $categories)); ?>

                  </span>

                </div>

              </div>

            </div>

          </div>

        <?php endwhile;
        wp_reset_postdata(); ?>

      </div>

    </div>

  </div>

</div>