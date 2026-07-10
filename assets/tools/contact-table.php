<?php

if (!defined('ABSPATH')) {
  exit;
}

function maxu_create_contact_table()
{
  global $wpdb;

  $table = $wpdb->prefix . 'maxu_contact_messages';

  $charset_collate = $wpdb->get_charset_collate();

  require_once ABSPATH . 'wp-admin/includes/upgrade.php';

  $sql = "CREATE TABLE {$table} (

        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,

        name VARCHAR(255) NOT NULL,

        email VARCHAR(255) NOT NULL,

        phone VARCHAR(30) NULL,

        website VARCHAR(255) NULL,

        message LONGTEXT NOT NULL,

        ip_address VARCHAR(45) NULL,

        status TINYINT(1) NOT NULL DEFAULT 0,

        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

        PRIMARY KEY (id)

    ) {$charset_collate};";

  dbDelta($sql);
}


add_action('init', function () {

  if (!get_option('maxu_contact_table_created')) {

    maxu_create_contact_table();

    update_option('maxu_contact_table_created', 1);
  }
});
