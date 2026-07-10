<?php

if (!defined('ABSPATH')) {
  exit;
}

add_action('admin_init', 'maxu_contact_actions');

function maxu_contact_actions()
{
  if (!current_user_can('manage_options')) {
    return;
  }

  if (!isset($_GET['page']) || $_GET['page'] !== 'maxu-contact') {
    return;
  }

  if (!isset($_GET['action'])) {
    return;
  }

  global $wpdb;

  $table = $wpdb->prefix . 'maxu_contact_messages';

  switch ($_GET['action']) {

    case 'delete':

      if (
        !isset($_GET['_wpnonce']) ||
        !wp_verify_nonce($_GET['_wpnonce'], 'delete_contact')
      ) {
        wp_die('درخواست نامعتبر است.');
      }

      $id = absint($_GET['id']);

      $wpdb->delete(
        $table,
        ['id' => $id],
        ['%d']
      );

      wp_safe_redirect(admin_url('admin.php?page=maxu-contact'));

      exit;
  }
}
