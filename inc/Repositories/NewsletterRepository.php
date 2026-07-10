<?php

if (!defined('ABSPATH')) {
  exit;
}

class NewsletterRepository
{
  private $table;

  public function __construct()
  {
    global $wpdb;

    $this->table = $wpdb->prefix . 'newsletters';
  }

  public function exists(string $email): bool
  {
    global $wpdb;

    return (bool) $wpdb->get_var(
      $wpdb->prepare(
        "SELECT id
                 FROM {$this->table}
                 WHERE email = %s
                 LIMIT 1",
        $email
      )
    );
  }

  public function create(string $email): bool
  {
    global $wpdb;

    return (bool) $wpdb->insert(
      $this->table,
      [
        'email'      => $email,
        'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
        'status'     => 1,
      ],
      [
        '%s',
        '%s',
        '%d',
      ]
    );
  }
  public function delete(int $id): bool
  {
    global $wpdb;

    return (bool) $wpdb->delete(
      $this->table,
      [
        'id' => $id,
      ],
      [
        '%d',
      ]
    );
  }

  public function find(int $id)
  {
    global $wpdb;

    return $wpdb->get_row(
      $wpdb->prepare(
        "SELECT *
                 FROM {$this->table}
                 WHERE id = %d",
        $id
      )
    );
  }

  public function count(): int
  {
    global $wpdb;

    return (int) $wpdb->get_var(
      "SELECT COUNT(*) FROM {$this->table}"
    );
  }
}
