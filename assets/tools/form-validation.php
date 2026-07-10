<?php
if (! defined("ABSPATH")) exit;

add_action('admin_post_contact_form', 'maxu_contact_form');
add_action('admin_post_nopriv_contact_form', 'maxu_contact_form');

function maxu_contact_form()
{
  if (
    !isset($_POST['contact_nonce']) ||
    !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_action')
  ) {
    wp_die('درخواست نامعتبر است.');
  }

  $name    = sanitize_text_field($_POST['name'] ?? '');
  $phone   = sanitize_text_field($_POST['phone'] ?? '');
  $email   = sanitize_email($_POST['email'] ?? '');
  $website = esc_url_raw($_POST['website'] ?? '');
  $message = sanitize_textarea_field($_POST['message'] ?? '');

  $errors = [];

  if (empty($name)) {
    $errors['name'] = 'لطفاً نام خود را وارد کنید.';
  }

  if (!is_email($email)) {
    $errors['email'] = 'لطفاً یک ایمیل معتبر وارد کنید.';
  }

  global $wpdb;

  $table = $wpdb->prefix . 'maxu_contact_messages';

  if (!empty($errors)) {

    $data = [
      'errors' => $errors,
      'old'    => [
        'name'    => $name,
        'phone'   => $phone,
        'email'   => $email,
        'website' => $website,
        'message' => $message,
      ]
    ];

    wp_safe_redirect(
      add_query_arg(
        [
          'contact' => urlencode(base64_encode(wp_json_encode($data)))
        ],
        wp_get_referer()
      )
    );

    exit;
  } else {
    if ($wpdb->insert(
      $table,
      [
        'name'       => $name,
        'email'      => $email,
        'phone'      => $phone,
        'website'    => $website,
        'message'    => $message,
        'ip_address' => $_SERVER['REMOTE_ADDR'],
        'status'     => 0,
      ]
    )) {

      wp_safe_redirect(
        add_query_arg(
          'contact',
          'success',
          wp_get_referer()
        )
      );
    } else {

      wp_safe_redirect(
        add_query_arg(
          'contact',
          'db_error',
          wp_get_referer()
        )
      );
    }

    exit;
  }
}
