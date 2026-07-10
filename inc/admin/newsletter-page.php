<?php

if (!defined('ABSPATH')) {
  exit;
}

class NewsletterPage
{
  public function __construct()
  {
    add_action('admin_menu', [$this, 'register_menu']);
  }

  public function register_menu()
  {
    add_menu_page(
      'خبرنامه',
      'خبرنامه',
      'manage_options',
      'maxu-newsletters',
      [$this, 'render'],
      'dashicons-email-alt',
      27
    );
  }

  public function render()
  {
    $table = new Newsletter_List_Table();

    $table->prepare_items();

?>
    <div class="wrap">

      <h1 class="wp-heading-inline">
        اعضای خبرنامه
      </h1>

      <hr class="wp-header-end">

      <form method="get">

        <input
          type="hidden"
          name="page"
          value="maxu-newsletters">

        <?php
        $table->search_box('جستجوی ایمیل', 'newsletter-search');

        $table->display();
        ?>

      </form>

    </div>
<?php
  }
}

new NewsletterPage();
