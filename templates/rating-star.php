<?php
if (! defined("ABSPATH")) exit;

?>


<div class="form_field_rating">

  <label class="rating-title">
    امتیاز شما
  </label>

  <div class="rating-stars">

    <?php for ($i = 5; $i >= 1; $i--) : ?>

      <input
        type="radio"
        id="star<?= esc_attr($i); ?>"
        name="rating"
        value="<?= esc_attr($i); ?>"
        required>

      <label for="star<?= esc_attr($i); ?>">
        <i class="fa fa-star"></i>
      </label>

    <?php endfor; ?>

  </div>

</div>