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
        id="star<?= $i; ?>"
        name="rating"
        value="<?= $i; ?>"
        required>

      <label for="star<?= $i; ?>">
        <i class="fa fa-star"></i>
      </label>

    <?php endfor; ?>

  </div>

</div>