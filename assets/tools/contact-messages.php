<?php

if (!defined('ABSPATH')) {
  exit;
}

add_action('admin_menu', 'maxu_contact_menu');

function maxu_contact_menu()
{
  add_menu_page(

    'پیام‌های تماس',

    'پیام‌های تماس',

    'manage_options',

    'maxu-contact',

    'maxu_contact_page',

    'dashicons-email-alt',

    30

  );
}

function maxu_contact_page()
{
  global $wpdb;

  $table = $wpdb->prefix . 'maxu_contact_messages';

  $messages = $wpdb->get_results(

    "SELECT * FROM {$table} ORDER BY created_at DESC"

  );

?>

  <div class="wrap">

    <h1>پیام‌های تماس</h1>

    <table class="widefat striped">

      <thead>

        <tr>

          <th>شناسه</th>

          <th>نام</th>

          <th>ایمیل</th>

          <th>تلفن</th>

          <th>تاریخ</th>

        </tr>

      </thead>

      <tbody>

        <?php foreach ($messages as $item) : ?>

          <tr>

            <td><?= $item->id ?></td>

            <td><?= esc_html($item->name) ?></td>

            <td><?= esc_html($item->email) ?></td>

            <td><?= esc_html($item->phone) ?></td>

            <td><?= esc_html($item->created_at) ?></td>

          </tr>

        <?php endforeach; ?>

      </tbody>

    </table>

  </div>

<?php

}
?>