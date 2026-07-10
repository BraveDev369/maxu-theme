<?php

if (!defined('ABSPATH')) {
  exit;
}

if (!class_exists('WP_List_Table')) {
  require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Maxu_Contact_List_Table extends WP_List_Table
{

  public function __construct()
  {
    parent::__construct([
      'singular' => 'contact',
      'plural'   => 'contacts',
      'ajax'     => false,
    ]);
  }

  /**
   * ستون ها
   */
  public function get_columns()
  {
    return [

      'cb'         => '<input type="checkbox" />',

      'id'         => 'شناسه',

      'name'       => 'نام',

      'email'      => 'ایمیل',

      'message'      => 'پیام',

      'phone'      => 'تلفن',

      'created_at' => 'تاریخ',

    ];
  }

  /**
   * ستون های قابل مرتب سازی
   */
  protected function get_sortable_columns()
  {
    return [

      'id'         => ['id', true],

      'name'       => ['name', false],

      'email'      => ['email', false],

      'message'      => ['message', false],

      'created_at' => ['created_at', false],

    ];
  }

  /**
   * چک باکس
   */
  protected function column_cb($item)
  {
    return sprintf(
      '<input type="checkbox" name="contact[]" value="%d" />',
      $item->id
    );
  }

  /**
   * ستون نام
   */
  protected function column_name($item)
  {

    $delete_url = wp_nonce_url(

      admin_url(

        'admin.php?page=maxu-contact&action=delete&id=' . $item->id

      ),

      'delete_contact'

    );

    $view_url = admin_url(

      'admin.php?page=maxu-contact&action=view&id=' . $item->id

    );

    $read_url = wp_nonce_url(

      admin_url(

        'admin.php?page=maxu-contact&action=read&id=' . $item->id

      ),

      'read_contact'

    );

    $actions = [

      'view' => sprintf(
        '<a href="%s">مشاهده</a>',
        esc_url($view_url)
      ),

      'delete' => sprintf(
        '<a style="color:#b32d2e" href="%s">حذف</a>',
        esc_url($delete_url)
      ),

    ];

    return sprintf(

      '<strong>%s</strong>%s',

      esc_html($item->name),

      $this->row_actions($actions)

    );
  }

  /**
   * سایر ستون ها
   */
  protected function column_default($item, $column_name)
  {

    switch ($column_name) {

      case 'id':
      case 'email':
      case 'phone':
      case 'created_at':

        return esc_html($item->$column_name);
      case 'message':
        return esc_html(wp_trim_words($item->message, 5, '...'));

      default:

        return '';
    }
  }

  /**
   * اکشن گروهی
   */
  protected function get_bulk_actions()
  {

    return [

      'delete' => 'حذف',

    ];
  }

  /**
   * واکشی اطلاعات
   */
  public function prepare_items()
  {
    global $wpdb;

    $table = $wpdb->prefix . 'maxu_contact_messages';

    $per_page = 10;

    $current_page = $this->get_pagenum();

    $offset = ($current_page - 1) * $per_page;

    $search = isset($_REQUEST['s'])
      ? sanitize_text_field($_REQUEST['s'])
      : '';

    $orderby = isset($_REQUEST['orderby'])
      ? sanitize_sql_orderby($_REQUEST['orderby'])
      : 'id';

    $allowed = [
      'id',
      'name',
      'email',
      'created_at'
    ];

    if (!in_array($orderby, $allowed, true)) {
      $orderby = 'id';
    }

    $order = (isset($_REQUEST['order']) && strtolower($_REQUEST['order']) === 'asc')
      ? 'ASC'
      : 'DESC';

    $where = '';

    if (!empty($search)) {

      $like = '%' . $wpdb->esc_like($search) . '%';

      $where = $wpdb->prepare(
        " WHERE
                name LIKE %s
                OR email LIKE %s
                OR phone LIKE %s ",
        $like,
        $like,
        $like
      );
    }

    $total_items = $wpdb->get_var(
      "SELECT COUNT(*) FROM {$table} {$where}"
    );

    $items = $wpdb->get_results(

      $wpdb->prepare(

        "SELECT *
             FROM {$table}
             {$where}
             ORDER BY {$orderby} {$order}
             LIMIT %d OFFSET %d",

        $per_page,
        $offset

      )

    );

    $this->items = $items;

    $this->set_pagination_args([

      'total_items' => $total_items,

      'per_page' => $per_page,

      'total_pages' => ceil($total_items / $per_page),

    ]);

    $this->_column_headers = [

      $this->get_columns(),

      [],

      $this->get_sortable_columns()

    ];
  }
}
