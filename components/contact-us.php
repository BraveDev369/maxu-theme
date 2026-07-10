<?php
if (! defined('ABSPATH')) exit;

$contact_us = get_fields();

?>




<div class="contact_area contacts_are">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section_title">
          <h2><?= esc_html($contact_us['section_title']) ?></h2>
          <p><?= esc_html($contact_us['section_description']); ?></p>
        </div>
      </div>
    </div>
    <div class="row sdsdsd">
      <div class="col-md-7 col-sm-6 contact-block">
        <?php get_template_part('templates/form-layout') ?>
      </div>
      <div class="col-sm-6 col-md-5 contact-block">
        <?php get_template_part('templates/contact-us-box') ?>
      </div>
    </div>
  </div>
</div>