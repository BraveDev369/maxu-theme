<?php

if (! defined('ABSPATH')) exit;

class ACF_Field_Bootstrap_Icon extends acf_field
{

    function __construct()
    {

        $this->name = 'bootstrap_icon';
        $this->label = __('Bootstrap Icon');
        $this->category = 'choice';

        parent::__construct();
    }

    function input_admin_enqueue_scripts()
    {

        wp_enqueue_style(
            'bootstrap-icons',
            get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.min.css'
        );

        wp_enqueue_script(
            'acf-bootstrap-icon',
            get_template_directory_uri() . '/acf/fields/bootstrap-icons/bootstrap-icons.js',
            ['acf-input'],
            '1.0',
            true
        );
    }

    function render_field($field)
    {

        $path = get_template_directory() . '/assets/vendor/bootstrap-icons/bootstrap-icons.json';

        $json = json_decode(file_get_contents($path), true);

        // گرفتن فقط نام آیکن‌ها
        $icons = array_keys($json);

        echo '<select class="acf-bootstrap-icon" name="' . esc_attr($field['name']) . '" style="width:100%;font-size:20px">';

        echo '<option value="">انتخاب آیکن</option>';

        foreach ($icons as $icon) {

            $selected = selected($field['value'], $icon, false);

            echo '<option value="' . $icon . '" ' . $selected . ' style="font-size:30px">
        <i class="bi bi-' . $icon . '"></i> ' . $icon . '
        </option>';
        }

        echo '</select>';
    }
}
