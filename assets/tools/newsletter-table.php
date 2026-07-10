<?php

if (!defined('ABSPATH')) {
  exit;
}


function maxu_create_newsletter_table()
{
  global $wpdb;

  $table = $wpdb->prefix . 'newsletters';

  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE {$table} (

        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

        email VARCHAR(255) NOT NULL,

        ip_address VARCHAR(45) NULL,

        status TINYINT(1) NOT NULL DEFAULT 1,

        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

        PRIMARY KEY (id),

        UNIQUE KEY email (email)

    ) {$charset_collate};";

  require_once ABSPATH . 'wp-admin/includes/upgrade.php';

  dbDelta($sql);
}

add_action('init', function () {

  if (!get_option('maxu_newsletter_table_created')) {

    maxu_create_newsletter_table();

    update_option('maxu_newsletter_table_created', 1);
  }
});
