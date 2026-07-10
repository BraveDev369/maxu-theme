<?php

$counter_items = get_field('counter_items');

if ($counter_items) :

  $count = count($counter_items);

  $cols = [
    1 => 'col-md-12',
    2 => 'col-md-6',
    3 => 'col-md-4',
    4 => 'col-md-3',
  ];

  $col = $cols[$count] ?? 'col-lg-3 col-md-4 col-sm-6';

?>

  <div class="counter_area">
    <div class="container">
      <div class="row">

        <?php foreach ($counter_items as $item) : ?>

          <div class="col-lg-3 col-md-4 col-sm-6">

            <div class="single_counter">

              <div class="single_counter_inner">

                <div class="counter_icon">
                  <i class="fa fa-<?= esc_attr($item['icon']); ?>"></i>
                </div>

                <div class="counter_title">
                  <h4><?= esc_html($item['title']); ?></h4>
                </div>

                <div class="countr_text">
                  <h1><?= esc_html($item['number']); ?></h1>
                </div>

              </div>

            </div>

          </div>

        <?php endforeach; ?>

      </div>
    </div>
  </div>

<?php endif; ?>