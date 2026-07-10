<?php

if (!defined('ABSPATH')) {
  exit;
}

if (!class_exists('WP_List_Table')) {
  require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Newsletter_List_Table extends WP_List_Table
{
  private NewsletterRepository $repository;

  public function __construct()
  {
    parent::__construct([
      'singular' => 'newsletter',
      'plural'   => 'newsletters',
      'ajax'     => false,
    ]);

    $this->repository = new NewsletterRepository();
  }

  public function get_columns()
  {
    return [

      'cb' => '<input type="checkbox" />',

      'id' => 'شناسه',

      'email' => 'ایمیل',

      'created_at' => 'تاریخ عضویت',

    ];
  }

  protected function column_cb($item)
  {
    return sprintf(
      '<input type="checkbox" name="newsletter[]" value="%d">',
      $item->id
    );
  }

  protected function column_email($item)
  {
    $delete = wp_nonce_url(
      admin_url(
        'admin.php?page=maxu-newsletters&action=delete&id=' . $item->id
      ),
      'delete_newsletter_' . $item->id
    );

    $actions = [

      'delete' => sprintf(
        '<a href="%s" onclick="return confirm(\'آیا مطمئن هستید؟\')">حذف</a>',
        esc_url($delete)
      ),

    ];

    return sprintf(
      '%1$s %2$s',
      esc_html($item->email),
      $this->row_actions($actions)
    );
  }

  protected function column_default($item, $column_name)
  {
    return $item->$column_name ?? '';
  }

  public function get_bulk_actions()
  {
    return [
      'delete' => 'حذف',
    ];
  }

  public function prepare_items()
  {
    global $wpdb;

    $table = $wpdb->prefix . 'newsletters';

    $per_page = 20;

    $current_page = $this->get_pagenum();

    $search = sanitize_text_field($_REQUEST['s'] ?? '');

    $where = '';

    $this->process_bulk_action();
    
    if ($search) {

      $where = $wpdb->prepare(
        " WHERE email LIKE %s ",
        '%' . $wpdb->esc_like($search) . '%'
      );
    }

    $total_items = (int) $wpdb->get_var(
      "SELECT COUNT(*) FROM {$table} {$where}"
    );

    $offset = ($current_page - 1) * $per_page;

    $this->items = $wpdb->get_results(

      $wpdb->prepare(

        "SELECT *
                 FROM {$table}
                 {$where}
                 ORDER BY id DESC
                 LIMIT %d OFFSET %d",

        $per_page,
        $offset

      )

    );

    $this->set_pagination_args([

      'total_items' => $total_items,

      'per_page' => $per_page,

    ]);

    $this->_column_headers = [

      $this->get_columns(),

      [],

      []

    ];
  }
}
