<?php

if (!defined('ABSPATH')) {
  exit;
}

class acf_field_fontawesome extends acf_field
{
  public function __construct()
  {
    $this->name     = 'fontawesome';
    $this->label    = __('FontAwesome Picker');
    $this->category = 'choice';
    $this->defaults = [];

    parent::__construct();
  }

  /**
   * Load CSS & JS
   */
  public function input_admin_enqueue_scripts()
  {
    wp_enqueue_style(
      'fontawesome',
      get_template_directory_uri() . '/assets/css/font-awesome.min.css'
    );

    wp_enqueue_style(
      'acf-fa-picker',
      get_template_directory_uri() . '/acf/fields/acf-fontawesome-picker/field.css',
      [],
      filemtime(get_template_directory() . '/acf/fields/acf-fontawesome-picker/field.css')
    );

    wp_enqueue_script(
      'acf-fa-picker',
      get_template_directory_uri() . '/acf/fields/acf-fontawesome-picker/field.js',
      ['jquery', 'acf-input'],
      filemtime(get_template_directory() . '/acf/fields/acf-fontawesome-picker/field.js'),
      true
    );

    /**
     * Load icons.json
     */

    $icons = [];

    $json = get_template_directory() . '/acf/fields/acf-fontawesome-picker/icons.json';

    if (file_exists($json)) {

      $icons = json_decode(file_get_contents($json), true);

      if (!is_array($icons)) {
        $icons = [];
      }
    }

    wp_localize_script(
      'acf-fa-picker',
      'acfFaPicker',
      [
        'icons' => $icons,
      ]
    );
  }

  /**
   * Render field
   */
  public function render_field($field)
  {

    $value = !empty($field['value']) ? $field['value'] : '';

?>

    <div class="acf-fa-picker">

      <input
        type="hidden"
        class="acf-fa-value"
        name="<?php echo esc_attr($field['name']); ?>"
        value="<?php echo esc_attr($value); ?>">

      <div class="acf-fa-header acf-fa-open">

        <div class="acf-fa-preview">

          <?php if ($value) : ?>

            <i class="fa fa-<?php echo esc_attr($value); ?>"></i>

            <span>

              <?php echo esc_html($value); ?>

            </span>

          <?php else : ?>

            <i class="fa fa-picture-o"></i>

            <span>

              انتخاب نشده

            </span>

          <?php endif; ?>

        </div>
        
      </div>

      <div class="acf-fa-dropdown">

        <div class="acf-fa-search">

          <input
            type="text"
            class="acf-fa-search-input"
            placeholder="جستجوی آیکون...">

        </div>

        <div class="acf-fa-icons">

          <!-- Javascript -->

        </div>

      </div>

    </div>

<?php
  }
}

new acf_field_fontawesome();
