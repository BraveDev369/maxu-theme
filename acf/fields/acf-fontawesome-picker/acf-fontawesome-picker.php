<?php
/*
Plugin Name: ACF FontAwesome Picker
Description: FontAwesome Picker for ACF
Version: 1.0
*/

if (!defined('ABSPATH')) {
  exit;
}

add_action('acf/include_field_types', function ($version) {

  require_once get_template_directory() . '/acf/fields/acf-fontawesome-picker/class-acf-field-fontawesome.php';
});
