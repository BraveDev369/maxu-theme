<?php

if (!defined('ABSPATH')) {
  exit;
}

/**
 * منوی مدیریت
 */
add_action('admin_menu', 'maxu_contact_admin_menu');

function maxu_contact_admin_menu()
{

  add_menu_page(

    'پیام های تماس',

    'پیام های تماس',

    'manage_options',

    'maxu-contact',

    'maxu_contact_admin_page',

    'dashicons-email',

    30

  );
}


/**
 * صفحه مدیریت
 */
function maxu_contact_admin_page()
{
  if (
    isset($_GET['action']) &&
    $_GET['action'] === 'view'
  ) {

    maxu_contact_view(

      absint($_GET['id'])

    );

    return;
  }

  $table = new Maxu_Contact_List_Table();

  $table->prepare_items();

?>

  <div class="wrap">

    <h1 class="wp-heading-inline">
      پیام های تماس
    </h1>

    <hr class="wp-header-end">

    <form method="get">

      <input type="hidden"
        name="page"
        value="maxu-contact">

      <?php

      $table->search_box(
        'جستجو',
        'contact-search'
      );

      $table->display();

      ?>

    </form>

  </div>

<?php
}
