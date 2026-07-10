<?php

if (!defined('ABSPATH')) {
  exit;
}

class NewsletterActions
{
  private NewsletterRepository $repository;

  public function __construct()
  {
    $this->repository = new NewsletterRepository();

    add_action('admin_init', [$this, 'handle_delete']);
    add_action('admin_init', [$this, 'handle_bulk_delete']);
  }

  public function handle_delete()
  {
    if (
      !isset($_GET['page'], $_GET['action'], $_GET['id']) ||
      $_GET['page'] !== 'maxu-newsletters' ||
      $_GET['action'] !== 'delete'
    ) {
      return;
    }

    check_admin_referer('delete_newsletter_' . $_GET['id']);

    $this->repository->delete((int) $_GET['id']);

    wp_safe_redirect(
      admin_url('admin.php?page=maxu-newsletters&deleted=1')
    );

    exit;
  }

  public function handle_bulk_delete()
  {
    if (
      !isset($_POST['action']) ||
      $_POST['action'] !== 'delete'
    ) {
      return;
    }

    if (empty($_POST['newsletter'])) {
      return;
    }

    foreach ($_POST['newsletter'] as $id) {

      $this->repository->delete((int) $id);
    }

    wp_safe_redirect(
      admin_url('admin.php?page=maxu-newsletters&deleted=1')
    );

    exit;
  }
}

new NewsletterActions();
