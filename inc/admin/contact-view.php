<?php

if (!defined('ABSPATH')) {
  exit;
}

function maxu_contact_view($id)
{

  global $wpdb;

  $table = $wpdb->prefix . 'maxu_contact_messages';

  $message = $wpdb->get_row(

    $wpdb->prepare(

      "SELECT * FROM {$table} WHERE id=%d",

      $id

    )

  );

  if (!$message) {

    wp_die('پیام پیدا نشد.');
  }

  // خوانده شده

  if (!$message->status) {

    $wpdb->update(

      $table,

      [
        'status' => 1
      ],

      [
        'id' => $id
      ]

    );
  }

?>

  <div class="wrap">

    <h1 class="wp-heading-inline">
      مشاهده پیام
    </h1>

    <hr>

    <table class="form-table">

      <tr>

        <th width="150">نام</th>

        <td><?= esc_html($message->name) ?></td>

      </tr>

      <tr>

        <th>ایمیل</th>

        <td>

          <a href="mailto:<?= esc_attr($message->email) ?>">
            <?= esc_html($message->email) ?>
          </a>

        </td>

      </tr>

      <tr>

        <th>تلفن</th>

        <td><?= esc_html($message->phone) ?></td>

      </tr>

      <tr>

        <th>وب سایت</th>

        <td>

          <?php if ($message->website) : ?>

            <a target="_blank"
              href="<?= esc_url($message->website) ?>">

              <?= esc_html($message->website) ?>

            </a>

          <?php endif; ?>

        </td>

      </tr>

      <tr>

        <th>پیام</th>

        <td>

          <?= nl2br(esc_html($message->message)); ?>

        </td>

      </tr>

      <tr>

        <th>IP</th>

        <td><?= esc_html($message->ip_address) ?></td>

      </tr>

      <tr>

        <th>تاریخ</th>

        <td><?= esc_html($message->created_at) ?></td>

      </tr>

    </table>

    <p>

      <a class="button button-primary"
        href="<?= admin_url('admin.php?page=maxu-contact'); ?>">

        بازگشت

      </a>

    </p>

  </div>

<?php

}
?>